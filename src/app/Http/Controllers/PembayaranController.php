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
        // Mengambil semua transaksi, beserta data siswa dan petugas yang terkait
        // Diurutkan berdasarkan ID terbaru (transaksi paling baru di atas)
        $pembayarans = Pembayaran::with(['siswa', 'petugas'])
            ->latest('id_pembayaran')
            ->get();

        // Mengambil data siswa beserta kelas dan SPP untuk form input pembayaran baru
        $siswas = Siswa::with(['kelas', 'spp'])->get();

        // Kirim data ke halaman view pembayaran/index
        return view('pembayaran.index', [
            'pembayarans' => $pembayarans,
            'siswas' => $siswas,
        ]);
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

        // Ambil data Petugas yang sedang login (yang menginput pembayaran)
        $petugasLogin = Auth::guard('petugas')->user();
        $id_petugas = $petugasLogin->id_petugas;

        // Ambil tanggal hari ini menggunakan fungsi PHP bawaan
        $tanggalHariIni = date('Y-m-d');

        // Membuat record pembayaran baru
        Pembayaran::create([
            'id_petugas' => $id_petugas,
            'nisn' => $request->nisn,
            'tgl_bayar' => $tanggalHariIni,
            'bulan_dibayar' => $request->bulan_dibayar,
            'tahun_dibayar' => $request->tahun_dibayar,
            'id_spp' => $request->id_spp,
            'jumlah_bayar' => $request->jumlah_bayar,
        ]);

        // Kembali ke halaman daftar pembayaran dengan pesan sukses
        return redirect()->route('pembayaran.index')->with('success', 'Transaksi pembayaran berhasil dicatat.');
    }

    /**
     * Memperbarui detail bulan atau tahun pada transaksi yang sudah ada.
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'bulan_dibayar' => 'required',
            'tahun_dibayar' => 'required|numeric',
        ]);

        // Cari data pembayaran berdasarkan ID
        $pembayaran = Pembayaran::findOrFail($id);

        // Perbarui data bulan dan tahun
        $pembayaran->update([
            'bulan_dibayar' => $request->bulan_dibayar,
            'tahun_dibayar' => $request->tahun_dibayar,
        ]);

        // Kembali ke halaman daftar pembayaran dengan pesan sukses
        return redirect()->route('pembayaran.index')->with('success', 'Data transaksi berhasil diperbarui.');
    }

    /**
     * Membatalkan atau menghapus record transaksi pembayaran.
     */
    public function destroy($id)
    {
        // Cari data pembayaran berdasarkan ID
        $pembayaran = Pembayaran::findOrFail($id);

        // Hapus data pembayaran dari database
        $pembayaran->delete();

        // Kembali ke halaman daftar pembayaran dengan pesan sukses
        return redirect()->route('pembayaran.index')->with('success', 'Transaksi pembayaran telah dibatalkan.');
    }

    /**
     * Menampilkan Halaman Laporan Pembayaran (Tampilan Cetak).
     * Mengambil seluruh data transaksi beserta relasi Siswa, Kelas, dan Petugas.
     */
    public function laporan()
    {
        // Ambil semua data pembayaran beserta relasi siswa, kelas, dan petugas
        // Diurutkan berdasarkan tanggal bayar terbaru
        $pembayarans = Pembayaran::with(['siswa.kelas', 'petugas'])
            ->latest('tgl_bayar')
            ->get();

        // Kirim data ke halaman view laporan cetak
        return view('pembayaran.laporan', ['pembayarans' => $pembayarans]);
    }
}
