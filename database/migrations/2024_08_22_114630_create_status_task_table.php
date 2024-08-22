<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('status_tasks', function (Blueprint $table) {
            $table->id();
            $table->string("description", 30);
            $table->timestamps();
        });
        Schema::table('tasks', function(Blueprint $table){
            $table->dropColumn("status");
            $table->unsignedBigInteger('status_task_id');
            $table->foreign('status_task_id')->references('id')->on('status_tasks');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tasks', fn(Blueprint $table) => $table->dropForeign(['status_task_id']));
        Schema::dropIfExists('status_tasks');
    }
};
