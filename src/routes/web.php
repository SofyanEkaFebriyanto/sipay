<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

// Jalur awal langsung ke Login
Route::get('/', [AuthController::class, 'index']);
Route::get('/login', [AuthController::class, 'index'])->name('login');

// Jalur kirim data login
Route::post('/login', [AuthController::class, 'login']);

// Jalur Logout
Route::get('/logout', [AuthController::class, 'logout']);

// Jalur Dashboard (Hanya bisa dibuka kalau sudah login)
Route::get('/admin/dashboard', function() { return "Halaman Admin"; });
Route::get('/petugas/dashboard', function() { return "Halaman Petugas"; });
Route::get('/siswa/dashboard', function() { return "Halaman Siswa"; });

// Rute Dashboard (Pastikan memanggil function yang tepat)
Route::get('/admin/dashboard', [DashboardController::class, 'admin']);
Route::get('/petugas/dashboard', [DashboardController::class, 'petugas']);
Route::get('/siswa/dashboard', [DashboardController::class, 'siswa']);