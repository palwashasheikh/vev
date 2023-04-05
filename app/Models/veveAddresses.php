<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class veveAddresses extends Model
{
    protected $table = 'shippingAdresses';

    protected $fillable = [
        'AddressId',
        'HouseNo',
        'streetNo',
        'postalCode',
        'city',
        'state',
        'country',
        'Isdefault',
        'userId'
    ];
    protected $hidden=['created_at','updated_at'];
    protected $primaryKey = 'AddressId';

}

