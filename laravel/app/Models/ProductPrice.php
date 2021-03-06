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
        'allow_tax',
        'purchase_tax_type',
        'sales_tax_type',
        'sales_commission_item'
    ];
    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id', 'id');
    }

    public function items()
    {
        return $this->belongsTo(Product::class, 'product_id','id' );
    }
    public function purchase_tax()
    {
        return $this->hasOne(TaxType::class, 'number', 'purchase_tax_type');
    }
    public function sales_tax()
    {
        return $this->hasOne(TaxType::class, 'number', 'sales_tax_type');
    }
}
