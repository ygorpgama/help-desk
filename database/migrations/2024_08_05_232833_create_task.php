<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->unsignedBigInteger('cause_id');
            $table->string('image_link')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('technician_id');
            $table->boolean('status');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('technician_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tasks', function(Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['technician_id']);
        });
        Schema::dropIfExists('tasks');
    }
};
