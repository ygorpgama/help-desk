<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view("pages.dashboard");
});

Route::resource('task', TaskController::class);

require 'auth.php';
