<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\babyController;
use App\Http\Controllers\VerifikasiAdmin;


Route::get('/', function () {
    return view('index');
})->name('index');


Route::get('/artikel', [ArtikelController::class, 'index'])->name('artikel.index');
Route::get('/artikel/create', [ArtikelController::class, 'create'])->name('artikel.create');
Route::post('/artikel', [ArtikelController::class, 'store'])->name('artikel.store');
Route::get('/artikel/{id}/edit', [ArtikelController::class, 'edit'])->name('artikel.edit');
Route::put('/artikel/{id}', [ArtikelController::class, 'update'])->name('artikel.update');
Route::delete('/artikel/{id}', [ArtikelController::class, 'destroy'])->name('artikel.destroy');
Route::get('/artikel/{id}', [ArtikelController::class, 'show'])->name('artikel.show');

// route for baby
Route::get('/babies', [babyController::class, 'index'])->name('babies.index');
Route::get('/babies/create', [babyController::class, 'create'])->name('babies.create');
Route::post('/babies', [babyController::class, 'store'])->name('babies.store');
Route::get('/babies/{id}', [babyController::class, 'show'])->name('babies.show');
Route::get('/babies/{id}/edit', [babyController::class, 'edit'])->name('babies.edit');
Route::put('/babies/{id}', [babyController::class, 'update'])->name('babies.update');
Route::delete('/babies/{id}', [babyController::class, 'destroy'])->name('babies.destroy');

// route for Verifikasi admin
Route::get('/admin/verifikasi-akun', [VerifikasiAdminController::class, 'index'])->name('verifikasi-akun.index');
Route::post('/admin/verifikasi-akun/save', [VerifikasiAdminController::class, 'saveStatus'])->name('verifikasi-akun.saveStatus');
