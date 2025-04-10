<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\babyController;


Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/DataBayi', function () {
    return view('admin-side.data-bayi.index');
})->name('Databayi');
