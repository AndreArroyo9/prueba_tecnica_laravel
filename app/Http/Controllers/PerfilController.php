<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;

class PerfilController extends Controller
{
    public function index()
    {
        // Authorization for guests
        if (Auth::guest()) {
            return redirect('/login');
        }

        $servicios = Auth::user()->creator->servicios;

        $chats = Auth::user()->chats;

        $perfil = Auth::user();

        return view('perfil.index', ['servicios' => $servicios, 'chats' => $chats]);
    }

}
