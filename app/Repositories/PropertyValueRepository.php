<?php

namespace App\Repositories;

use App\Models\PropertyValue;
use AwesIO\Repository\Eloquent\BaseRepository;

class PropertyValueRepository extends BaseRepository
{
    public function entity()
    {
        return PropertyValue::class;
    }

    public function pluck()
    {
        return $this
            ->entity
            ->orderBy('name')
            ->pluck('name', 'id');
    }

    public function wherePropertyValueNameBelongsToProperty($name, $propertyId)
    {
        return $this
            ->entity
            ->where('property_id', $propertyId)
            ->where('name', $name)
            ->first() ? true : false;
    }
}
