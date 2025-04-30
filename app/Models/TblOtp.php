<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblOtp extends Model
{
    use HasFactory;

    // Define the table name (since you're using a custom table name 'tbl_otp')
    protected $table = 'tbl_otp';

    // Define the primary key if it's not the default 'id' field (in your case it is the default)
    protected $primaryKey = 'id';

    // Indicate whether the IDs are auto-incrementing (true by default)
    public $incrementing = true;

    // The "timestamps" property is true by default, but can be overridden if needed
    public $timestamps = true;

    // Define the fillable attributes
    protected $fillable = [
        'otp',
        'email',
        'mobile',
        'type',
        'status',
    ];

    // Define the guarded attributes (if you don't want to allow mass assignment for certain fields)
    // protected $guarded = ['id'];

    // Optionally, you can cast certain attributes (like dates, if applicable)
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Define any relationships (if needed). For example, if there's a relation to another model
    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }
}
