<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use App\Models\Base\Banner as BaseBanner;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Banner extends BaseBanner implements HasMedia
{
    use InteractsWithMedia;

	protected $fillable = [
		'url'
	];

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
