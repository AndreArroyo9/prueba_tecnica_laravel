<?php

namespace App\Http\Middleware;

use App\Policies\ServicioPolicy;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureServicioPublic
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        if ($request->servicio->status ==  1) {
            return $next($request);
        }else{
            if (is_null($user)){
                return abort(Response::HTTP_FORBIDDEN);

            } elseif (ServicioPolicy::isCreator($user, $request->servicio)) {
                return $next($request);
            }
            return abort(Response::HTTP_FORBIDDEN);
        }
    }
}
