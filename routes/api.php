<?php

use App\Http\Controllers\Api\AuthenticationController;
use App\Http\Controllers\ApiPayinController;
use App\Http\Controllers\ApiPayoutController;
use App\Http\Controllers\PayinController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ApiLoginController;
use App\Http\Controllers\APICommonController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {
    Route::post('/login', [ApiLoginController::class, 'login']);
    Route::post('/register', [ApiLoginController::class, 'register']);
    Route::post('/otp-verify', [ApiLoginController::class, 'otpVerify']);

    Route::get('/state', [ApiLoginController::class, 'getState']);
    Route::get('/city/{id}', [ApiLoginController::class, 'getCity']);

    // Protected routes
    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/user/data', [APICommonController::class, 'getUser']);
        Route::post('/update-profile', [APICommonController::class, 'updateProfile']);

        Route::get('/nominee/info', [APICommonController::class, 'nomineeinfo']);
        Route::post('/nominee/info/update', [APICommonController::class, 'updateNominee']);
        
        Route::get('/activity', [APICommonController::class, 'userActivity']);
        
        Route::get('/banks/list', [APICommonController::class, 'bankList']);
        Route::post('/banks/create', [APICommonController::class, 'bankCreate']);
        Route::post('/banks/edit', [APICommonController::class, 'bankEdit']);
        Route::post('/banks/update', [APICommonController::class, 'bankUpdate']);
        
        Route::get('/business/overview', [APICommonController::class, 'businessOverview']);
        Route::post('/overview/request', [APICommonController::class, 'overviewRequest']);
        Route::get('/get/business/sub/category/list', [APICommonController::class, 'getBusinessSubCategory']);
        
        Route::get('/business/details', [APICommonController::class, 'businessDetails']);
        Route::post('/business/details/request', [APICommonController::class, 'businessDetailsRequest']);

    });
});


Route::post('/payout', [ApiPayoutController::class,'payout']);
Route::post('/payout/status', [ApiPayoutController::class,'checkStatus']);
Route::post('/payout/callback', [ApiPayoutController::class,'callback']);
Route::post('/payin/callback',[PayinController::class, 'callback']);


Route::post('/payin', [ApiPayinController::class,'payin']);
Route::post('/payin/checkstatus', [ApiPayinController::class,'checkStatus']);





