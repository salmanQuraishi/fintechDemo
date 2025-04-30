<?php

namespace App\Http\Controllers;

use App\Models\BusinessCategory;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class BusinessCategoryController extends Controller
{

    public function index()  {
        return view('kyc-settings.business-category.index');
    }
    
    public function getBusinessCategory(){

        $type = BusinessCategory::get();

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

        $businessType = new BusinessCategory;
        $businessType->name = $request->name;
        $businessType->status = $request->status;
        $businessType->save();

        return response()->json(['message' => 'Business Category created successfully.','status' => 'success']);
        
    }

    public function edit($id)
    {
        try {
            $businessType = BusinessCategory::findOrFail($id);
            
            return response()->json([
                'status' => 'success',
                'data' => $businessType
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Business Category not found'
            ], 404);
        }
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:business_categories,id',
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
            $businessType = BusinessCategory::findOrFail($request->id);
            $businessType->name = $request->name;
            $businessType->status = $request->status;
            $businessType->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Business Category updated successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to update business Category'
            ], 500);
        }
    }

    public function updateStatus(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|exists:business_categories,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $businessType = BusinessCategory::findOrFail($request->id);
            if($businessType->status == 'active'){
                $businessType->status = 'inactive';
            }else{
                $businessType->status = 'active';
            }

            $businessType->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Status updated successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to update status'
            ], 500);
        }
    }
}
