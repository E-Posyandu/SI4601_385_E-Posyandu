<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\AdminController;

// Login
Route::get('/login', [AdminController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AdminController::class, 'login']);

// Index = Dashboard
Route::get('/dashboard', function () {
    if (!Session::has('admin')) {
        return redirect()->route('login');
    }
    return view('index'); // ✅ sesuai file view
})->name('index');

// Logout
Route::post('/logout', [AdminController::class, 'logout'])->name('logout');

// Root → Redirect ke login
Route::get('/', fn() => redirect('/login'));
