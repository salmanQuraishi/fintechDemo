<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndipaymentApiLog extends Model
{
    use HasFactory;

    // Define the table name
    protected $table = 'tbl_indipayment_api_logs';

    // Define the fillable fields for mass assignment
    protected $fillable = [
        'user_id',
        'url',
        'type',
        'txn_id',
        'request_headers',
        'request_body',
        'response_body',
    ];

    // Optionally, you could define relationships, for example, if you have a User model
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}