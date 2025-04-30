<?php

namespace App\Http\Controllers;

use App\Models\BusinessTypeModel;
use App\Models\DocumentModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DocumentController extends Controller
{


    public function index()
    {
        $businessTypes = BusinessTypeModel::where('status', 'active')->get();
        return view('kyc-settings.documents.index', compact('businessTypes'));
    }

    
    /**
     * Get documents data for DataTable.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getData()
    {
        // $documents = DocumentModel::with('businessType')
        //     ->orderBy('created_at', 'desc')->get();

        // return datatables()->of($documents)
        //     ->make(true);

            $documents = DocumentModel::with('businessType:id,name') // Only select id and name from business_types
        ->orderBy('created_at', 'desc')
        ->get();

    return datatables()->of($documents)
        ->addColumn('business_type_name', function ($row) {
            return $row->businessType->name ?? '-';
        })
        ->make(true);
    }

    /**
     * Store a newly created document in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'label' => 'required|string|max:255',
            'placeholder' => 'required|string|max:255',
            'business_type_id' => 'required|exists:business_types,id',
            'type' => 'required|in:file,text,number',
            'field_name' => 'required|alpha_dash',
            'status' => 'required|in:active,inactive',
            'required' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 422);
        }

        $request->merge([
            'field_name' => preg_replace('/[\s-]+/', '_', strtolower($request->field_name)),
        ]);
        
        $document = new DocumentModel();
        $document->label = $request->label;
        $document->placeholder = $request->placeholder;
        $document->field_name = $request->field_name;
        $document->business_type_id = $request->business_type_id;
        $document->type = $request->type;
        $document->status = $request->status;
        $document->required = $request->required;
        $document->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Document created successfully.'
        ]);
    }

    /**
     * Get a specific document for editing.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getDocument($id)
    {
        $document = DocumentModel::findOrFail($id);
        
        return response()->json([
            'status' => 'success',
            'data' => $document
        ]);
    }

    /**
     * Update the specified document in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'label' => 'required|string|max:255',
            'placeholder' => 'required|string|max:255',
            'field_name' => 'required|alpha_dash',
            'business_type_id' => 'required|exists:business_types,id',
            'type' => 'required|in:file,text,number',
            'status' => 'required|in:active,inactive',
            'required' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 422);
        }
        
        $request->merge([
            'field_name' => preg_replace('/[\s-]+/', '_', strtolower($request->field_name)),
        ]);

        $document = DocumentModel::findOrFail($id);
        $document->label = $request->label;
        $document->placeholder = $request->placeholder;
        $document->field_name = $request->field_name;
        $document->business_type_id = $request->business_type_id;
        $document->type = $request->type;
        $document->status = $request->status;
        $document->required = $request->required;
        $document->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Document updated successfully.'
        ]);
    }

    /**
     * Remove the specified document from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $document = DocumentModel::findOrFail($id);
        $document->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Document deleted successfully.'
        ]);
    }

    // public function store(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'label' => 'required|string|max:255',
    //         'placeholder' => 'required|in:active,inactive',
    //         'business_type_id' => 'required|exists:business_types,id',
    //         'type' => 'required|in:file,text,number',
    //         'required' => 'required|boolean',
    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json([
    //             'status' => 'error',
    //             'errors' => $validator->errors()
    //         ], 422);
    //     }
        
    //     $userId = auth()->id();

    //     $businessType = new DocumentModel();
    //     $businessType->label = $request->label;
    //     $businessType->placeholder = $request->placeholder;
    //     $businessType->business_type_id = $request->business_type_id;
    //     $businessType->type = $request->type;
    //     $businessType->required = $request->required;
    //     $businessType->save();

    //     return response()->json(['message' => 'Document created successfully.','status' => 'success']);
        
    // }

}
