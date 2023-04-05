<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class veveProduct
 *
 * @property int $id
 * @property string|null $name
 * @property int $store_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Store $store
 * @property Collection|Attribute[] $attributes
 * @property Collection|ProductDetail[] $product_details
 *
 * @package App\Models
 */
class veveProduct extends Model
{
	protected $table = 'products';

	protected $casts = [
		'store_id' => 'int'
	];
    protected $guarded = [];
	protected $fillable = [
		'name',
		'storeId','categoriesId'
	];
    protected $hidden=['pivot','created_at','updated_at'];

    public function stores()
    {
        return $this->hasOne(veveStores::class,'storeId','product_id');
    }
    public function product_details()
    {
        return $this->hasMany(veveProductDetail::class,'product_id');;
    }

    public function product_images()
    {
        return $this->hasMany(veveProductImage::class,'ProductId')->select(array('ProductId','productImages'));;
    }
    public function category()
    {
        return $this->belongsTo(veveCategory::class,'categoriesId')->select(array('categoriesId','categoriesName'));;
    }
	public function Attributes()
	{
		return $this->hasMany(veveProductmodifer::class,'ProductId')->select('ModifierId','Attribute','Value','ProductId');

	}


}
