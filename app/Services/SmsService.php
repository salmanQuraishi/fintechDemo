<?php

namespace App\Services;

use App\Models\Api;
use App\Models\AadhaarVerify;
use App\Models\Kyc;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Http;

class SmsService{

    protected $baseUrl = "";
    protected $authKey = "";

    // Constructor to initialize API details from the database
    public function __construct()
    {
        // Assuming you're fetching the first record from the 'tbl_apis' table
        // You can modify this logic based on your requirements (e.g., selecting based on 'mode' or other conditions)
        $apiDetails = Api::where('name', 'msg91')->where('status', 'active')->first(); // Fetch the first active API record

        if ($apiDetails) {
            $this->baseUrl = $apiDetails->base_url;
            $this->authKey = $apiDetails->key;
        }
    }

    public function sendOTP(string $mobile, string $otp)
    {
        // Define the POST request data
        $data = [
            'template_id' => '67e65047d6fc055e8f4a0442',
            'short_url' => '0',  // '1' (On) or '0' (Off)
            'recipients' => [
                [
                    'mobiles' => '91'.$mobile, // Mobile number
                    'var1' => 'Login',
                    'var2' => $otp,
                ],
            ],
        ];

        $endPoint = "/api/v5/flow";

        // Make the POST request
        $response = Http::withHeaders([
            'accept' => 'application/json',
            'authkey' => $this->authKey,
            'content-type' => 'application/json',
        ])
        ->withoutVerifying()
        ->post($this->baseUrl . $endPoint, $data);

        // Check the response status
        if ($response->successful()) {
            // Handle the success response
            return ['message' => 'Request sent successfully', 'status' => true];
        } else {
            // Handle the failure response
            return ['message' => 'Request failed', 'status' => false];
        }
    }

}