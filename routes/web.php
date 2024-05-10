<?php

use App\Http\Controllers\ChatController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/servicios/mis-servicios', ['App\Http\Controllers\ServicioController', 'misServicios']);
Route::resource('servicios', 'App\Http\Controllers\ServicioController');

Route::get('perfil', \App\Http\Controllers\PerfilController::class);
// Auth

Route::get('/register', ['App\Http\Controllers\RegisterUserController', 'create']);
Route::post('/register', ['App\Http\Controllers\RegisterUserController', 'store']);

// Login
Route::get('/login', ['App\Http\Controllers\SessionController', 'create']);
Route::post('/login', ['App\Http\Controllers\SessionController', 'store']);
Route::post('/logout', ['App\Http\Controllers\SessionController', 'destroy']);

// Chat
Route::get('chat', [ChatController::class, 'index'])
    ->name('chat');
Route::get('/messages', [ChatController::class, 'messages'])
    ->name('messages');
Route::post('/message', [ChatController::class, 'message'])
    ->name('message');
