<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BukuController;
// panggil controller
use App\Models\Kategori;
use App\Models\Buku;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
Route::get('/', function () {
    return view('auth.login');
});


Auth::routes();

//menambakan route kategoris
Route::resource('kategoris', KategoriController::class);

Route::resource('bukus', BukuController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


