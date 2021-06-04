<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountingPeriod extends Model
{
    use HasFactory;
    protected $table = 'accounting_periods';
    protected $fillable = [
        'financial_year_id',
        'name',
        'start_date',
        'end_date',
        'locked'
    ];
}
