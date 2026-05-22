<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SppController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\PembayaranController;

/**
 * RUTE PUBLIK:
 * Rute yang dapat diakses tanpa harus login terlebih dahulu.
 */
Route::get('/', [AuthController::class, 'index']); // Halaman utama langsung diarahkan ke login
Route::get('/login', [AuthController::class, 'index'])->name('login'); // Halaman form login
Route::post('/login', [AuthController::class, 'login']); // Proses pengiriman data login

/**
 * RUTE LOGOUT:
 * Menangani pengakhiran sesi pengguna.
 */
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/logout', [AuthController::class, 'logout']); // Fallback logout via URL

/**
 * RUTE TERPROTEKSI (Guard: Petugas):
 * Hanya dapat diakses oleh Admin atau Petugas yang sudah login.
 */
Route::middleware('auth:petugas')->group(function() {
    // Dashboard khusus untuk Admin dan Petugas
    Route::get('/admin/dashboard', [DashboardController::class, 'admin'])->name('admin.dashboard');
    Route::get('/petugas/dashboard', [DashboardController::class, 'petugas'])->name('petugas.dashboard');

    /**
     * RUTE CRUD (RESOURCE):
     * Otomatis membuat rute index, create, store, edit, update, destroy.
     */
    Route::resource('pembayaran', PembayaranController::class); // Transaksi SPP
    Route::resource('kelas', KelasController::class); // Manajemen Kelas
    Route::resource('siswa', SiswaController::class); // Manajemen Siswa
    Route::resource('spp', SppController::class); // Manajemen Data SPP
    Route::resource('user', PetugasController::class); // Manajemen Akun Petugas/Admin
    
    // Rute tambahan untuk fitur Laporan
    Route::get('/laporan-pembayaran', [PembayaranController::class, 'laporan'])->name('pembayaran.laporan');
});

/**
 * RUTE TERPROTEKSI (Guard: Siswa):
 * Hanya dapat diakses oleh Siswa yang login menggunakan NISN.
 */
Route::middleware('auth:siswa')->group(function() {
    // Dashboard khusus Siswa untuk melihat riwayat bayar sendiri
    Route::get('/siswa/dashboard', [DashboardController::class, 'siswa'])->name('siswa.dashboard');
});
