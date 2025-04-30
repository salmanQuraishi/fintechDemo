<?php

namespace App\Services;

use App\Models\Api;
use App\Models\AadhaarVerify;
use App\Models\Kyc;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Http;

class SandboxApiService
{

    protected $baseUrl = "";
    protected $apiKey = "";
    protected $apiSecret = '';

    // Constructor to initialize API details from the database
    public function __construct()
    {
        // Assuming you're fetching the first record from the 'tbl_apis' table
        // You can modify this logic based on your requirements (e.g., selecting based on 'mode' or other conditions)
        $apiDetails = Api::where('name', 'sandbox')->where('status', 'active')->first(); // Fetch the first active API record

        if ($apiDetails) {
            $this->baseUrl = $apiDetails->base_url;
            $this->apiKey = $apiDetails->key;
            $this->apiSecret = $apiDetails->secret;
        }
    }

    public function apiAuthToken()
    {
        
        $api = Api::where('name', 'sandbox')->where('status', 'active')->first();

        if (!$api) {
            return null;
        }

        $date = Carbon::parse($api->token_renewed_at);
        $hoursDifference = $date->diffInHours(Carbon::now());
        if($hoursDifference < $api->renew_duration-2){
            if ($api->token) {
                return $api->token;
            }
        }else if($api->renew_duration-2 < $api->renew_duration) {
            $renewToken = $this->renewToken($this->apiKey, $api->token);
            if($renewToken != null){
                // Update the token
                $api->token = $renewToken;
                $api->token_renewed_at = now();
                $api->save();
                return $renewToken;// Save the updated token to the database
            }
        }

        $response = Http::withHeaders([
            'x-api-key' => $this->apiKey,
            'x-api-secret' => $this->apiSecret,
            'x-api-version' => '1.0',
        ])
        ->withoutVerifying()
        ->post($this->baseUrl . '/authenticate');

        if ($response->successful()) {
            // Handle successful response
            $data = $response->json(); // or $response->body() to get raw response
            $token = $data['access_token']; // for debugging

            // Check if the record exists
            if ($api) {
                // Update the token
                $api->token = $token;
                $api->token_renewed_at = now();
                $api->save();
                return $token;// Save the updated token to the database
            }
        }
        return null;
    }

    public function renewToken(string $apiKey, string $jwt_token){

        $response = Http::withHeaders([
            'x-api-key' => $apiKey,
            'authorization' => $jwt_token,
            'x-api-version' => '1.0',
        ])
        ->withoutVerifying()
        ->post($this->baseUrl . '/authenticate?request_token='.$jwt_token);

        if ($response->successful()) {
            // Handle successful response
            $data = $response->json(); // or $response->body() to get raw response
            $token = $data['access_token']; // for debugging
            return $token;
        }else{
            return null;
        }
    }
    

    public function verifyPan(string $name, string $pan, string $dob)
    {

        $token = $this->apiAuthToken();

        // The endpoint for PAN verification
        $endpoint = '/kyc/pan/verify';

        // Prepare the headers for the request
        $headers = [
            'accept' => 'application/json',
            'authorization' => $token, // Authorization token (JWT)
            'content-type' => 'application/json',
            'x-accept-cache' => 'false',
            'x-api-key' => $this->apiKey,
            'x-api-version' => '1.0',
        ];

        $formattedDate = Carbon::parse($dob)->format('d/m/Y');
        // Prepare the data (payload) to send in the request
        $data = [
            '@entity' => 'in.co.sandbox.kyc.pan_verification.request',
            'pan' => $pan, // PAN number to verify
            'name_as_per_pan' => $name, // Name as per PAN
            'consent' => 'y', // Consent for verification
            'reason' => 'For KYC', // Reason for PAN verification
            'date_of_birth' => $formattedDate, // Date of birth (DD/MM/YYYY)
        ];

        // Send POST request

        $response = Http::withHeaders($headers)
        ->withoutVerifying() // Ignore SSL verification
        ->post($this->baseUrl . $endpoint, $data);


        $errors = [];

        // Check the response status
        if ($response->successful()) {
            // Handle successful response
            $successResp = $response->json(); // Return response data

            if (!$successResp['data']['name_as_per_pan_match']) {
                $errors['name'] = 'Name does not match with PAN.';
            }

            if (!$successResp['data']['date_of_birth_match']) {
                $errors['dob'] = 'Date of birth does not match with PAN.';
            }

            if ($successResp['data']['status'] !== 'valid') {
                $errors['pan'] = 'Invalid PAN number.';
            }

            if (!empty($errors)) {
                return ['status' => false, 'errors' => $errors];
            }

            return ['status' => true, 'errors' => $errors];

        } else {

            // Handle failure response
            $errorResp = $response->body(); // Return the error message
            try{
                $errors['error'] = $errorResp->message;
            }catch(Exception $e){
                $errors['error'] = json_decode($errorResp)->message;
            }

            

            return ['status' => false, 'errors' => $errors];
        }

    }

    

