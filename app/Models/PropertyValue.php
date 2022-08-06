<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PropertyValue
 * 
 * @property int $id
 * @property int $property_id
 * @property string $name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Property $property
 * @property Collection|Product[] $products
 * @property Collection|Variation[] $variations
 *
 * @package App\Models
 */
class PropertyValue extends Model
{
	protected $table = 'property_values';

	protected $casts = [
		'property_id' => 'int'
	];

	protected $fillable = [
		'property_id',
		'name'
	];

	public function property()
	{
		return $this->belongsTo(Property::class);
	}

	public function products()
	{
		return $this->belongsToMany(Product::class)
					->withTimestamps();
	}

	public function variations()
	{
		return $this->belongsToMany(Variation::class)
					->withPivot('property_id');
	}
}
