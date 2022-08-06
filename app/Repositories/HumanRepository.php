<?php

namespace App\Repositories;

use App\Models\Human;
use AwesIO\Repository\Eloquent\BaseRepository;

class HumanRepository extends BaseRepository
{
    public function entity()
    {
        return Human::class;
    }
}
