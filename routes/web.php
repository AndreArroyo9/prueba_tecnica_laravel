<?php

use App\Http\Controllers\ServicioController;
use App\Http\Controllers\ChatController;
use App\Models\Servicio;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Servicio
Route::get('/servicios',[ServicioController::class,'index']);

Route::get('/servicios/create', [ServicioController::class, 'create'])
    ->middleware('auth')
    ->can('modify', Servicio::class);

Route::post('/servicios',[ServicioController::class,'store'])
    ->middleware('auth');

Route::get('/servicios/{servicio}',[ServicioController::class,'show']);

Route::get('/servicios/{servicio}/edit',[ServicioController::class,'edit'])
    ->middleware('auth')
    ->can('modify',Servicio::class);

Route::patch('/servicios/{servicio}',[ServicioController::class,'update'])
    ->middleware('auth');

Route::delete('/servicios/{servicio}',[ServicioController::class,'destroy'])
    ->middleware('auth')
    ->can('modify', Servicio::class);

Route::get('/servicios/mis-servicios', ['App\Http\Controllers\ServicioController', 'misServicios'])
    ->middleware('auth');


// Chat
//Route::get('servicios/{servicio_id}/chat/{user_id}', [ChatController::class, 'index']);
Route::post('servicios/{servicio_id}/chat/{user_id}', [ChatController::class, 'store']);
Route::get('servicios/{servicio_id}/chat/{user_id}', [ChatController::class, 'chat']);
    // Message
Route::get('servicios/{servicio_id}/chat/{user_id}/update/{chat_id}', [ChatController::class, 'updateMessages']);
Route::post('servicios/{servicio_id}/chat/{user_id}/send', [\App\Http\Controllers\InsertMessage::class, 'send']);


// Pefil
Route::get('perfil', [\App\Http\Controllers\PerfilController::class, 'index']);
Route::get('perfil/chats', [\App\Http\Controllers\PerfilController::class, 'userChats']);

// Auth
Route::get('/register', ['App\Http\Controllers\RegisterUserController', 'create']);
Route::post('/register', ['App\Http\Controllers\RegisterUserController', 'store']);

// Login
Route::get('/login', ['App\Http\Controllers\SessionController', 'create'])->name('login');
Route::post('/login', ['App\Http\Controllers\SessionController', 'store']);
Route::post('/logout', ['App\Http\Controllers\SessionController', 'destroy']);

