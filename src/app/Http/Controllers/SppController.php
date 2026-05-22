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
        $spps = Spp::all();
        return view('spp.index', compact('spps'));
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

        Spp::create($request->all());

        return redirect()->route('spp.index')->with('success', 'Data SPP berhasil ditambahkan.');
    }

    /**
     * Memperbarui data SPP.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'tahun' => 'required|integer',
            'nominal' => 'required|integer',
        ]);

        $spp = Spp::findOrFail($id);
        $spp->update($request->all());

        return redirect()->route('spp.index')->with('success', 'Data SPP berhasil diperbarui.');
    }

    /**
     * Menghapus data SPP.
     */
    public function destroy($id)
    {
        $spp = Spp::findOrFail($id);
        $spp->delete();

        return redirect()->route('spp.index')->with('success', 'Data SPP berhasil dihapus.');
    }
}
