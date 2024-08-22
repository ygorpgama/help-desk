<?php

namespace Database\Factories;

use App\Models\Cause;
use App\Models\StatusTask;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{

        /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<\Illuminate\Database\Eloquent\Model>
     */
    protected $model = Task::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "description" => fake()->text(),
            "image_link" => null,
            "status_task_id" => StatusTask::factory(),
            "user_id" => User::factory(),
            "technician_id" => User::factory(),
            "cause_id" => Cause::factory()
        ];
    }

    public function closed(): static{
        return $this->state(fn(array $attributtes) => [
            "status" => false,
        ]);
    }
}
