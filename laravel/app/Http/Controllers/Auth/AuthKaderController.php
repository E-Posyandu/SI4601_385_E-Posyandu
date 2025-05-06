<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthKaderController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.kader.loginKader');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Find the petugas by email first
        $petugas = petugas::where('email', $request->email)->first();

        if ($petugas && Hash::check($request->password, $petugas->password)) {
            Auth::login($petugas);
            $request->session()->regenerate();
            return redirect()->route('kader-side.dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    
    public function showRegistrationForm()
    {
        return view('auth.kader.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nama_petugas' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:table_petugas_kader',
            'email' => 'required|string|email|max:255|unique:table_petugas_kader',
            'password' => 'required|string|min:8|confirmed',
            'nomor_petugas' => 'required|string',
            'alamat_petugas' => 'required|string'
        ]);

        $petugas = petugas::create([
            'nama_petugas' => $request->nama_petugas,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'nomor_petugas' => $request->nomor_petugas,
            'alamat_petugas' => $request->alamat_petugas
        ]);

        Auth::login($petugas);

        return redirect()->route('kader-side.dashboard');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/kader/login');
    }
}