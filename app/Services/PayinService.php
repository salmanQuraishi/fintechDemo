<?php

namespace App\Services;

use App\Models\Api;
use App\Models\Fund;
use App\Models\PayinAPILog;
use App\Models\User;
use App\Models\UserApiToken;
use Exception;
use Illuminate\Support\Facades\Http;
use PhpParser\Node\Expr\Array_;

class PayinService
{


  protected $baseUrl = "";
  protected $token  = "";
  protected $operator  = "";

  // Constructor to initialize API details from the database
  public function __construct()
  {
    // Assuming you're fetching the first record from the 'tbl_apis' table
    // You can modify this logic based on your requirements (e.g., selecting based on 'mode' or other conditions)
    $apiDetails = Api::where('name', 'apisol-payin')->where('status', 'active')->first(); // Fetch the first active API record
    if ($apiDetails) {
      $this->baseUrl = $apiDetails->base_url;
      $this->token = $apiDetails->token;
      $this->operator = $apiDetails->secret;
    }
  }


  // Generate Token -----------------------------
  // public function generateToken(){

  //   $endpoint = '/jwt_encode';
  //   try {
  //       // Using Laravel's HTTP client
  //       $response = Http::asForm()->post($this->baseUrl.$endpoint, [
  //           'email_id' => $this->email,
  //           'secret_key' => $this->secret
  //       ]);
        
  //       // Decode the JSON response
  //       $result = $response->json();            
  //       // Check if the response contains the expected fields
  //       if (isset($result['encode_token']) && $result['error_code'] === 0) {
  //           return $result['encode_token'];
  //       } else {
  //           return null;
  //       }
            
  //   } catch (Exception $e) {
  //       return null;
  //   }
  // }

  // Generate Txn Id -----------------------------
  private function generateTxnId()
  {
      do {
          // Generate a transaction ID format: TXN-YYYYMMDD-XXXXXX
          // where XXXXXX is a random 6-digit number
          $date = now()->format('Ymd');
          $randomPart = str_pad(mt_rand(1, 999999), 6, '0', STR_PAD_LEFT);
          $txnId = $date.$randomPart;
          
          // Check if this transaction ID already exists in the database
          $exists = Fund::where('ref_no', $txnId)->exists();
          
      } while ($exists); // Repeat until we find a unique ID
      
      return $txnId;
  }

  // Generate QR Code API Request -----------------------------
  public function payin(
    String $userId, 
    String $customerName, 
    String $email, 
    String $mobile, 
    String $amount,
    String $userTxnId = null // This Id Send By Only Api User
    ){
      
    if(empty($this->baseUrl)){
      return [
        'status'=>'failed',
        'message'=> 'Currently bank is not responding'
      ];
    }

    $txnId = $this->generateTxnId();

    if($txnId == null){
      return [
        'status'=>'failed',
        'message'=> 'something went wrong'
      ];
    }


    // $apiToken = $this->generateToken();

    // if($apiToken == null){
    //   return [
    //     'status'=>'failed',
    //     'message'=> 'Bank Service Down'
    //   ];
    // }

    // Insert Data in Fund Request Table 
    $insertedData = Fund::create([
      'user_id' => $userId,
      'user_txn_id' => $userTxnId,
      'amount' => $amount,
      'type' => 'online',
      'txn_id' => $txnId,
      'status' => 'pending'
    ]);

    if(!$insertedData){
      return [
        'status'=>'failed',
        'message'=> 'Something went wrong'
      ];
    }


    $endPoint = '/payin/index.php';

    $headers = [
      'Content-Type' => 'application/json',
      'Authorization' => "Bearer $this->token",
      'Cookie' => 'PHPSESSID=9e92f3419eccf32c362b64b5726579bc',
  ];

    $apiLog = PayinAPILog::create([
      
      'url'=>$this->baseUrl.$endPoint,
      'request_body'=>json_encode([
          'operator' => $this->operator,
          'unique_id' => $txnId,
          'amount' => $amount,
          'mobile' => $mobile,
          'webhook' => 'https://merchant.startpay.in/api/payin/callback',
      ]),
      'request_header'=> json_encode($headers)
  ]);

    try {

        // Using Laravel's HTTP client
        $response = Http::withHeaders($headers)->post($this->baseUrl.$endPoint, [
          'operator' => $this->operator,
          'unique_id' => $txnId,
          'amount' => $amount,
          'mobile' => $mobile,
          'webhook' => 'https://merchant.startpay.in/api/payin/callback',
      ]); 

        // Extra Fields in API
        // 'udv1' => 'Custome Value 1',
        // 'udv2' => 'Custome Value 2',
        // 'udv3' => 'Custome Value 3',  
        
        // Parse the JSON response
        $result = $response->json();

        $apiLog->response_body = json_encode($result);
        $apiLog->save();

        // Check if the response indicates success
        if (isset($result['status']) && $result['status'] === 'success') {
          // $insertedData->api_txn_id = $result['transaction_id'];
          // $insertedData->qr_code_id = $result['transaction_id'];
          $insertedData->save();

            return ['status'=>'success','message'=>'QR Generated Successfully', 'refid'=>$userTxnId, 'txn_id'=>$txnId, 'qr_string'=> $result['paymentLink']];
        } else {
            return [
                'status' => 'failed',
                'message' => $result['message'] ?? 'Failed to generate QR code',
            ];
        }
            
    } catch (Exception $e) {
        return [
            'status' => 'failed',
            'message' => 'API Request Failed: ' . $e->getMessage(),
        ];
    }
  }

