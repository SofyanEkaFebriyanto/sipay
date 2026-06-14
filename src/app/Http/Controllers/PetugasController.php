<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

/**
 * Controller ini menangani manajemen data Petugas dan Admin.
 */
class PetugasController extends Controller
{
    /**
     * Menampilkan daftar semua petugas dan admin.
     */
    public function index()
    {
        // Ambil semua data petugas dari database
        $users = Petugas::all();

        // Kirim data ke halaman view user/index
        return view('user.index', ['users' => $users]);
    }

    /**
     * Menyimpan akun petugas/admin baru.
     */
    public function store(Request $request)
    {
        // Validasi input data petugas baru
        $request->validate([
            'nama_petugas' => 'required',
            'username' => 'required|unique:petugas,username',
            'password' => 'required|min:6',
            'level' => 'required|in:admin,petugas', // Level hanya boleh admin atau petugas
        ]);

        // Buat data petugas baru dengan password yang di-hash
        Petugas::create([
            'nama_petugas' => $request->nama_petugas,
            'username' => $request->username,
            'password' => Hash::make($request->password), // Password di-hash agar aman
            'level' => $request->level,
        ]);

        // Kembali ke halaman daftar petugas dengan pesan sukses
        return redirect()->route('user.index')->with('success', 'Data petugas berhasil ditambahkan.');
    }

    /**
     * Memperbarui data petugas.
     */
    public function update(Request $request, $id)
    {
        // Validasi input data
        $request->validate([
            'nama_petugas' => 'required',
            'username' => 'required|unique:petugas,username,' . $id . ',id_petugas',
            'level' => 'required|in:admin,petugas',
        ]);

        // Cari data petugas berdasarkan ID
        $petugas = Petugas::findOrFail($id);

        // Siapkan data yang akan diupdate
        $data = [
            'nama_petugas' => $request->nama_petugas,
            'username' => $request->username,
            'level' => $request->level,
        ];

        // Hanya mengupdate password jika kolom password diisi (tidak kosong)
        if ($request->password != null) {
            $data['password'] = Hash::make($request->password);
        }

        // Simpan perubahan ke database
        $petugas->update($data);

        // Kembali ke halaman daftar petugas dengan pesan sukses
        return redirect()->route('user.index')->with('success', 'Data petugas berhasil diperbarui.');
    }

    /**
     * Menghapus akun petugas.
     */
    public function destroy($id)
    {
        // Cari data petugas berdasarkan ID
        $petugas = Petugas::findOrFail($id);

        // Hapus data petugas dari database
        $petugas->delete();

        // Kembali ke halaman daftar petugas dengan pesan sukses
        return redirect()->route('user.index')->with('success', 'Data petugas berhasil dihapus.');
    }
}
