<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryGroup extends Model
{
    use HasFactory;
    protected $table = 'delivery_groups';
    protected $fillable= [
        'company_id',
        'name',
        'standard_rate',
        'standard_weight_gram',
        'additional_cost',
        'additional_weight_per_gram',
    ];
}
