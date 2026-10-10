<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\ReservasiController;
use App\Models\Menu;
use App\Models\Pelanggan;
use App\Models\Reservasi;

// Halaman awal
Route::get('/', function () {
    return view('welcome');
});

// Website pengunjung (template Chefer)
Route::get('/guest', function () {
    return redirect('/guest/Chefer/index.html');
});

// Dashboard admin
Route::get('/admin', function () {
    return view('admin.dashboard', [
        'menuCount'      => Menu::count(),
        'pelangganCount' => Pelanggan::count(),
        'reservasiCount' => Reservasi::count(),
    ]);
})->name('admin.dashboard');

// CRUD (otomatis membuat route index, create, store, edit, update, destroy)
Route::resource('menu', MenuController::class)->except('show');
Route::resource('pelanggan', PelangganController::class)->except('show');
Route::resource('reservasi', ReservasiController::class)->except('show');
