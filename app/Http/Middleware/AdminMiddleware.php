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
        if (!is_null($user->admin)) {
            if ($allowed == 'false'){
                return abort(Response::HTTP_FORBIDDEN);
            }
        }

        return $next($request);


    }
}
