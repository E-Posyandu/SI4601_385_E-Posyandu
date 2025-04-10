<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CreateJadwalKegiatanController;

Route::get('/', function () {
    return view('index');
})->name('index');

// Form jadwal kegiatan
Route::view('/admin/jadwal-kegiatan', 'admin-side.jadwal-kegiatan.index')->name('jadwal-kegiatan.index');

// Menyimpan data jadwal
Route::post('/admin/jadwal-kegiatan/store', [CreateJadwalKegiatanController::class, 'store'])->name('jadwal-kegiatan.store');

