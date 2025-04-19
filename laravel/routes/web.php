<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\babyController;
use App\Http\Controllers\dashboardUserController;
use App\Http\Controllers\dailyreportUserController;
use App\Http\Controllers\posyandureportUserController;
use App\Http\Controllers\eventUserController;
use App\Http\Controllers\profileUserController;

Route::get('/', [dashboardUserController::class, 'index'])->name('index');
Route::get('/dashboard', [dashboardUserController::class, 'index'])->name('dashboard');

Route::prefix('user-side')->group(function () {
    Route::get('/dailyreport', [dailyreportUserController::class, 'index'])->name('user-side.dailyReport.index');
    Route::get('/dailyreport/create', [dailyreportUserController::class, 'create'])->name('user-side.dailyReport.create');
    Route::post('/dailyreport', [dailyreportUserController::class, 'store'])->name('user-side.dailyReport.store');
    Route::get('/dailyreport/{id}', [dailyreportUserController::class, 'show'])->name('user-side.dailyReport.show');
    Route::get('/dailyreport/{id}/edit', [dailyreportUserController::class, 'edit'])->name('user-side.dailyReport.edit'); // Tambahkan route ini
    Route::put('/dailyreport/{id}', [dailyreportUserController::class, 'update'])->name('user-side.dailyReport.update'); // Untuk menyimpan perubahan
});

Route::get('/posyandureport', [posyandureportUserController::class, 'index'])->name('posyandureport');
Route::get('/event', [eventUserController::class, 'index'])->name('event');
Route::get('/profile', [profileUserController::class, 'index'])->name('profile');
Route::get('/logout', [dashboardUserController::class, 'index'])->name('logout');

// route for baby
Route::get('/babies', [babyController::class, 'index'])->name('babies.index');
Route::get('/babies/create', [babyController::class, 'create'])->name('babies.create');
Route::post('/babies', [babyController::class, 'store'])->name('babies.store');
Route::get('/babies/{id}', [babyController::class, 'show'])->name('babies.show');
Route::get('/babies/{id}/edit', [babyController::class, 'edit'])->name('babies.edit');
Route::put('/babies/{id}', [babyController::class, 'update'])->name('babies.update');
Route::delete('/babies/{id}', [babyController::class, 'destroy'])->name('babies.destroy');