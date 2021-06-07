<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeDisciplinaryActionRecord extends Model
{
    use HasFactory;
    protected $table = 'employee_disciplinary_action_records';
    protected $fillable = [
        'employee_disciplinary_action_id',
        'file_type',
        'file'
    ];
}
