<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Property
 *
 * @property int $id
 * @property bool $is_technical
 * @property string $name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property Collection|Product[] $products
 * @property Collection|Variation[] $variations
 * @property Collection|PropertyValue[] $property_values
 *
 * @package App\Models
 */
class Property extends Model
{
	protected $table = 'properties';

	protected $casts = [
		'is_technical' => 'bool'
	];

	protected $fillable = [
		'is_technical',
		'name'
	];

	public function products()
	{
		return $this->belongsToMany(Product::class)
					->withTimestamps();
	}

	public function variations()
	{
		return $this->belongsToMany(Variation::class, 'property_value_variation')
					->withPivot('property_value_id');
	}

	public function propertyValues()
	{
		return $this->hasMany(PropertyValue::class);
	}
}
