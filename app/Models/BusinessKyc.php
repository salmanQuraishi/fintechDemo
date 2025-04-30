<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessKyc extends Model
{
    use HasFactory;

    protected $table = 'businesskyc';

    protected $fillable = [
        'user_id',
        'business_type_id',
        'business_category_id',
        'business_sub_category_id',
        'business_description',
        'payment_status',
        'documents',
        'address',
        'pincode',
        'state',
        'city',
        'status',
    ];

    protected $casts = [
        'documents' => 'array',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function businessType()
    {
        return $this->belongsTo(BusinessTypeModel::class);
    }

    public function businessCategory()
    {
        return $this->belongsTo(BusinessCategory::class);
    }

    public function subCategory()
    {
        return $this->belongsTo(BusinessSubCategory::class, 'business_sub_category_id');
    }
    public function states()
    {
        return $this->belongsTo(State::class, 'state');
    }
    public function citys()
    {
        return $this->belongsTo(City::class, 'city');
    }
}
