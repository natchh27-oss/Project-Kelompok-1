<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user',
        ]);

        Auth::login($user);
        return redirect('/');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) { 
            $user = Auth::user();

            return $user->role === 'admin'
                ? redirect()->route('admin.dashboard')
                : redirect()->route('home');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    public function logout(Request $request)
    {
        $role = Auth::user()->role ?? 'user';

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return $role === 'admin'
            ? redirect()->route('login')
            : redirect()->route('home');
    }


}
