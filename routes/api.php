<?php

use App\Http\Controllers\Api\AuthenticationController;
use App\Http\Controllers\ApiPayinController;
use App\Http\Controllers\ApiPayoutController;
use App\Http\Controllers\PayinController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiAuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [ApiAuthController::class,'login']);
Route::post('/payout', [ApiPayoutController::class,'payout']);
Route::post('/payout/status', [ApiPayoutController::class,'checkStatus']);
Route::post('/payout/callback', [ApiPayoutController::class,'callback']);
Route::post('/payin/callback',[PayinController::class, 'callback']);


Route::post('/payin', [ApiPayinController::class,'payin']);
Route::post('/payin/checkstatus', [ApiPayinController::class,'checkStatus']);
