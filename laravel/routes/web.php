<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CreateJadwalKegiatanController;

// Halaman daftar jadwal
Route::get('/admin/jadwal-kegiatan', [CreateJadwalKegiatanController::class, 'index'])
    ->name('jadwal-kegiatan.index');

// Simpan jadwal baru
Route::post('/admin/jadwal-kegiatan/store', [CreateJadwalKegiatanController::class, 'store'])
    ->name('jadwal-kegiatan.store');

// Update jadwal
Route::put('/admin/jadwal-kegiatan/update/{id}', [CreateJadwalKegiatanController::class, 'update'])
    ->name('jadwal-kegiatan.update');

// Hapus jadwal
Route::delete('/admin/jadwal-kegiatan/delete/{id}', [CreateJadwalKegiatanController::class, 'destroy'])
    ->name('jadwal-kegiatan.destroy');
