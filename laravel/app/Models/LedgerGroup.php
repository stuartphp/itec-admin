<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LedgerGroup extends Model
{
    use HasFactory;
    protected $table = 'ledger_groups';
    protected $fillable = [
        'ledger_number',
        'group_name',
        'normal_balance',
        'financial_category',
        'account_description',
    ];
}
