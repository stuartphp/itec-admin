<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountryZoneCity extends Model
{
    use HasFactory;
    protected $table = 'country_zone_cities';
    protected $fillable =[
        'country_zone_id',
        'city',
        'suburb',
        'postal_code'
    ];
}
