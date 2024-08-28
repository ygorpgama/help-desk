<?php

namespace App\Repositories;

use App\Interfaces\UserRepositoryContract;
use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class UserRepository implements UserRepositoryContract {
    public function create(string $name, string $email, string $password, int $group_id)
    {

    }

    public function findAll()
    {

    }

    public function findById(int $user)
    {

    }

    public function update(User $user)
    {

    }

    public function delete(User $user){}

    public function findAllTechniciansUsers(){
        return User::where('group_id',  2)->get();
    }
}
