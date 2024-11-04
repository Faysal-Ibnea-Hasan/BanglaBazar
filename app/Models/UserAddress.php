<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    protected $fillable = [
        'user_id',
        'address_type',
        'street_address',
        'city',
        'district',
        'division',
        'postal_code',
        'country'
    ];
    
}
