<?php

namespace App\Models;
use http\Env\Request;
use Illuminate\Database\Eloquent\Model;


class veveCategory extends Model
{
	protected $table = 'productcategories';

	protected $casts = [
		'categoriesId' => 'int'
	];
    protected $primaryKey = 'categoriesId';

	protected $fillable = [
           'categoriesId' => 'int'
	];
    protected $hidden=['pivot','created_at','updated_at','is_Active'];
//	public function products()
//	{
//		return $this->hasMany(veveProduct::class,'categoriesId')
//            ->join('product_images','product_images.ProductId','products.id')
//            ->join('product_details','product_details.product_id',"=",'products.id')
//            ->select('name','product_details.details','storeType','storeId','categoriesId','product_images.productImages','product_images.ProductId','product_details.price');
//
//	}
    public function listbycategory()
    {
        return $this->hasMany(veveProduct::class,'categoriesId')
            ->join('product_images','product_images.ProductId','products.id')
            ->join('product_details','product_details.product_id',"=",'products.id')
            ->select('name','product_details.detail','storeType','storeId','categoriesId','product_images.productImages','product_details.price','products.id');

    }

    public function product_details()
    {
        return $this->hasMany(veveProductDetail::class,'product_id')->select(array('product_id','price'));;
    }
    public function productImages()
    {
        return $this->hasMany(veveProductImage::class,'ProductId')->select(array('ProductId','productImages'));;
    }
}
