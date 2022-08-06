<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Collection;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * Class Taxonomy
 *
 * @property int $id
 * @property string $name
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @property Collection|Taxon[] $taxons
 *
 * @package App\Models
 */
class Taxonomy extends Model implements HasMedia
{
    use InteractsWithMedia;

	protected $table = 'taxonomies';

	protected $fillable = [
		'name'
	];

  public function registerMediaCollections(): void
  {
        $this
            ->addMediaCollection('taxonomies')
            ->singleFile()
            ->registerMediaConversions(function (Media $media) {
                $this
                    ->addMediaConversion('thumb')
                    ->nonQueued()
                    ->width(130)
                    ->height(130);
            });
  }

	public function taxons()
	{
		return $this->hasMany(Taxon::class);
	}
}
