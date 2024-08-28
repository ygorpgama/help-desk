<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Interfaces\TaskRepositoryContract;
use App\Models\Task;
use App\Services\CauseService;
use App\Services\TaskService;
use App\Services\UserService;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function __construct(private TaskService $taskService, private CauseService $causeService, private UserService $userService)
    {

    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.chamados', [
            'tasks' =>  $this->taskService->findAll()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.task-create', ["taskCauses" => $this->taskService->showCauses()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskRequest $request)
    {
        try {
            $task = $this->taskService->create($request);
            return redirect()->route('task.index')->with(["success" => "Chamado #{$task->id} aberto com sucesso"]);
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        try {
           return view('pages.task', ["task" => $this->taskService->findById($task->id)]);
        } catch (\Throwable $th) {
           return redirect('/');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $request->validate([
            "technician_id" => ['required', 'integer']
        ]);

        try {
            $this->taskService->update($task, $request->technician_id);
            return redirect()->route('admin.tasks')->with(["success" => "Chamada designado ao tecnico com sucesso"]);
        } catch (\Throwable $th) {
            return redirect()->route('admin.tasks.edit', $task->id)->with(["failed" => "Ocorreu um problema na designação por favor tente novamente mais tarde"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $this->taskService->delete($task->id);
        return redirect()->route('task.index')->with(['success' => "Chamado cancelado com sucesso"]);
    }

    /**
     *   Display a listing of the resource to the admin.
     */
    public function indexAdmin(){
        return view('pages.task-admin', [
            "tasks" => $this->taskService->findTaskWithoutTechnician()
        ]);
    }

    public function editAdmin(Task $task){
        return view('pages.task-admin-create', [
            "users" => $this->userService->findAllActiveUsersTechinician(),
            'task' =>  $this->taskService->findById($task->id)
        ]);
    }
}
