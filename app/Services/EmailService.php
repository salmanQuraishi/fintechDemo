<?php

namespace App\Services;

use App\Models\TblOtp;
use Exception;
use Illuminate\Support\Facades\Mail;

class EmailService
{

    public function __construct() {
    }

    public function sendOtp(string $email, array $data, string $name)
    {
        try {
            Mail::send('email.test', $data, function ($message) use ($email, $name) {
                $message->to($email, $name)->subject('Verify your identity');
            });

            return ['status' => true];

        } catch (Exception $e) {

            return ['status' => true, 'message' => 'OTP not send! Something went wrong'];
        }
    }

}