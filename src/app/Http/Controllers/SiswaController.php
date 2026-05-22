<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Spp;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Menampilkan Halaman Data Siswa
     */
    public function index() {
        $siswa = Siswa::with(['kelas', 'spp'])->get();
        $kelas = Kelas::all();
        $spp = Spp::all();

        return view('siswa.index', compact('siswa', 'kelas', 'spp'));
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
            'nisn' => 'required|unique:siswa,nisn',
            'nis' => 'required',
            'nama' => 'required',
            'password' => 'required',
            'id_kelas' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'id_spp' => 'required'
        ]);

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

        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }

        $siswa->update($data);

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil diupdate');
    }

    public function destroy($nisn)
    {
        $siswa = Siswa::findOrFail($nisn);
        $siswa->delete();
        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil dihapus');
    }
}