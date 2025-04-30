<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nominee extends Model
{
    use HasFactory;

    protected $table = 'nominee_info';

    protected $fillable = [
        'id',
        'user_id',
        'relationship',
        'name',
        'dob',
        'pincode',
        'state',
        'city',
        'address',
        'email',
        'mobile',
    ];

}
