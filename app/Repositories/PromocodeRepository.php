<?php

namespace App\Repositories;

use App\Models\Promocode as PromocodeModel;
use AwesIO\Repository\Eloquent\BaseRepository;

class PromocodeRepository extends BaseRepository
{
    public function entity()
    {
        return PromocodeModel::class;
    }

    public function pluck()
    {
        return $this
            ->entity
            ->orderBy('name')
            ->pluck('name', 'id');
    }

    public function codeExists($code)
    {
        return $this
            ->entity
            ->where('code', $code)
            ->first() ? true : false;
    }

    public function codeRelatedToId($code, $id)
    {
        return $this
            ->entity
            ->where('id', $id)
            ->where('code', $code)
            ->first() ? true : false;
    }

    public function codeExpired($code)
    {
        return $this
            ->entity
            ->where('code', $code)
            ->where('expires_at', '<', now())
            ->first() ? true : false;
    }

    public function codeQuantityReached($code)
    {
        return $this
            ->entity
            ->where('code', $code)
            ->where('quantity', 0)
            ->first() ? true : false;
    }
}
