<?php

namespace App\Repository;

use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    public function getAllUsers()
    {
        return User::select('id', 'name')->get();
    }
}