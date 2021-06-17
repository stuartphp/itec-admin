<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    use HasFactory;
    protected $tabel='bank_accounts';
    protected $fillable = [
        'company_id',
        'ledger_code',
        'bank',
        'branch',
        'branch_code', //*
        'account_name',
        'account_number',
        'is_default' //*
    ];
}
