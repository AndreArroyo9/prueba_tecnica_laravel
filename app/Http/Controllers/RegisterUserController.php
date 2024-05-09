<?php

namespace App\Http\Controllers;

use App\Models\Creator;
use App\Models\Customer;
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

        // Assign the user as a creator
        Creator::create([
            'user_id' => $newUser->id
        ]);

        // Assignt the user as a client
        Customer::create([
            'user_id' => $newUser->id
        ]);

        // log in
        Auth::login($newUser);

        // redirect
        return redirect('/');
    }
}
