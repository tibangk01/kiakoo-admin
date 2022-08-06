<?php

namespace App\Repositories;

use App\Models\Discount;
use AwesIO\Repository\Eloquent\BaseRepository;

class DiscountRepository extends BaseRepository
{
    public function entity()
    {
        return Discount::class;
    }

    public function pluck()
    {
        return $this
            ->entity
            ->orderBy('name')
            ->pluck('name', 'id');
    }

    public function exists($discountableId)
    {
        return $this
        ->entity
        ->where('discountable_id', $discountableId)
        ->first() ? true : false;
    }
}
