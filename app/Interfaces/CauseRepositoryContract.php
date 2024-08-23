<?php

namespace App\Interfaces;

use App\Models\Cause;

interface CauseRepositoryContract {
    public function findAll();
    public function findById(int $cause_id);
    public function create(string $description);
    public function update(Cause $cause, string $newDescription);
    public function delete(Cause $cause);
}
