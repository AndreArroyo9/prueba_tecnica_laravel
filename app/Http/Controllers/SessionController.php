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
        if (auth()->attempt($attributesValidated)) {
            // session()->regenerate();
            return redirect('/')->with('success', 'Welcome back!');
        }

        return back()->withInput()->withErrors(['email' => 'Your provided credentials could not be verified.']);
    }

    public function destroy()
    {
        Auth::logout();
        return redirect('/');
    }
}
