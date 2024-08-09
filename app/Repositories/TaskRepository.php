<?php

namespace App\Repositories;

use App\Interfaces\TaskRepositoryContract;
use App\Models\Task;

class TaskRepository implements TaskRepositoryContract {
    public function createOne(int $userId, int $technicianId, int $causeId, string $image = null, bool $status = true, string $description): Task{
        $newTask = Task::create([
            "status" => $status,
            "user_id" => $userId,
            "technician_id" => $technicianId,
            "cause_id" => $causeId,
            "image_link" => $image,
            "status" => $status,
            "description" => $description
        ]);
        return $newTask;
    }

    public function findById(int $taskId): Task{
        return Task::find($taskId);
    }

    public function updateOne(Task $task, string $description, int $causeId, string | null $imageLink){
        $task->description = $description;
        $task->cause_id = $causeId;
        $task->image_link = $imageLink;
        $task->save();
        return $task;
    }

    public function deleteOne(Task $task): Task
    {
        $task->status = false;
        return $task;
    }
}
