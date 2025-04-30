<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Api extends Model
{
    use HasFactory;

    // Define the table name (since it's different from the plural form of the model name)
    protected $table = 'tbl_apis';

    // Specify which fields can be mass-assigned
    protected $fillable = [
        'name',
        'mode',
        'username',
        'pwd',
        'base_url',
        'key',
        'secret',
        'token',
        'token_renewed_at',
        'renew_duration',
        'status',
    ];

    // Optionally, define any casts (for date/time fields, etc.)
    protected $casts = [
        'token_renewed_at' => 'datetime',
    ];
}
