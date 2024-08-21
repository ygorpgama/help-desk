<?php

namespace Database\Seeders;

use App\Models\Group;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Group::create([
            "description" => "Admin"
        ]);

        Group::create([
            "description" => "Technician"
        ]);

        Group::create([
            "description" => "Normal"
        ]);
    }
}
