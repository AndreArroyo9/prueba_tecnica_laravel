<?php

namespace App\Providers;

use App\Models\Chat;
use App\Models\Servicio;
use App\Models\User;
use Illuminate\Support\Facades\DB;
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

        // Gate (El creador no puede crear un chat o si el usuario ya tiene un chat en ese servicio, no puede crear otro)
        Gate::define('start-chat-user', function (User $user, Servicio $servicio) {
            $chat = DB::table('chats')->where('user_id','=', $user->id)->where('servicio_id','=', $servicio->id)->first();
            //  Si el chat existe, el usuario no puede empezar un chat
            if (! is_null($chat)) {
                return false;
            }
            return true;
        });

        // Gate (Verifica que el usuario autentificado no sea el creador del servicio)
        Gate::define('start-chat-creator', function (User $user, Servicio $servicio) {
            return $servicio->creator->user->isNot($user);
        });

//        // Gate (El creador no puede abrir un chat)
//        Gate::define('open-chat', function (User $user, Servicio $servicio) {
//
//        });

    }
}
