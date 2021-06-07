<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPrice extends Model
{
    use HasFactory;
    protected $table = 'product_prices';
    protected $fillable = [
        'product_id',
        'store_id',
        'cost_price',
        'retail',
        'dealer',
        'whole_sale',
        'price_list1',
        'price_list2',
        'price_list3',
        'price_list4',
        'price_list5',
        'special',
        'special_from',
        'special_to',

    ];
}
