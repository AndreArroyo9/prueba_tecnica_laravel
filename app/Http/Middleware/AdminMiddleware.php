<?php

namespace App\Http\Middleware;

use App\Models\Admin;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $allowed): Response
    {
        $user = Auth::user();
        // Si el usuario no está autenticado, no interesa, ya se encarga el auth middleware.
        if (is_null($user)) {
            return $next($request);

        }

        if (!is_null($user->admin)) {
            // Si el usuario es admin y se determina que no tiene permitido entrar, return 403
            if ($allowed == 'false'){
                return abort(Response::HTTP_FORBIDDEN);
            }
        } else{
            // Si el usuario no es admin y solo tiene permitido entrar el admin, return 403
            if($allowed == 'true'){
                return abort(Response::HTTP_FORBIDDEN);
            }
        }

        return $next($request);


    }
}
