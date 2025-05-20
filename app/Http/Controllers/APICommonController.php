<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\Bank;
use App\Models\BusinessCategory;
use App\Models\BusinessKyc;
use App\Models\BusinessSubCategory;
use App\Models\BusinessTypeModel;
use App\Models\DocumentModel;
use App\Models\Nominee;
use App\Models\PayoutModel;
use App\Models\State;
use App\Models\UserBankModel;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Psy\CodeCleaner\ReturnTypePass;

class APICommonController extends Controller
{
    public function getUser(Request $request)
    {
        $user = $request->user();

        if (!$user) {
            return response()->json(['status' => false, 'message' => 'Unauthorized'], 200);
        }

        return response()->json([
            'status' => true,
            'message' => 'User retrieved successfully',
            'data' => $user
        ],200);
    }
    public function updateProfile(Request $request)
    {
        $user = $request->user();

        if (!$user) {
            return response()->json(['status' => false, 'message' => 'Unauthorized'], 200);
        }

        try {
            $request->validate([
                'name'     => 'required|string|max:255',
                'state'    => 'required|string|max:255',
                'city'     => 'required|string|max:255',
                'address'  => 'required|string|max:255',
                'postcode' => 'required|string|max:10',
                'profile'  => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'status' => false,
                'message' => $e->errors(),
            ], 200);
        }

        $user->name     = $request->name;
        $user->state    = $request->state;
        $user->city     = $request->city;
        $user->address  = $request->address;
        $user->pincode = $request->postcode;

        $imageName = $user->profile;
        if ($request->hasFile('profile')) {
            $imageName = "profile/".rand(99999,9999999).time().'.'.$request->profile->extension(); 
            $request->profile->move(public_path('profile'), $imageName);
        }
        $user->profile = $imageName;

        $user->save();

        return response()->json([
            'status' => true,
            'message' => 'Profile updated successfully.'
        ],200);
    }
    public function nomineeinfo(Request $request)
    {
        $user = $request->user();

        if (!$user) {
            return response()->json(['status' => false, 'message' => 'Unauthorized'], 200);
        }
        
        $nominee = Nominee::select([
                    'relationship',
                    'name',
                    'dob',
                    'pincode',
                    'state',
                    'city',
                    'address',
                    'email',
                    'mobile'
                ])
                ->where('user_id', $user->id)
                ->first();
        
        return response()->json([
            'status' => true,
            'message' => 'Nominee retrieved successfully',
            'data' => $nominee
        ],200);
    }
    public function updateNominee(Request $request)
    {
        $user = $request->user();

        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'Unauthorized'
            ], 200);
        }

        try {
            $validated = $request->validate([
                'relationship' => 'required|string',
                'name' => 'required|string|max:255',
                'dob' => 'required|date',
                'pincode' => 'required|string',
                'state' => 'required|string',
                'city' => 'required|string',
                'address' => 'required|string',
                'email' => 'nullable|email',
                'mobile' => 'nullable|string'
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'status' => false,
                'message' => $e->errors(),
            ], 200);
        }

        Nominee::updateOrCreate(
            ['user_id' => $user->id],
            array_merge($validated, ['user_id' => $user->id])
        );

        return response()->json([
            'status' => true,
            'message' => 'Nominee info saved!'
        ], 200);
    }

    public function userActivity(Request $request){
        $user = $request->user();

        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'Unauthorized'
            ], 200);
        }
        $Activity = ActivityLog::select([
                        'id',
                        'user_id',
                        'activity',
                        'url',
                        'method',
                        'source_ip',
                        'device',
                        'timestamp'
                    ])->where('user_id', $user->id)
                    ->latest()
                    ->take(10)
                    ->get();

        return response()->json([
            'status' => true,
            'message' => 'Activity retrieved successfully',
            'data' => $Activity
        ],200);
    }
    
    public function bankCreate(Request $request)
    {
        $user = $request->user();

        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'Unauthorized'
            ], 200);
        }

        try {
            $validated = $request->validate([
                'account_holder_name' => 'required|string|max:100',
                'account_no' => 'required|string|max:20',
                'ifsc' => 'required|string|max:20',
                'bank_name' => 'required|string|max:100',
                'account_type' => 'required|string|in:Saving,Current'
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'status' => false,
                'message' => $e->errors(),
            ], 200);
        }

        $userBank = new UserBankModel();
        $userBank->user_id = $user->id;
        $userBank->account_holder_name = $validated['account_holder_name'];
        $userBank->account_no = $validated['account_no'];
        $userBank->ifsc = $validated['ifsc'];
        $userBank->bank_name = $validated['bank_name'];
        $userBank->account_type = $validated['account_type'];
        $userBank->save();

        return response()->json([
            'status' => true,
            'message' => 'Bank details saved successfully!',
        ], 200);
    }
    public function bankList(Request $request) {
        $user = $request->user();

        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'Unauthorized'
            ], 200);
        }
        
        $UserBankModel = UserBankModel::where('user_id', $user->id)
                                        ->select('id', 'user_id', 'account_holder_name', 'account_no', 'ifsc', 'account_type', 'bank_name')
                                        ->orderBy('id', 'desc')
                                        ->get();

        return response()->json([
            'status' => true,
            'message' => 'Banks retrieved successfully',
            'data' => $UserBankModel
        ],200);

    }
    public function bankEdit(Request $request)
    {
        $user = $request->user();

        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'Unauthorized'
            ], 200);
        }

        if (!is_numeric($request->bankid)) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid bank ID',
            ], 422);
        }

        $userBank = UserBankModel::where('id', $request->bankid)
                                    ->where('user_id', $user->id)
                                    ->select('id', 'user_id', 'account_holder_name', 'account_no', 'ifsc', 'account_type', 'bank_name')
                                    ->first();

        if (!$userBank) {
            return response()->json([
                'status' => false,
                'message' => 'Bank record not found',
            ], 200);
        }

        return response()->json([
            'status' => true,
            'message' => 'Bank retrieved successfully',
            'data' => $userBank
        ], 200);
    }
    public function bankUpdate(Request $request)
    {
        $user = $request->user();

        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'Unauthorized'
            ], 200);
        }

        try {
            $validated = $request->validate([
                'bankid' => 'required|integer',
                'account_holder_name' => 'required|string|max:100',
                'account_no' => 'required|string|max:20',
                'ifsc' => 'required|string|max:20',
                'bank_name' => 'required|string|max:100',
                'account_type' => 'required|string|in:Saving,Current'
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'status' => false,
                'message' => $e->errors(),
            ], 200);
        }

        $userBank = UserBankModel::where('id', $validated['bankid'])
            ->where('user_id', $user->id)
            ->first();

        if (!$userBank) {
            return response()->json([
                'status' => false,
                'message' => 'Bank record not found',
            ], 200);
        }

        $userBank->account_holder_name = $validated['account_holder_name'];
        $userBank->account_no = $validated['account_no'];
        $userBank->ifsc = $validated['ifsc'];
        $userBank->bank_name = $validated['bank_name'];
        $userBank->account_type = $validated['account_type'];
        $userBank->save();

        return response()->json([
            'status' => true,
            'message' => 'Bank updated successfully!',
        ], 200);
    }
    public function businessOverview(Request $request){
        $user = $request->user();

        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'Unauthorized'
            ], 200);
        }

        $BusinessType = BusinessTypeModel::where('status', 'active')
        ->get(['id', 'name']);

        $BusinessCategory = BusinessCategory::where('status','=','active')->get(['id', 'name']);
        
        $BusinessKyc = BusinessKyc::select(
                            'id', 
                            'user_id', 
                            'business_type_id', 
                            'business_category_id', 
                            'business_sub_category_id', 
                            'business_description', 
                            'payment_status', 
                            'documents', 
                            'address', 
                            'pincode', 
                            'state', 
                            'city',
                            'status'
                        )->where('user_id', $user->id)
                        ->first();

        if (!$BusinessType) {
            return response()->json([
                'status' => false,
                'message' => 'Business Type not found',
            ], 200);
        }

        if (!$BusinessCategory) {
            return response()->json([
                'status' => false,
                'message' => 'Business Category not found',
            ], 200);
        }

        return response()->json([
            'status' => true,
            'message' => 'Business Kyc retrieved successfully',
            'businessType' => $BusinessType,
            'businessCategory' => $BusinessCategory,
            'businessKyc' => $BusinessKyc,
        ], 200);
    }
    public function overviewRequest(Request $request){
        $user = $request->user();

        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'Unauthorized'
            ], 200);
        }
        try {
            $validatedData = $request->validate([
                'businessType' => 'required|exists:business_types,id',
                'businessCategory' => 'required|exists:business_categories,id',
                'subCategory' => 'required|exists:business_sub_categories,id',
                'businessDescription' => 'nullable|string|max:500',
                'paymentStatus' => 'required|in:Without website/app,On my website/app',
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'status' => false,
                'message' => $e->errors(),
            ], 200);
        }

        $businessOverview = BusinessKyc::where('user_id', $user->id)->first();

        if ($businessOverview) {
            
            $businessOverview->update([
                'business_type_id' => $validatedData['businessType'],
                'business_category_id' => $validatedData['businessCategory'],
                'business_sub_category_id' => $validatedData['subCategory'],
                'business_description' => $validatedData['businessDescription'],
                'payment_status' => $validatedData['paymentStatus'],
                'status' => 'pending',
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Business overview updated successfully',
            ], 200);

        } else {
            
            BusinessKyc::create([
                'user_id' => $user->id,
                'business_type_id' => $validatedData['businessType'],
                'business_category_id' => $validatedData['businessCategory'],
                'business_sub_category_id' => $validatedData['subCategory'],
                'business_description' => $validatedData['businessDescription'],
                'payment_status' => $validatedData['paymentStatus'],
                'status' => 'pending',
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Business overview created successfully',
            ], 200);

        }

    }
    public function getBusinessSubCategory(Request $request){
        
        $user = $request->user();

        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'Unauthorized'
            ], 200);
        }

        try {
            $request->validate([
                'id' => 'required|integer',
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'status' => false,
                'message' => $e->errors(),
            ], 200);
        }

        $id = $request->input('id');
        
       $BusinessSubCategory = BusinessSubCategory::where('bus_cat_id', '=', $id)
        ->get(['id', 'name', 'bus_cat_id']);

        if ($BusinessSubCategory) {
            return response()->json([
                'status' => 'success',
                'data' => $BusinessSubCategory
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Business Sub Category not found.'
            ]);
        }

    }
    public function businessDetails(Request $request)
    {
        $user = $request->user();

        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'Unauthorized'
            ], 401);
        }

        $businessKyc = BusinessKyc::select(
                            'business_type_id',
                            'business_category_id',
                            'business_sub_category_id',
                            'business_description',
                            'payment_status',
                            'documents',
                            'address',
                            'pincode',
                            'state',
                            'city',
                            'status'
                        )
                        ->where('user_id', $user->id)
                        ->first();

        if (!$businessKyc) {
            return response()->json([
                'status' => false,
                'message' => 'Business KYC not found.'
            ], 200);
        }

        $documents = DocumentModel::select(
                            'id',
                            'field_name',
                            'label',
                            'placeholder',
                            'type',
                            'required'
                        )
                        ->where('business_type_id', $businessKyc->business_type_id)
                        ->where('status', 'active')
                        ->get();

        if ($documents->isEmpty()) {
            return response()->json([
                'status' => false,
                'message' => 'Documents not found.'
            ], 200);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Bank overview retrieved successfully.',
            'businessKyc' => $businessKyc,
            'documents' => $documents
        ], 200);
    }

    public function businessDetailsRequest(Request $request)
    {
        $user = $request->user();

        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'Unauthorized'
            ], 401);
        }

        $businessKyc = BusinessKyc::where('user_id', $user->id)->first();

        if (!$businessKyc) {
            return response()->json([
                'status' => false,
                'message' => 'Business KYC not found.'
            ], 200);
        }

        $documents = DocumentModel::select(
                    'id',
                            'field_name',
                            'label',
                            'placeholder',
                            'type',
                            'required'
                        )
                        ->where('business_type_id', $businessKyc->business_type_id)
                        ->where('status', 'active')
                        ->get();

        if ($documents->isEmpty()) {
            return response()->json([
                'status' => false,
                'message' => 'Documents not found.'
            ], 200);
        }

        $rules = [
            'pincode'         => 'required|string|max:10',
            'address'         => 'required|string',
            'state'           => 'required|integer',
            'city'            => 'required|integer',
        ];

        foreach ($documents as $document) {
            $fieldName = $document->field_name;
            $required = $document->required ? 'required' : 'nullable';

            if ($document->type === 'file') {
                $rules[$fieldName] = "{$required}|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048";
            } else {
                $rules[$fieldName] = "{$required}|string|max:255";
            }
        }

        try {
            $validatedData = $request->validate($rules);
        } catch (ValidationException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Validation failed.',
                'errors' => $e->errors()
            ], 422);
        }

        $documentData = $this->processDocumentFields($request, $documents);

        $businessKyc->documents = json_encode($documentData);
        $businessKyc->address = $request->address;
        $businessKyc->pincode = $request->pincode;
        $businessKyc->state = $request->state;
        $businessKyc->city = $request->city;
        $businessKyc->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Business details submitted successfully!',
            'data' => $businessKyc->documents
        ], 200);
    }

    private function processDocumentFields(Request $request, $documents)
    {
        $documentData = [];
    
        foreach ($documents as $document) {
            $fieldName = $document->field_name;
    
            if ($document->type === 'file' && $request->hasFile($fieldName)) {
                $file = $request->file($fieldName);
    
                $imageName = "documents/" . rand(99999, 9999999) . time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('documents'), $imageName);
    
                $documentData[$fieldName] = $imageName; 
            } elseif ($document->type !== 'file' && $request->filled($fieldName)) {
                $documentData[$fieldName] = $request->input($fieldName);
            }
        }
    
        return $documentData;
    }

}