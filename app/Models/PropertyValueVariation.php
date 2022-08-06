<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PropertyValueVariation
 *
 * @property int $property_value_id
 * @property int $variation_id
 * @property int $property_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property Property $property
 * @property PropertyValue $property_value
 * @property Variation $variation
 *
 * @package App\Models
 */
class PropertyValueVariation extends Model
{
	protected $table = 'property_value_variation';
	public $incrementing = false;

	protected $casts = [
		'property_value_id' => 'int',
		'variation_id' => 'int',
		'property_id' => 'int'
	];

	protected $fillable = [
		'property_value_id',
		'variation_id',
		'property_id'
	];

	public function property()
	{
		return $this->belongsTo(Property::class);
	}

	public function propertyValue()
	{
		return $this->belongsTo(PropertyValue::class);
	}

	public function variation()
	{
		return $this->belongsTo(Variation::class);
	}
}
