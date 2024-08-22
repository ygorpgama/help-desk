<?php

namespace App\Http\Controllers;

use App\Services\TaskService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct(protected TaskService $taskService)
    {

    }

    public function index(){
        return view('pages.dashboard',
        [
            "latestsTasks" => $this->taskService->latestTasks(),
            "countTasks" => $this->taskService->countTasks(),
            "completedsTasks" => $this->taskService->countCompletedTasks(),
        ]
    );
    }
}
