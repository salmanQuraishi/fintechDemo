<?php

use App\Http\Controllers\Api\AuthenticationController;
use App\Http\Controllers\ApiPayinController;
use App\Http\Controllers\ApiPayoutController;
use App\Http\Controllers\PayinController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiAuthController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

use App\Http\Controllers\Auth\ApiLoginController;

Route::post('/v1/login', [ApiLoginController::class, 'login']);
Route::post('/v1/otp-verify', [ApiLoginController::class, 'otpVerify']);
Route::post('/v1/register', [ApiLoginController::class, 'register']);




Route::post('/payout', [ApiPayoutController::class,'payout']);
Route::post('/payout/status', [ApiPayoutController::class,'checkStatus']);
Route::post('/payout/callback', [ApiPayoutController::class,'callback']);
Route::post('/payin/callback',[PayinController::class, 'callback']);


Route::post('/payin', [ApiPayinController::class,'payin']);
Route::post('/payin/checkstatus', [ApiPayinController::class,'checkStatus']);





