<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Siswa;
use App\Models\Petugas;
use App\Models\Kelas;
use App\Models\Spp;
use App\Models\Pembayaran;

class DashboardController extends Controller
{
    // Fungsi untuk Dashboard Admin
    public function admin()
    {
        $data = $this->getSummaryData();
        return view('admin.dashboard', $data); 
    }

    // Fungsi untuk Dashboard Petugas
    public function petugas()
    {
        $data = $this->getSummaryData();
        return view('petugas.dashboard', $data);
    }

    // Fungsi untuk Dashboard Siswa
    public function siswa()
    {
        $user = Auth::guard('siswa')->user();
        
        $data = [
            'siswa' => $user,
            'pembayarans' => Pembayaran::with('petugas')
                ->where('nisn', $user->nisn)
                ->latest('tgl_bayar')
                ->get(),
        ];

        return view('siswa.dashboard', $data);
    }

    // Helper untuk data summary (Admin & Petugas)
    private function getSummaryData()
    {
        return [
            'totalSiswa' => Siswa::count(),
            'totalPetugas' => Petugas::count(),
            'totalKelas' => Kelas::count(),
            'totalSPP' => Spp::count(),
            'recentPembayaran' => Pembayaran::with(['siswa', 'petugas'])
                ->latest('id_pembayaran')
                ->take(5)
                ->get(),
        ];
    }
}