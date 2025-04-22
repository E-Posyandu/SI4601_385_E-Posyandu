<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VerifikasiAkunController;
use App\Http\Controllers\JadwalKegiatanController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\babyController;
use App\Http\Controllers\dashboardUserController;
use App\Http\Controllers\dailyreportUserController;
use App\Http\Controllers\posyandureportUserController;
use App\Http\Controllers\eventUserController;
use App\Http\Controllers\profileUserController;
use App\Http\Controllers\VerifikasiAdminController;

// Authentication Routes
Route::get('/', fn() => redirect('/login'));
Route::get('/login', [AdminController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AdminController::class, 'login']);
Route::post('/logout', [AdminController::class, 'logout'])->name('logout');

// Dashboard Routes
Route::get('/dashboard', [dashboardUserController::class, 'index'])->name('dashboard');
Route::get('/', [dashboardUserController::class, 'index'])->name('index');

// User-side Routes
Route::prefix('user-side')->group(function () {
    // Daily Report Routes
    Route::prefix('dailyreport')->group(function () {
        Route::get('/', [dailyreportUserController::class, 'index'])->name('user-side.dailyReport.index');
        Route::get('/create', [dailyreportUserController::class, 'create'])->name('user-side.dailyReport.create');
        Route::post('/', [dailyreportUserController::class, 'store'])->name('user-side.dailyReport.store');
        Route::get('/{id}', [dailyreportUserController::class, 'show'])->name('user-side.dailyReport.show');
        Route::get('/{id}/edit', [dailyreportUserController::class, 'edit'])->name('user-side.dailyReport.edit');
        Route::put('/{id}', [dailyreportUserController::class, 'update'])->name('user-side.dailyReport.update');
    });
});

// User Features Routes
Route::get('/posyandureport', [posyandureportUserController::class, 'index'])->name('posyandureport');
Route::get('/event', [eventUserController::class, 'index'])->name('event');
Route::get('/profile', [profileUserController::class, 'index'])->name('profile');

// Account Verification Routes
Route::prefix('verifikasi-akun')->group(function() {
    Route::get('/', [VerifikasiAkunController::class, 'index'])->name('verifikasi-akun.index');
    Route::get('/{id_balita}', [VerifikasiAkunController::class, 'show'])->name('verifikasi-akun.show');
    Route::post('/{id_balita}/update-status', [VerifikasiAkunController::class, 'updateStatus'])
        ->name('verifikasi-akun.update-status');
});

// Article Routes
Route::prefix('artikel')->group(function() {
    Route::get('/', [ArtikelController::class, 'index'])->name('artikel.index');
    Route::get('/create', [ArtikelController::class, 'create'])->name('artikel.create');
    Route::post('/', [ArtikelController::class, 'store'])->name('artikel.store');
    Route::get('/{id}/edit', [ArtikelController::class, 'edit'])->name('artikel.edit');
    Route::put('/{id}', [ArtikelController::class, 'update'])->name('artikel.update');
    Route::delete('/{id}', [ArtikelController::class, 'destroy'])->name('artikel.destroy');
    Route::get('/{id}', [ArtikelController::class, 'show'])->name('artikel.show');
});

// Baby Management Routes
Route::prefix('babies')->group(function() {
    Route::get('/', [babyController::class, 'index'])->name('babies.index');
    Route::get('/create', [babyController::class, 'create'])->name('babies.create');
    Route::post('/', [babyController::class, 'store'])->name('babies.store');
    Route::get('/{id}', [babyController::class, 'show'])->name('babies.show');
    Route::get('/{id}/edit', [babyController::class, 'edit'])->name('babies.edit');
    Route::put('/{id}', [babyController::class, 'update'])->name('babies.update');
    Route::delete('/{id}', [babyController::class, 'destroy'])->name('babies.destroy');
});

// Admin Verification Routes
Route::prefix('admin')->group(function() {
    Route::get('/verifikasi-akun', [VerifikasiAdminController::class, 'index'])->name('verifikasi-akun.index');
    Route::post('/verifikasi-akun/save', [VerifikasiAdminController::class, 'saveStatus'])->name('verifikasi-akun.saveStatus');
});
