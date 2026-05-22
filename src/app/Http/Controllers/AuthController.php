<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Controller ini menangani proses autentikasi (Login & Logout)
 * untuk berbagai level pengguna (Admin, Petugas, dan Siswa).
 */
class AuthController extends Controller
{
    /**
     * Menampilkan halaman login ke pengguna.
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * Memproses percobaan login dari form yang dikirimkan.
     */
    public function login(Request $request)
    {
        // Validasi input: Memastikan username dan password tidak kosong
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = $request->username;
        $pass = $request->password;

        /**
         * A. PROSES LOGIN SEBAGAI PETUGAS ATAU ADMIN
         * Menggunakan Guard 'petugas' untuk mengecek tabel petugas.
         */
        if (Auth::guard('petugas')->attempt(['username' => $user, 'password' => $pass])) {
            $request->session()->regenerate();
            
            $data = Auth::guard('petugas')->user();

            // Pengecekan level untuk diarahkan ke dashboard yang sesuai
            if ($data->level == 'admin') {
                return redirect()->intended('/admin/dashboard');
            } else {
                return redirect()->intended('/petugas/dashboard');
            }
        }

        /**
         * B. PROSES LOGIN SEBAGAI SISWA (Jika login petugas gagal)
         * Menggunakan Guard 'siswa' untuk mengecek tabel siswa berdasarkan NISN.
         */
        if (Auth::guard('siswa')->attempt(['nisn' => $user, 'password' => $pass])) {
            $request->session()->regenerate();
            return redirect()->intended('/siswa/dashboard');
        }

        /**
         * C. JIKA SEMUA PERCOBAAN LOGIN GAGAL
         * Mengembalikan pengguna ke halaman login dengan pesan error.
         */
        return back()->withErrors([
            'username' => 'Username atau Password salah!',
        ])->withInput($request->only('username'));
    }

    /**
     * Memproses logout untuk mengakhiri sesi pengguna.
     */
    public function logout(Request $request)
    {
        // Keluar dari semua guard yang mungkin aktif
        Auth::guard('petugas')->logout();
        Auth::guard('siswa')->logout();

        // Menghapus data sesi dan me-regenerate token keamanan
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
