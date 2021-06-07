<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaxTypes extends Model
{
    use HasFactory;
    protected $table = 'tax_types';
    protected $fillable = [
        'company_id',
        'name',
        'number',
        'impact',
        'year_implemented'
    ];
}
