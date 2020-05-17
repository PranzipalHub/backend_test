<?php

namespace App\Services;

use App\Models\User;
use App\Services\Contracts\IModelCreator;

class UserCreator implements IModelCreator
{
    public function create(array $data): User
    {
        $user = User::create($data);

        return $user;
    }
}
