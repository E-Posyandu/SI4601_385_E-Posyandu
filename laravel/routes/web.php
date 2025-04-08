<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;



Route::get('/', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/dashboard', [AuthController::class, 'dashboard']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
