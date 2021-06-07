<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntityTaskComment extends Model
{
    use HasFactory;
    protected $table = 'entity_task_comments';
    protected $fillable = [
        'entity_task_id',
        'action_date',
        'content',
        'status',
    ];
}
