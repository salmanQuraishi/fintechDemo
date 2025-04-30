<?php

namespace App\Services;

use App\Models\Api;
use App\Models\AadhaarVerify;
use App\Models\IndipaymentApiLog;
use App\Models\Kyc;
use App\Models\PayoutModel;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Http;

class PayoutService
{

  protected $baseUrl = "";
  protected $token = "";
  protected $userBankService;

  // Constructor to initialize API details from the database
  public function __construct(UserBankService $userBankService)
  {
    $this->userBankService = $userBankService;
    // Assuming you're fetching the first record from the 'tbl_apis' table
    // You can modify this logic based on your requirements (e.g., selecting based on 'mode' or other conditions)
    $apiDetails = Api::where('name', 'indipayment')->where('status', 'active')->first(); // Fetch the first active API record

    if ($apiDetails) {
      $this->baseUrl = $apiDetails->base_url;
      $this->token = $apiDetails->token;
    }
  }

  public function payout(string $amount, string $userId, string $bankId, string $txnMode)
  {

    // The endpoint for PAN verification
    $endpoint = '/api/payout/transaction';

    $userBank = $this->userBankService->getById($bankId);
    $user =  User::find($userId)->first();
    // dd($user);

    // Check User Wallet Balance 
    if($user->wallet < $amount){
      return ['status'=>false, 'message'=>'Insufficient Balance to complete this transaction.'];
    }

    // Create Transaction Id
    $txnId = uniqid('TXN'); // You can also use any of the other methods above

    // Prepare the data (payload) to send in the request
    $reqBody = [
      "token" => $this->token,
      "bank" => $userBank->bank_name,
      "refid" => $txnId,
      "ifsc" => $userBank->ifsc,
      "account" => $userBank->account_no, // Replace with actual account number
      "mobile" => $user->mobile, // Replace with actual mobile number
      "name" => $userBank->account_holder_name,
      "amount" => $amount,
      "transferMode" => $txnMode
    ];

    // Insert Data in Payout Table Before Transaction
    $payoutData = PayoutModel::create([
      'user_id' => $userId,
      'txn_id' => $txnId, // Generate or fetch the transaction ID
      'amount' => $amount, // The payout amount
      'bank_id' => $userBank->id, // Bank account number
      'account_no' => $userBank->account_no, // Bank account number
      'ifsc' => $userBank->ifsc, // Bank IFSC code
      'bank_details' => json_encode($userBank), // Bank details (optional)
      'opening_bal'=>$user->wallet,
      'closing_bal'=>$user->wallet-$amount,
    ]);


    $logData = IndipaymentApiLog::create([
      'user_id' => $userId, // User ID associated with the log
      'url' => $this->baseUrl . $endpoint, // The URL of the API request
      'type' => 'payout', // Type of the request (e.g., GET, POST)
      'txn_id' => $txnId, // Transaction ID
      'request_headers' => null, // Request headers as JSON string
      'request_body' => json_encode($reqBody), // Request body as JSON string
      'response_body' => null, // Response body as JSON string
    ]);

    $user->wallet = $user->wallet - $amount;
    $user->save();


    // Send POST request
    $response = Http::post($this->baseUrl . $endpoint, $reqBody);

    // Update API Log Data
    $logData = IndipaymentApiLog::where('txn_id','=',$txnId)->first();

    // Check the response status
    if ($response->successful()) {
      $logData->response_body = $response->json();
      $logData->save();

      if($response->json()['status'] == 'success'){
        $payoutData->status = 'success';
        $payoutData->bank_ref = $response->json()['rrn'];
        $payoutData->save();

        return ['status'=>true, 'message'=>"Transaction Successful"];

      }else if($response->json()['status'] == 'failed'){
        $user->wallet = $user->wallet + $amount;
        $user->save();
        $payoutData->status = 'failed';
        $payoutData->save();	

        return ['status'=>false, 'message'=>"Transaction Failed"];
      }else{
      	return ['status'=>false, 'message'=>"Transaction Pending"];
      }

    } else {
      $logData->response_body = $response->json();
      $logData->save();
      $user->wallet = $user->wallet + $amount;
      $user->save();
      $payoutData->status = 'failed';
      $payoutData->save();	

      return ['status'=>false, 'message'=>"Transaction Failed"];

    }

  }

  public function checkStatus(string $userRefId){
    $endpoint = '/api/payout/status';

    $transaction = PayoutModel::where('txn_id','=',$userRefId)->first();

    if(!$transaction){
      return ['status'=>'failed', 'message'=>"Transaction id invailed", 'data'=> null];
    }

    if($transaction->status !== 'pending'){
      if($transaction->status == 'success'){
        return ['status'=>'success', 'message'=>"Transaction found",  'data'=> ['bank_ref_id'=>$transaction->bank_ref_id]];
      }else{
        return ['status'=>'falied', 'message'=>"Transaction found",  'data'=> null];
      }
    }

    $user =  User::find($transaction->user_id)->first();

    $reqBody = [
      "token" => $this->token,
      "refid" => $transaction->txn_id,
    ];

    $response = Http::post($this->baseUrl . $endpoint, $reqBody);
     // Check the response status
    if ($response->successful()) {
      if($response->json()['status'] == 'success'){
        $transaction->status = 'success';
        $transaction->bank_ref = $response->json()['rrn'];
        $transaction->save();

        return ['status'=>"success", 'message'=>"Transaction Successful", 'data'=> ['bank_ref_id'=>$response->json()['rrn']]];

      }else if($response->json()['status'] == 'failed'){
        $user->wallet = $user->wallet + $transaction->amount;
        $user->save();
        $transaction->status = 'failed';
        $transaction->save();	
        return ['status'=>'failed', 'message'=>"Transaction Failed", 'data'=>null];
      }else{
        return ['status'=>'pending', 'message'=>"Transaction Pending", 'data'=> null];
      }

    } else {
      
      $user->wallet = $user->wallet + $transaction->amount;
      $user->save();
      $transaction->status = 'failed';
      $transaction->save();	
      return ['status'=>'failed', 'message'=>"Transaction Failed", 'data'=> null];
    }
  }

}