  // Type - portal, api
  public function checkStatus(String $txnId, String $type = 'portal'){
    if(empty($this->baseUrl)){
      return [
        'status'=>'failed',
        'message'=> 'Currently bank is not responding'
      ];
    }
    $fieldName = 'txn_id';

    if($type == 'api'){
      $fieldName = 'user_txn_id';
    }

    $transaction = Fund::where($fieldName, '=', $txnId)->first();

    if(!$transaction){
      return [
        'status'=>'failed',
        'message'=> 'Transaction Not Found'
      ];
    }

    if($transaction->status != 'pending'){
      return [
        'status'=>$transaction->status
      ];
    }

    // $apiToken = $this->generateToken();

    // if($apiToken == null){
    //   return [
    //     'status'=>'failed',
    //     'message'=> 'Bank Service Down'
    //   ];
    // }

    $endPoint = '/qr_collection_status';

    try {
        // Using Laravel's HTTP client
        $response = Http::asForm()->post($this->baseUrl.$endPoint, [

            // 'token' => $apiToken,
            // 'transaction_id' => $transaction->api ,
        ]);

        // Parse the JSON response
        $result = $response->json();

        // {
        //   "error_code": 0,
        //   "message": "Transaction details found.",
        //   "transaction_details": {
        //     "transaction_id": 615,
        //     "qr_code_id": 1561,
        //     "amount": 15,
        //     "customer_name": "Demo Account",
        //     "bank_ref_no": "427344665250",
        //     "status": "Success"
        //   }
        // }
        
        // Check if the response indicates success
        if (isset($result['error_code']) && $result['error_code'] === 0) {

          $txn_details = $result['transaction_details'];

          if($txn_details['status'] == 'success'){

            $user = User::find($transaction->user_id);

            $user->fund = $user->fund + $transaction['amount'];
            $user->save();

            $transaction->ref_no = $txn_details['bank_ref_no'];
            $transaction->qr_code_id = $txn_details['qr_code_id'];
            $transaction->api_txn_id = $txn_details['transaction_id'];
            $transaction->save();
            return ['status'=>'success','message'=>'Fund Added Successfully', 'data'=> [
              'bank_ref_no'=> $txn_details['bank_ref_no'],
              'status'=>$txn_details['status'],
              'txn_id'=>$transaction->txn_id
              ]
            ];
          }else{
            return ['status'=>'failed','message'=>'Failed to add Fund', 'data'=> [
              'status'=>$txn_details['status'],
              'txn_id'=>$transaction->txn_id
              ]];
          }

        } else {
            return [
                'status' => 'failed',
                'message' => $result['message'] ?? 'Failed to add fund',
                'data'=> [
                'txn_id'=>$transaction->txn_id
                ]
            ];
        }
    } catch (Exception $e) {
        return [
            'status' => 'failed',
            'message' => 'API Request Failed: ' . $e->getMessage(),
        ];
    }
  }

  public function payinCallback(Array $array){

    $data = Fund::where('txn_id','=', $array['uniquee'])->first();

    if(!$data){
      return ['message'=> "From Data Condition"];
    }
    
    $user = User::find($data->user_id);
    if($array['status']=='success'){

      $user->fund = $user->fund + $data['amount'];
      $data->api_txn_id = $array['upi'] ?? '';
      $data->ref_no = $array['utr'] ?? '';
      $data->status = 'success';
      $data->save();
      $user->save();

      $callback = UserApiToken::where('user_id','=',$user->id)->first();
      
      if($callback){
        Http::post($callback->payin_callback, [
          'status'=>'success',
          'refid' => $data->user_txn_id,
          'txn_id' => $data->txn_id,
          'amount' => $data->amount,
          'bank_ref_no'=>$array['utr'] ?? '',
        ]);
      }      
    }

    if($array['status']=='failed'){

      $data->api_txn_id = isset($array['upi']) ? $array['upi'] : null;
      // $data->qr_code_id = isset($array['qr_code_id']) ? $array['qr_code_id'] : null;
      $data->ref_no = isset($array['utr']) ?$array['utr'] : null;
      $data->status = 'failed';
      $data->save();

      $callback = UserApiToken::where('user_id','=',$user->id)->first();
      
      if($callback){
        Http::post($callback->payin_callback, [
          'status'=>'failed',
          'refid' => $data->user_txn_id,
          'txn_id' => $data->txn_id,
          'amount' => $data->amount,
        ]);
      }  
    }
    return;
  }
}
