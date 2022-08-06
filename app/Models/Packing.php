<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Packing
 * 
 * @property int $id
 * @property string $name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|Variation[] $variations
 *
 * @package App\Models
 */
class Packing extends Model
{
	protected $table = 'packings';

	protected $fillable = [
		'name'
	];

	public function variations()
	{
		return $this->hasMany(Variation::class);
	}
}
