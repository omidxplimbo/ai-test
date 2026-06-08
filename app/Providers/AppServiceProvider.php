<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Load migrations from the Role module
        $this->loadMigrationsFrom(__DIR__ . '/../Modules/Role/Database/Migrations');

        // Load routes from the Role module
        Route::middleware('api')
            ->prefix('api')
            ->group(base_path('app/Modules/Role/Routes/api.php'));
    }
}
