<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // Fungsi untuk Dashboard Admin
    public function admin()
    {
        // Untuk tes sementara, kita tampilkan teks dulu.
        // Nanti teks ini kita ganti jadi: return view('admin.dashboard');
        return "Selamat datang di Dashboard Admin!"; 
    }

    // Fungsi untuk Dashboard Petugas
    public function petugas()
    {
        return "Selamat datang di Dashboard Petugas!";
    }

    // Fungsi untuk Dashboard Siswa
    public function siswa()
    {
        return "Selamat datang di Dashboard Siswa!";
    }
}