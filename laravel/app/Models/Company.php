<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //use SoftDeletes;
    public $table = 'companies';

    protected $dates = [
        'created_at',
        'updated_at',
        //'deleted_at',
    ];

    protected $fillable = [
        'created_by',
        'trading_name',
        'registered_as',
        'registration_number',
        'vat_number',
        'contact_name',
        'contact_number',
        'email',
        'physical_address',
        'postal_address',
        'domain',
        'url_contact_us',
        'url_terms_and_conditions',
        'url_privacy_policy',
        'slogan',
        'document_logo',
        'website_logo',
    ];

}
