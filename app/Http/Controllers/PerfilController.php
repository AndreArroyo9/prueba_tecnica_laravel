<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerfilController extends Controller
{
    public function __invoke()
    {
        // Authorization for guests
        if (Auth::guest()) {
            return redirect('/login');
        }

        $servicios = Auth::user()->creator->servicios;

        $perfil = Auth::user();
        return view('perfil', ['perfil' => $perfil, 'servicios' => $servicios]);
    }
}
