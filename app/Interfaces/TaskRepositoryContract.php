<?php

namespace App\Interfaces;

use App\Models\Task;
use Illuminate\Database\Eloquent\Collection;

interface TaskRepositoryContract
{
    public function create(int $userId, int $technicianId, int $causeId,  string $description, ?string $image = null): Task;
    public function findById(int $taskId): ?Task;
    public function update(Task $task, string $description, int $causeId, string | null $imageLink);
    public function delete(Task $task): Task;
    public function findAll(): Collection;
}
