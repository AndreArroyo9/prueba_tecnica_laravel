<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('servicios', 'App\Http\Controllers\ServicioController');

Route::resource('usuarios', 'App\Http\Controllers\UsuarioController');