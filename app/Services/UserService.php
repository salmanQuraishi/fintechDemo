<?php

namespace App\Services;

use App\Models\Kyc;
use App\Models\TblOtp;
use App\Models\User;
use App\Services\EmailService;
use Illuminate\Support\Facades\DB;

class UserService
{
    /**
     * Generate and save OTP to database.
     *
     * @param string $mobile
     * @return array
     */

     private $emailService;
     public function __construct(EmailService $emailService){
        $this->emailService = $emailService;
    }


     public function createUser(string $name, string $mobile, string $email, string $pan)
     {
         // Start a database transaction to ensure both user and KYC creation succeed or fail together.
         DB::beginTransaction();
     
         try {
             // Save the User to the database
             $userData = new User();
             $userData->name = $name;
             $userData->mobile = $mobile;
             $userData->email = $email;
             $userData->save(); // This will insert the user record into the database
     
             // Create a new KYC record for the user
             $kyc = new Kyc();  // Assuming TblKyc is the KYC model for 'tbl_kyc'
             $kyc->user_id = $userData->id; // Link the KYC record to the newly created user
             $kyc->pan = $pan;
             $kyc->status = 'pending'; // Default status for new KYC
             $kyc->save(); // Save the KYC record
     
             // Commit the transaction
             DB::commit();
     
             // Return the created user and associated KYC info (optional)
             return [
                'user' => $userData,
                'kyc' => $kyc,
                'message'=> 'user created successfully',
                'status'=> true
            ];
     
         } catch (\Exception $e) {
             // In case of an error, rollback the transaction to prevent partial data entry
             DB::rollBack();
             // Handle or log the exception as needed
             return [
                'message'=> "someting went wrong",
                'status' => false
             ];
         }
     }

     public function sendEmailVerifyOtp(string $email ,string  $name){

        $otp = rand(1000,9999);

        $emailOtp = new TblOtp();
        $emailOtp->email = $email;
        $emailOtp->mobile = null;
        $emailOtp->type = 'email-verify';
        $emailOtp->status = 'pending';
        $emailOtp->otp = $otp;

        $data = [
            'otp' => $otp,
            'website' => '',
        ];
        
        $resp = $this->emailService->sendOtp($email,$data,$name);

        if($resp['status']){
            $emailOtp->save();
            return ['status'=>true, 'message'=>'OTP send to your email id'];
        }else{

            return ['status'=>false, 'message'=>'OTP not send'];
        }
     }

     public function verifyEmailOtp(string $email, string $otp){


        $emailOtp = TblOtp::where('email','=',$email)->where('otp','=',$otp)->where('type','=','email-verify')->where('status','=','pending')->first();

        if($emailOtp){
            $emailOtp->status='verified';
            $emailOtp->save();
            return ['status'=>true, 'message'=>'OTP verified Successfully'];
        }else{
            return ['status'=>false, 'message'=>'Invailed OTP'];
        }
     }

}
