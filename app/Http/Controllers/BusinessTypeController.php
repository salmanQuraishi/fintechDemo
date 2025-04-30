<?php

namespace App\Http\Controllers;

use App\Models\BusinessTypeModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;


class BusinessTypeController extends Controller
{
    
    public function index(){
        return view('kyc-settings.business-type.index');
    }

    public function getBusinessType(){

        $type = BusinessTypeModel::get();

        return DataTables::of($type)
            ->make(true);
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'status' => 'required|in:active,inactive',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 422);
        }
        
        $userId = auth()->id();

        $businessType = new BusinessTypeModel;
        $businessType->name = $request->name;
        $businessType->status = $request->status;
        $businessType->save();

        return response()->json(['message' => 'Business Type created successfully.','status' => 'success']);
        
    }

    public function edit($id)
    {
        try {
            $businessType = BusinessTypeModel::findOrFail($id);
            
            return response()->json([
                'status' => 'success',
                'data' => $businessType
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Business type not found'
            ], 404);
        }
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:business_types,id',
            'name' => 'required|string|max:255',
            'status' => 'required|in:active,inactive',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $businessType = BusinessTypeModel::findOrFail($request->id);
            $businessType->name = $request->name;
            $businessType->status = $request->status;
            $businessType->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Business type updated successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to update business type'
            ], 500);
        }
    }

}
