<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PeminjamController;
// panggil controller
use App\Models\Kategori;
use App\Models\Buku;
use App\Models\Peminjam;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
Route::get('/', function () {
    return view('auth.login');
});


Auth::routes();

//menambakan route kategoris
Route::resource('kategoris', KategoriController::class);

Route::resource('bukus', BukuController::class);

Route::resource('peminjams', PeminjamController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');





