<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model
{
    use HasFactory;
    protected $table = 'product_reviews';
    protected $fillable = [
        'product_id',
        'created_by_id',
        'action_date',
        'alias',
        'rating',
        'is_active'
    ];
}
