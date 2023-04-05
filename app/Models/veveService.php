<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;


class veveService extends Model
{
	protected $table = 'services';

	protected $casts = [
		'id' => 'int',

	];

	protected $fillable = [
		'name',
		'service_code',
		'serviceDetail',
		'store_id',
		'categoriesId',
		'is_active'
	];

	public function servicescategory()
	{
		return   $this->hasOne(veveServiceCategory::class,'id')->select(array('id','categoriesName'));
	}

	public function store()
	{
		return $this->belongsTo(veveStores::class);
	}

	public function booking_details()
	{
		return $this->hasMany(BookingDetail::class);
	}
	public function servicesimages(){
        return $this->hasMany( veveserviceimages::class,'servicesId');
    }
    public function servicesduration(){
        return $this->hasMany( appoimentservice::class,'servicesId');
    }
}
