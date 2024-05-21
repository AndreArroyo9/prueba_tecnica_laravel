<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\Chat;
use App\Models\Servicio;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\table;

class ServicioPolicy
{

    public function modify(User $user, Servicio $servicio): bool{

        // Verifica si el usuario es el creador del servicio o admin.
        return ServicioPolicy::isCreator($user, $servicio) || ServicioPolicy::isAdmin($user);

    }

    public function view(User $user, Servicio $servicio): bool{
        if ($servicio->status == 1 || ServicioPolicy::isCreator($user, $servicio) || ServicioPolicy::isAdmin($user)) {
            return true;
        }
        return false;
    }

    public function hire(User $user, Servicio $servicio): bool{
        if (ServicioPolicy::isCreator($user, $servicio)) {
            return false;
        }
        return !$user->customer->servicios->contains($servicio);
    }

    public function createChat(User $user, Servicio $servicio): bool{
//        $chat = $servicio->belongsToMany(Chat::class)->wherePivot('user_id',$user->id);
        $chat = Chat::all()->where('user_id', '=', $user->id)->first();

        //  Si el chat existe, el usuario no puede empezar un chat. Tampoco si es creador.
        return is_null($chat) && !ServicioPolicy::isCreator($user, $servicio);
    }

    public function viewChats(User $user, Servicio $servicio): bool{
        return ServicioPolicy::isCreator($user, $servicio);
    }



    // Métodos estáticos
    static public function isCreator(User $user, Servicio $servicio): bool{
        return $servicio->creator->user->is($user);
    }

    static public function isAdmin(User $user): bool{
        if (is_null($user->admin)) {
            return false;
        }
        return true;
    }


}