    // Send AadhaarOtp
    public function sendAadhaarVerificationOTP(string $userId, string $aadhaarNumber)
    {

        $token = $this->apiAuthToken();

        // The endpoint for PAN verification
        $endpoint = '/kyc/aadhaar/okyc/otp';

        // Prepare the headers for the request
        $headers = [
            'accept' => 'application/json',
            'authorization' => $token, // Authorization token (JWT)
            'content-type' => 'application/json',
            'x-accept-cache' => 'false',
            'x-api-key' => $this->apiKey,
            'x-api-version' => '2.0',
        ];

        // Prepare the data (payload) to send in the request
        $data = [
            '@entity' => 'in.co.sandbox.kyc.aadhaar.okyc.otp.request',
            'aadhaar_number' => $aadhaarNumber, // PAN number to verify
            'consent' => 'y', // Consent for verification
            'reason' => 'For KYC', // Reason for PAN verification
        ];

        // Send POST request
        $response = Http::withHeaders($headers)
            ->withoutVerifying()
            ->post($this->baseUrl . $endpoint, $data);

        $errors = [];

        //API REPONSE
        // array:4 [ // app\Services\SandboxApiService.php:202
        //     "timestamp" => 1743066786150
        //     "transaction_id" => "d19d56ca-6ae4-4ec7-81d3-e2cf67e6ed3f"
        //     "data" => array:3 [
        //       "@entity" => "in.co.sandbox.kyc.aadhaar.okyc.otp.response"
        //       "reference_id" => 36957021
        //       "message" => "Invalid Aadhaar Card"
        //     ]
        //     "code" => 200
        //   ]

        // Check the response status
        if ($response->successful()) {
            // Handle successful response
            $successResp = $response->json(); // Return response data

            if(!isset($successResp['data'])){
                $errors['error']=$successResp['message'];
                return ['status' => false, 'error'=>$errors];
            }

            if(!isset($successResp['data']['reference_id'])){
                $errors['error']=$successResp['data']['message'];
                return ['status' => false, 'error'=>$errors];
            }

            if($successResp['data']['message']=='Aadhaar not linked to mobile number'){
                $errors['error']=$successResp['data']['message'];
                return ['status' => false, 'error'=>$errors];
            }

            if($successResp['data']['message']=='Invalid Aadhaar Card'){
                $errors['error']=$successResp['data']['message'];
                return ['status' => false, 'error'=>$errors];
            }

            /** Insert Data into Aadhaar Verify Table */
            $aadharData = new AadhaarVerify();

            $aadharData->user_id = $userId;
            $aadharData->aadhaar_number = $aadhaarNumber;
            $aadharData->reference_id = $successResp['data']['reference_id'];
            $aadharData->api_timestamp = $successResp['timestamp'];
            $aadharData->save();

            return ['status' => true, 'success'=>['message'=>$successResp['data']['message']]];

        } else {

            // Handle failure response
            $errorResp = json_decode($response->body()); // Return the error message

            $errors['error'] = $errorResp->message;

            return ['status' => false, 'errors' => $errors];
        }
    }


public function verifyAadhaarOTP(string $userId, string $aadhaarNumber, string $otp)
    {

        $aadhaarRefe = AadhaarVerify::where('user_id', '=', $userId)->where('aadhaar_number', '=', $aadhaarNumber)->first();
        $errors = [];
        if (!$aadhaarRefe) {
            $errors['error'] = "something went wrong";
            return ['status' => false, 'errors' => $errors];
        }

        $token = $this->apiAuthToken();

        // The endpoint for PAN verification
        $endpoint = '/kyc/aadhaar/okyc/otp/verify';

        // Prepare the headers for the request
        $headers = [
            'accept' => 'application/json',
            'authorization' => $token, // Authorization token (JWT)
            'content-type' => 'application/json',
            'x-accept-cache' => 'false',
            'x-api-key' => $this->apiKey,
            'x-api-version' => '2.0',
        ];

        $referenceId = $aadhaarRefe['reference_id'];
        
        // Prepare the data (payload) to send in the request
        $data = [
            '@entity' => 'in.co.sandbox.kyc.aadhaar.okyc.request',
            'reference_id' => $referenceId, // PAN number to verify
            'otp' => $otp, // PAN number to verify
        ];

        // Send POST request
        $response = Http::withHeaders($headers)
            ->withoutVerifying()
            ->post($this->baseUrl . $endpoint, $data);

        $errors = [];

        // Check the response status
        if ($response->successful()) {
            // try {
                // Handle successful response
                // dd($response->json());
                $successResp = $response->json(); // Return response data

                if (isset($successResp['data']['message']) && $successResp['data']['message'] == "Aadhaar Card Exists") {
                    $aadhaarRefe->status='verified';
                    $aadhaarRefe->save();
                    $user = User::where('id','=',$userId)->first();
                    $user->kyc_verified = 'verified';
                    $user->save();
                    $Kyc = Kyc::where('user_id','=',$userId)->first();
                    if($Kyc){
                        $Kyc->aadhaar = $aadhaarNumber;
                        $Kyc->status = "verified";
                        $Kyc->save();
                    }

                    return ['status' => true, 'message' => "OTP Verified Successfully"];
                }
                if (isset($successResp['data']['message'])) {

                    return ['status' => false, 'message' => $successResp['data']['message']];
                }

                if (isset($successResp['message'])) {

                    return ['status' => false, 'message' => $successResp['message']];
                }

            // } catch (Exception $e) {

            //     return ['status' => false, 'message' => 'Invailed OTP'];
            // }
            /** Insert Data into Aadhaar Verify Table */

        } else {

            try {

                $errorResp = json_decode($response->body());

                return ['status' => false, 'message' =>  $errorResp->message];
            } catch (Exception $e) {
                return ['status' => false, 'message' => 'something went wrong'];
            }

        }
    }

}
