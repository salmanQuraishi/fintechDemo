<?php

namespace App\Services;

use App\Models\TblOtp;
use App\Models\User;
use App\Services\SmsService;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class AuthService
{
    /**
     * Generate and save OTP to database.
     *
     * @param string $mobile
     * @return array
     * 
     */

     protected $smsService;
     public function __construct(SmsService $smsService){
        $this->smsService = $smsService;
    }

    public function generateOtp(string $mobile , string $type): array
    {
        // Check if OTP already exists in cache (to avoid duplicate requests in a short time)
        // if (Cache::has('otp_' . $mobile)) {
        //     return [
        //         'success' => false,
        //         'message' => 'OTP already sent recently. Please wait.'
        //     ];
        // }

        // Generate a random OTP (4-digit number)
        $otp = rand(1000, 9999);

        // Save OTP to the database
        $otpData = new TblOtp();
        $otpData->otp = $otp;
        $otpData->type = $type;
        $otpData->mobile = $mobile;
        $otpData->email = null;
        $otpData->status = 'pending'; // Default status is 'pending'

        // Store OTP in cache for 5 minutes to prevent spam
        // Cache::put('otp_' . $mobile, $otp, 300); // Cache for 5 minutes

        // Simulate sending OTP (can be replaced by an actual API call to send an SMS)
        $otpRequst = $this->smsService->sendOtp($mobile, $otp);

        if($otpRequst['status']){
            $otpData->save();
            return [
                'success' => true,
                'otp' => $otp,
                'message' => 'OTP sent successfully.'
            ];
        }else{
            return [
                'success' => false,
                'message' => 'OTP Send Failed.'
            ];
        }
    }

    /**
     * Simulate sending OTP (can be replaced by an actual SMS service)
     *
     * @param string $mobile
     * @param string $otp
     */
    private function sendOtp(string $mobile, string $otp)
    {
        // Log the OTP for debugging (or replace this with an actual service like Twilio or Nexmo)
        Log::info("OTP sent to $mobile: $otp");
    }

    /**
     * Verify OTP entered by the user
     *
     * @param string $mobile
     * @param string $otp
     * @return bool
     */
    public function verifyOtp(string $mobile, string $otp): bool
    {
        // Retrieve OTP from the database (this can be expanded for more complex OTP verification)
        $otpData = TblOtp::where('mobile', $mobile)
            ->where('otp', $otp)
            ->where('status', 'pending')
            ->first();

        if ($otpData) {
            // Mark OTP as verified
            $otpData->status = 'verified';
            $otpData->save();
            return true;
        }

        return false;
    }

    public function checkUserRegistration(string $mobile){
        $userData = User::select('mobile')->where('mobile', $mobile)
            ->first();

        if ($userData) {
            return true;
        }
        return false;
    }

    public function getUserByMobile(string $mobile){
        $userData = User::where('mobile', $mobile)
            ->first();

        if ($userData) {
            return $userData;
        }
        return null;
    }

}
