<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Spp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

/**
 * Controller ini menangani manajemen data Siswa.
 */
class SiswaController extends Controller
{
    /**
     * Menampilkan daftar semua siswa beserta relasi kelas dan SPP-nya.
     */
    public function index()
    {
        // Mengambil data siswa beserta data kelas dan SPP yang terkait
        $siswa = Siswa::with(['kelas', 'spp'])->get();

        // Mengambil data kelas untuk dropdown di form tambah/edit
        $kelas = Kelas::all();

        // Mengambil data SPP untuk dropdown di form tambah/edit
        $spp = Spp::all();

        // Kirim semua data ke halaman view siswa/index
        return view('siswa.index', [
            'siswa' => $siswa,
            'kelas' => $kelas,
            'spp' => $spp,
        ]);
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

        // Membuat data siswa baru dengan password yang di-hash agar aman
        Siswa::create([
            'nisn'     => $request->nisn,
            'nis'      => $request->nis,
            'nama'     => $request->nama,
            'password' => Hash::make($request->password),
            'id_kelas' => $request->id_kelas,
            'alamat'   => $request->alamat,
            'no_telp'  => $request->no_telp,
            'id_spp'   => $request->id_spp
        ]);

        // Kembali ke halaman daftar siswa dengan pesan sukses
        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil ditambahkan');
    }

    /**
     * Memperbarui data siswa yang sudah ada.
     */
    public function update(Request $request, $nisn)
    {
        // Validasi input
        $request->validate([
            'nis' => 'required',
            'nama' => 'required',
            'id_kelas' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'id_spp' => 'required'
        ]);

        // Cari data siswa berdasarkan NISN
        $siswa = Siswa::findOrFail($nisn);

        // Siapkan data yang akan diupdate
        $data = [
            'nis'      => $request->nis,
            'nama'     => $request->nama,
            'id_kelas' => $request->id_kelas,
            'alamat'   => $request->alamat,
            'no_telp'  => $request->no_telp,
            'id_spp'   => $request->id_spp
        ];

        // Jika password diisi, maka update juga passwordnya
        if ($request->password != null) {
            $data['password'] = Hash::make($request->password);
        }

        // Simpan perubahan ke database
        $siswa->update($data);

        // Kembali ke halaman daftar siswa dengan pesan sukses
        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil diupdate');
    }

    /**
     * Menghapus data siswa berdasarkan NISN.
     */
    public function destroy($nisn)
    {
        // Cari data siswa berdasarkan NISN
        $siswa = Siswa::findOrFail($nisn);

        // Hapus data siswa dari database
        $siswa->delete();

        // Kembali ke halaman daftar siswa dengan pesan sukses
        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil dihapus');
    }
}
