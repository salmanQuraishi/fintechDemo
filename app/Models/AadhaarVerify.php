<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class AadhaarVerify extends Model
{
    use HasFactory;

    // Define the table name if it doesn't follow Laravel's naming convention
    protected $table = 'tbl_aadhaar_verify';

    // Specify the fillable fields (which can be mass-assigned)
    protected $fillable = [
        'user_id',
        'aadhaar_number',
        'reference_id',
        'api_timestamp',
    ];

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $casts = [
        'api_timestamp' => 'datetime', // Convert api_timestamp into a Carbon instance
    ];

    // Accessor to return the 'api_timestamp' in a "minutes ago" format
    public function getApiTimestampAgoAttribute()
    {
        // Check if api_timestamp exists and return the difference in minutes
        if ($this->api_timestamp) {
            return Carbon::parse($this->api_timestamp)->diffInMinutes(Carbon::now()) . ' minutes ago';
        }
        return null;
    }

}
