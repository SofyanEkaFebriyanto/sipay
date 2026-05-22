<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Siswa;
use App\Models\Petugas;
use App\Models\Kelas;
use App\Models\Spp;
use App\Models\Pembayaran;

/**
 * Controller ini bertanggung jawab untuk menampilkan halaman Dashboard
 * yang disesuaikan dengan peran masing-masing pengguna.
 */
class DashboardController extends Controller
{
    /**
     * Menampilkan Dashboard untuk Admin.
     * Berisi ringkasan data statistik seluruh sistem.
     */
    public function admin()
    {
        $data = $this->getSummaryData();
        return view('dashboard', $data); 
    }

    /**
     * Menampilkan Dashboard untuk Petugas.
     * Sama seperti admin, namun dengan akses menu yang mungkin terbatas di view.
     */
    public function petugas()
    {
        $data = $this->getSummaryData();
        return view('dashboard_petugas', $data);
    }

    /**
     * Menampilkan Dashboard untuk Siswa.
     * Menampilkan profil siswa dan riwayat pembayaran SPP milik siswa tersebut.
     */
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

        return view('dashboard_siswa', $data);
    }

    /**
     * Fungsi Helper (Pembantu) untuk mengambil data ringkasan statistik.
     * Digunakan oleh Dashboard Admin dan Petugas agar kode lebih efisien (Reusable).
     */
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
