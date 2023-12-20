<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Notificacion;

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
        $notificaciones = Notificacion::all();

        view()->share("notificaciones", $notificaciones);   
    }
}
