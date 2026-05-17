<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function pembayaran()
    {
        $pembayaran = [
        (object)[
            'tanggal' => '14 Apr 2026',
            'nama' => 'ABDUL REZA',
            'nisn' => '0000000001',
            'bulan' => 'Agustus 2026',
            'nominal' => '300.000',
            'petugas' => 'petugas'
        ],
        (object)[
            'tanggal' => '14 Apr 2026',
            'nama' => 'RIZQY FIRMAN',
            'nisn' => '0000000003',
            'bulan' => 'Juli 2026',
            'nominal' => '300.000',
            'petugas' => 'petugas'
        ],
        (object)[
            'tanggal' => '14 Apr 2026',
            'nama' => 'BUDI SANTOSO',
            'nisn' => '0000000002',
            'bulan' => 'Juli 2026',
            'nominal' => '300.000',
            'petugas' => 'petugas'
        ],
        (object)[
            'tanggal' => '14 Apr 2026',
            'nama' => 'ABDUL REZA',
            'nisn' => '0000000001',
            'bulan' => 'Juli 2026',
            'nominal' => '300.000',
            'petugas' => 'Administrator'
        ],
    ];

    return view('pembayaran.index', compact('pembayaran'));
}
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
