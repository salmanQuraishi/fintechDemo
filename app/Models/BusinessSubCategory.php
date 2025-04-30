<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessSubCategory extends Model
{
    use HasFactory;
    
    protected $table = "business_sub_categories";

    protected $fillable = [
        'name',
        'bus_cat_id',
        'status'
    ];

    public function businessCategory()
    {
        return $this->belongsTo(BusinessCategory::class, 'bus_cat_id');
    }
}
