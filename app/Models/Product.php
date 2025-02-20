<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand',
        'model',
        'year',
        'engine_type',
        'part_name',
        'chassis_number',
        'reference_number',
        'quantity',
        'category',
        'photo'
    ];

    public function getPhotoAttribute($value)
{
    return $value ? url('storage/' . $value) : null;
}
}