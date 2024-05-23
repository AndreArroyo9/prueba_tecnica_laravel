<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;

class PerfilController extends Controller
{
    public function index()
    {

        $servicios = Auth::user()->creator->servicios;


        return view('perfil.index', ['servicios' => $servicios]);
    }

}
