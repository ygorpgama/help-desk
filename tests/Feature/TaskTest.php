<?php

namespace Tests\Feature;

use App\Models\Group;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TaskTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_task_creation_query(): void
    {
        $testUser = User::factory()->for(Group::factory()->create())->create();
        $technicianUser = User::factory()->for(Group::factory()->create())->create();

        $taskOutput = [
            "id" => 1,
            "description" => "Something",
            "cause_id" => null,
            "image_link" => null,
            "user_id" => 1,
            "technician_id" => 2,
            "status" => 1,
        ];

        $taskCreated = [
            "id" => 1,
            "description" => "Something",
            "cause_id" => null,
            "image_link" => null,
            "user_id" => $testUser->id,
            "technician_id" => $technicianUser->id,
            "status" => 1,
        ];


        $this->assertSame(
            $taskOutput,
            $taskCreated
        );
    }
}
