<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repository\TaskRepositoryInterface;
use App\Repository\TaskRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(TaskRepositoryInterface::class, TaskRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
