<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\Servicio;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\table;

class ServicioPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Servicio $servicio): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {

    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Servicio $servicio): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Servicio $servicio): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Servicio $servicio): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Servicio $servicio): bool
    {
        //
    }

    public function modify(User $user, Servicio $servicio): bool{

        // Verifica si el usuario es el creador del servicio.
        return ServicioPolicy::isCreator($user, $servicio) || ServicioPolicy::isAdmin($user);

    }

    public function hire(User $user, Servicio $servicio): bool{
        if (ServicioPolicy::isAdmin($user) || ServicioPolicy::isCreator($user, $servicio)) {
            return false;
        }
        return !$user->customer->servicios->contains($servicio);
    }

    public function createChat(User $user, Servicio $servicio): bool{
        $chat = $servicio->chats->where('user_id','=', $user->id)->first();
//        $chat = DB::table('chats')->where('user_id','=', $user->id)->where('servicio_id','=', $servicio->id)->first();
        //  Si el chat existe, el usuario no puede empezar un chat. Tampoco si es creador o admin.
        return is_null($chat) && !ServicioPolicy::isCreator($user, $servicio) && !ServicioPolicy::isAdmin($user);
    }

    public function viewChats(User $user, Servicio $servicio): bool{
        return ServicioPolicy::isAdmin($user) || ServicioPolicy::isCreator($user, $servicio);
    }

    // Métodos estáticos
    static public function isCreator(User $user, Servicio $servicio): bool{
        return $servicio->creator->user->is($user);
    }

    static public function isAdmin(User $user): bool{
        $admin = Admin::all()->where('user_id', $user->id)->first();

        if (is_null($admin)) {
            return false;
        }
        return true;
    }
}
