<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(){
        // Validate
        $attributesValidated = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Attempt to authenticate the user
        if (!Auth::attempt($attributesValidated)) {
            // session()->regenerate();
            throw \Illuminate\Validation\ValidationException::withMessages(['email' => 'Correo o contraseña incorrectos.']);

        }

        // regenerate the session token
        request()->session()->regenerate();

        // redirect
        return redirect('/');

    }

    public function destroy()
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/');
    }
}
