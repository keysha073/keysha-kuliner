<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    // Menampilkan halaman login (GET /auth)
    public function index()
    {
        return view('auth.login');
    }

    // Memproses form login (POST /auth)
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if ($request->username === $request->password) {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('login')->with('error', 'Username atau password salah!');
    }
}