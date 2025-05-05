<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use Illuminate\Http\Request;
use App\Models\Fund;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;

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

        $adminBank = Bank::where('status','=','active')->get();

        return view('fund.index', compact('fund','adminBank'));
    }

    public function getFunds(Request $request)
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
    
        return DataTables::of($fund)
            ->addIndexColumn()
            ->addColumn('user_details', function ($fund) {
                if (auth()->user()->hasAnyRole(['admin', 'super-admin', 'staff'])) {
                    return $fund->user->name;
                }
                return '-';
            })
            ->addColumn('deposit_bank', function ($fund) {
                return "Bank: {$fund->deposit_bank}<br>A/C: {$fund->from_account}<br>Mode: {$fund->payment_mode}";
            })
            ->addColumn('pay_slip', function ($fund) {
                return '<button class="view-slip-btn" data-image="' . asset($fund->pay_slip) . '">View Slip</button>';
            })
            ->addColumn('status', function ($fund) {
                $class = match ($fund->status) {
                    'pending' => 'text-warning-300',
                    'success' => 'text-success-300',
                    'failed'  => 'text-[#FF4747]',
                    default   => ''
                };
                return "<span class='$class'>" . ucfirst($fund->status) . "</span>";
            })
            ->addColumn('action', function ($fund) {
                if (auth()->user()->can('update fund') && $fund->status === 'pending') {
                    $form = '<form action="' . route('fund.update', $fund->id) . '" method="POST">';
                    $form .= csrf_field() . method_field('PUT');
                    $form .= '<select name="status" style="color:black"><option value="success">Approve</option><option value="failed">Reject</option></select><br>';
                    $form .= '<button type="submit" class="rounded-md bg-bgray-50 px-4 py-1.5 text-sm font-semibold leading-[22px] text-bgray-400 dark:bg-darkblack-400">Submit</button>';
                    $form .= '</form>';
                    return $form;
                }
                return '-';
            })
            ->rawColumns(['user_details', 'deposit_bank', 'pay_slip', 'status', 'action'])
            ->make(true);
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
        
        $superAdmin = User::findOrFail(1);

        if($userId !='1' && $superAdmin->wallet < $FundAmount){
            return redirect()->back()->with('error', 'Insuficiant Wallet Balance.');
        }

        
        $fund->status = $request->status;
        $fund->save();

        if($request->status === "success"){
            $user = User::where('id','=',$userId)->first();
            $user->wallet = $user->wallet + $FundAmount;
            $user->save();
            if($userId != '1'){
                $superAdmin->wallet = $user->wallet - $FundAmount;
                $superAdmin->save();
            }
        }
        return redirect()->back()->with('success', 'Fund status updated successfully!');
    }
}
