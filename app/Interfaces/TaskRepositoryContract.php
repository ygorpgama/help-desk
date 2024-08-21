<?php

namespace App\Interfaces;

use App\Models\Task;
use Illuminate\Database\Eloquent\Collection;

interface TaskRepositoryContract
{
    public function create(int $user_id, int $technician_id, int $cause_id,  string $description, ?string $image_link = null);
    public function findById(int $taskId): ?Task;
    public function update(Task $task, string $description, int $causeId, string | null $imageLink);
    public function delete(Task $task): Task;
    public function findAll(): Collection;
    public function findLatests(int $user_id): Collection;
    public function countAll(int $user_id);
}
