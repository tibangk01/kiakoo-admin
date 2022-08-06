<?php

namespace App\Repositories;

use App\Models\Permission;
use AwesIO\Repository\Eloquent\BaseRepository;

class PermissionRepository extends BaseRepository
{
    public function entity()
    {
        return Permission::class;
    }

    public function orderDesc()
    {
        return $this
            ->entity
            ->orderBy('id', 'desc')
            ->get();
    }

    public function pluck()
    {
        return $this
            ->entity
            ->orderBy('name')
            ->pluck('name', 'id');
    }

    public function findWhereIn($ids)
    {
        return $this
            ->entity
            ->whereIn('id', $ids)
            ->get(['name'])
            ->map(function ($permission) {
                return $permission->name;
            })
            ->toArray();
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
