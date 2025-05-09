<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WalletTransfer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'admin_id',
        'amount',
        'note',
        'status',
    ];

    /**
     * Get the user associated with the wallet transfer.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get the admin who processed the wallet transfer.
     */
    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }
}