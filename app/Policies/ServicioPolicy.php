<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\Servicio;
use App\Models\User;
use Illuminate\Auth\Access\Response;
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
        //
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

//        // Verifica si es admin
//        $admins = Admin::all();
//        foreach ($admins as $admin) {
//            if ($admin->user->is($user)) {
//                return true;
//            }
//        }

        // Verifica si el usuario es el creador del servicio.
        return $servicio->creator->user->is($user);

    }
}
