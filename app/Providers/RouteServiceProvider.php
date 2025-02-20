<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Définir le chemin de la route d'accueil
     */
    public const HOME = '/home';

    /**
     * Définir les routes de l'application.
     */
    public function boot(): void
    {
        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php')); // Charge les routes API

            Route::middleware('web')
                ->group(base_path('routes/web.php')); // Charge les routes Web
        });
    }
}
