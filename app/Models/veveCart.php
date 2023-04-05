<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class veveCart extends Model
{
    protected $table = 'cart';

    protected $fillable = [
        'cartId',
        'userId',
        'ProductId',
        'modifier1',
        'modifier2',
    ];
    protected $hidden=['pivot','created_at','updated_at'];
    protected $primaryKey = 'cartId';

}

