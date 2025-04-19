<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JadwalKegiatanController;

Route::get('/', function () {
    return view('index');
})->name('index'); 