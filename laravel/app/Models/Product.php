<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'company_id',
        'product_category_id',
        'product_code',
        'name',
        'description',
        'keywords',
        'barcode',
        'isbn_number',
        'product_unit_id',
        'main_image',
        'viewed',
        'is_service',
        'is_active',
        'is_feature',
    ];
    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id', 'id');
    }

    public function units()
    {
        return $this->hasOne(ProductUnit::class, 'id', 'product_unit_id');
    }

    public function prices()
    {
        return $this->hasMany(ProductPrice::class, 'product_id', 'id');
    }

    public function image()
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }
}
