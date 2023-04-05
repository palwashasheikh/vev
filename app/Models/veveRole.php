<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Role
 *
 * @property int $id
 * @property string $role_name
 * @property int $is_active
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Collection|User[] $users
 *
 * @package App\Models
 */
class veveRole extends Model
{
	protected $table = 'roles';

	protected $casts = [
		'is_active' => 'int'
	];

	protected $fillable = [
		'role_name',
		'is_active'
	];

	public function vendors()
	{
		return $this->hasMany(veveVendor::class);
	}
}
