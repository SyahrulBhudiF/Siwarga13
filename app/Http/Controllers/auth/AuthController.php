<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function auth(Request $request)
    {
        $credentials = $request->only('username', 'password');
        if (!Auth::attempt($credentials)) {
            return back()->with('error', 'Password atau Username salah');
        }

        $request->session()->regenerate();
        return redirect('/login')->with('success', 'Login Berhasil!');
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login')->with('success', 'Logout Berhasil!');
    }
}
