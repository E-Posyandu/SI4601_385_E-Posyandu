<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BalitaController;


Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/DataBayi', [BalitaController::class, 'index'])->name('Databayi');
Route::get('/babies', [BalitaController::class, 'index'])->name('babies.index');
Route::get('/babies/create', [BalitaController::class, 'create'])->name('babies.create');
Route::post('/babies', [BalitaController::class, 'store'])->name('babies.store');
Route::get('/babies/{id}', [BalitaController::class, 'show'])->name('babies.show');
Route::get('/babies/{id}/edit', [BalitaController::class, 'edit'])->name('babies.edit');
Route::put('/babies/{id}', [BalitaController::class, 'update'])->name('babies.update');
Route::delete('/babies/{id}', [BalitaController::class, 'destroy'])->name('babies.destroy');


