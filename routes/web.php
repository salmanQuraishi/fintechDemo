<?php

use App\Http\Controllers\BusinessCategoryController;
use App\Http\Controllers\BusinessSubCategoryController;
use App\Http\Controllers\BusinessTypeController;
use App\Http\Controllers\BuyService;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\ProfileController;
use App\Models\BusinessCategory;
use App\Models\BusinessTypeModel;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FundController;
use App\Http\Controllers\SmsController;
use App\Http\Controllers\WebSetting;
use App\Http\Controllers\BusinessKycController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServiceCategoryController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\LinkedBankRequestController;
use App\Http\Controllers\PayinController;
use App\Http\Controllers\PayoutController;
use App\Http\Controllers\TokenController;

Route::get('/', function () { return view('welcome'); });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::fallback(function () {
    return view('404');
});

Route::group(['middleware' => ['role:super-admin|admin|staff|user|apiuser']], function() {
    

    Route::get('/permissions/data', [PermissionController::class, 'getPermissions'])->name('get.permissions');
    
    
    Route::get('/permissions', [PermissionController::class, 'index'])->name('permissions.index');
    Route::get('/permissions/create', [PermissionController::class, 'create'])->name('permissions.create');
    Route::post('/permissions', [PermissionController::class, 'store'])->name('permissions.store');
    Route::get('/permissions/{permission}/edit', [PermissionController::class, 'edit'])->name('permissions.edit');
    Route::put('/permissions/{permission}', [PermissionController::class, 'update'])->name('permissions.update');
    Route::get('/permissions/{permissionId}/delete', [PermissionController::class, 'destroy'])->name('permissions.delete');


    Route::get('/roles', [RoleController::class, 'index'])->name('roles.index'); 
    Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
    Route::post('/roles', [RoleController::class, 'store'])->name('roles.store');
    Route::get('/roles/{role}/edit', [RoleController::class, 'edit'])->name('roles.edit');
    Route::put('/roles/{role}', [RoleController::class, 'update'])->name('roles.update');
    Route::get('/roles/{role}', [RoleController::class, 'destroy'])->name('roles.destroy');
    Route::get('roles/{roleId}/give-permissions', [RoleController::class, 'addPermissionToRole'])->name('roles.addPermissionToRole');
    Route::put('roles/{roleId}/give-permissions', [RoleController::class, 'givePermissionToRole'])->name('roles.givePermissionToRole');;


    Route::prefix('/users')->name('users.')->group(function ()  {

        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/getUsers', [UserController::class, 'getUsers'])->name('getUsers');
        Route::get('/create', [UserController::class, 'create'])->name('create');
        Route::post('/', [UserController::class, 'store'])->name('store');
        Route::get('/{user}/edit', [UserController::class, 'edit'])->name('edit');
        Route::put('/{user}', [UserController::class, 'update'])->name('update');
        Route::get('/{userId}/delete', [UserController::class, 'destroy'])->name('delete');
    });
    
    Route::post('/get/city/list', [ProfileController::class, 'getCity'])->name('getCity');
    Route::get('/user/profile', [ProfileController::class, 'userprofile'])->name('user.profile.edit');
    Route::post('/user/profile/update', [ProfileController::class, 'update'])->name('user.profile.update');
    

    Route::get('/user/business', [ProfileController::class, 'userbusiness'])->name('userbusiness');
    

    Route::get('/user/nominee/info', [ProfileController::class, 'usernomineeinfo'])->name('usernomineeinfo');
    Route::post('/user/nominee/info', [ProfileController::class, 'updatenominee'])->name('updatenominee');


    Route::get('/user/linked/accounts', [ProfileController::class, 'linkedAccountDetails'])->name('userblinkedaccounts');
    Route::post('/user/linked/accounts', [ProfileController::class, 'linkedAccount'])->name('linkedAccount');
    Route::put('/update/account/status/{id}', [ProfileController::class, 'updateStatus'])->name('updateaccountStatus');


    Route::get('/user/secutiry', [ProfileController::class, 'usersecutiry'])->name('usersecutiry');
    Route::post('/password/update', [ProfileController::class, 'updatePassword'])->name('passwordupdate');

    Route::get('/user/activity', [ProfileController::class, 'Activity'])->name('useractivity');
    

    Route::get('/fund/history', [FundController::class, 'view'])->name('fund.view');
    Route::post('/fund/request', [FundController::class, 'fundrequest'])->name('fund.request');
    Route::put('/fund/update/{id}', [FundController::class, 'update'])->name('fund.update');


    Route::get('/web/setting', [WebSetting::class, 'index'])->name('setting.view');
    Route::post('/web/setting/update', [WebSetting::class, 'update'])->name('setting.update');

    
    Route::get('/email/verification', [ProfileController::class, 'sendEmail'])->name('email.sendEmail');
    Route::post('/email/verify/otp', [ProfileController::class, 'verifyEmailotp'])->name('email.verifyEmailotp');
    Route::post('/send/otp', [SmsController::class, 'sendOtp'])->name('send.otp');
    Route::post('/verify/otp', [SmsController::class, 'verifyOtp'])->name('verify.otp');


    Route::get('services/categories', [ServiceCategoryController::class, 'index'])->name('category.index');
    Route::get('services/categories/get', [ServiceCategoryController::class, 'getCategories'])->name('category.get');
    Route::get('services/categories/create', [ServiceCategoryController::class, 'create'])->name('category.create');
    Route::post('services/categories/store', [ServiceCategoryController::class, 'store'])->name('category.store');
    Route::get('services/categories/{category}/edit', [ServiceCategoryController::class, 'edit'])->name('category.edit');
    Route::put('services/categories/{category}', [ServiceCategoryController::class, 'update'])->name('category.update');


    Route::get('/services/data', [ServiceController::class, 'getService'])->name('get.service');
    Route::get('/services', [ServiceController::class, 'index'])->name('service.index');
    Route::get('/services/create', [ServiceController::class, 'create'])->name('service.create');
    Route::post('/services', [ServiceController::class, 'store'])->name('service.store');
    Route::get('/services/{service}/edit', [ServiceController::class, 'edit'])->name('service.edit');
    Route::put('/services/{service}', [ServiceController::class, 'update'])->name('service.update');


    Route::get('/buy/service/list', [BuyService::class, 'index'])->name('buy.service.list');
    Route::post('/buy/service/{service}', [BuyService::class, 'buyService'])->name('buy.service');


    Route::get('/banks/list', [BankController::class, 'index'])->name('banks.index');
    Route::get('/banks/data', [BankController::class, 'getBanks'])->name('get.banks');
    Route::get('/banks/create', [BankController::class, 'create'])->name('banks.create');
    Route::post('/banks/create', [BankController::class, 'store'])->name('banks.store');
    Route::get('/banks/{bank}/edit', [BankController::class, 'edit'])->name('banks.edit');
    Route::put('/banks/{bank}/update', [BankController::class, 'update'])->name('banks.update');
    
    
    Route::get('/payout/list', [PayoutController::class, 'index'])->name('payout.index');
    Route::get('/payout/data', [PayoutController::class, 'getPayouts'])->name('get.payouts');
    Route::get('/payouts/create', [PayoutController::class, 'create'])->name('payout.create');
    Route::post('/payouts/store', [PayoutController::class, 'store'])->name('payout.store');
    Route::post('/get/user/bank/accounts', [PayoutController::class, 'getuserbankaccounts'])->name('getuserbankaccounts');
    Route::get('/check/payout/{id}', [PayoutController::class, 'checkpayoutStatus'])->name('checkpayoutStatus');
    
    
    Route::post('/get/bank/detail', [LinkedBankRequestController::class, 'BankLinksDetails'])->name('getbankdetailsforRequest');
    Route::post('/user/bank/linked/request', [LinkedBankRequestController::class, 'userbanklinkedrequest'])->name('userbanklinkedrequest');
    Route::get('/user/linked/bank/request', [LinkedBankRequestController::class, 'index'])->name('linkedbanksRequests');
    Route::get('/user/linked/bank/request/list', [LinkedBankRequestController::class, 'linkedbanksRequests'])->name('linkedbanksRequestslist');
    Route::post('/bank-request/{id}/approve', [LinkedBankRequestController::class, 'linkedBankApprove'])->name('bank-request.approve');
    Route::post('/bank-request/{id}/reject', [LinkedBankRequestController::class, 'linkedBankReject'])->name('bank-request.reject');


    Route::get('/tokens', [TokenController::class, 'index'])->name('tokens.index');
    Route::post('/tokens', [TokenController::class, 'store'])->name('tokens.store');
    Route::get('/tokens/data', [TokenController::class, 'data'])->name('tokens.data');
    Route::delete('/tokens/{id}', [TokenController::class, 'destroy'])->name('tokens.destroy');
    Route::get('/api/token/{id}', [TokenController::class, 'getTokenData']);
    Route::post('/tokens/update/{id}', [TokenController::class, 'update'])->name('tokens.update');


    Route::prefix('payin')->group(function () {

        Route::get('/list', [PayinController::class, 'index'])->name('payin.index');
        Route::get('/data', [PayinController::class, 'getPayin'])->name('payin.data');
        Route::post('/store', [PayinController::class, 'store'])->name('payin.store');
        Route::post('/checkstatus', [PayinController::class, 'checkStatus'])->name('payin.checkstatus');
        Route::get('/check/{id}', [PayinController::class, 'checkPayinStatus'])->name('payin.check_status');
    
    });
    


    Route::prefix('user/business')->group(function () {

        Route::get('/overview', [BusinessKycController::class, 'overView'])->name('business.overview');
        Route::post('/overview/request', [BusinessKycController::class, 'overviewRequest'])->name('business.overviewrequest');
        Route::post('/get/business/sub/category/list', [BusinessKycController::class, 'getBusinessSubCategory'])->name('getBusinessSubCategory');

        Route::get('/details', [BusinessKycController::class, 'Details'])->name('business.details');
        Route::post('/details', [BusinessKycController::class, 'Detailssubmit'])->name('business.Detailssubmit');

    });

    
    Route::prefix('business-kyc')->name('business_kyc.')->group(function(){

        Route::get('/',[BusinessKycController::class, 'index'])->name('index');        
        Route::get('/get-kyc',[BusinessKycController::class, 'getKycs'])->name('get_kyc');
        Route::get('/{id}',[BusinessKycController::class, 'getKycById'])->name('getKycById');
        Route::post('/update-status',[BusinessKycController::class, 'businessupdateStatus'])->name('businessupdateStatus');

    });  

    Route::prefix('admin')->name('bank.')->group(function(){

        Route::get('/',[BusinessKycController::class, 'index'])->name('index');        
        Route::get('/get-kyc',[BusinessKycController::class, 'getKycs'])->name('get_kyc');
        Route::get('/{id}',[BusinessKycController::class, 'getKycById'])->name('getKycById');
        Route::post('/update-status',[BusinessKycController::class, 'businessupdateStatus'])->name('businessupdateStatus');

    });  

    Route::prefix('kyc')->group(function () {
        
        Route::get('/business-type', [BusinessTypeController::class, 'index'])->name('kyc.business-type');
        Route::post('/business-type', [BusinessTypeController::class, 'store'])->name('kyc.business-type');
        Route::get('/businesstype', [BusinessTypeController::class, 'getBusinessType'])->name('kyc.businesstype');
        Route::get('/business-type/{id}/edit', [BusinessTypeController::class, 'edit'])->name('kyc.business-type.edit');
        Route::post('/business-type/update', [BusinessTypeController::class, 'update'])->name('kyc.business-type.update');
        
        
        Route::prefix('/business')->name('kyc.business.')->group(function ()  {
            
            Route::get('/',[BusinessCategoryController::class,'index'])->name('category');
            Route::get('/category', [BusinessCategoryController::class, 'getBusinessCategory'])->name('category.getcat');
            Route::post('/', [BusinessCategoryController::class, 'store'])->name('category');
            Route::post('/update-status',  [BusinessCategoryController::class, 'updateStatus']);
            Route::get('/category/{id}/edit', [BusinessCategoryController::class, 'edit'])->name('category.edit');
            Route::post('/category/update', [BusinessCategoryController::class, 'update'])->name('category.update');
            

            Route::get('/sub-cat',[BusinessSubCategoryController::class,'index'])->name('sub.cat');
            Route::get('/sub-category', [BusinessSubCategoryController::class, 'getBusinessSubCategory'])->name('sub.cat.getcat');
            Route::post('/sub-cat', [BusinessSubCategoryController::class, 'store'])->name('sub.cat');
            Route::post('/update-sub-cat-status',  [BusinessCategoryController::class, 'updateStatus']);
            Route::get('/sub-cat/{id}/edit', [BusinessSubCategoryController::class, 'edit'])->name('sub.cat.edit');
            Route::post('/sub-cat/update', [BusinessSubCategoryController::class, 'update'])->name('sub.cat.update');
            
        });

        Route::get('/documents', [DocumentController::class, 'index'])->name('kyc.documents');
        // Document routes
        Route::prefix('documents')->name('documents.')->group(function () {
            
            // DataTable data route
            Route::get('/data', [DocumentController::class, 'getData'])->name('data');
            
            // Create document route
            Route::post('/', [DocumentController::class, 'store'])->name('store');
            
            // Get specific document for editing
            Route::get('/{id}', [DocumentController::class, 'getDocument'])->name('get');
            
            // Update document route
            Route::put('/{id}', [DocumentController::class, 'update'])->name('update');
            
            // Alternative update route for X-HTTP-Method-Override (as used in your JS)
            Route::post('/{id}', [DocumentController::class, 'update']);
            
            // Delete document route
            Route::delete('/{id}', [DocumentController::class, 'destroy'])->name('delete');
        });
    });
});
Route::get('/kyctesting', function(){
    return view('testing.kycDetailes');
});

Route::get('/testing/select2', function(){
    return view('testing.index');
});

require __DIR__.'/auth.php';
