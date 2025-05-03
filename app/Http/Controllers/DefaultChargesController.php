<?php

namespace App\Http\Controllers;

use App\Models\DefaultCharges;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Validation\Rule;

class DefaultChargesController extends Controller
{
    
    public function index(){

        return view('default-charges.index');
    }

    public function getDefaultScheems()
    {
        $this->authorize('default charges');

        $defaultScheems = DefaultCharges::get();
        
        return DataTables::of($defaultScheems)->make();
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('default_charges', 'name'),
            ],
            'type' => ['required', 'string', 'in:percent,flat'],
            'value' => ['required', 'numeric', 'min:0'],
        ]);

        try {
            // Create the new charge
            $charge = DefaultCharges::create($validated);

            // Return success response
            return response()->json([
                'success' => true,
                'message' => 'Charge created successfully',
                'data' => $charge,
            ], 201);
        } catch (Exception $e) {
            // Return error response
            return response()->json([
                'success' => false,
                'message' => 'Failed to create charge',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function getDefaultScheemById($id)
    {
        try {
            $charge = DefaultCharges::findOrFail($id);
            
            return response()->json([
                'success' => true,
                'data' => $charge,
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Charge not found',
                'error' => $e->getMessage(),
            ], 404);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $charge = DefaultCharges::findOrFail($id);
            
            // Validate the request data
            $validated = $request->validate([
                'name' => [
                    'required',
                    'string',
                    'max:255',
                    // Ensure name is unique except for the current record
                    Rule::unique('default_charges', 'name')->ignore($id),
                ],
                'type' => ['required', 'string', 'in:percent,flat'],
                'value' => ['required', 'numeric', 'min:0'],
            ]);

            // Update the charge
            $charge->update($validated);

            // Return success response
            return response()->json([
                'success' => true,
                'message' => 'Charge updated successfully',
                'data' => $charge,
            ]);
        } catch (Exception $e) {
            // Return error response
            return response()->json([
                'success' => false,
                'message' => 'Failed to update charge',
                'error' => $e->getMessage(),
            ], ($e instanceof ModelNotFoundException) ? 404 : 500);
        }
    }
}
