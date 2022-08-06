<?php

namespace App\Repositories;

use App\Models\Employee;
use Illuminate\Support\Facades\DB;
use AwesIO\Repository\Eloquent\BaseRepository;

class EmployeeRepository extends BaseRepository
{
    public function entity()
    {
        return Employee::class;
    }

    public function withIndexRelations()
    {
        return $this->entity->with([
            'user', 'human',
        ])->orderBy('created_at', 'desc')->get();
    }

    public function withShowRelations($id)
    {
        return $this->entity->with([
            'user.roles',
            'user.permissions',
            'human.gender',
            'work',
        ])->find($id);
    }

    public function withEditRelations($id)
    {
        return $this->entity->with([
            'user.roles',
            'user.permissions',
            'human.gender',
            'work',
        ])->find($id);
    }

    public function withDeleteRelations($id)
    {
        return $this->entity->with([
            'user.roles',
            'user.permissions',
            'human.gender',
            'work',
        ])->find($id);
    }

    public function emailOwner($id, $email)
    {
        return DB::table('users')
            ->join('employees', 'users.id', '=', 'employees.user_id')
            ->where('users.email', '=', $email)
            ->where('employees.id', '=', $id)
            ->select('users.id')
            ->first() ? true : false;
    }

    public function phoneNumberExists($phoneNumber)
    {
        return $this
            ->entity
            ->where('phone_number', $phoneNumber)
            ->first() ? true : false;
    }

    public function phoneNumberOwner($id, $phoneNumber)
    {
        return $this->entity
            ->where('id', $id)
            ->where('phone_number', $phoneNumber)
            ->first() ? true : false;
    }
}
