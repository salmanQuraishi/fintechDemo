<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentModel extends Model
{
    use HasFactory;

    protected $table = 'documents';
    protected $fillable = [
        'label',
        'placeholder',
        'business_type_id',
        'type',
        'status',
        'required',
        'field_name'
    ];

    public function businessType()
{
    return $this->belongsTo(BusinessTypeModel::class, 'business_type_id');
}

}
