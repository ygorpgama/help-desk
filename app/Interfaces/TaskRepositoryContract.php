<?php

namespace App\Interfaces;

use App\Models\Task;

interface TaskRepositoryContract
{
    public function createOne(int $userId, int $technicianId, int $causeId, string $image = null, bool $status = true,string $description): Task;
    public function findById(int $taskId):Task;
    public function updateOne(Task $task, string $description, int $causeId, string | null $imageLink);
    public function deleteOne(Task $task): Task;
}
