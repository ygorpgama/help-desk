<?php

namespace App\Services;

use App\Http\Requests\TaskRequest;
use App\Interfaces\TaskRepositoryContract;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class TaskService{
    public function __construct(protected TaskRepositoryContract $taskInterface){}

    public function create(TaskRequest $taksItems){
        $user = 1;
        $task = null;
        if ($taksItems->has('image')) {
            $imageLink = null;
            dd($taksItems->image);
            $task = $this->taskInterface->create($user, $taksItems['technician_id'], $taksItems["cause_id"], $taksItems["description"],  $imageLink);
        }else{
            $task = $this->taskInterface->create($user, $taksItems['technician_id'], $taksItems["cause_id"], $taksItems["description"]);

        }
        return $task;
    }

    public function findAll(): Collection{
        return $this->taskInterface->findAll();
    }

    public function latestTasks(): Collection{
        return $this->taskInterface->findLatests(1);
    }

    public function countTasks(){
        return $this->taskInterface->countAll(1);
    }

    public function update(){

    }
}
