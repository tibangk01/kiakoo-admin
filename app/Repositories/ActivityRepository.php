<?php

namespace App\Repositories;

use Spatie\Activitylog\Models\Activity;

class ActivityRepository
{
    protected $entity;

    public function __construct()
    {
        $this->entity = new Activity;
    }

    public function withIndexRelation()
    {
        return $this
            ->entity
            ->orderBy('id', 'desc')
            ->get();
    }

    public function withShowRelation($id)
    {
        return $this
            ->entity
            ->with(['causer.employee.human'])
            ->where('id', $id)
            ->orderByDesc('id')
            ->first();
    }

    public function findWhere($id)
    {
        return $this
            ->entity
            ->where('causer_id', $id)
            ->orderByDesc('id')
            ->get();
    }
}
