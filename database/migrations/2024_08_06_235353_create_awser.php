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
        Schema::create('awsers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('task_id');
            $table->timestamps();
            $table->foreign('task_id')->references('id')->on('tasks');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('awsesrs', fn(Blueprint $table) => $table->dropForeign(['task_id']));
        Schema::dropIfExists('awsesrs');
    }
};
