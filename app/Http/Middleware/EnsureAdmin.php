<?php

namespace App\Http\Middleware;

use App\Models\Admin;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Verificar si es admin
        $user = Auth::user();
        $admins = Admin::all();
        foreach ($admins as $admin) {
            if ($admin->user->is($user)) {
                return $next($request);
            }
        }
        return redirect('/login');
    }
}
