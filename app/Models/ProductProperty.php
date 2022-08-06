<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductProperty
 * 
 * @property int $product_id
 * @property int $property_id
 * @property int $created_at
 * @property int $updated_at
 * 
 * @property Product $product
 * @property Property $property
 *
 * @package App\Models
 */
class ProductProperty extends Model
{
	protected $table = 'product_property';
	public $incrementing = false;

	protected $casts = [
		'product_id' => 'int',
		'property_id' => 'int',
		'created_at' => 'int',
		'updated_at' => 'int'
	];

	protected $fillable = [
		'product_id',
		'property_id'
	];

	public function product()
	{
		return $this->belongsTo(Product::class);
	}

	public function property()
	{
		return $this->belongsTo(Property::class);
	}
}
