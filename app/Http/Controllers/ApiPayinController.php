<?php

namespace App\Http\Controllers;

use App\Models\Fund;
use App\Models\IndipaymentApiLog;
use App\Models\PayinAPILog;
use App\Models\PayoutModel;
use App\Models\UserApiToken;
use App\Services\ApiPayoutService;
use App\Services\PayinService;
use Exception;
use Illuminate\Http\Request;
use function PHPUnit\Framework\throwException;
use Illuminate\Support\Facades\Validator;

class ApiPayinController extends Controller
{

    protected $payinService;
    public function __construct(PayinService $payinService) {
        $this->payinService = $payinService;
    }

    public function payin(Request $request)
    {

        // Validate User Request Body
        $validator = Validator::make($request->all(), [
            'amount'        => 'required|string|max:10',
            'customer_name' => 'required|string|max:100',
            'email'         => 'required|string|max:100',
            'mobile'        => 'required|string|max:100',
            'refid'         => 'required|string|max:100',
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
            $check = $this->validateRequest($ip, $token);
    
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

            $logData = PayinAPILog::create([
                'url' => $request->ip(), // The URL of the API request
                'request_header' =>$request->headers, // Request headers as JSON string
                'request_body' => json_encode($request), // Request body as JSON string
                'response_header' => null, // Response body as JSON string
                'response_body' => null, // Response body as JSON string
              ]);

            $userId = $check->user_id;
            $userRefid = $request->refid;
            $mobile = $request->mobile;
            $email = $request->email;
            $name = $request->customer_name;
            $amount = $request->amount;
    
            $payin = $this->payinService->payin(
                $userId, $name, 
                $email, $mobile, 
                $amount, $userRefid
            );
             // Update API Log Data
            $logData = PayinAPILog::find($logData->id)->first();

            $logData->response_body = json_encode($payin);
            $logData->save();

            // If validation passed, proceed (you can add more payout logic here)

            if($payin['status']==='success'){
                return response()->json($payin);
            }

            if($payin['status']==='pending'){
                return response()->json($payin);
            }

            return response()->json($payin,400);
    
        } catch (Exception $e) {

            // Update API Log Data
            $logData = PayinAPILog::find($logData->id)->first();

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
            $check = $this->validateRequest($ip, $token);
    
            if (!$check) {
                return response()->json([
                    'status' => "failed",
                    'message' => 'Invailed Ip or token',
                    'data'=>null
                ], 401);
            }
            
            $response = $this->payinService->checkStatus($request->refid,'api');

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


    public function validateRequest(string $ip, string $token)
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
            $check = Fund::where('user_txn_id', $userRefId)->first();
    
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
