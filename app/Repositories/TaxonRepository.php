<?php

namespace App\Repositories;

use App\Models\Taxon;
use AwesIO\Repository\Eloquent\BaseRepository;

class TaxonRepository extends BaseRepository
{
    public function entity()
    {
        return Taxon::class;
    }

    public function pluck()
    {
        return $this
            ->entity
            ->orderBy('name')
            ->pluck('name', 'id');
    }

    public function whereTaxonNameBelongsToTaxonomy($name, $taxonomyId)
    {
        return $this
            ->entity
            ->where('taxonomy_id', $taxonomyId)
            ->where('name', $name)
            ->first() ? true : false;
    }
}
