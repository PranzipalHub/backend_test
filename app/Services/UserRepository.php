<?php

namespace App\Services;

use App\Models\User;

class UserRepository
{
    public function create(array $data): User
    {
        $user = User::create($data);

        return $user;
    }
}
