<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayoutModel extends Model
{
    use HasFactory;

    protected $table = 'tbl_payout';

    protected $fillable = [
        'user_id',
        'txn_id',
        'amount',
        'account_no',
        'ifsc',
        'bank_ref',
        'bank_id',
        'opening_bal',
        'closing_bal',
        'bank_details',
        'status',
        'type', // Missing
        "user_txn_id",// Missing
        'txn_charge',
        'admin_charge',
    ];

    // Casting the bank_details column to array, since it's stored as JSON or text
    protected $casts = [
        'bank_details' => 'array', // Assuming it's a JSON structure
    ];

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
