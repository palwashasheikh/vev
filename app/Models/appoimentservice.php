<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class appoimentservice extends Model
{
    protected $table = 'appoimentservice';


    protected $fillable = [
        'servicesId',
        'ServicesDate',
        'Servicesduration',
        'price',
        'updated_at',
        'created_at'
    ];
}
