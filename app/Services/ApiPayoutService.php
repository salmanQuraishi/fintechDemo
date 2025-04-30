<?php

namespace App\Services;

use App\Models\Api;
use App\Models\IndipaymentApiLog;
use App\Models\Kyc;
use App\Models\PayoutModel;
use App\Models\User;
use Illuminate\Support\Facades\Http;

class ApiPayoutService
{

  protected $baseUrl = "";
  protected $token = "";

  // Constructor to initialize API details from the database
  public function __construct()
  {
    // Assuming you're fetching the first record from the 'tbl_apis' table
    // You can modify this logic based on your requirements (e.g., selecting based on 'mode' or other conditions)
    $apiDetails = Api::where('name', 'indipayment')->where('status', 'active')->first(); // Fetch the first active API record

    if ($apiDetails) {
      $this->baseUrl = $apiDetails->base_url;
      $this->token = $apiDetails->token;
    }
  }

  public function payout(
    string $amount, string $userId, 
    string $bank, string $ifsc, 
    string $account, string $mobile, 
    string $txnMode, string $userRefId, 
    string $name
    )
  {

    $endpoint = '/api/payout/transaction';

    // $userBank = $this->userBankService->getById($bankId);
    $user =  User::find($userId)->first();
    // dd($user);

    // Check User Wallet Balance 
    if($user->wallet < $amount){
      return ['status'=>'failed', 'message'=>'Insufficient Balance to complete this transaction.'];
    }

    // // Create Transaction Id
    $txnId = uniqid('TXN'); // You can also use any of the other methods above

    // // Prepare the data (payload) to send in the request
    $reqBody = [
      "token" => $this->token,
      "bank" => $bank,
      "refid" => $txnId,
      "ifsc" => $ifsc,
      "account" => $account, // Replace with actual account number
      "mobile" => $mobile, // Replace with actual mobile number
      "name" => $name,
      "amount" => $amount,
      "transferMode" => $txnMode
    ];

    // // Insert Data in Payout Table Before Transaction
    $payoutData = PayoutModel::create([
      'user_id' => $userId,
      'txn_id' => $txnId, // Generate or fetch the transaction ID
      'user_txn_id' => $userRefId, // Generate or fetch the transaction ID
      'amount' => $amount, // The payout amount
      'account_no' => $account, // Bank account number
      'ifsc' => $ifsc, // Bank IFSC code
      'type' => 'api', // Bank IFSC code
      'bank_details' => null, // Bank details (optional)
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

    $logData->response_body = $response->json();
    $logData->save();

    // Check the response status
    if ($response->successful()) {
      if($response->json()['status'] == 'success'){
        $payoutData->status = 'success';
        $payoutData->bank_ref = $response->json()['rrn'];
        $payoutData->save();

        return ['status'=>"success", 'message'=>"Transaction Successful", 'data'=> ['bank_ref_id'=>$response->json()['rrn']]];

      }else if($response->json()['status'] == 'failed'){
        $user->wallet = $user->wallet + $amount;
        $user->save();
        $payoutData->status = 'failed';
        $payoutData->save();	
        return ['status'=>'failed', 'message'=>"Transaction Failed", 'data'=>null];
      }else{
      	return ['status'=>'pending', 'message'=>"Transaction Pending", 'data'=> null];
      }

    } else {
      
      $user->wallet = $user->wallet + $amount;
      $user->save();
      $payoutData->status = 'failed';
      $payoutData->save();	
      return ['status'=>'failed', 'message'=>"Transaction Failed", 'data'=> null];
    }
  }



  // Check Transaction Status
  public function checkStatus(string $userRefId){
    $endpoint = '/api/payout/status';

    $transaction = PayoutModel::where('user_txn_id','=',$userRefId)->first();

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
