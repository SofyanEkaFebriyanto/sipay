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
        $kelases = Kelas::all();
        return view('kelas.index', compact('kelases'));
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

        // Membuat record baru di tabel kelas
        Kelas::create($request->all());

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

        // Mencari data kelas, jika tidak ketemu akan error 404
        $kelas = Kelas::findOrFail($id);
        // Memperbarui data kelas
        $kelas->update($request->all());

        return redirect()->route('kelas.index')->with('success', 'Data kelas berhasil diperbarui.');
    }

    /**
     * Menghapus data kelas dari database berdasarkan ID.
     */
    public function destroy($id)
    {
        $kelas = Kelas::findOrFail($id);
        $kelas->delete();

        return redirect()->route('kelas.index')->with('success', 'Data kelas berhasil dihapus.');
    }
}
