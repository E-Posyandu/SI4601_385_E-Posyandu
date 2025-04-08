<?php 
// app/Http/Controllers/AuthController.php


// app/Http/Controllers/AuthController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;  // Import Auth

class AuthController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('admin-side.layout-admin.login');
    }

    // Proses login
    public function login(Request $request)
    {
        // Validasi email dan password
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Cek apakah login berhasil
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Login berhasil, arahkan ke halaman dashboard
            return redirect()->intended('/dashboard');
        }

        // Jika login gagal, kembalikan ke halaman login dengan error
        return back()->withErrors(['email' => 'Email atau password salah.']);
    }

    // Logout
    public function logout()
    {
        Auth::logout();  // Logout user
        return redirect('/login');  // Redirect ke halaman login setelah logout
    }
}
