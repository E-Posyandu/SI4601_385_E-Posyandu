<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin-side.dashboard');
    }

    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Cari user manual
        $admin = Admin::where('username', $request->username)->first();

        if ($admin && $admin->password === $request->password) {
            // Simulasikan login manual
            Auth::guard('admin')->login($admin);
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors([
            'login' => 'Username atau password salah.',
        ])->withInput();
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('login');
    }
}
