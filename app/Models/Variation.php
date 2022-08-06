<?php

namespace App\Models;

use App\Models\Base\Variation as BaseVariation;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Variation extends BaseVariation implements HasMedia
{
    use InteractsWithMedia;

	protected $fillable = [
		'state_id',
		'product_id',
		'packing_id',
		'sku',
		'name',
		'description',
		'price',
		'stock',
		'units_sold',
		'is_published',
		'picture_changed',
		'last_sale'
	];

    public function discount()
    {
        return $this->morphOne(Discount::class, 'discountable');
    }

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('variations')
            ->registerMediaConversions(function (Media $media) {
                $this
                    ->addMediaConversion('slides')
                    ->width(310)
                    ->height(470)
                    ->nonQueued();

                $this
                    ->addMediaConversion('thumb')
                    ->width(200)
                    ->height(200)
                    ->nonQueued();
            });
    }
}
