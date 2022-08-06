<?php

namespace App\Repositories;

use App\Models\TaxonChild;
use AwesIO\Repository\Eloquent\BaseRepository;

class TaxonChildRepository extends BaseRepository
{
    public function entity()
    {
        return TaxonChild::class;
    }

    public function pluck()
    {
        return $this
            ->entity
            ->orderBy('name')
            ->pluck('name', 'id');
    }

    public function whereTaxonChildNameBelongsToTaxon($name, $taxonId)
    {
        return $this
            ->entity
            ->where('taxon_id', $taxonId)
            ->where('name', $name)
            ->first() ? true : false;
    }
}
