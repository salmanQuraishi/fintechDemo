<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Fund extends Model
{
    use HasFactory;

    protected $table = "fund_requests";
    protected $fillable = [
        'user_id',
        'txn_id',
        'deposit_bank',
        'amount',
        'payment_mode',
        'pay_slip',
        'from_account',
        'ref_no',
        'remark',
        'status',
        'type',
        'api_txn_id',
        'qr_code_id',
        'user_txn_id'
    ];

    // Define relationship with User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
