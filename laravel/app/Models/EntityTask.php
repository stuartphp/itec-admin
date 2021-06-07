<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntityTask extends Model
{
    use HasFactory;
    protected $table = 'entity_tasks';
    protected $fillable = [
        'entity_id',
        'action_date',
        'title',
        'customer_contact_id',
        'deadline',
        'tags',
        'status',
        'created_by',
        'assigned_to',

    ];
}
