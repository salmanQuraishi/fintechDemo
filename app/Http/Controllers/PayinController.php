<?php

namespace App\Http\Controllers;

use App\Models\Fund as Payin;
use App\Models\PayinAPILog;
use App\Models\User;
use App\Services\PayinService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class PayinController extends Controller
{
    protected $payinService;

    public function __construct(PayinService $payinService) {
        $this->payinService = $payinService;
    }

    public function index()
    {
        return view('payin.index');
    }
    public function getPayin()
    {
        $this->authorize('view payin');

        if (auth()->user()->hasAnyRole(['super-admin', 'admin', 'staff'])) {
            $UserPayins = Payin::where('type', 'online')->with('user')->orderBy('id', 'desc')->get();
        } else {
            $UserPayins = Payin::where('type', 'online')
                ->with('user')
                ->where('user_id', auth()->id())
                ->orderBy('id', 'desc')
                ->get();
        }

        return DataTables::of($UserPayins)
            ->addColumn('can_show', fn() => Auth::user()->can('show payin'))
            ->addColumn('user_name', fn($payin) => $payin->user->name ?? 'N/A')
            ->make(true);
    }
    public function store(Request $request)
    {
        $request->validate([
            'amount' => [
                'required',
                'numeric',
                'min:1',
                'max:1000000',
                'not_in:0',
                'gt:0',
            ],
        ]);

        $user = auth()->user();
        $response = $this->payinService->payin($user->id, $user->name, $user->email, $user->mobile, $request->amount);

        if($response['status']=='success'){
            return response()->json( $response);
        }else{
            return response()->json(['status'=> 'failed', 'message'=> $response['message']]);
        }
    }

    public function checkStatus(Request $request){
        // $request->validate([
        //     'ref_id' => [
        //         'required',
        //         'numeric',
        //         'min:1',
        //         'max:1000000',
        //         'not_in:0',
        //         'gt:0',
        //     ],
        // ]);

        // $data = Payin::where('ref_no','=',$request->txn_id)->first();
        $data = $this->payinService->checkStatus($request->txn_id);

        if($data['status'] == 'success'){
            return response()->json(['status'=>'success','message'=>'Fund Desposit SuccessFully', 'data'=>$data]);
        }else if($data['status'] == 'pending'){
            return response()->json(['status'=>'pending','message'=>'Fund Desposit Pending', 'data'=>$data]);
        }else{
            return response()->json(['status'=>'failed','message'=>'Fund Desposit Failed', 'data'=>$data]);
        }
    }

    public function checkPayinStatus($id)
    {
        // $payin = Payin::findOrFail($id);

        $response = $this->payinService->checkStatus($id);

        return response()->json($response);

        // $payin = $this->payinService->checkStatus($id);

        // if(!$payin['status']){
        //     return response()->json([
        //         'status' => 'false',
        //         'message' => "server error",
        //         'data' => null
        //     ], 401);
        // }

        // if($payin['status'] == "success"){

        //     return response()->json([
        //         'status' => $payin['status'],
        //         'message' => $payin['message'],
        //         'data' => $payin['data']
        //     ], 200);
        // }
        // if($payin['status'] == "falied"){
            
        //     return response()->json([
        //         'status' => $payin['status'],
        //         'message' => $payin['message'],
        //         'data' => $payin['data']
        //     ], 401);
        // }
        // if($payin['status'] == "pending"){
            
        //     return response()->json([
        //         'status' => $payin['status'],
        //         'message' => $payin['message'],
        //         'data' => $payin['data']
        //     ], 401);
        // }

    }


    public function callback(Request $request){

        $data = $request->all();

        $log =  PayinAPILog::create([
            'url'=>'callback',
            'request_body'=> json_encode($data)
        ]);

        $resp = $this->payinService->payinCallback($data);
        return ;
    }
}
