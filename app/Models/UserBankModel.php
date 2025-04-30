<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserBankModel extends Model
{
    use HasFactory;

    protected $table = 'tbl_user_banks';
    
    protected $fillable = [
        'user_id',
        'account_holder_name',
        'account_no',
        'ifsc',
        'account_type',
        'bank_name'
    ];

    // Define relationship with User model (if exists)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
