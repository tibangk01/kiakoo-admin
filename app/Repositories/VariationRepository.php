<?php

namespace App\Repositories;

use App\Models\Variation;
use AwesIO\Repository\Eloquent\BaseRepository;

class VariationRepository extends BaseRepository
{
    public function entity()
    {
        return Variation::class;
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

    public function skuExists($sku)
    {
        return $this
            ->entity
            ->where('sku', $sku)
            ->first() ? true : false;
    }

    public function skuRelatedToId($sku, $id)
    {
        return $this
            ->entity
            ->where('id', $id)
            ->where('sku', $sku)
            ->first() ? true : false;
    }

    public function pictureChanged($id)
    {
        return $this
            ->entity
            ->where('id', $id)
            ->first()->picture_changed ? true : false;
    }

    public function stockEmpty($id)
    {
        return $this
            ->entity->where('id', $id)
            ->first()->stock === 0 ? true : false;
    }
}
