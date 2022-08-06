<?php

namespace App\Repositories;

use App\Models\User;
use AwesIO\Repository\Eloquent\BaseRepository;

class UserRepository extends BaseRepository
{
    public function entity()
    {
        return User::class;
    }

    public function verifiedAt($id)
    {
        return $this->entity->where('id', $id)->get(['email_verified_at'])->first()->email_verified_at;
    }

    public function employeeEmailNotUnique($email)
    {
        return $this->entity->where('id', config('kiakoo.user_type.employee'))
            ->where('email', $email)
            ->first() ? true : false;
    }

    public function emailExists($email)
    {
        return $this->entity
            ->where('email', $email)
            ->first() ? true : false;
    }
}
