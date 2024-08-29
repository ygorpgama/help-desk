<?php

namespace App\Services;

use App\Interfaces\UserRepositoryContract;

class UserService {
    private  const DEFAULT_PASSWORD = 'HelpDesk';
    public function __construct(private UserRepositoryContract $userInterface)
    {

    }

    public function findAllActiveUsersTechinician(){
        return $this->userInterface->findAllTechniciansUsers();
    }

    public function create(array $userItems){
        return $this->userInterface->create(
            $userItems['name'], $userItems['email'],
            array_key_exists('password', $userItems) ? $userItems['password'] : UserService::DEFAULT_PASSWORD,
            $userItems["group_id"]
        );
    }


    public function findAll(){
        return $this->userInterface->findAll();
    }
}
