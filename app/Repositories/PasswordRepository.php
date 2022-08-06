<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PasswordRepository
{
    protected $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function isValid(int $userId, string $passwordToVerify): bool
    {
        return Hash::check(
            $passwordToVerify,
            $this->user->whereId($userId)->first()->password
        );
    }

    public function update(int $userId, $passwordToUpdate): bool
    {
        return ($this->user
            ->whereId($userId)
            ->update([
                'password' => Hash::make($passwordToUpdate)
            ]) > 0) ? true : false;
    }
}
