<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

// Jalur awal langsung ke Login
Route::get('/', [AuthController::class, 'index']);
Route::get('/login', [AuthController::class, 'index'])->name('login');

// Jalur kirim data login
Route::post('/login', [AuthController::class, 'login']);

// Jalur Logout (Gunakan POST sesuai layout)
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
// Tetap sediakan GET kalau butuh logout via URL
Route::get('/logout', [AuthController::class, 'logout']);

// Rute Dashboard
Route::middleware('auth:petugas')->group(function() {
    Route::get('/admin/dashboard', [DashboardController::class, 'admin'])->name('admin.dashboard');
    Route::get('/petugas/dashboard', [DashboardController::class, 'petugas'])->name('petugas.dashboard');
});

Route::middleware('auth:siswa')->group(function() {
    Route::get('/siswa/dashboard', [DashboardController::class, 'siswa'])->name('siswa.dashboard');
});

// Placeholder untuk rute yang ada di sidebar layout
Route::get('/pembayaran', function() { return "Halaman Pembayaran"; })->name('pembayaran.index');
Route::get('/siswa', function() { return "Halaman Data Siswa"; })->name('siswa.index');
Route::get('/kelas', function() { return "Halaman Data Kelas"; })->name('kelas.index');
Route::get('/spp', function() { return "Halaman Data SPP"; })->name('spp.index');
Route::get('/user', function() { return "Halaman Data Petugas"; })->name('user.index');
