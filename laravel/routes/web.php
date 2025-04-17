<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VerifikasiAkunController;

Route::get('/login', [AdminController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AdminController::class, 'login']);


Route::get('/dashboard', function () {
    return view('index');
})->name('index');

Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
Route::get('/', fn() => redirect('/login'));

Route::get('/verifikasi-akun', [VerifikasiAkunController::class, 'index'])
    ->name('verifikasi-akun.index');

Route::get('/c/{id}', [VerifikasiAkunController::class, 'show'])
    ->name('verifikasi-akun.show');

Route::post('/verifikasi-akun/{id}/update-status', [VerifikasiAkunController::class, 'updateStatus'])
    ->name('verifikasi-akun.update-status');
    Route::get('/test-verifikasi', function() {
        return 'Route test berhasil diakses!';
    });