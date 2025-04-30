<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kyc extends Model
{
    use HasFactory;

    // Define the table name (optional, Laravel will automatically use 'kycs' if this is not defined)
    protected $table = 'tbl_kyc';

    // The primary key for the table (optional, Laravel will assume 'id' if this is not defined)
    protected $primaryKey = 'id';

    // Set the attributes that are mass assignable
    protected $fillable = [
        'user_id',
        'pan',
        'aadhaar',
        'status',
    ];

    // The attributes that should be cast to native types (if needed)
    protected $casts = [
        'status' => 'string', // You can cast the 'status' to a string, it's an enum.
    ];

    /**
     * Get the user associated with the KYC.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
