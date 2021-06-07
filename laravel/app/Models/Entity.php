<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entity extends Model
{
    use HasFactory;
    protected $table = 'entities';
    protected $fillable = [
        'company_id',
        'entity_type',
        'account_number',
        'registered_name',
        'trading_name',
        'physical_address1',
        'physical_address2',
        'physical_suburb',
        'physical_city',
        'physical_province',
        'physical_country',
        'physical_code',
        'delivery_address1',
        'delivery_address2',
        'delivery_suburb',
        'delivery_city',
        'delivery_province',
        'delivery_country',
        'delivery_code',
        'credit_limit',
        'current_balance',
        'currency_code',
        'payment_terms',
        'is_open_item',
        'default_tax',
        'price_list',
        'accept_electronic_document',
        'documents_contact',
        'documents_email',
        'statement_message',
        'statement_contact',
        'statement_email',
        'telephone',
        'fax',
        'email',
        'password',
        'ps1970',
        'facebook_id',
        'google_id',
        'twitter_id',
        'remember_token',
        'vat_reference',
        'delivery_group_id',
        'is_newsletter',
        'is_sms',
        'is_active',
    ];
}
