<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtikelController;

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
