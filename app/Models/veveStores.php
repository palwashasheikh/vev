<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class veveStores extends Model
{
    use HasFactory;

    protected $table = "stores";
    protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','store_name','storedetail','store_address','store_phone','mobile','lat','lng','storeType','user_id','searchtype'];

    public function reviews()
    {
        return $this->hasMany(veveRatings::class);
    }

     public function services(){
         return $this->hasMany(veveService::class,'storeId');
     }
    public function products(){
        return $this->hasMany(veveProduct::class,'storeId');
    }

}
