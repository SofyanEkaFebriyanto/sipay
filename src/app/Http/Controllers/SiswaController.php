<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Spp;
use Illuminate\Http\Request;

/**
 * Controller ini menangani manajemen data Siswa.
 */
class SiswaController extends Controller
{
    /**
     * Menampilkan daftar semua siswa beserta relasi kelas dan SPP-nya.
     */
    public function index() {
        // Mengambil data siswa dengan eager loading untuk efisiensi query
        $siswa = Siswa::with(['kelas', 'spp'])->get();
        // Mengambil data pendukung untuk form tambah/edit
        $kelas = Kelas::all();
        $spp = Spp::all();

        return view('siswa.index', compact('siswa', 'kelas', 'spp'));
    }

    /**
     * Menampilkan Halaman Transaksi Pembayaran (Data Contoh)
     */
    public function pembayaran()
    {
        // Menyediakan data objek untuk simulasi tampilan riwayat pembayaran
        $pembayaran = [
            (object)[
                'tanggal' => '14 Apr 2026',
                'nama'    => 'ABDUL REZA',
                'nisn'    => '0000000001',
                'bulan'   => 'Agustus 2026',
                'nominal' => '300.000',
                'petugas' => 'petugas'
            ],
            (object)[
                'tanggal' => '14 Apr 2026',
                'nama'    => 'RIZQY FIRMAN',
                'nisn'    => '0000000003',
                'bulan'   => 'Juli 2026',
                'nominal' => '300.000',
                'petugas' => 'petugas'
            ],
            (object)[
                'tanggal' => '14 Apr 2026',
                'nama'    => 'BUDI SANTOSO',
                'nisn'    => '0000000002',
                'bulan'   => 'Juli 2026',
                'nominal' => '300.000',
                'petugas' => 'petugas'
            ],
            (object)[
                'tanggal' => '14 Apr 2026',
                'nama'    => 'ABDUL REZA',
                'nisn'    => '0000000001',
                'bulan'   => 'Juli 2026',
                'nominal' => '300.000',
                'petugas' => 'Administrator'
            ],
        ];

        return view('pembayaran.index', compact('pembayaran'));
    }

    /**
     * Menyimpan data siswa baru ke database. (Sedang dalam pengembangan)
     */
    public function store(Request $request)
    {
        // Logika sedang dalam pengembangan
        return redirect()->back();
    }

    /**
     * Memperbarui data siswa yang sudah ada. (Sedang dalam pengembangan)
     */
    public function update(Request $request, $nisn)
    {
        // Logika sedang dalam pengembangan
        return redirect()->back();
    }

    /**
     * Menghapus data siswa berdasarkan NISN. (Sedang dalam pengembangan)
     */
    public function destroy($nisn)
    {
        // Logika sedang dalam pengembangan
        return redirect()->back();
    }
}
