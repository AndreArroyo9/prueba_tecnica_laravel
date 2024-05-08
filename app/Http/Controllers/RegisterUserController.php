<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use App\Models\User;

class RegisterUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(){

        // Validate
        $attributesValidated = request()->validate([
            'name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'password' => ['required', Password::min(6), 'confirmed'] // Illuminate\Validation\Rules\Password
        ]);

        // create the user
        $newUser = User::create($attributesValidated);

        // log in
        Auth::login($newUser);

        // redirect
        return redirect('/');
    }
}
