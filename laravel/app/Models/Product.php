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
        'unit',
        'currency',
        'allow_tax',
        'weight_gram',
        'length_cm',
        'width_cm',
        'height_cm',
        'expiry_date',
        'main_image',
        'purchase_tax_type',
        'sales_tax_type',
        'sales_commission_item',
        'viewed',
        'is_service',
        'is_active',
        'is_feature',
    ];
}
