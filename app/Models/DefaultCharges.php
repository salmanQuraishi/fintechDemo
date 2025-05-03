<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DefaultCharges extends Model
{
    use HasFactory;

    protected $table = 'default_charges';

    protected $fillable = [
        'name',
        'type',
        'value',
    ];

}
