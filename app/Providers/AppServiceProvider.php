<?php

namespace App\Providers;

use App\Models\Servicio;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
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
        // Gate (only the creator can edit the service)
        Gate::define('edit-servicio', function (User $user, Servicio $servicio) {

            // Checks if the user_id of the creator is the same as the user_id of the user authenticated
            return $servicio->creator->user->is($user);
        });
    }
}
