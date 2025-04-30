<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayinAPILog extends Model
{
    use HasFactory;
    protected $table = 'payin_api_logs';

    protected $fillable = [
        'url',
        'request_body',
        'request_header',
        'response_body',
        'response_header',
    ];
}
