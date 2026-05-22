<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // 1. Fungsi untuk nampilin halaman login
    public function index()
    {
        return view('auth.login');
    }

    // 2. Fungsi untuk proses login (Sintaks Dasar)
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = $request->username;
        $pass = $request->password;

        // A. COBA LOGIN SEBAGAI PETUGAS / ADMIN
        if (Auth::guard('petugas')->attempt(['username' => $user, 'password' => $pass])) {
            $request->session()->regenerate();
            
            $data = Auth::guard('petugas')->user();

            if ($data->level == 'admin') {
                return redirect()->intended('/admin/dashboard');
            } else {
                return redirect()->intended('/petugas/dashboard');
            }
        }

        // B. KALAU GAGAL, COBA LOGIN SEBAGAI SISWA
        if (Auth::guard('siswa')->attempt(['nisn' => $user, 'password' => $pass])) {
            $request->session()->regenerate();
            return redirect()->intended('/siswa/dashboard');
        }

        // C. KALAU SEMUA GAGAL
        return back()->withErrors([
            'username' => 'Username atau Password salah!',
        ])->withInput($request->only('username'));
    }

    // 3. Fungsi Logout
    public function logout(Request $request)
    {
        Auth::guard('petugas')->logout();
        Auth::guard('siswa')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}