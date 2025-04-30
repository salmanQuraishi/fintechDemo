<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserService extends Model
{
    use HasFactory;

    protected $table = 'tbl_user_services';

    protected $fillable = [
        'user_id',
        'service_id',
        'price',
        'activation_date',
        'activation_time',
        'status',
    ];
}
