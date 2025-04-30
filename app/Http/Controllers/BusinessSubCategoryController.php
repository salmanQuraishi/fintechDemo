<?php

namespace App\Http\Controllers;

use App\Models\BusinessCategory;
use App\Models\BusinessSubCategory;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class BusinessSubCategoryController extends Controller
{
    public function index()  {

        $businessCategories = BusinessCategory::get();
        return view('kyc-settings.business-sub-category.index', compact('businessCategories'));
    }
    
    public function getBusinessSubCategory(){

        $type = BusinessSubCategory::with('businessCategory:id,name') // Only select id and name from business_types
        ->orderBy('created_at', 'desc')->get();

        return DataTables::of($type)
        ->addColumn('bus_cat_name', function ($row) {
            return $row->business_category->name ?? '-';
        })
            ->make(true);
    }


    public function store(Request $request)
    {

        dd($request);
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'bus_cat_id' => 'nullable|exists:business_categories,id',
            'status' => 'required|in:active,inactive',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 422);
        }
        
        $userId = auth()->id();

        $businessType = new BusinessSubCategory;
        $businessType->name = $request->name;
        $businessType->bus_cat_id = $request->bus_cat_id;
        $businessType->status = $request->status;
        $businessType->save();

        return response()->json(['message' => 'Business Category created successfully.','status' => 'success']);
        
    }

    public function edit($id)
    {
        try {
            $businessType = BusinessSubCategory::findOrFail($id);
            
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
            'id' => 'required|exists:business_sub_categories,id',
            'name' => 'required|string|max:255',
            'bus_cat_id' => 'nullable|exists:business_categories,id',
            'status' => 'required|in:active,inactive',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $businessType = BusinessSubCategory::findOrFail($request->id);
            $businessType->name = $request->name;
            $businessType->bus_cat_id = $request->bus_cat_id;
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
            $businessType = BusinessSubCategory::findOrFail($request->id);
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
