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
     * Menyimpan data siswa baru ke database.
     */
    public function store(Request $request)
    {
        // Validasi input: Memastikan NISN unik dan data lainnya valid
        $request->validate([
            'nisn' => 'required|unique:siswa,nisn',
            'nis' => 'required',
            'nama' => 'required',
            'password' => 'required',
            'id_kelas' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'id_spp' => 'required'
        ]);

        // Membuat data siswa baru dengan password yang di-enkripsi (bcrypt)
        Siswa::create([
            'nisn'     => $request->nisn,
            'nis'      => $request->nis,
            'nama'     => $request->nama,
            'password' => bcrypt($request->password),
            'id_kelas' => $request->id_kelas,
            'alamat'   => $request->alamat,
            'no_telp'  => $request->no_telp,
            'id_spp'   => $request->id_spp
        ]);

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil ditambahkan');
    }

    /**
     * Memperbarui data siswa yang sudah ada.
     */
    public function update(Request $request, $nisn)
    {
        $request->validate([
            'nis' => 'required',
            'nama' => 'required',
            'id_kelas' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'id_spp' => 'required'
        ]);

        $siswa = Siswa::findOrFail($nisn);

        $data = [
            'nis'      => $request->nis,
            'nama'     => $request->nama,
            'id_kelas' => $request->id_kelas,
            'alamat'   => $request->alamat,
            'no_telp'  => $request->no_telp,
            'id_spp'   => $request->id_spp
        ];

        // Jika password diisi, maka update passwordnya
        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }

        $siswa->update($data);

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil diupdate');
    }

    /**
     * Menghapus data siswa berdasarkan NISN.
     */
    public function destroy($nisn)
    {
        $siswa = Siswa::findOrFail($nisn);
        $siswa->delete();
        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil dihapus');
    }
}
