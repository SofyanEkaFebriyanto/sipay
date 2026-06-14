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
        // Ambil data ringkasan statistik
        $data = $this->getSummaryData();

        // Kirim data ke view dashboard admin
        return view('dashboard', $data);
    }

    /**
     * Menampilkan Dashboard untuk Petugas.
     * Sama seperti admin, namun dengan akses menu yang mungkin terbatas di view.
     */
    public function petugas()
    {
        // Ambil data ringkasan statistik
        $data = $this->getSummaryData();

        // Kirim data ke view dashboard petugas
        return view('dashboard_petugas', $data);
    }

    /**
     * Menampilkan Dashboard untuk Siswa.
     * Menampilkan profil siswa dan riwayat pembayaran SPP milik siswa tersebut.
     */
    public function siswa()
    {
        // Ambil data siswa yang sedang login dari guard 'siswa'
        $user = Auth::guard('siswa')->user();

        // Ambil riwayat pembayaran milik siswa ini beserta data petugas penginput
        // Diurutkan berdasarkan tanggal bayar terbaru
        $pembayarans = Pembayaran::with('petugas')
            ->where('nisn', $user->nisn)
            ->latest('tgl_bayar')
            ->get();

        // Kirim data ke view dashboard siswa menggunakan array manual
        return view('dashboard_siswa', [
            'siswa' => $user,
            'pembayarans' => $pembayarans,
        ]);
    }

    /**
     * Fungsi Helper (Pembantu) untuk mengambil data ringkasan statistik.
     * Digunakan oleh Dashboard Admin dan Petugas agar kode lebih efisien (Reusable).
     */
    private function getSummaryData()
    {
        // Hitung total masing-masing data
        $totalSiswa = Siswa::count();
        $totalPetugas = Petugas::count();
        $totalKelas = Kelas::count();
        $totalSPP = Spp::count();

        // Ambil 5 transaksi pembayaran terbaru beserta data siswa dan petugas
        $recentPembayaran = Pembayaran::with(['siswa', 'petugas'])
            ->latest('id_pembayaran')
            ->take(5)
            ->get();

        // Kembalikan data dalam bentuk array
        return [
            'totalSiswa' => $totalSiswa,
            'totalPetugas' => $totalPetugas,
            'totalKelas' => $totalKelas,
            'totalSPP' => $totalSPP,
            'recentPembayaran' => $recentPembayaran,
        ];
    }
}
