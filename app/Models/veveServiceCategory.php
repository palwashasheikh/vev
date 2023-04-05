<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class veveServiceCategory extends Model
{
    protected $table = 'servicescategories';

    protected $casts = [
        'id' => 'int'
    ];

    protected $fillable = [

    ];
    protected $primaryKey = 'categoriesId';
    protected $hidden=['pivot','created_at','updated_at','isActive'];

    public function listbycategory()
    {
        return $this->hasMany(veveService::class, 'categoriesId')
            ->select('name','storeId','storeType','categoriesId','serviceDetail','services_images.servicesImage','services.id',DB::raw('price, NULL AS price'))
//            ->join('appoimentservice','appoimentservice.servicesId','services.id')
        ->join('services_images','services_images.servicesId','services.id');
    }

    public function servicesPrice(){

    }
}


