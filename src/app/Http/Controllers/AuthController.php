<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // 1. Fungsi untuk nampilin halaman login
    public function index()
    {
        return view('Auth.login');
    }

    // 2. Fungsi untuk proses login (Sintaks Dasar)
    public function login(Request $request)
    {
        // Ambil data dari form login
        $user = $request->username;
        $pass = $request->password;

        // A. COBA LOGIN SEBAGAI PETUGAS / ADMIN
        // Kita pakai Guard 'petugas' karena datanya di tabel petugas
        if (Auth::guard('petugas')->attempt(['username' => $user, 'password' => $pass])) {
            
            // Kalau berhasil, ambil data siapa yang login
            $data = Auth::guard('petugas')->user();

            // Cek levelnya (Admin atau Petugas)
            if ($data->level == 'admin') {
                return redirect('/admin/dashboard');
            } else {
                return redirect('/petugas/dashboard');
            }
        }

        // B. KALAU GAGAL, COBA LOGIN SEBAGAI SISWA
        // Siswa login pakai NISN sebagai username-nya
        if (Auth::guard('siswa')->attempt(['nisn' => $user, 'password' => $pass])) {
            return redirect('/siswa/dashboard');
        }

        // C. KALAU SEMUA GAGAL
        return back()->with('pesan_error', 'Username atau Password salah!');
    }

    // 3. Fungsi Logout
    public function logout()
    {
        Auth::guard('petugas')->logout();
        Auth::guard('siswa')->logout();
        return redirect('/login');
    }}