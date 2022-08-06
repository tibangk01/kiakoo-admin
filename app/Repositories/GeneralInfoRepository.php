<?php

namespace App\Repositories;

use App\Models\User;

class GeneralInfoRepository
{
    protected $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function get($userId)
    {
        return $this
            ->user
            ->whereId($userId)->first();
    }

    public function update($userId, $dataToUpdate)
    {
        return (($this->user->whereId($userId)->update(['name' => $dataToUpdate->name])) > 0) ? true : false;
    }
}
