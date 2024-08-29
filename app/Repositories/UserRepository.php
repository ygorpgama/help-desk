<?php

namespace App\Repositories;

use App\Interfaces\UserRepositoryContract;
use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserRepositoryContract {
    public function create(string $name, string $email, string $password, int $group_id)
    {
        User::create([
            "name" => $name,
            "email" => $email,
            "password" => Hash::make($password),
            "group_id" => $group_id
        ]);
    }

    public function findAll()
    {
        return User::with('group')->paginate(12);
    }

    public function findById(int $user)
    {
        return User::findOrFail($user);
    }

    public function update(User $user)
    {

    }

    public function delete(User $user){}

    public function findAllTechniciansUsers(){
        return User::where('group_id',  2)->get();
    }
}
