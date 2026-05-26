<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Siswa;
use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Controller ini menangani seluruh proses transaksi pembayaran SPP.
 */
class PembayaranController extends Controller
{
    /**
     * Menampilkan daftar transaksi pembayaran yang telah dilakukan.
     */
    public function index()
    {
        // Mengambil transaksi terbaru dengan data siswa dan petugas penginput
        $pembayarans = Pembayaran::with(['siswa', 'petugas'])->latest('id_pembayaran')->get();
        // Mengambil data siswa untuk keperluan form input pembayaran
        $siswas = Siswa::with(['kelas', 'spp'])->get();

        return view('pembayaran.index', compact('pembayarans', 'siswas'));
    }

    /**
     * Mencatat transaksi pembayaran SPP baru ke database. (Sedang dalam pengembangan)
     */
    public function store(Request $request)
    {
        // Logika sedang dalam pengembangan
        return redirect()->back();
    }

    /**
     * Memperbarui detail bulan atau tahun pada transaksi yang sudah ada. (Sedang dalam pengembangan)
     */
    public function update(Request $request, $id)
    {
        // Logika sedang dalam pengembangan
        return redirect()->back();
    }

    /**
     * Membatalkan atau menghapus record transaksi pembayaran. (Sedang dalam pengembangan)
     */
    public function destroy($id)
    {
        // Logika sedang dalam pengembangan
        return redirect()->back();
    }

    /**
     * Menampilkan Halaman Laporan Pembayaran (Tampilan Cetak).
     * Mengambil seluruh data transaksi beserta relasi Siswa, Kelas, dan Petugas.
     */
    public function laporan()
    {
        // Ambil semua data pembayaran beserta relasi siswa, kelas, dan petugas
        $pembayarans = Pembayaran::with(['siswa.kelas', 'petugas'])->latest('tgl_bayar')->get();
        return view('pembayaran.laporan', compact('pembayarans'));
    }
}
