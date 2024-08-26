<?php

namespace App\Services;

use App\Http\Requests\TaskRequest;
use App\Interfaces\CauseRepositoryContract;
use App\Interfaces\TaskRepositoryContract;
use Illuminate\Support\Collection;

class TaskService{
    public function __construct(protected TaskRepositoryContract $taskInterface, private CauseRepositoryContract $causeInterface){}

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
        return $this->taskInterface->findById($taskId, ["cause", "status"]);
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

    public function update(){

    }
}
