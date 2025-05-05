<?php

namespace App\Http\Controllers;

use App\Models\Api;
use App\Models\DefaultCharges;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Validation\Rule;

class ManagePayoutController extends Controller
{

    public function index(){

        return view('manage-payout-service.index');
    }

    public function getPayoutApis()
    {
        $this->authorize('manage payout apis');

        $defaultScheems = Api::where('type','=','payout')->get();
        
        return DataTables::of($defaultScheems)->make();
    }

    public function activate($id, Request $request)
    {
        $this->authorize('update payout apis');
        // Step 1: Inactivate all payout APIs
        Api::where('type', 'payout')->update(['status' => 'inactive']);
    
        // Step 2: Activate the one sent in the request (by ID)
        $api = Api::where('id', $id)->where('type', 'payout')->first();
    
        if (!$api) {
            return response()->json(['success'=>false,'message' => 'API not found or not a payout type'], 404);
        }
    
        $api->status = 'active';
        $api->save();
    
        return response()->json(['success'=>true,'message' => 'Payout API activated successfully']);
    }
}
