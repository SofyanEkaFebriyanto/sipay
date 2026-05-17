<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;

Route::get('/', function () {
    return redirect()->route ('siswa.index'); // Langsung diarahkan ke data siswa agar tidak kosong
});

// Route untuk Data Siswa
Route::resource('siswa', SiswaController::class);

// Tambahkan Route untuk Transaksi Pembayaran di sini
Route::get('/pembayaran', [SiswaController::class, 'pembayaran'])->name('pembayaran.index');