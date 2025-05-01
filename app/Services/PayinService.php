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
  protected $rid  = "";
  protected $mid  = "";
  protected $password  = "";

  // Constructor to initialize API details from the database
  public function __construct()
  {
    // Assuming you're fetching the first record from the 'tbl_apis' table
    // You can modify this logic based on your requirements (e.g., selecting based on 'mode' or other conditions)
    $apiDetails = Api::where('name', 'paygic-payin')->where('status', 'active')->first(); // Fetch the first active API record
    if ($apiDetails) {
      $this->baseUrl = $apiDetails->base_url;
      $this->rid = $apiDetails->username;
      $this->mid = $apiDetails->key;
      $this->password = $apiDetails->pwd;
    }
  }


  // Generate Token -----------------------------
  public function generateToken(){

    $endpoint = '/api/v2/reseller/createResellerAuthToken';
    try {
        // Using Laravel's HTTP client
        $response = Http::post($this->baseUrl.$endpoint, [
            'rid' => $this->rid,
            'password' => $this->password
        ]);
        
        // Decode the JSON response
        $result = $response->json();            
        // Check if the response contains the expected fields
        if (isset($result['status']) && $result['status']) {
            return $result['data']['token'];
        } else {
            return null;
        }
            
    } catch (Exception $e) {
        return null;
    }
  }

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


    $apiToken = $this->generateToken();

    if($apiToken == null){
      return [
        'status'=>'failed',
        'message'=> 'Bank Service Down'
      ];
    }

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


    $endPoint = '/api/v2/reseller/createPaymentRequest';

    $headers = [
      'Content-Type' => 'application/json',
      'token' => $apiToken
  ];

    $apiLog = PayinAPILog::create([
      
      'url'=>$this->baseUrl.$endPoint,
      'request_body'=>json_encode([
          'rid' => $this->rid,
          'mid' => $this->mid,
          'amount' => $amount,
          'merchantReferenceId' => $txnId,
          'customer_name' => $customerName,
          'customer_email' => $email,
          'customer_mobile' => $mobile
      ]),
      'request_header'=> json_encode($headers)
  ]);

    try {

        // Using Laravel's HTTP client
        $response = Http::withHeaders($headers)->post($this->baseUrl.$endPoint, [
          'rid' => $this->rid,
          'mid' => $this->mid,
          'amount' => $amount,
          'merchantReferenceId' => $txnId,
          'customer_name' => $customerName,
          'customer_email' => $email,
          'customer_mobile' => $mobile
      ]); 

        // Parse the JSON response
        $result = $response->json();

        $apiLog->response_body = json_encode($result);
        $apiLog->save();

        // Check if the response indicates success
        if (isset($result['status']) && $result['status']) {
          $insertedData->api_txn_id = $result['data']['paygicReferenceId'];
          // $insertedData->qr_code_id = $result['transaction_id'];
          $insertedData->save();

            return ['status'=>'success','message'=>'QR Generated Successfully', 'refid'=>$userTxnId, 'txn_id'=>$txnId, 'qr_string'=> $result['data']['dynamicQR']];
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

    $apiToken = $this->generateToken();

    if($apiToken == null){
      return [
        'status'=>'failed',
        'message'=> 'Bank Service Down'
      ];
    }

    $endPoint = '/api/v2/reseller/checkPaymentStatus';
    $headers = [
      'Content-Type' => 'application/json',
      'token' => $apiToken
  ];

    try {
        // Using Laravel's HTTP client
        $response = Http::withHeaders($headers)->post($this->baseUrl.$endPoint, [
          'rid' => $this->rid,
          'mid' => $this->mid,
          'merchantReferenceId' => $transaction->txn_id,
        ]);

        // Parse the JSON response
        $result = $response->json();
        
        // Check if the response indicates success
        if (isset($result['status']) && $result['status']) {

          $txn_details = $result['data'];

          if($result['txnStatus'] == 'SUCCESS'){

            $user = User::find($transaction->user_id);

            $user->fund = $user->fund + $transaction['amount'];
            $user->save();

            $transaction->ref_no = $txn_details['UTR'];
            $transaction->api_txn_id = $txn_details['paygicReferenceId'];
            $transaction->save();
            return ['status'=>'success','message'=>'Fund Added Successfully', 'data'=> [
              'bank_ref_no'=> $txn_details['UTR'],
              'status'=>'success',
              'txn_id'=>$transaction->txn_id
              ]
            ];
          }else{
            return ['status'=>'failed','message'=>'Failed to add Fund', 'data'=> [
              'status'=>'failed',
              'txn_id'=>$transaction->txn_id
              ]];
          }
        } else {
            return [
                'status' => 'failed',
                'message' => $result['msg'] ?? 'Failed to add fund',
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

    $data = Fund::where('txn_id','=', $array['data']['merchantReferenceId'])->first();

    if(!$data){
      return ['message'=> "From Data Condition"];
    }
    
    $user = User::find($data->user_id);
    if($array['txnStatus']=='SUCCESS'){

      $user->fund = $user->fund + $data['amount'];
      $data->api_txn_id = $array['data']['paygicReferenceNumber'] ?? '';
      $data->ref_no = $array['data']['bankReferenceNumber'] ?? '';
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
          'bank_ref_no'=>$array['data']['bankReferenceNumber'] ?? '',
        ]);
      }      
    }

    if($array['txnStatus']=='FAILED'){

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
