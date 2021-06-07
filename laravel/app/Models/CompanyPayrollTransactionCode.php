<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyPayrollTransactionCode extends Model
{
    use HasFactory;
    protected $table = 'company_payroll_transaction_codes';
    protected $fillable =[
        'company_id',
        'payroll_transaction_codes_id',
        'transaction_code',
        'description',
        'transaction_type',
        'report_description',
        'payslip_description',
        'irp5_code',
        'irp5_description',
        'effective_from',
        'effective_to',
        'taxability',
        'taxable',
        'directive_mandatory',
        'oid_include',
        'uif_include',
        'uif_use_tax',
        'sdl_include',
        'sdl_use_tax',
        'rf_lable_include',
        'rf_lable_use_tax',
        'eti_include',
        'eti_use_tax',
        'multiplier',
    ];
}
