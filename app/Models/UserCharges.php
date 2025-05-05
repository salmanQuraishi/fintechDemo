<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCharges extends Model
{
    use HasFactory;

    protected $table = 'user_charges';

    protected $fillable = [
        'user_id',
        'charge_id',
        'type',
        'value',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function charge()
    {
        return $this->belongsTo(DefaultCharges::class, 'charge_id', 'id');
    }
}
