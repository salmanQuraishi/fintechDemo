<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use \App\Services\SandboxApiService;
use Carbon\Carbon;
use Http;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\User;
use App\Services\ActivityLogService;
use App\Services\AuthService;
use App\Services\UserService;

use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Spatie\Permission\Models\Role;

class AuthenticatedSessionController extends Controller
{
    protected $authService;
    protected $userService;
    protected $apiService;
    protected $activityLogService;

    public function __construct(AuthService $authService, UserService $userService, SandboxApiService $apiService, ActivityLogService $activityLogService){
        $this->authService = $authService;
        $this->userService = $userService;
        $this->apiService = $apiService;
        $this->activityLogService = $activityLogService;
    }
    public function create(): View
    {
        return view('auth.login');
    }

    public function userCheck(Request $request)
    {
        $request->validate([
            'mobile' => ['required', 'digits:10', 'regex:/^[6-9]\d{9}$/'],
        ]);

        $sendOtp = $this->authService->generateOtp($request->mobile, 'auth');
        
        if ($sendOtp['success'] == true) {
            session(['mobile' => $request->mobile]);    
            return redirect()->route('otp.verify');
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Failed to send OTP. Please try again.',
            ], 500);
        }

    }

    public function verifyOtp(){
        return view('auth.otp');
    }

    public function verify(Request $request)
    {
        $request->validate([
            'mobile' => ['required', 'digits:10', 'regex:/^[6-9]\d{9}$/'],
            'otp' => ['required', 'digits:4'],
        ]);

        $verifyOtp = $this->authService->verifyOtp($request->mobile, $request->otp);

        if ($verifyOtp == true) {

            $checkUserRegistration = $this->authService->checkUserRegistration($request->mobile);
            
            // dd($checkUserRegistration);
            
            if($checkUserRegistration == false){
                
                session(['mobile' => $request->mobile]);
                return redirect()->route('user.register');
                
            }else{
                
                $user = $this->authService->getUserByMobile($request->mobile);
                
                if($user){
                    session()->forget('mobile');
                    Auth::login($user);

                    $this->activityLogService->postlog($request, 'User logged in via mobile');

                    return redirect()->intended(RouteServiceProvider::HOME);
                }else{
                    return response()->json([
                        'status' => false,
                        'message' => 'Invalid Mobile Number',
                    ], 400);
                }
            
            }
            
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Invalid OTP',
            ], 400);
        }
        
    }

    public function userregister()
    {
        return view('auth.register');
    }


    public function RegisterwithOtp(Request $request): RedirectResponse
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['nullable', 'string', 'lowercase', 'email', 'max:255', 'unique:users'],
            'mobile' => ['required', 'digits:10', 'regex:/^[6-9]\d{9}$/', 'unique:users'],
            'pan' => ['required', 'size:10', 'regex:/^[A-Z]{5}[0-9]{4}[A-Z]$/', 'unique:tbl_kyc'],
            'dob' => ['required', 'date', 'date_format:Y-m-d']
        ]);

        $resp = $this->apiService->verifyPan($request->name, $request->pan, $request->dob );

        if(!$resp['status']){
            return back()->withErrors($resp['errors'])->withInput();
        }

        $user = $this->userService->createUser($request->name, $request->mobile, $request->email,$request->pan);
        
        if(!$user['status']){
            return back()->withErrors([
                'pan' => $user['message']
            ])->withInput();
        }
        
        $role = Role::find(4);
        if ($role) {
            $user['user']->syncRoles($role->name);
        }


        session()->forget('mobile');

        $this->activityLogService->postlog($request, 'User registered & logged in!');

        event(new Registered($user['user']));
        Auth::login($user['user']);

        return redirect()->route('dashboard')->with('success', 'User registered & logged in!');
    }
    
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {

        $this->activityLogService->postlog($request, 'User logged out');

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
