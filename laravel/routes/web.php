<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\babyController;


Route::get('/', function () {
    return view('index');
})->name('index');

// route for baby
Route::get('/babies', [babyController::class, 'index'])->name('babies.index');
Route::get('/babies/create', [babyController::class, 'create'])->name('babies.create');
Route::post('/babies', [babyController::class, 'store'])->name('babies.store');
Route::get('/babies/{id}', [babyController::class, 'show'])->name('babies.show');
Route::get('/babies/{id}/edit', [babyController::class, 'edit'])->name('babies.edit');
Route::put('/babies/{id}', [babyController::class, 'update'])->name('babies.update');
Route::delete('/babies/{id}', [babyController::class, 'destroy'])->name('babies.destroy');
