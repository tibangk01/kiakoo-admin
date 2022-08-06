<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class Human
 *
 * @property int $id
 * @property int $gender_id
 * @property string $first_name
 * @property string $last_name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property Gender $gender
 * @property Collection|Customer[] $customers
 * @property Collection|Employee[] $employees
 *
 * @package App\Models
 */
class Human extends Model
{
	protected $table = 'humans';

	protected $casts = [
		'gender_id' => 'int'
	];

	protected $fillable = [
		'gender_id',
		'first_name',
		'last_name'
	];

	public function gender()
	{
		return $this->belongsTo(Gender::class);
	}

	public function customers()
	{
		return $this->hasMany(Customer::class);
	}

	public function employees()
	{
		return $this->hasMany(Employee::class);
	}
}
