<?php

namespace Tests\Feature;

use App\Http\Requests\TaskRequest;
use App\Models\Cause;
use App\Models\Group;
use App\Models\Task;
use App\Models\User;
use App\Repositories\TaskRepository;
use App\Services\TaskService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Mockery\MockInterface;

class TaskTest extends TestCase
{
    use WithFaker;
    use RefreshDatabase;
    use WithoutMiddleware;

    public function test_it_should_create_a_new_task_on_the_database(): void
    {
        $testUser = User::factory()->for(Group::factory()->create())->create();
        $technicianUser = User::factory()->for(Group::factory()->create())->create();
        $cause = Cause::factory()->create();

        $taskData = [
            "user_id" => $testUser->id,
            "technician_id" => $technicianUser->id,
            "cause_id" => $cause->id,
            "description" => $this->faker()->text(),
            "image_link" => null
        ];

        $taskRepository = new TaskRepository();

        $task = $taskRepository->create(...$taskData);

        $this->assertInstanceOf(Task::class, $task);
    }


    public function text_it_should_soft_delete_the_task(){
        $task = Task::factory()->create();

        $taskRepository = new TaskRepository();

        $deletedTask = $taskRepository->delete($task);

        $taskOnDatabase = $taskRepository->findById($task->id);

        $this->assertEquals($deletedTask->status, $taskOnDatabase->status);
    }

    public function test_it_should_return_a_task(){
        $createdTask = Task::factory()->create();

        $taskRepository = new TaskRepository();

        $task = $taskRepository->findById($createdTask->id);

        $this->assertNotNull($task);
        $this->assertNotEmpty($task);
    }


    public function test_it_should_update_a_task(){
        $taskCreated = Task::factory()->create();
        $cause = Cause::factory()->create();

        $taskRepository = new TaskRepository();

        $oldDescription = $taskCreated->description;
        $oldCause = $taskCreated->cause_id;

        $updatedTask = $taskRepository->update($taskCreated, "Changed description",  $cause->id, null);

        $this->assertNotEquals([$oldDescription, $oldCause], [$updatedTask->description, $updatedTask->cause_id]);
    }


    public function test_it_should_return_all_tasks(){
        Task::factory()->create();

        $taskRepository = new TaskRepository();

        $this->assertNotEmpty($taskRepository->findAll());
    }

    public function test_it_should_redirect_after_a_task_is_created(){
        $user = User::factory()->create([
            "id" => 1
        ]);
        $techinician = User::factory()->create();
        $cause = Cause::factory()->create();

        $this->actingAs($user, 'web')->post('task', [
            "technician_id" => $techinician->id,
            "cause_id" => $cause->id,
            "description" => "Lorem Ipsum",
        ])->assertRedirectToRoute('task.index')->assertSessionHas(["success" => "Chamado #5 aberto com sucesso"]);
    }

    public function test_it_should_return_task_page(){
        $user = User::factory()->create();
        $this->actingAs($user, 'web')->get('task')->assertSuccessful('task.index');
    }


}

