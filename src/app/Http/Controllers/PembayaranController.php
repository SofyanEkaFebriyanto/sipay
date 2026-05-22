<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Siswa;
use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Controller ini menangani seluruh proses transaksi pembayaran SPP.
 */
class PembayaranController extends Controller
{
    /**
     * Menampilkan daftar transaksi pembayaran yang telah dilakukan.
     */
    public function index()
    {
        // Mengambil transaksi terbaru dengan data siswa dan petugas penginput
        $pembayarans = Pembayaran::with(['siswa', 'petugas'])->latest('id_pembayaran')->get();
        // Mengambil data siswa untuk keperluan form input pembayaran
        $siswas = Siswa::with(['kelas', 'spp'])->get();

        return view('pembayaran.index', compact('pembayarans', 'siswas'));
    }

    /**
     * Mencatat transaksi pembayaran SPP baru ke database.
     */
    public function store(Request $request)
    {
        // Validasi data transaksi
        $request->validate([
            'nisn' => 'required|exists:siswa,nisn',
            'bulan_dibayar' => 'required',
            'tahun_dibayar' => 'required|numeric',
            'id_spp' => 'required|exists:spp,id_spp',
            'jumlah_bayar' => 'required|numeric',
        ]);

        // Mengambil ID Petugas yang sedang aktif (yang menginput pembayaran)
        $id_petugas = Auth::guard('petugas')->id();

        // Membuat record pembayaran
        Pembayaran::create([
            'id_petugas' => $id_petugas,
            'nisn' => $request->nisn,
            'tgl_bayar' => now(), // Tanggal pembayaran otomatis hari ini
            'bulan_dibayar' => $request->bulan_dibayar,
            'tahun_dibayar' => $request->tahun_dibayar,
            'id_spp' => $request->id_spp,
            'jumlah_bayar' => $request->jumlah_bayar,
        ]);

        return redirect()->route('pembayaran.index')->with('success', 'Transaksi pembayaran berhasil dicatat.');
    }

    /**
     * Memperbarui detail bulan atau tahun pada transaksi yang sudah ada.
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
     * Membatalkan atau menghapus record transaksi pembayaran.
     */
    public function destroy($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        $pembayaran->delete();

        return redirect()->route('pembayaran.index')->with('success', 'Transaksi pembayaran telah dibatalkan.');
    }

    /**
     * Menampilkan halaman pembuatan laporan pembayaran.
     */
    public function laporan()
    {
        return view('pembayaran.laporan');
    }
}
