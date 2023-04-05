<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class StoreImage
 *
 * @property int $id
 * @property int|null $store_id
 * @property string|null $banner
 * @property string|null $logo
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Store|null $store
 *
 * @package App\Models
 */
class veveProductImage extends Model
{
	protected $table = 'product_images';

	protected $casts = [
		'ProductId' => 'int'
	];

	protected $fillable = [
		'ProductId',
		'productImages',
	];

	public function products()
	{
		return $this->belongsTo(veveProduct::class);
	}
}
