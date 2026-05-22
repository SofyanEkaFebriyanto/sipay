<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Siswa;
use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PembayaranController extends Controller
{
    /**
     * Menampilkan daftar transaksi pembayaran
     */
    public function index()
    {
        $pembayarans = Pembayaran::with(['siswa', 'petugas'])->latest('id_pembayaran')->get();
        $siswas = Siswa::with(['kelas', 'spp'])->get();

        return view('pembayaran.index', compact('pembayarans', 'siswas'));
    }

    /**
     * Menyimpan transaksi pembayaran baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'nisn' => 'required|exists:siswa,nisn',
            'bulan_dibayar' => 'required',
            'tahun_dibayar' => 'required|numeric',
            'id_spp' => 'required|exists:spp,id_spp',
            'jumlah_bayar' => 'required|numeric',
        ]);

        // Ambil ID Petugas yang sedang login (petugas/admin)
        $id_petugas = Auth::guard('petugas')->id();

        Pembayaran::create([
            'id_petugas' => $id_petugas,
            'nisn' => $request->nisn,
            'tgl_bayar' => now(),
            'bulan_dibayar' => $request->bulan_dibayar,
            'tahun_dibayar' => $request->tahun_dibayar,
            'id_spp' => $request->id_spp,
            'jumlah_bayar' => $request->jumlah_bayar,
        ]);

        return redirect()->route('pembayaran.index')->with('success', 'Transaksi pembayaran berhasil dicatat.');
    }

    /**
     * Memperbarui data transaksi (hanya bulan dan tahun)
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'bulan_dibayar' => 'required',
            'tahun_dibayar' => 'required|numeric',
        ]);

        $pembayaran = Pembayaran::findOrFail($id);
        $pembayaran->update([
            'bulan_dibayar' => $request->bulan_dibayar,
            'tahun_dibayar' => $request->tahun_dibayar,
        ]);

        return redirect()->route('pembayaran.index')->with('success', 'Data transaksi berhasil diperbarui.');
    }

    /**
     * Membatalkan/Menghapus transaksi pembayaran
     */
    public function destroy($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        $pembayaran->delete();

        return redirect()->route('pembayaran.index')->with('success', 'Transaksi pembayaran telah dibatalkan.');
    }

    /**
     * Halaman Laporan (Placeholder)
     */
    public function laporan()
    {
        return view('pembayaran.laporan');
    }
}
