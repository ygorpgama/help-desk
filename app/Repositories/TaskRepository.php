<?php

namespace App\Repositories;

use App\Interfaces\TaskRepositoryContract;
use App\Models\Task;
use Illuminate\Database\Eloquent\Collection;

class TaskRepository implements TaskRepositoryContract {
    public function create(int $user_id, int $cause_id, string $description, ?string $image_link = null){
        $task = new Task();
        $task->user_id = $user_id;
        $task->cause_id = $cause_id;
        $task->description = $description;
        $task->image_link = $image_link;
        $task->status_task_id = 1;

        $task->save();
        return $task;
    }

    public function findAll(int $user_id)
    {
        return Task::with(['cause', 'status'])->where('user_id', $user_id)->paginate(12);
    }

    public function findById(int $taskId): ?Task{
        return Task::find($taskId);
    }

    public function update(Task $task, string $description, int $cause_id, string | null $image_link){
        $task->description = $description;
        $task->cause_id = $cause_id;
        $task->image_link = $image_link;
        $task->save();
        return $task;
    }

    public function delete(Task $task): Task
    {
        $task->status = false;
        $task->save();
        return $task;
    }

    public function countAll(int $user_id)
    {
        return Task::where('user_id', $user_id)->count();
    }

    public function countCompleteds(int $user_id){
        return Task::where('user_id', $user_id)->where('status_task_id', 1)->count();
    }

    public function findLatests(int $user_id): Collection
    {
        return Task::with(["cause", "status"])->where('user_id', $user_id)->orderBy('id', 'DESC')->limit(5)->get();
    }

}
