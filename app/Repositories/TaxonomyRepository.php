<?php

namespace App\Repositories;

use App\Models\Taxonomy;
use AwesIO\Repository\Eloquent\BaseRepository;

class TaxonomyRepository extends BaseRepository
{
    public function entity()
    {
        return Taxonomy::class;
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
