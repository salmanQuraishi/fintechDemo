<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\State;
use Illuminate\Http\Request;
use App\Services\AuthService;
use Spatie\Permission\Models\Role;
use App\Services\SandboxApiService;
use App\Services\UserService;
use Illuminate\Validation\ValidationException;

class ApiLoginController extends Controller
{
    protected $authService;
    protected $apiService;
    protected $userService;
    public function __construct(AuthService $authService,UserService $userService,SandboxApiService $apiService){
        $this->authService = $authService;
        $this->apiService = $apiService;
        $this->userService = $userService;
    }
    public function login(Request $request)
    {
        $request->validate([
            'mobile' => ['required', 'digits:10', 'regex:/^[6-9]\d{9}$/'],
        ]);

        $sendOtp = $this->authService->generateOtp($request->mobile, 'auth');
        
        if ($sendOtp['success'] == true) {

            return response()->json([
                'status' => true,
                'message' => 'OTP has been sent successfully.'
            ],200);
    
        } else {

            return response()->json([
                'status' => false,
                'message' => 'Failed to send OTP. Please try again.'
            ],200);

        }
    }
    public function otpVerify(Request $request){
        $request->validate([
            'mobile' => ['required', 'digits:10', 'regex:/^[6-9]\d{9}$/'],
            'otp' => ['required', 'digits:4'],
        ]);

        $verifyOtp = $this->authService->verifyOtp($request->mobile, $request->otp);

        if ($verifyOtp == true) {

            $user = $this->authService->getUserByMobile($request->mobile);

            if($user){

                $token = $user->createToken('token')->plainTextToken;

                return response()->json([
                    'status' => true,
                    'data' => [
                        'name' => $user->name,
                        'email' => $user->email,
                        'mobile' => $user->mobile,
                    ],
                    'token' => $token,
                    'message' => 'Login Successful'
                ],200);

            }else{
                return response()->json([
                    'status' => true,
                    'data' => null,
                    'token' => null,
                    'message' => 'mobile number not register'
                ],200);
            }
            
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Invalid OTP',
            ], 200);
        }
    }

    public function register(Request $request){
        try {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['nullable', 'string', 'lowercase', 'email', 'max:255', 'unique:users'],
                'mobile' => ['required', 'digits:10', 'regex:/^[6-9]\d{9}$/', 'unique:users'],
                'pan' => ['required', 'size:10', 'regex:/^[A-Z]{5}[0-9]{4}[A-Z]$/', 'unique:tbl_kyc'],
                'dob' => ['required', 'date', 'date_format:Y-m-d']
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'status' => false,
                'message' => $e->errors(),
            ], 200);
        }
    
        // PAN Verification (production mode only)
        if(env('APP_MODE','production') === 'production'){
            $resp = $this->apiService->verifyPan($request->name, $request->pan, $request->dob );
            if(!$resp['status']){
                return response()->json([
                    'status' => false,
                    'message' => $resp['errors'],
                ], 200);
            }
        }
    
        // User creation
        $user = $this->userService->createUser($request->name, $request->mobile, $request->email, $request->pan);
        if(!$user['status']){
            return response()->json([
                'status' => false,
                'message' => $user['message'],
            ], 200);
        }
    
        // Assign role
        $role = Role::find(4);
        if ($role) {
            $user['user']->syncRoles($role->name);
        }
    
        // Generate token
        $token = $user['user']->createToken('token')->plainTextToken;
    
        return response()->json([
            'status' => true,
            'data' => [
                'name' => $user['user']['name'],
                'email' => $user['user']['email'],
                'mobile' => $user['user']['mobile'],
            ],
            'token' => $token,
            'message' => 'User registered & logged in!'
        ],200);
    }

    public function getState()
    {
        $states = State::get()->all();

        return response()->json([
            'status' => true,
            'message' => 'List of all states retrieved successfully',
            'data' => $states
        ],200);
    }
    public function getCity($id)
    {            
        $cities = City::where('state_id', '=', $id)
            ->get()->all();

        if ($cities) {
            return response()->json([
                'status' => true,
                'message' => 'List of all cities retrieved successfully',
                'data' => $cities
            ],200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'city not found.',
                'data' => null
            ],200);
        }
    }

    
}