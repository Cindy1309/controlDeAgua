<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;


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
        // Cargar las rutas de la API manualmente
        Route::prefix('api')  // Puedes mantener el prefijo 'api'
             ->middleware('api')
             
             ->group(base_path('routes/api.php')); // Ruta al archivo api.php
    }

}
