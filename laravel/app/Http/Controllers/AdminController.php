<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{

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
    
        $admin = Admin::where('username', $request->username)->first();
    
        if ($admin && $request->password === $admin->password) {
            Session::put('admin', $admin);
            return redirect()->route('artikel.index'); 
        }
    
        return back()->withErrors([
            'login' => 'Username atau password salah.',
        ])->withInput();
    }
    

    public function logout()
    {
        Session::forget('admin');
        return redirect()->route('login');
    }
}
