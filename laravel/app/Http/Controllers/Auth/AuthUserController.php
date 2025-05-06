<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Balita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthUserController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.user.login');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $balitas = Balita::all();
        foreach ($balitas as $balita) {
            if (!password_get_info($balita->password)['algo']) { // Check if not hashed
                $balita->password = Hash::make($balita->password);
                $balita->save();
            }
        }

        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ])->withInput();
    }

    public function showRegisterForm()
    {
        return view('auth.user.register');
    }

    public function register(Request $request)
    {
        // Update validation rules to match table_balita columns
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|unique:table_balita|max:255',
            'nama_balita' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'nik_anak' => 'required|string|unique:table_balita',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Create new balita record with correct column names
        $balita = Balita::create([
            'username' => $request->username,
            'nama_balita' => $request->nama_balita,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'nik_anak' => $request->nik_anak,
            'password' => Hash::make($request->password),
            'status_akun' => 'pending' // Add default status
        ]);

        Auth::login($balita);
        return redirect()->route('dashboard')->with('success', 'Registration successful');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
