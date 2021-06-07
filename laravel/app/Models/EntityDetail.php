<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntityDetail extends Model
{
    use HasFactory;
    protected $table = 'entity_detail';
    protected $fillable = [
        'entity_id',
        'bank',
        'branch',
        'bank_account_number',
        'beneficiary_name',
        'swift_code',
        'beneficiary_address',
        'beneficiary_postal_code',
        'beneficiary_country',
        'beneficiary_telephone',
        'beneficiary_mobile',
        'beneficiary_website',

    ];
}
