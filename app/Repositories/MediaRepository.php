<?php

namespace App\Repositories;

use AwesIO\Repository\Eloquent\BaseRepository;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class MediaRepository extends BaseRepository
{
    public function entity()
    {
        return Media::class;
    }

    public function countWhereModel($id)
    {
        return $this
            ->entity
            ->where('model_id', $id)
            ->get()->count();
    }
}
