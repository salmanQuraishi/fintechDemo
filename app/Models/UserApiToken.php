<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserApiToken extends Model
{
    use HasFactory;

    protected $table = 'userapitoken';
    protected $fillable = [
        'id',
        'user_id',
        'token',
        'domain',
        'ip',
        'callback',
        'payin_callback'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
