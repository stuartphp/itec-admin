<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntityContact extends Model
{
    use HasFactory;
    protected $table = 'entity_contacts';
    protected $fillable = [
        'entity_id',
        'name',
        'job_title',
        'email',
        'mobile',
        'telephone',
        'date_of_birth',
        'gender',
        'notes',
    ];
}
