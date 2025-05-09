<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;

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

}