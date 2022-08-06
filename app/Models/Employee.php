<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Employee
 * 
 * @property int $id
 * @property int $user_id
 * @property int $human_id
 * @property int $work_id
 * @property string $phone_number
 * @property string $address
 * @property string|null $temporary_password
 * @property bool $password_changed
 * @property bool $authorized_to_log_in
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property User $user
 * @property Human $human
 * @property Work $work
 *
 * @package App\Models
 */
class Employee extends Model
{
	protected $table = 'employees';

	protected $casts = [
		'user_id' => 'int',
		'human_id' => 'int',
		'work_id' => 'int',
		'password_changed' => 'bool',
		'authorized_to_log_in' => 'bool'
	];

	protected $hidden = [
		'temporary_password'
	];

	protected $fillable = [
		'user_id',
		'human_id',
		'work_id',
		'phone_number',
		'address',
		'temporary_password',
		'password_changed',
		'authorized_to_log_in'
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function human()
	{
		return $this->belongsTo(Human::class);
	}

	public function work()
	{
		return $this->belongsTo(Work::class);
	}
}
