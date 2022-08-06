<?php

namespace App\Repositories;

use App\Models\Role;
use AwesIO\Repository\Eloquent\BaseRepository;

class RoleRepository extends BaseRepository
{
    public function entity()
    {
        return Role::class;
    }

    public function orderDesc()
    {
        return $this
            ->entity
            ->orderBy('id', 'desc')
            ->get();
    }

    public function withPermissions($id)
    {
        return $this
            ->entity
            ->where('id', $id)
            ->with(['permissions'])
            ->first();
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
