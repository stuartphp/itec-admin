<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountryZone extends Model
{
    use HasFactory;
    protected $table ='country_zones';
    protected $fillable = [
        'counrty_id',
        'name',
        'code',
        'is_active'
    ];
}
