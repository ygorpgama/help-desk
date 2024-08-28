<?php

namespace App\Interfaces;

use App\Models\Task;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;

interface TaskRepositoryContract
{
    public function create(int $user_id, int $cause_id,  string $description, ?string $image_link = null);
    public function findById(int $taskId, ?array $relation = null): ?Task;
    public function update(Task $task,  string $description, int $causeId, string | null $imageLink, ?int $technician = null);
    public function delete(Task $task): Task;
    public function findAll(?int $user_id = null);
    public function findLatests(int $user_id): Collection;
    public function countAll(int $user_id);
    public function countCompleteds(int $user_id);
    public function findTaskWithoutTechnician(): \Illuminate\Contracts\Pagination\LengthAwarePaginator;
}
