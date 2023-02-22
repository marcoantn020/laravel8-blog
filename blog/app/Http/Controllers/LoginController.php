<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function index()
    {
        return view('login', [
            'title' => 'Login'
        ]);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5'
        ]);

        if (Auth::attempt([
            'email' => $validate['email'],
            'password' => $validate['password'],
            'is_admin' => 1 ], $request->filled('remember'))) {
            $request->session()->regenerate();

            return redirect()->intended('admin');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
            'password' => 'senha incorreta'
        ])->onlyInput('email');
    }

    public function destroy()
    {
        Auth::logout();
        return back();
    }
}
