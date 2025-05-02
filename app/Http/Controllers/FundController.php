<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use Illuminate\Http\Request;
use App\Models\Fund;
use App\Models\User;

class FundController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view fund', ['only' => ['index']]);
        $this->middleware('permission:create fund', ['only' => ['create','store']]);
    }
    public function view()
    {

        if(auth()->user()->roles->pluck('name')->implode(', ') == "user"){
            $fund = Fund::where('type', 'offline')
                    ->where('user_id', auth()->user()->id)
                    ->get();
        }

        if(auth()->user()->roles->pluck('name')->implode(', ') == "apiuser"){
            $fund = Fund::where('type', 'offline')
                    ->where('user_id', auth()->user()->id)
                    ->get();
        }

        if (auth()->user()->roles->pluck('name')->intersect(['super-admin', 'admin', 'staff'])->isNotEmpty()) {
            $fund = Fund::where('type', 'offline')->get();
        }

        $adminBank = Bank::where('status','=','active')->first();

        return view('fund.index', compact('fund','adminBank'));
    }

    public function fundrequest(Request $request)
    {
        $request->validate([
            'deposit_bank'  => 'required|string|max:255',
            'amount'        => 'required|numeric|min:1',
            'payment_mode'  => 'required|string|max:255',
            'pay_slip'      => 'nullable|file|mimes:jpeg,png,pdf|max:2048',
            'from_account'  => 'required|string|max:255',
            'ref_no'        => 'required|string|max:255|unique:fund_requests,ref_no',
            'remark'        => 'nullable|string|max:500',
        ]);

        $paySlipPath = null;
        if ($request->hasFile('pay_slip')) {

            $paySlipPath = "payslips/".rand(99999,9999999).time().'.'.$request->pay_slip->extension(); 
            $request->pay_slip->move(public_path('payslips'), $paySlipPath);
            
        }

        $fundRequest = Fund::create([
            'user_id' => auth()->user()->id,
            'type' => 'offline',
            'deposit_bank' => $request->deposit_bank,
            'amount'       => $request->amount,
            'payment_mode' => $request->payment_mode,
            'pay_slip'     => $paySlipPath,
            'from_account' => $request->from_account,
            'ref_no'       => $request->ref_no,
            'remark'       => $request->remark,
            'status'       => "pending",
        ]);

        return response()->json(['message' => 'Fund request submitted successfully!', 'data' => $fundRequest], 200);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:success,failed',
        ]);

        $fund = Fund::findOrFail($id);

        $userId = $fund->user_id;
        $FundAmount = $fund->amount;
        $fund->status = $request->status;
        $fund->save();

        if($request->status === "success"){
            $user = User::where('id','=',$userId)->first();
            $user->fund = $user->fund + $FundAmount;
            $user->save();
        }
        return redirect()->back()->with('success', 'Fund status updated successfully!');
    }
}
