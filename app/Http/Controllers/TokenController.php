<?php

namespace App\Http\Controllers;

use App\Models\Token;
use App\Models\UserApiToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Validation\Rule;

class TokenController extends Controller
{
    public function index()
    {
        return view('api-tokens.index');
    }
    public function data()
    {
        $query = UserApiToken::with('user')
                ->where('user_id', auth()->id())
                ->get();

        return DataTables::of($query)->make(true);
    }

    public function store(Request $request)
    {
        $request->validate([
            'domain' => [
                'required',
                'string',
                'not_regex:/^www\./i',
                'regex:/^(?!www\.)[a-zA-Z0-9-]+(\.[a-zA-Z]{2,})+$/',
                'unique:userapitoken,domain'
            ],
            'callback' => [
                'required',
                'url',
                'unique:userapitoken,callback'
            ],
            'payin_callback' => [
                null,
                'url'
            ],
            'ip' => [
                'required',
                'ip',
                'unique:userapitoken,ip'
            ],
        ]);
        
        
    
        $userId = auth()->id();

        $token = UserApiToken::where('user_id', $userId)->count();

        if($token > 0){
            return response()->json(['message' => 'You can only register one IP address per user.','status' => 'error']);
        }

        $token = new UserApiToken;
        $token->ip = $request->ip;
        $token->user_id = $userId;
        $token->domain = $request->domain;
        $token->callback = $request->callback;
        $token->payin_callback = $request->payin_callback;
        $token->token = Str::random(60);
        $token->save();

        return response()->json(['message' => 'Token created successfully.','status' => 'success']);
        
        
    }

    public function update(Request $request, $id)
    {
        $id = Crypt::decrypt($id);
        $token = UserApiToken::findOrFail($id);

        if ($token->user_id !== auth()->id()) {
            return response()->json(['message' => 'Unauthorized.', 'status' => 'error'], 403);
        }

        $request->validate([
            'domain' => [
                'required',
                'string',
                'not_regex:/^www\./i',
                'regex:/^(?!www\.)[a-zA-Z0-9-]+(\.[a-zA-Z]{2,})+$/',
                Rule::unique('userapitoken', 'domain')->ignore($token->id)
            ],
            'callback' => [
                'required',
                'url',
                Rule::unique('userapitoken', 'callback')->ignore($token->id)
            ],
            'payin_callback' => [
                null,
                'url'
            ],
            'ip' => [
                'required',
                'ip',
                Rule::unique('userapitoken', 'ip')->ignore($token->id)
            ],
        ]);

        $token->ip = $request->ip;
        $token->domain = $request->domain;
        $token->callback = $request->callback;
        $token->payin_callback = $request->payin_callback;
        $token->save();

        return response()->json(['message' => 'Token updated successfully.', 'status' => 'success']);
    }

    public function getTokenData($id)
    {
        $token = UserApiToken::findOrFail($id);
        
        $data = $token->toArray();
        $data['id'] = Crypt::encrypt($token->id);

        return response()->json([
            'status' => 'success',
            'data' => $data
        ]);
    }
    
    public function destroy($id)
    {

        if (!auth()->check()) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $token = UserApiToken::findOrFail($id);

        if ($token->user_id !== auth()->id()) {
            return response()->json(['message' => 'You can only delete your own token.'], 403);
        }

        $token->delete();

        return response()->json(['message' => 'Token deleted successfully.']);
    }


}
