<?php

namespace App\Http\Controllers;

use App\Models\IndipaymentApiLog;
use App\Models\PayoutModel;
use App\Models\UserApiToken;
use App\Services\ApiPayoutService;
use Exception;
use Illuminate\Http\Request;
use function PHPUnit\Framework\throwException;
use Illuminate\Support\Facades\Validator;

class ApiPayoutController extends Controller
{

    protected $apiPayoutService;
    public function __construct(ApiPayoutService $apiPayoutService) {
        $this->apiPayoutService = $apiPayoutService;
    }
    public function payout(Request $request)
    {

        // Validate User Request Body
        $validator = Validator::make($request->all(), [
            'amount'        => 'required|string|max:100',
            'bank'          => 'required|string|max:100',
            'account'       => 'required|string|max:20',
            'refid'         => 'required|string|max:20',
            'ifsc'          => 'required|string|max:20',
            'name'          => 'required|string|max:100',
            'mobile'        => 'required|string|max:100',
            'transferMode'  => 'required|string|in:IMPS', // or IMPS,NEFT,RTGS
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'All Fileds Required',
                'errors' => $validator->errors()
            ], 422);
        }
        
        $ip = $request->ip();
        $authHeader = $request->header('Authorization');
        $token = null;

        if ($authHeader && preg_match('/Bearer\s(\S+)/', $authHeader, $matches)) {
            $token = $matches[1];
        }else{
            return response()->json([
                'status' => 'failed',
                'message' => 'Invalid token format',
                'data'=> null
            ], 401);
        }

        try {
            // Validate the payout request
            $check = $this->validatePayoutRequest($ip, $token);
    
            if (!$check) {
                return response()->json([
                    'status' => "failed",
                    'message' => 'Invailed Ip or token',
                    'data'=>null
                ], 401);
            }

            // Check User Txn Id is Not Duplicate
            $checkUserRefId = $this->checkUserRefId($request->refid);
            if ($checkUserRefId) {
                return response()->json([
                    'status' => "failed",
                    'message' => 'Ref Id Duplicate',
                ], 401);
            }

            $logData = IndipaymentApiLog::create([
                'user_id' => $check->user_id, // User ID associated with the log
                'url' => $ip, // The URL of the API request
                'type' => 'api user', // Type of the request (e.g., GET, POST)
                'txn_id' => $request->refid, // Transaction ID
                'request_headers' =>$request->headers, // Request headers as JSON string
                'request_body' => json_encode($request), // Request body as JSON string
                'response_body' => null, // Response body as JSON string
              ]);

            $userId = $check->user_id;
            $bank = $request->bank;
            $userRefid = $request->refid;
            $ifsc = $request->ifsc;
            $account = $request->account;
            $mobile = $request->mobile;
            $name = $request->name;
            $amount = $request->amount;
            $transferMode = $request->transferMode;
    
            $payout = $this->apiPayoutService->payout(
                $amount,  $userId, 
                $bank, $ifsc, 
                $account, $mobile, 
                $transferMode, $userRefid, $name
            );
             // Update API Log Data
            $logData = IndipaymentApiLog::find($logData->id)->first();

            $logData->response_body = json_encode($payout);
            $logData->save();

            // If validation passed, proceed (you can add more payout logic here)

            if($payout['status']==='success'){
                return response()->json($payout);
            }

            if($payout['status']==='pending'){
                return response()->json($payout);
            }

            return response()->json($payout,400);
    
        } catch (Exception $e) {

            // Update API Log Data
            $logData = IndipaymentApiLog::find($logData->id)->first();

            $logData->response_body = json_encode(['message'=>"server Error", 'error'=>$e->getMessage()]);
            $logData->save();

            return response()->json([
                'success' => "failed",
                'message' => 'Server Error'
            ], 500);
        }
    }

    public function checkStatus(Request $request){
        
        // Validate User Request Body
        $validator = Validator::make($request->all(), [
            'refid'         => 'required|string|max:20'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => "failed",
                'message' => 'All Fileds Required',
                'errors' => $validator->errors()
            ], 422);
        }

        $ip = $request->ip();
        $authHeader = $request->header('Authorization');
        $token = null;

        if ($authHeader && preg_match('/Bearer\s(\S+)/', $authHeader, $matches)) {
            $token = $matches[1];
        }else{
            return response()->json([
                'status' => 'failed',
                'message' => 'Invalid token format',
                'data'=> null
            ], 401);
        }

        try {
            // Validate the payout request
            $check = $this->validatePayoutRequest($ip, $token);
            
            if (!$check) {
                return response()->json([
                    'status' => "failed",
                    'message' => 'Invailed Ip or token',
                    'data'=>null
                ], 401);
            }
            
            $response = $this->apiPayoutService->checkStatus($request->refid);

            if($response['status']==='success'){
                return response()->json($response);
            }

            if($response['status']==='pending'){
                return response()->json($response);
            }

            return response()->json($response,400);

        } catch (Exception $e) {

            return response()->json([
                'success' => "failed",
                'message' => 'Server Error'
            ], 500);
        }
    }

    public function validatePayoutRequest(string $ip, string $token)
    {
        try {
            $check = UserApiToken::where('ip', $ip)
                                 ->where('token', $token)
                                 ->first();
    
            // Return result or a boolean if needed
            return $check;
        } catch (Exception $e) {
            // Optionally log the error
            // Log::error('Payout validation error: ' . $e->getMessage());
    
            // Rethrow or handle exception
            throw new Exception('Error validating payout request: ' . $e->getMessage());
        }
    }

    public function checkUserRefId(string $userRefId){
        try {
            $check = PayoutModel::where('user_txn_id', $userRefId)->first();
    
            // Return result or a boolean if needed
            return $check;
        } catch (Exception $e) {
            // Optionally log the error
            // Log::error('Payout validation error: ' . $e->getMessage());
    
            // Rethrow or handle exception
            throw new Exception('Error validating payout request: ' . $e->getMessage());
        }
    }
    
}
