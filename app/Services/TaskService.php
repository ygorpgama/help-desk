<?php

namespace App\Services;

use App\Http\Requests\TaskRequest;
use App\Interfaces\CauseRepositoryContract;
use App\Interfaces\TaskRepositoryContract;
use App\Interfaces\UserRepositoryContract;
use App\Models\Task;
use Illuminate\Support\Collection;

class TaskService{
    public function __construct(
        protected TaskRepositoryContract $taskInterface,
        private CauseRepositoryContract $causeInterface,
    ){}

    public function create(TaskRequest $taksItems){
        $user = 1;
        $task = null;
        if ($taksItems->has('image')) {
            $image = $taksItems->file('image');
            $fileName = time().$image->getClientOriginalName();
            $path = $image->storeAs('tasks/images', $fileName, 'public');
            $imageLink = '/storage/'.$path;
            $task = $this->taskInterface->create($user, $taksItems["cause_id"], $taksItems["description"],  $imageLink);
        }else{
            $task = $this->taskInterface->create($user, $taksItems["cause_id"], $taksItems["description"]);
        }
        return $task;
    }

    public function findById(int $taskId){
        return $this->taskInterface->findById($taskId, ["cause", "status", "technician", "user"]);
    }

    public function findAll(){
        return $this->taskInterface->findAll(1);
    }

    public function latestTasks(): Collection{
        return $this->taskInterface->findLatests(1);
    }

    public function countTasks(){
        return $this->taskInterface->countAll(1);
    }

    public function countCompletedTasks(){
        return $this->taskInterface->countCompleteds(1);
    }

    public function showCauses(){
        return $this->causeInterface->findAll();
    }

    public function update(Task $task, int $technician){
        return $this->taskInterface->update($task, $task->description, $task->cause_id, $task->image_link, $technician);
    }

    public function delete(int $id){
        $task = $this->taskInterface->findById($id);
        $this->taskInterface->delete($task);
    }

    public function findTaskWithoutTechnician(){
        return $this->taskInterface->findTaskWithoutTechnician();
    }
}
