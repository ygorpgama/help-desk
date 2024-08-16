<?php

namespace Tests\Feature;

use App\Models\Cause;
use App\Models\Group;
use App\Models\Task;
use App\Models\User;
use App\Repositories\TaskRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TaskTest extends TestCase
{
    use WithFaker;
    use RefreshDatabase;
    /**
     * @test
     */
    public function it_should_create_a_new_task_on_the_database(): void
    {
        $testUser = User::factory()->for(Group::factory()->create())->create();
        $technicianUser = User::factory()->for(Group::factory()->create())->create();
        $cause = Cause::factory()->create();

        $taskData = [
            "userId" => $testUser->id,
            "technicianId" => $technicianUser->id,
            "causeId" => $cause->id,
            "description" => $this->faker()->text(),
            "image" => null
        ];

        $taskRepository = new TaskRepository();

        $task = $taskRepository->create(...$taskData);

        $this->assertInstanceOf(Task::class, $task);
    }

    /**
     * @test
     */
    public function it_should_soft_delete_the_task(){
        $task = Task::factory()->create();

        $taskRepository = new TaskRepository();

        $deletedTask = $taskRepository->delete($task);

        $taskOnDatabase = $taskRepository->findById($task->id);

        $this->assertEquals($deletedTask->status, $taskOnDatabase->status);
    }

    /**
     * @test
     */
    public function it_should_return_a_task(){
        $createdTask = Task::factory()->create();

        $taskRepository = new TaskRepository();

        $task = $taskRepository->findById($createdTask->id);

        $this->assertNotNull($task);
        $this->assertNotEmpty($task);
    }

    /**
     * @test
     */
    public function it_should_update_a_task(){
        $taskCreated = Task::factory()->create();
        $cause = Cause::factory()->create();

        $taskRepository = new TaskRepository();

        $oldDescription = $taskCreated->description;
        $oldCause = $taskCreated->cause_id;

        $updatedTask = $taskRepository->update($taskCreated, "Changed description",  $cause->id, null);

        $this->assertNotEquals([$oldDescription, $oldCause], [$updatedTask->description, $updatedTask->cause_id]);
    }

    /**
     * @test
     */
    public function it_should_return_all_tasks(){
        Task::factory()->create();

        $taskRepository = new TaskRepository();

        $this->assertNotEmpty($taskRepository->findAll());
    }
}

