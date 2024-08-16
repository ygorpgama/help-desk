<?php

namespace App\Repositories;

use App\Interfaces\TaskRepositoryContract;
use App\Models\Task;
use Illuminate\Database\Eloquent\Collection;

class TaskRepository implements TaskRepositoryContract {
    public function create(int $userId, int $technicianId, int $causeId, string $description, ?string $image = null): Task{
        $newTask = Task::create([
            "user_id" => $userId,
            "technician_id" => $technicianId,
            "cause_id" => $causeId,
            "image_link" => $image,
            "description" => $description
        ]);
        return $newTask;
    }

    public function findAll(): Collection
    {
        return Task::all();
    }

    public function findById(int $taskId): ?Task{
        return Task::find($taskId);
    }

    public function update(Task $task, string $description, int $causeId, string | null $imageLink){
        $task->description = $description;
        $task->cause_id = $causeId;
        $task->image_link = $imageLink;
        $task->save();
        return $task;
    }

    public function delete(Task $task): Task
    {
        $task->status = false;
        $task->save();
        return $task;
    }
}
