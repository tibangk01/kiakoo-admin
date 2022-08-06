<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Promocode
 * 
 * @property int $id
 * @property string $code
 * @property float|null $reward
 * @property int|null $quantity
 * @property string|null $data
 * @property bool $is_disposable
 * @property Carbon|null $expires_at
 * 
 * @property Collection|User[] $users
 *
 * @package App\Models
 */
class Promocode extends Model
{
	protected $table = 'promocodes';
	public $timestamps = false;

	protected $casts = [
		'reward' => 'float',
		'quantity' => 'int',
		'is_disposable' => 'bool'
	];

	protected $dates = [
		'expires_at'
	];

	protected $fillable = [
		'code',
		'reward',
		'quantity',
		'data',
		'is_disposable',
		'expires_at'
	];

	public function users()
	{
		return $this->belongsToMany(User::class)
					->withPivot('id', 'used_at');
	}
}
