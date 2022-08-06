<?php

namespace App\Repositories;

use App\Models\Product;
use AwesIO\Repository\Eloquent\BaseRepository;

class ProductRepository extends BaseRepository
{
    public function entity()
    {
        return Product::class;
    }

    public function pluck()
    {
        return $this
            ->entity
            ->orderBy('name', 'desc')
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
