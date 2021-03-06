<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaxCode extends Model
{
    use HasFactory;
    protected $table = 'tax_codes';
    protected $fillable = [
        'company_id',
        'tax_code',
        'description',
        'percentage'
    ];
}
