<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SandboxApiService as sendBox;

class SmsController extends Controller
{
    protected $Verification;
    public function __construct(sendBox $sendBox){
        $this->Verification = $sendBox;
    }
    public function sendOtp(Request $request)
    {
        $request->validate([
            'aadhar' => ['required', 'digits:12', 'regex:/^[2-9]{1}[0-9]{11}$/']
        ], [
            'aadhar.required' => 'Aadhaar number is required.',
            'aadhar.digits' => 'Aadhaar number must be exactly 12 digits.',
            'aadhar.regex' => 'Invalid Aadhaar number format.'
        ]);
    
        $sendOtp = $this->Verification->sendAadhaarVerificationOTP(auth()->user()->id, $request->aadhar);
    
        if (!$sendOtp['status']) {
            return response()->json([
                'status' => false,
                'message' => $sendOtp['error']['error'] ?? 'Failed to send OTP'
            ], 400);
        }
    
        return response()->json([
            'status' => true,
            'message' => $sendOtp['success']['message']
        ]);
    }
    public function verifyOtp(Request $request)
    {
        $request->validate([
            'enteredOtp' => ['required'],
            'aadhar' => ['required'],
        ]);
    
        $sendOtp = $this->Verification->verifyAadhaarOTP(auth()->user()->id, $request->aadhar, $request->enteredOtp);
    

        if (!$sendOtp['status']) {
            return response()->json([
                'status' => false,
                'message' => $sendOtp['message'] ?? 'Failed to send OTP'
            ], 400);
        }
    
        return response()->json([
            'status' => true,
            'message' => $sendOtp['message']
        ]);
    }
    
}
