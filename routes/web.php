<?php

use App\Http\Controllers\ServicioController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\AdminController;
use App\Models\Servicio;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Servicio
Route::get('/servicios',[ServicioController::class,'index']);
//    ->middleware('admin:false');

Route::get('/servicios/create', [ServicioController::class, 'create'])
    ->middleware('auth')
    ->middleware('admin:false');

Route::post('/servicios',[ServicioController::class,'store'])
    ->middleware('auth')
    ->middleware('admin:false');

Route::get('/servicios/{servicio}',[ServicioController::class,'show'])
    ->middleware('admin:false');

Route::get('/servicios/{servicio}/edit',[ServicioController::class,'edit'])
    ->middleware('auth')
    ->can('modify','servicio');

Route::patch('/servicios/{servicio}',[ServicioController::class,'update'])
    ->middleware('auth');

Route::delete('/servicios/{servicio}',[ServicioController::class,'destroy'])
    ->middleware('auth')
    ->can('modify', 'servicio');

Route::post('/servicios/{servicio}/contratar',[ServicioController::class,'contratar'])
    ->middleware('auth')
    ->middleware('admin:false');

Route::get('mis-servicios', [ServicioController::class, 'misServicios'])
    ->middleware('auth')
    ->middleware('admin:false');

// Admin
Route::get('admin', [AdminController::class, 'index'])
    ->middleware('auth')
    ->middleware('admin:true');


// Chat
Route::post('servicios/{servicio_id}/chat/{user_id}', [ChatController::class, 'store'])
    ->middleware('auth');

Route::get('servicios/{servicio_id}/chat/{user_id}', [ChatController::class, 'chat'])
    ->middleware('auth');

Route::get('servicios/{servicio_id}/chat', function ($servicio_id) {
    redirect('/servicios');
})->middleware('auth');

    // Message
Route::get('servicios/{servicio_id}/chat/{user_id}/update/{chat_id}', [ChatController::class, 'updateMessages'])
    ->middleware('auth');

Route::post('servicios/{servicio_id}/chat/{user_id}/send', [\App\Http\Controllers\InsertMessage::class, 'send'])
    ->middleware('auth');


// Pefil
Route::get('perfil', [\App\Http\Controllers\PerfilController::class, 'index'])
    ->middleware('auth');
Route::get('perfil/chats', [\App\Http\Controllers\PerfilController::class, 'userChats'])
    ->middleware('auth');

// Auth
Route::get('/register', ['App\Http\Controllers\RegisterUserController', 'create']);
Route::post('/register', ['App\Http\Controllers\RegisterUserController', 'store']);

// Login
Route::get('/login', ['App\Http\Controllers\SessionController', 'create'])->name('login');
Route::post('/login', ['App\Http\Controllers\SessionController', 'store']);
Route::post('/logout', ['App\Http\Controllers\SessionController', 'destroy']);

