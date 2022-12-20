<?php

namespace RestapiLaravel;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class RestapiLaravelServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Route::middleware('api')
            ->prefix('api/v1')
            ->group(__DIR__.'/routes/api.php');

        Route::middleware('web')
            ->group(__DIR__.'/routes/web.php');

        $this->publishes([
            __DIR__.'/Resources/User.php' => app_path('Resources/User.php')
        ], 'started-resources');
    }
}
