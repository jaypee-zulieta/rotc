<?php

namespace App\Providers;

use App\Services\StudentCadetService;
use Illuminate\Support\ServiceProvider;

class StudentCadetServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
        $this->app->singleton(StudentCadetService::class, function () {
            return new StudentCadetService();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
