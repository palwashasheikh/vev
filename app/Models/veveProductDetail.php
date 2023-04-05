<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductDetail
 *
 * @property int $id
 * @property int $product_id
 * @property string $product_code
 * @property string|null $details
 * @property int $category_id
 * @property int $stock_unit
 * @property float $price
 * @property float|null $discount
 * @property Carbon|null $discount_start
 * @property Carbon|null $discount_end
 * @property int $price_type_id
 * @property bool|null $is_featured
 * @property int|null $is_active
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Category $category
 * @property PricingType $pricing_type
 * @property Product $product
 * @property Collection|OrdersDetail[] $orders_details
 *
 * @package App\Models
 */
class veveProductDetail extends Model
{
	protected $table = 'product_details';

	protected $casts = [
		'product_id' => 'int',
		'category_id' => 'int',
		'stock_unit' => 'int',
		'price' => 'float',
		'discount' => 'float',
		'price_type_id' => 'int',
		'is_featured' => 'bool',
		'is_active' => 'int'
	];

	protected $dates = [
		'discount_start',
		'discount_end'
	];

	protected $fillable = [
		'product_id',
		'product_code',
		'details',
		'category_id',
		'stock_unit',
		'price',
		'discount',
		'discount_start',
		'discount_end',
		'price_type_id',
		'is_featured',
		'is_active'
	];

	public function category()
	{
		return $this->belongsTo(veveCategory::class);
	}

	public function pricing_type()
	{
		return $this->belongsTo(PricingType::class, 'price_type_id');
	}

	public function product()
	{
		return $this->belongsTo(veveProduct::class);
	}

	public function orders_details()
	{
		return $this->hasMany(OrdersDetail::class, 'product_id');
	}
}
