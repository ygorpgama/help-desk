<?php

namespace Database\Seeders;

use App\Models\StatusTask;
use App\Models\Task;
use App\Models\User;
use Database\Factories\TaskFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::factory()->count(10)->create([
            "group_id" => 3
        ]);

        $status = [];

        array_push($status, StatusTask::factory()->create([
            "description" => "Concluido"
        ]));

        array_push($status, StatusTask::factory()->create([
            "description" => "Em andamento"
        ]));

        array_push($status, StatusTask::factory()->create([
            "description" => "Cancelado"
        ]));

        $users->each(function($user) use($status){
            foreach($status as $st){
                Task::factory()->count(10)->create([
                    "user_id" => $user->id,
                    "status_task_id" => $st->id,
                ]);
            }
        });
    }
}
