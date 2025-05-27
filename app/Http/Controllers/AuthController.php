<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function showLoginForm(){
        return view('login'); 
    }
    public function login(Request $request) {
        $request->validate([
            'email' => ['required', 'email'], 
            'password' => ['required', 'min:8'], 
        ], [
                'email.required' => '*This field is required',
                'email.email' => '*Invalid email format',
                'password.required' => '*This field is required',
                'password.min:8' => '*The password must be at least 8 characters.',
        ]);
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'email' => 'Email or password is incorrect.',
        ]);
    }

    public function showRegisterForm() {
        return view('register');
    }
    public function register(Request $request) {
    $request->validate([
        'username' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8'],
    ], [
        'username.required' => '*This field is required',
        'email.required' => '*This field is required',
        'email.email' => '*Invalid email~~ format',
        'password.required' => '*This field is required',
        'password.min:8' => '*The password must be at least 8 characters.',
]);

    $user = User::create([
        'name' => $request->username,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    Auth::login($user);
    return redirect()->intended('/dashboard');
    }
}

