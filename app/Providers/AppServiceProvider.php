<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repository\TaskRepositoryInterface;
use App\Repository\TaskRepository;
use App\Repository\UserRepositoryInterface;
use App\Repository\UserRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(TaskRepositoryInterface::class, TaskRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
