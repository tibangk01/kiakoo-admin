<?php

namespace App\Repositories;

use App\Models\Property;
use AwesIO\Repository\Eloquent\BaseRepository;

class PropertyRepository extends BaseRepository
{
    public function entity()
    {
        return Property::class;
    }

    public function pluck()
    {
        return $this
            ->entity
            ->orderBy('name')
            ->pluck('name', 'id');
    }

    public function nameExists($name)
    {
        return $this
            ->entity
            ->where('name', $name)
            ->first() ? true : false;
    }

    public function nameRelatedToId($name, $id)
    {
        return $this
            ->entity
            ->where('id', $id)
            ->where('name', $name)
            ->first() ? true : false;
    }
}
