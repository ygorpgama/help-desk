<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name("dashboard.index");

Route::resource('task', TaskController::class)->except(['edit', 'update']);

Route::name('admin.')->prefix('admin')->group(function() {
    Route::get('tasks', [TaskController::class, 'indexAdmin'])->name('tasks');
    Route::get('task/{task}', [TaskController::class, 'editAdmin'])->name('tasks.edit');
    Route::put('task/{task}', [TaskController::class, 'update'])->name('tasks.update');
});

require 'auth.php';
