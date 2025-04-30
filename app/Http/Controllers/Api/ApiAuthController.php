<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Otp;
use App\Models\TblOtp;
use Illuminate\Http\Request;
use App\Models\User;
use App\Services\AuthService;
use Illuminate\Support\Facades\Validator;

class ApiAuthController extends Controller
{

    // public function login(Request $request){
    //     return dd($request);
    // }
    public function login(Request $request)
    {
        // Simulating OTP response
        return response()->json([
            'success' => 'success',
            'data' => '1290', // OTP sent
            'message' => 'OTP has been sent successfully.'
        ], 200);
    }
    public function index(){
        return response()->json([
            'success' => 'failed', //success, failed, pending
            'message' => 'Invalid mobile number.'
        ], 422);
    }

}
