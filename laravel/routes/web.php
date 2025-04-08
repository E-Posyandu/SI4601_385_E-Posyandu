<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtikelController;

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/artikel/create', [ArtikelController::class, 'create'])->name('artikel.create');

Route::post('/artikel', [ArtikelController::class, 'store'])->name('artikel.store');
