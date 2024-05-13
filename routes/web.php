<?php

use App\Http\Controllers\ServicioController;
use App\Http\Controllers\ChatController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/servicios/mis-servicios', ['App\Http\Controllers\ServicioController', 'misServicios']);
Route::get('/servicios/{id_servicio}/chat', ['App\Http\Controllers\ServicioController', 'chat']);
Route::resource('servicios', 'App\Http\Controllers\ServicioController');

// Chat
//Route::get('servicios/{id_servicio}/chat', [ServicioController::class, 'chat']);

Route::post('servicios/{id_servicio}/chat', [\App\Http\Controllers\InsertMessage::class, 'send']);

Route::get('servicios/{id_servicio}/chat', [\App\Http\Controllers\PrintMessage::class, 'updateMessages']);

//Route::get('/messages', [ChatController::class, 'messages'])
//    ->name('messages');
//Route::post('/message', [ChatController::class, 'message'])
//    ->name('message');

Route::get('perfil', \App\Http\Controllers\PerfilController::class);
// Auth

Route::get('/register', ['App\Http\Controllers\RegisterUserController', 'create']);
Route::post('/register', ['App\Http\Controllers\RegisterUserController', 'store']);

// Login
Route::get('/login', ['App\Http\Controllers\SessionController', 'create']);
Route::post('/login', ['App\Http\Controllers\SessionController', 'store']);
Route::post('/logout', ['App\Http\Controllers\SessionController', 'destroy']);

