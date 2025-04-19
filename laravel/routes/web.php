<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JadwalKegiatanController;

// Redirect halaman utama ke jadwal-kegiatan
Route::get('/', function () {
    return redirect()->route('jadwal-kegiatan.index');
});

Route::resource('jadwal-kegiatan', JadwalKegiatanController::class);
