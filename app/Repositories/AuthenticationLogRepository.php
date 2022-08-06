<?php

namespace App\Repositories;

use Lab404\AuthChecker\Models\Login;

class AuthenticationLogRepository
{
    protected $entity;

    public function __construct()
    {
        $this->entity = new Login;
    }

    public function withIndexRelation()
    {
        return $this->entity->with([
            'user.employee.human',
            'device',
        ])->orderByDesc('id')->get();
    }
}
