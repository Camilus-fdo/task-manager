<?php

namespace App\Services;

use App\Repository\UserRepositoryInterface;

class UserService
{
    protected $userRepo;

    public function __construct(UserRepositoryInterface $userRepo) 
    {
        $this->userRepo = $userRepo;
    }

    public function getUsers()
    {
        return $this->userRepo->getAllUsers();
    }
}
