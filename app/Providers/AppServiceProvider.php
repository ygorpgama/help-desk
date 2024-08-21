<?php

namespace App\Providers;

use App\Interfaces\TaskRepositoryContract;
use App\Repositories\TaskRepository;
use App\Services\TaskService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(TaskRepositoryContract::class, TaskRepository::class);
        $this->app->bind(TaskService::class, function($app){
            return new TaskService($app->make(TaskRepository::class));
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
