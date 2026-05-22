<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Menampilkan Halaman Data Siswa (Sesuai Gambar 3)
     */
    public function index() {
        // Data dummy untuk tampilan Data Siswa agar sesuai desain
        $siswa = [
            (object)[
                'nisn' => '0000000001', 
                'nama' => 'ABDUL REZA', 
                'kelas' => 'XI RPL 1', 
                'telepon' => '08123456789'
            ],
            (object)[
                'nisn' => '0000000002', 
                'nama' => 'BUDI SANTOSO', 
                'kelas' => 'XI RPL 2', 
                'telepon' => '08123456789'
            ],
            (object)[
                'nisn' => '0000000003', 
                'nama' => 'RIZQY FIRMAN', 
                'kelas' => 'XI RPL 3', 
                'telepon' => '08123456789'
            ],
        ];

        return view('siswa.index', compact('siswa'));
    }

    /**
     * Menampilkan Halaman Transaksi Pembayaran (Sesuai Gambar 4)
     */
    public function pembayaran()
    {
        // Data dummy yang sama persis dengan tabel di gambar "Transaksi Pembayaran"
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

    public function store(Request $request)
    {
        $request->validate([
            'nisn' => 'required',
            'nama' => 'required',
            'kelas' => 'required',
            'telepon' => 'required'
        ]);

        Siswa::create([
            'nisn'    => $request->nisn,
            'nama'    => $request->nama,
            'kelas'   => $request->kelas,
            'telepon' => $request->telepon
        ]);

        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }

    public function update(Request $request, Siswa $siswa)
    {
        $siswa->update([
            'nisn'    => $request->nisn,
            'nama'    => $request->nama,
            'kelas'   => $request->kelas,
            'telepon' => $request->telepon
        ]);

        return redirect()->back()->with('success', 'Data berhasil diupdate');
    }

    public function destroy(Siswa $siswa)
    {
        $siswa->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}