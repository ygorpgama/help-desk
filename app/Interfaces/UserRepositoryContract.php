<?php

namespace App\Interfaces;

use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface UserRepositoryContract {
    public function findAll();
    public function create(string $name, string $email, string $password, int $group_id);
    public function findById(int $user);
    public function update(User $user);
    public function delete(User $user);
    public function findAllTechniciansUsers();
}
