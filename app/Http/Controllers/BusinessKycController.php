<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BusinessTypeModel;
use App\Models\BusinessCategory;
use App\Models\BusinessSubCategory;
use App\Models\BusinessKyc;
use App\Models\DocumentModel;
use App\Models\State;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Yajra\DataTables\Facades\DataTables;

class BusinessKycController extends Controller
{

    public function index(){
        return view('business-kyc.index');
    }
    public function getKycById($id)
    {
        $BusinessKyc = BusinessKyc::with('user:id,name')
                                    ->with('businessCategory:id,name')
                                    ->with('subCategory:id,name')
                                    ->with('businessType:id,name')
                                    ->with('states:id,name')
                                    ->with('citys:id,name')
                                    ->findOrFail(id: $id);
        
        $data = $BusinessKyc->toArray();
        $data['id'] = Crypt::encrypt($BusinessKyc->id);

        return response()->json([
            'status' => 'success',
            'data' => $data
        ]);
    }
    public function getKycs(){
        $kycs = BusinessKyc::with('user:id,name')->with('businessCategory:id,name')->with('businessType:id,name')->get(); 
        return DataTables::of($kycs)
            ->editColumn('documents', function ($kyc) {
                return json_decode(html_entity_decode($kyc->documents), true); // safely decode
            })
            ->addColumn('name',function($row){
                return $row->user->name;
            })
            ->addColumn('business_category',function($row){
                return $row->businessCategory->name;
            })
            ->addColumn('business_type',function($row){
                return $row->businessType->name;
            })
            ->make(true);
    }
    public function businessupdateStatus(Request $request)
    {
        $kyc = BusinessKYC::find($request->id);
        if (!$kyc) {
            return response()->json(['status' => 'error', 'message' => 'KYC not found']);
        }

        $kyc->status = $request->status;
        $kyc->save();

        return response()->json(['status' => 'success', 'message' => 'Status updated']);
    }
    public function overView() {
        $BusinessType = BusinessTypeModel::where('status','=','active')->get()->all();
        $BusinessCategory = BusinessCategory::where('status','=','active')->get()->all();
        $BusinessKyc = BusinessKyc::where('user_id', auth()->id())->first();
        // dd($BusinessType);
        return view('kyc.index',compact('BusinessType','BusinessCategory','BusinessKyc'));
    }
    public function overviewRequest(Request $request){
        
        $validatedData = $request->validate([
            'businessType' => 'required|exists:business_types,id',
            'businessCategory' => 'required|exists:business_categories,id',
            'subCategory' => 'required|exists:business_sub_categories,id',
            'businessDescription' => 'nullable|string|max:500',
            'paymentStatus' => 'required|in:Without website/app,On my website/app',
        ]);

        $businessOverview = BusinessKyc::where('user_id', auth()->id())->first();

        if ($businessOverview) {
            
            $businessOverview->update([
                'business_type_id' => $validatedData['businessType'],
                'business_category_id' => $validatedData['businessCategory'],
                'business_sub_category_id' => $validatedData['subCategory'],
                'business_description' => $validatedData['businessDescription'],
                'payment_status' => $validatedData['paymentStatus'],
                'status' => 'pending',
            ]);

            return redirect()->route('business.overview')->with('success', 'Business Overview updated successfully!');
        } else {
            
            BusinessKyc::create([
                'user_id' => auth()->id(),
                'business_type_id' => $validatedData['businessType'],
                'business_category_id' => $validatedData['businessCategory'],
                'business_sub_category_id' => $validatedData['subCategory'],
                'business_description' => $validatedData['businessDescription'],
                'payment_status' => $validatedData['paymentStatus'],
                'status' => 'pending',
            ]);

            return redirect()->route('business.overview')->with('success', 'Business Overview created successfully!');
        }
    }
    public function getBusinessSubCategory(Request $request){
        if (Auth::check()) {

            $id = $request->input('id');
            
            $BusinessSubCategory = BusinessSubCategory::where('bus_cat_id', '=', $id)
                ->get()->all();

            if ($BusinessSubCategory) {
                return response()->json([
                    'status' => 'success',
                    'data' => $BusinessSubCategory
                ]);
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Business Sub Category not found.'
                ]);
            }

        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'User not authenticated'
            ], 401);
        }
    }
    public function Details() {

        $BusinessKyc = BusinessKyc::where('user_id', auth()->id())->first();

        $BusinessKycCount = $BusinessKyc->count();

        $documents = DocumentModel::where('business_type_id','=',$BusinessKyc->business_type_id)
                                    ->where('status','=','active')
                                    ->get()->all();

                                    // dd($BusinessKyc);

        $states = State::get()->all();

        return view('kyc.index',compact('states','BusinessKycCount','documents','BusinessKyc'));

    }
    public function Detailssubmit(Request $request)
    {
        $businessKyc = BusinessKyc::where('user_id', auth()->id())->firstOrFail();
    
        $documents = DocumentModel::where('business_type_id', $businessKyc->business_type_id)
                                    ->where('status', 'active')
                                    ->get();
    
        $validationRules = $this->buildValidationRules($documents);
    
        $validatedData = $request->validate($validationRules);
    
        $documentData = $this->processDocumentFields($request, $documents);
    
        $businessKyc->documents = json_encode($documentData);
        $businessKyc->address = $request->address;
        $businessKyc->pincode = $request->pincode;
        $businessKyc->state = $request->state;
        $businessKyc->city = $request->city;
        $businessKyc->save();
    
        return redirect()
            ->back()
            ->with('success', 'Business details submitted successfully!')
            ->with('jsonData', $businessKyc->documents);
    }
    private function buildValidationRules($documents)
    {
        $rules = [
            'pincode'         => 'required|string|max:10',
            'address' => 'required|string',
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
    
        return $rules;
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
