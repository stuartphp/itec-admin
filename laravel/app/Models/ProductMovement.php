<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductMovement extends Model
{
    use HasFactory;
    protected $table = 'product_movements';
    protected $fillable = [
        'product_id',
        'document_id',
        'adtion_date',
        'up',
        'down'
    ];
}
