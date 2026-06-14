<?php

namespace App\Http\Controllers;

use App\Models\Spp;
use Illuminate\Http\Request;

/**
 * Controller ini mengelola data nominal SPP per tahun.
 */
class SppController extends Controller
{
    /**
     * Menampilkan daftar semua data SPP.
     */
    public function index()
    {
        // Ambil semua data SPP dari database
        $spps = Spp::all();

        // Kirim data ke halaman view spp/index
        return view('spp.index', ['spps' => $spps]);
    }

    /**
     * Menambahkan nominal SPP baru untuk tahun tertentu.
     */
    public function store(Request $request)
    {
        // Validasi: Tahun dan Nominal harus berupa angka
        $request->validate([
            'tahun' => 'required|integer',
            'nominal' => 'required|integer',
        ]);

        // Buat data SPP baru dengan kolom yang jelas
        Spp::create([
            'tahun' => $request->tahun,
            'nominal' => $request->nominal,
        ]);

        // Kembali ke halaman daftar SPP dengan pesan sukses
        return redirect()->route('spp.index')->with('success', 'Data SPP berhasil ditambahkan.');
    }

    /**
     * Memperbarui data SPP.
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'tahun' => 'required|integer',
            'nominal' => 'required|integer',
        ]);

        // Cari data SPP berdasarkan ID
        $spp = Spp::findOrFail($id);

        // Perbarui data SPP dengan kolom yang jelas
        $spp->update([
            'tahun' => $request->tahun,
            'nominal' => $request->nominal,
        ]);

        // Kembali ke halaman daftar SPP dengan pesan sukses
        return redirect()->route('spp.index')->with('success', 'Data SPP berhasil diperbarui.');
    }

    /**
     * Menghapus data SPP.
     */
    public function destroy($id)
    {
        // Cari data SPP berdasarkan ID
        $spp = Spp::findOrFail($id);

        // Hapus data SPP dari database
        $spp->delete();

        // Kembali ke halaman daftar SPP dengan pesan sukses
        return redirect()->route('spp.index')->with('success', 'Data SPP berhasil dihapus.');
    }
}
