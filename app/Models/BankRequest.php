<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BankRequest extends Model
{
    use HasFactory;

    protected $table = 'bank_requests';

    protected $fillable = [
        'bank_request_id',
        'user_id',
        'status',
    ];
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function bankLinksDetails()
    {
        return $this->hasMany(BankLinksDetails::class,'id');
    }
}
