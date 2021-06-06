<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entity extends Model
{
    use HasFactory;
    protected $table = 'entities';
    protected $fillable = [
        'entity_type',
        'account_number',
        'registered_name',
        'trading_name',
        'contact_person',
        'telephone',
        'fax',
        'mobile_phone',
        'email',
        'password',
        'ps1970',
        'facebook_id',
        'google_id',
        'twitter_id',
        'physical_address',
        'delivery_address',
        'cart',
        'wishlist',
        'remember_token',
        'vat_reference',
        'province',
        'city',
        'delivery_group_id',
        'salesperson_id',
        'is_newsletter',
        'is_sms',
        'is_active',
    ];
}
