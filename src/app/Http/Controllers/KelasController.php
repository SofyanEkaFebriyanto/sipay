<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        $kelases = Kelas::all();
        return view('kelas.index', compact('kelases'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kelas' => 'required',
            'kompetensi_keahlian' => 'required',
        ]);

        Kelas::create($request->all());

        return redirect()->route('kelas.index')->with('success', 'Data kelas berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kelas' => 'required',
            'kompetensi_keahlian' => 'required',
        ]);

        $kelas = Kelas::findOrFail($id);
        $kelas->update($request->all());

        return redirect()->route('kelas.index')->with('success', 'Data kelas berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $kelas = Kelas::findOrFail($id);
        $kelas->delete();

        return redirect()->route('kelas.index')->with('success', 'Data kelas berhasil dihapus.');
    }
}
