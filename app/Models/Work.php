<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;


/**
 * Class Work
 *
 * @property int $id
 * @property string $name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property Collection|Employee[] $employees
 *
 * @package App\Models
 */
class Work extends Model
{


	protected $table = 'works';

	protected $fillable = [
		'name'
	];

	public function employees()
	{
		return $this->hasMany(Employee::class);
	}
}
