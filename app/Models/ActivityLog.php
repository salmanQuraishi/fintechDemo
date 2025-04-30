<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    protected $primaryKey = 'activity_id';

    protected $fillable = [
        'user_id',
        'activity',
        'url',
        'method',
        'source_ip',
        'device',
        'timestamp',
    ];
    public $timestamps = true;
}
