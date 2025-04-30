<?php

namespace App\Services;

use App\Models\UserBankModel;
use Illuminate\Support\Facades\Log;
use Exception;

class UserBankService
{
    // Create a new user bank entry
    public function create(string $userId, string $holderName, string $number, string $ifsc, string $bankName, string $type)
    {
        try {
            $userBank = UserBankModel::create([
                'user_id' => $userId,
                'account_holder_name'=> $holderName,
                'account_no'=> $number,
                'ifsc'=>$ifsc,
                'account_type'=> $type,
                'bank_name'=>$bankName
            ]);
            return $userBank;
        } catch (Exception $e) {
            // Log::error('Error creating user bank entry: ' . $e->getMessage());
            return null;
        }
    }

    // Get all user banks
    public function getAll()
    {
        try {
            return UserBankModel::all();
        } catch (Exception $e) {
            // Log::error('Error fetching all user banks: ' . $e->getMessage());
            return null;
        }
    }

    // Get a single user bank by ID
    public function getById($id)
    {
        try {
            return UserBankModel::find($id);
        } catch (Exception $e) {
            // Log::error('Error fetching user bank by ID: ' . $e->getMessage());
            return null;
        }
    }
    public function getAccByAccNoAndUserId($userId, $accountNumber)
    {
        try {
            return UserBankModel::where('user_id','=',$userId)->where('account_no','=',$accountNumber)->first();
        } catch (Exception $e) {
            // Log::error('Error fetching user bank by ID: ' . $e->getMessage());
            return null;
        }
    }

    // Update a user bank entry
    public function update($id, array $data)
    {
        try {
            $userBank = UserBankModel::find($id);
            if ($userBank) {
                $userBank->update($data);
                return $userBank;
            }
            return null;
        } catch (Exception $e) {
            // Log::error('Error updating user bank entry: ' . $e->getMessage());
            return null;
        }
    }

    // Delete a user bank entry
    public function delete($id)
    {
        try {
            $userBank = UserBankModel::find($id);
            if ($userBank) {
                $userBank->delete();
                return true;
            }
            return false;
        } catch (Exception $e) {
            // Log::error('Error deleting user bank entry: ' . $e->getMessage());
            return false;
        }
    }
}
