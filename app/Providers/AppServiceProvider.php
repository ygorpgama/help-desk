<?php

namespace App\Providers;

use App\Interfaces\CauseRepositoryContract;
use App\Interfaces\TaskRepositoryContract;
use App\Interfaces\UserRepositoryContract;
use App\Repositories\CauseRepository;
use App\Repositories\TaskRepository;
use App\Repositories\UserRepository;
use App\Services\CauseService;
use App\Services\TaskService;
use App\Services\UserService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(TaskRepositoryContract::class, TaskRepository::class);
        $this->app->bind(CauseRepositoryContract::class, CauseRepository::class);
        $this->app->bind(UserRepositoryContract::class, UserRepository::class);

        $this->app->bind(TaskService::class, function($app){
            return new TaskService(
                $app->make(TaskRepositoryContract::class),
                $app->make(CauseRepositoryContract::class),
            );
        });

        $this->app->bind(CauseService::class, function($app){
            return new CauseService($app->make(CauseRepositoryContract::class));
        });

        $this->app->bind(UserService::class, function($app){
            return new UserService($app->make(UserRepositoryContract::class));
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
