<?php

namespace App\Http\Controllers;

use App\Models\ServiceCategory;
use App\Models\Service;
use App\Models\User;
use App\Models\UserService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class BuyService extends Controller
{
    public function index(){
        $category = ServiceCategory::with('services')->get();

        $userService = UserService::select('service_id')->where('user_id','=',auth()->user()->id)->get();

        return view('buy-service.index', compact('category','userService'));
    }

    public function buyService(Service $service)
    {

        if(auth()->user()->fund < $service->price) {
            return redirect()->back()->with('error', 'Insufficient balance. Please add funds to continue.');
        }        

        if (UserService::where('user_id', Auth::id())
            ->where('service_id', $service->id)
            ->exists()) {
            return redirect()->back()->with('error', 'You have already purchased this service.');
        }

        $validator = Validator::make([
            'service_id' => $service->id,
            'price' => $service->price,
            'status' => $service->status,
        ], [
            'service_id' => 'required|exists:services,id',
            'price' => 'required|numeric|min:0',
            'status' => 'required|in:active',
        ], [
            'status.in' => 'The selected service is not active. Please choose an active service.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
    
        DB::beginTransaction();
    
        try {
            
            $userService = new UserService();
            $userService->user_id = Auth::id();
            $userService->service_id = $service->id;
            $userService->price = $service->price;
            $userService->status = 'active';
            $userService->activation_date = date('Y-m-d');
            $userService->activation_time = date('H:i a');
            $userService->save();

            $userData = User::where('id','=',auth()->user()->id)->first();
            $userData->fund = $userData->fund - $service->price;
            $userData->save();
    
            DB::table('transactions')->insert([
                'user_id' => Auth::id(),
                'json' => json_encode($service),
                'type' => 'buy service',
                'remark' => $service->name,
                'amount' => $service->price,
                'status' => 'completed',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
    
            DB::commit();
    
            return redirect()->back()->with('success', 'Service purchased successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Something went wrong. Please try again later.');
        }
    }
}