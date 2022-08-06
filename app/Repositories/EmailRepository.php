<?php

namespace App\Repositories;

use App\Models\User;

class EmailRepository
{
    protected $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function isValid(int $userId,  string $emailToVerify): bool
    {
        return ($this->user->whereId($userId)->whereEmail($emailToVerify)->count() > 0) ? true : false;
    }

    public function update(int $userId, $emailToUpdate): bool
    {
        return ($this->user
            ->whereId($userId)
            ->update([
                'email' => $emailToUpdate,
                'email_verified_at' => null,
            ]));
    }
}
