<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Services\UserService;
use App\Models\State;
use App\Models\City;
use App\Models\Nominee;
use App\Models\Bank;
use finfo;

class ProfileController extends Controller
{
    protected $userService;
    public function __construct(UserService $userService){
        $this->userService = $userService;
    }

    public function userprofile(){
        $states = State::get();

        return view('profile.index',compact('states'));
    }
    public function Activity(){
        $Activity = ActivityLog::where('user_id', auth()->id())
                    ->latest()
                    ->take(10)
                    ->get();

        $countActivity = $Activity->count();

        return view('profile.index',compact('Activity','countActivity'));
    }
    public function linkedAccountDetails(){
        $UserBankAccounts = Bank::where('user_id','=',auth()->user()->id)->get()->all();

        return view('profile.index',compact('UserBankAccounts'));
    }
    public function usernomineeinfo(){
        $states = State::get();
        $nominee = Nominee::where('user_id','=',auth()->user()->id)->first();
        return view('profile.index',compact('states','nominee'));
    }
    public function userbusiness(){
        return view('profile.index');
    }
    public function usersecutiry(){
        return view('profile.index');
    }
    public function update(Request $request)
    {
        $user = User::where('id','=',auth()->user()->id)->first();
        // Validate request
        $request->validate([
            'name'     => 'required|string|max:255',
            'state'    => 'required|string|max:255',
            'city'     => 'required|string|max:255',
            'address'  => 'required|string|max:255',
            'postcode' => 'required|string|max:10',
            'profile'  => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user->name     = $request->name;
        $user->state    = $request->state;
        $user->city     = $request->city;
        $user->address  = $request->address;
        $user->pincode = $request->postcode;

        $imageName = $user->profile;
        if ($request->hasFile('profile')) {
            $imageName = "profile/".rand(99999,9999999).time().'.'.$request->profile->extension(); 
            $request->profile->move(public_path('profile'), $imageName);
        }
        $user->profile = $imageName;

        $user->save();

        return back()->with('success', 'Profile updated successfully.');
    }

    public function sendEmail(){
        
        $data = $this->userService->sendEmailVerifyOtp(auth()->user()->email, auth()->user()->name);

        if($data['status']){
            return json_encode(['status'=>true,'message'=>"otp send successfully"]);
        } else {
            return json_encode(['status'=>false,'message'=>"something went wrong"]);
        }
    }

    public function verifyEmailotp(Request $request){
        $request->validate([
            'otp' => 'required|numeric'
        ]);

        $correctOtp = $this->userService->verifyEmailOtp(auth()->user()->email,$request->otp);;

        if ($correctOtp['status']) {
            $user  = User::where('id','=',auth()->user()->id)->first();
            $user->email_verified = "verified";
            $user->save();
            return json_encode(['status'=>true,'message'=>"otp is match"]);
        } else {
            return json_encode(['status'=>false,'message'=>"otp not match"]);
        }
    }

    public function getCity(Request $request)
    {
        if (Auth::check()) {

            $id = $request->input('id');
            
            $City = City::where('state_id', '=', $id)
                ->get()->all();

            if ($City) {
                return response()->json([
                    'status' => 'success',
                    'data' => $City
                ]);
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'city not found.'
                ]);
            }

        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'User not authenticated'
            ], 401);
        }
    }
    public function updatePassword(Request $request)
    {
        $request->validate([
            'oldpass' => ['required', 'current_password'],
            'newpass' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            'oldpass.required' => 'The current password is required.',
            'newpass.required' => 'The new password is required.',
            'newpass.confirmed' => 'The new passwords do not match.',
            'newpass.min' => 'The new password must be at least 8 characters long.',
        ]);
        
        $user = User::find(auth()->user()->id);
        $user->password = Hash::make($request->newpass);
        $user->save();

        return redirect()->route('usersecutiry')->with('success', 'Password updated successfully!');
    }
    public function updatenominee(Request $request)
    {

        $validated = $request->validate([
            'relationship' => 'required|string',
            'name' => 'required|string|max:255',
            'dob' => 'required|date',
            'pincode' => 'required|string',
            'state' => 'required|string',
            'city' => 'required|string',
            'address' => 'required|string',
            'email' => 'nullable|email',
            'mobile' => 'nullable|string',
        ]);
    
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to update nominee information.');
        }
    
        $userId = auth()->user()->id;
    
        $nominee = Nominee::where('user_id', $userId)->first();
    
        if ($nominee) {
            $rowId = $nominee->id;
        } else {
            $rowId = null;
        }

        Nominee::updateOrCreate(
            ['id' => $rowId],
            array_merge($validated, ['user_id' => $userId])
        );

        return redirect()->back()->with('success', 'Nominee info saved!');

    }
    public function linkedAccount(Request $request){
        $request->validate([
            'BankName' => 'required|string|max:255',
            'AccountNumber' => 'required|string|unique:banks,account_no',
            'IFSC' => 'required|string|max:11',
            'AccountType' => 'required|in:saving,current',
            'Status' => 'required|in:active,inactive',
        ]);

        $bank = new Bank();
        $bank->user_id = auth()->id();
        $bank->bank_name = $request->BankName;
        $bank->account_no = $request->AccountNumber;
        $bank->ifsc = $request->IFSC;
        $bank->type = $request->AccountType;
        $bank->status = $request->Status;
        $bank->save();

        return redirect()->back()->with('success', 'A/c Linked successfully!');
    }
    public function updateStatus(Request $request, $id)
    {
        $Bank = Bank::findOrFail($id);
    
        $Bank->status = $request->has('status') ? 'active' : 'inactive';
        $Bank->save();
    
        return back()->with('success', 'Status updated successfully.');
    }
  


}
