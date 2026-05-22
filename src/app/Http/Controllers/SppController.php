<?php

namespace App\Http\Controllers;

use App\Models\Spp;
use Illuminate\Http\Request;

class SppController extends Controller
{
    public function index()
    {
        $spps = Spp::all();
        return view('spp.index', compact('spps'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tahun' => 'required|integer',
            'nominal' => 'required|integer',
        ]);

        Spp::create($request->all());

        return redirect()->route('spp.index')->with('success', 'Data SPP berhasil ditambahkan.');
    }

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

    public function destroy($id)
    {
        $spp = Spp::findOrFail($id);
        $spp->delete();

        return redirect()->route('spp.index')->with('success', 'Data SPP berhasil dihapus.');
    }
}
