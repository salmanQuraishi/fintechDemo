<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankLinksDetails extends Model
{
    use HasFactory;

    protected $table = 'linked_account_details';

    protected $fillable = [
        'id',
        'title',
        'icon',
        'short_description',
        'short_description2',
        'status',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relationship with BankLinksDetails (One BankRequest can have many BankLinksDetails)
    public function bankRequest()
    {
        return $this->belongsTo(BankRequest::class,'bank_request_id');
    }

}
