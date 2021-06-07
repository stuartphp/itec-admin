<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CycleActivities extends Model
{
    use HasFactory;
    protected $table = 'cycle_activities';
    protected $fillable = [
        'company_id',
        'name',
        'frequency'
    ];
}
