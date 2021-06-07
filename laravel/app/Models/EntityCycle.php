<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntityCycle extends Model
{
    use HasFactory;
    protected $table = 'entity_cycles';
    protected $fillable = [
        'company_id',
        'entity_id',
        'activity',
        'time',
        'frequency',
    ];
}
