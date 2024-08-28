<?php

namespace App\Services;

use App\Interfaces\UserRepositoryContract;

class UserService {
    public function __construct(private UserRepositoryContract $userInterface)
    {

    }

    public function findAllActiveUsersTechinician(){
        return $this->userInterface->findAllTechniciansUsers();
    }

}
