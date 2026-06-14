<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

/**
 * Controller ini menangani operasi CRUD (Create, Read, Update, Delete)
 * untuk data Kelas.
 */
class KelasController extends Controller
{
    /**
     * Menampilkan daftar semua kelas yang ada.
     */
    public function index()
    {
        // Ambil semua data kelas dari database
        $kelases = Kelas::all();

        // Kirim data ke halaman view kelas/index
        return view('kelas.index', ['kelases' => $kelases]);
    }

    /**
     * Menyimpan data kelas baru ke dalam database.
     */
    public function store(Request $request)
    {
        // Validasi data input: Nama kelas dan kompetensi keahlian wajib diisi
        $request->validate([
            'nama_kelas' => 'required',
            'kompetensi_keahlian' => 'required',
        ]);

        // Membuat record baru di tabel kelas dengan kolom yang jelas
        Kelas::create([
            'nama_kelas' => $request->nama_kelas,
            'kompetensi_keahlian' => $request->kompetensi_keahlian,
        ]);

        // Kembali ke halaman daftar kelas dengan pesan sukses
        return redirect()->route('kelas.index')->with('success', 'Data kelas berhasil ditambahkan.');
    }

    /**
     * Memperbarui data kelas yang sudah ada berdasarkan ID.
     */
    public function update(Request $request, $id)
    {
        // Validasi data input
        $request->validate([
            'nama_kelas' => 'required',
            'kompetensi_keahlian' => 'required',
        ]);

        // Mencari data kelas berdasarkan ID, jika tidak ketemu akan error 404
        $kelas = Kelas::findOrFail($id);

        // Memperbarui data kelas dengan kolom yang jelas
        $kelas->update([
            'nama_kelas' => $request->nama_kelas,
            'kompetensi_keahlian' => $request->kompetensi_keahlian,
        ]);

        // Kembali ke halaman daftar kelas dengan pesan sukses
        return redirect()->route('kelas.index')->with('success', 'Data kelas berhasil diperbarui.');
    }

    /**
     * Menghapus data kelas dari database berdasarkan ID.
     */
    public function destroy($id)
    {
        // Cari data kelas berdasarkan ID
        $kelas = Kelas::findOrFail($id);

        // Hapus data kelas dari database
        $kelas->delete();

        // Kembali ke halaman daftar kelas dengan pesan sukses
        return redirect()->route('kelas.index')->with('success', 'Data kelas berhasil dihapus.');
    }
}
