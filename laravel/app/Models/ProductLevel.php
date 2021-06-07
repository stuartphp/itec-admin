<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductLevel extends Model
{
    use HasFactory;
    protected $table = 'product_levels';
    protected $fillable = [
        'product_id',
        'store_id',
        'on_hand',
        'min_order_level',
        'min_order_quantity'
    ];
}
