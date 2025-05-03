<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DefaultCharges;
use App\Models\User;
use App\Models\UserCharges;
use Illuminate\Support\Facades\Crypt;

class UserChargesController extends Controller
{
    public function create($userId){

        $user = Crypt::decrypt($userId);

        $DefaultCharges = DefaultCharges::get();
        $allScheme = UserCharges::where('user_id','=',$user)->with('charge')->get();
        
        return view('scheem.form', ['allScheme' => $allScheme, 'DefaultCharges' => $DefaultCharges, 'userId' => $userId]);

    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'charge_id' => 'required|exists:default_charges,id',
            'type' => 'required|in:percent,flat',
            'value' => 'required|numeric',
        ]);

        $userid = $request->userid;

        $userId = Crypt::decrypt($userid);

        $user = User::where('id','=',$userId)->count();

        if($user == 0){
            return redirect()->back()->with('error', 'user info not found.');
        }

        $validated['user_id'] = $userId;
        UserCharges::create($validated);

        return redirect()->back()->with('success', 'Scheme created successfully.');
    }
    public function edit($id,$user)
    {
        $userId = Crypt::decrypt($user);
        $charge = UserCharges::findOrFail($id);
        $allScheme = UserCharges::where('user_id','=',$userId)->with('charge')->get();
        $DefaultCharges = DefaultCharges::all();

        return view('scheem.form', [
            'scheme' => $charge,
            'allScheme' => $allScheme,
            'DefaultCharges' => $DefaultCharges,
            'userId' => $user
        ]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'charge_id' => 'required|exists:default_charges,id',
            'type' => 'required|in:percent,flat',
            'value' => 'required|numeric',
        ]);

        $charge = UserCharges::findOrFail($id);

        $userid = $request->userid;
        $userId = Crypt::decrypt($userid);

        $userExists = User::where('id', $userId)->exists();

        if (!$userExists) {
            return redirect()->back()->with('error', 'User info not found.');
        }

        $validated['user_id'] = $userId;

        $charge->update($validated);

        return redirect()->back()->with('success', 'Scheme updated successfully.');
    }


}
