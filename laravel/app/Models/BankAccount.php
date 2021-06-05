<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    use HasFactory;
    protected $tabel='bank_accounts';
    protected $fillable = [
        'ledger_code',
        'bank',
        'branch',
        'account_name',
        'account_number',

    ];
}
