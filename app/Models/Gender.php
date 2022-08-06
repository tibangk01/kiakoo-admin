<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class Gender
 *
 * @property int $id
 * @property string $name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property Collection|Human[] $humans
 *
 * @package App\Models
 */
class Gender extends Model
{
	protected $table = 'genders';

	protected $fillable = [
		'name'
	];

	public function humans()
	{
		return $this->hasMany(Human::class);
	}
}
