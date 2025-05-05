<?php

namespace App\Http\Controllers;

use App\Models\Api;
use App\Services\IndipaymentPayoutService;
use App\Services\PayoutService;
use App\Services\UserBankService;
use Illuminate\Http\Request;
use App\Models\UserBankModel;
use App\Models\PayoutModel;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class PayoutController extends Controller
{

    protected $payoutService;
    protected $userBankService;
    protected $indipaymentPayoutService;
    protected $api;
    public function __construct(PayoutService $payoutService, UserBankService $userBankService, IndipaymentPayoutService $indipaymentPayoutService){
        $this->payoutService = $payoutService;
        $this->userBankService = $userBankService;
        $this->userBankService = $userBankService;
        $this->indipaymentPayoutService = $indipaymentPayoutService;
        $this->api = Api::where('type','=','payout')->where('status','=','active')->first();
    }
    public function index()
    {
        return view('payout.index');
    }

    public function getPayouts()
    {
        $this->authorize('view payout');
        
        if (auth()->user()->hasAnyRole(['super-admin', 'admin', 'staff'])) {
            $UserPayouts = PayoutModel::with('user')->orderBy('id', 'desc')->get();
        } else {
            $UserPayouts = PayoutModel::with('user')
                ->where('user_id', auth()->user()->id)
                ->orderBy('id', 'desc')->get();
        }

        return DataTables::of($UserPayouts)
            ->addColumn('can_show', function () {
                return Auth::user()->can('show payout');
            })
            ->addColumn('user_name', function ($payout) {
                return $payout->user ? $payout->user->name : 'N/A';
            })
            ->make(true);
    }

    public function create()
    {
        $this->authorize('payout');
        $userId = Auth::user()->id;
        $UserBank = UserBankModel::where('user_id', '=', $userId)
        ->select('id', 'account_holder_name', 'account_no')
        ->get();
        return view('payout.payout',compact('UserBank'));
    }
    public function store(Request $request)
    {
        $this->authorize('payout');
        $request->validate([
            'account_holder_name' => 'required|string|max:255',
            'account_no' => 'required|string|max:255',
            'ifsc' => 'required|string|max:255',
            'bank_name' => 'required|string|max:255',
            'account_type' => 'required|string|max:255',
            'mode' => 'required|string|in:IMPS,NEFT,RTGS',
            'amount' => 'required|numeric',
        ]);
        $userId = auth()->user()->id;

        $bank = $this->userBankService->getAccByAccNoAndUserId($userId,$request->account_no);

        if($bank == null){
            $bank = $this->userBankService->create($userId, $request->account_holder_name, $request->account_no, $request->ifsc, $request->bank_name, $request->account_type);
        }

        if($bank == null){
            return back()->withErrors(['error'=> "something went wrong! please try again"])->withInput();
        }

        if($this->api->name === 'indipayment'){
            $payout = $this->indipaymentPayoutService->payout($request->amount,$userId,$bank->id,$request->mode);
        }else if($this->api->name === 'apisol-payout'){

            $payout = $this->payoutService->payout($request->amount,$userId,$bank->id,$request->mode);
        }else{
            
            return back()->with(['error'=> 'payout api is not active'])->withInput();
        }


        if(!$payout['status']){
            return back()->with(['error'=> $payout['message']])->withInput();
        }
        return redirect()->route('payout.index')->with('success', 'Payout successfully processed!');
    }
    public function getUserBankAccounts(Request $request)
    {
        if (Auth::check()) {

            $id = $request->input('id');
            
            $userId = Auth::user()->id;
            
            $UserBankModel = UserBankModel::where('id', '=', $id)
                ->where('user_id', '=', $userId)
                ->select('id', 'account_holder_name', 'account_no', 'ifsc', 'bank_name', 'account_type')
                ->first();

            if ($UserBankModel) {
                return response()->json([
                    'status' => 'success',
                    'data' => $UserBankModel
                ]);
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Bank account not found.'
                ]);
            }

        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'User not authenticated'
            ], 401);
        }
    }  
    
    public function checkpayoutStatus($id) {

        if($this->api->name === 'indipayment'){
            $payout = $this->indipaymentPayoutService->checkStatus($id);
        }else if($this->api->name === 'apisol-payout'){

            $payout = $this->payoutService->checkStatus($id);
        }else{
            
            return back()->with(['error'=> 'payout api is not active'])->withInput();
        }

        if(!$payout['status']){
            return response()->json([
                'status' => 'false',
                'message' => "server error",
                'data' => null
            ], 401);
        }

        if($payout['status'] == "success"){

            return response()->json([
                'status' => $payout['status'],
                'message' => $payout['message'],
                'data' => $payout['data']
            ], 200);
        }
        if($payout['status'] == "falied"){
            
            return response()->json([
                'status' => $payout['status'],
                'message' => $payout['message'],
                'data' => $payout['data']
            ], 401);
        }
        if($payout['status'] == "pending"){
            
            return response()->json([
                'status' => $payout['status'],
                'message' => $payout['message'],
                'data' => $payout['data']
            ], 401);
        }
        
    }

}
