<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Attribute
 *
 * @property int $id
 * @property string|null $attr_name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Collection|Product[] $products
 *
 * @package App\Models
 */
class veveProductmodifer extends Model
{
	protected $table = 'productmodifiers';
    protected $hidden=['pivot','CreatedAt','UpdateAt'];
	protected $fillable = [
		'Attribute'
	];
    public function product()
    {
        return $this->belongsTo(veveProduct::class);
    }


}
