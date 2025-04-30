<?php

namespace App\Http\Controllers;

use App\Models\BankLinksDetails;
use App\Models\BankRequest;
use App\Services\PayoutService;
use App\Services\UserBankService;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserBankModel;
use App\Models\PayoutModel;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class LinkedBankRequestController extends Controller
{
    public function index(){

       return view('bank-request.index');
    }
    public function linkedbanksRequests()
    {
        // dd("test");
        if (auth()->user()->hasAnyRole(['super-admin', 'admin', 'staff'])) {
            // Admins see all bank requests with linked details
            $BankRequest = BankRequest::with(['user', 'BankLinksDetails'])
                ->whereHas('BankLinksDetails')
                ->get();
        } else {
            // apiuser or regular user sees only their own requests
            $BankRequest = BankRequest::with(['user', 'BankLinksDetails'])
                ->where('user_id', auth()->id())
                ->get();
        }
    
        // Optional: Uncomment this for debugging
        // dd($BankRequest);
    
        return DataTables::of($BankRequest)
            ->addColumn('can_show', function () {
                return Auth::user()->can('show payout');
            })
            ->make(true);
    }
    public function linkedBankApprove($id)
    {
        $request = BankRequest::findOrFail($id);

        // Optional: Check role permissions
        if (!Auth::user()->hasAnyRole(['admin', 'super-admin', 'staff'])) {
            abort(403, 'Unauthorized');
        }

        $request->status = 'approved';
        $request->save();

        return response()->json(['message' => 'Request approved successfully']);
    }
    public function linkedBankReject($id)
    {
        $request = BankRequest::findOrFail($id);

        if (!Auth::user()->hasAnyRole(['admin', 'super-admin', 'staff'])) {
            abort(403, 'Unauthorized');
        }

        $request->status = 'rejected';
        $request->save();

        return response()->json(['message' => 'Request reject successfully']);
    }
    
    public function userbanklinkedrequest(Request $request)  {
        
        $request->validate([
            'id' => 'required|string'
        ]);

        $exists =  BankRequest::where('bank_request_id', $request->id)
                                ->where('status', '!=','rejected')
                                ->exists();

        if ($exists) {
            return response()->json([
                'message' => 'This bank request already exists.',
                'error' => true
            ], 409);
        }
        
        $bankRequest = BankRequest::create([
            'bank_request_id' => $request->id,
            'user_id' => Auth::id(),
            'status' => 'pending',
        ]);

        return response()->json([
            'message' => 'Bank request created successfully.',
            'data' => $bankRequest
        ], 201);

    }
    public function BankLinksDetails(Request $request)
    {
        if (Auth::check()) {

            $uniqueId = $request->input('uniqueId');
                        
            $BankLinksDetails = BankLinksDetails::where('id', '=', $uniqueId)->first();

            // dd($BankLinksDetails);

            if ($BankLinksDetails) {
                return response()->json([
                    'status' => 'success',
                    'data' => $BankLinksDetails
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

    static function getBankForlinkAccount()  {
        return BankLinksDetails::where('status','=','active')->get()->all();
    }

}
