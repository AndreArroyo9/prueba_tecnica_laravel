<?php

namespace App\Http\Middleware;

use App\Models\Chat;
use App\Models\Servicio;
use App\Policies\ServicioPolicy;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureChatUsers
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        $servicio_id = request()->servicio_id;
        $servicio = Servicio::all()->find($servicio_id);
        $user_id = request()->user_id;
        $chat = Chat::all()->where('user_id', $user_id)->where('servicio_id', $servicio_id)->first();

        if ($user_id == $user->id || $servicio->creator->user->is($user)) {
            return $next($request);
        }
        return abort(Response::HTTP_FORBIDDEN);

    }
}
