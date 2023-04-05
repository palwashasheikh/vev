<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Menu
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $user_id
 * @property int|null $parent_id
 * @property string|null $menu_link
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property User|null $user
 * @property Menu|null $menu
 * @property Collection|Menu[] $menus
 *
 * @package App\Models
 */
class veveMenu extends Model
{
	protected $table = 'menus';

	protected $casts = [
		'user_id' => 'int',
		'parent_id' => 'int'
	];

	protected $fillable = [
		'name',
		'user_id',
		'parent_id',
		'menu_link'
	];

	public function user()
	{
		return $this->belongsTo(veveUser::class);
	}

	public function menu()
	{
		return $this->belongsTo(veveMenu::class, 'parent_id');
	}

	public function menus()
	{
		return $this->hasMany(veveMenu::class, 'parent_id');
	}
}
