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
        $users = Petugas::all();
        return view('user.index', compact('users'));
    }

    /**
     * Menyimpan akun petugas/admin baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_petugas' => 'required',
            'username' => 'required|unique:petugas,username',
            'password' => 'required|min:6',
            'level' => 'required|in:admin,petugas', // Level hanya boleh admin atau petugas
        ]);

        Petugas::create([
            'nama_petugas' => $request->nama_petugas,
            'username' => $request->username,
            'password' => Hash::make($request->password), // Password di-hash agar aman
            'level' => $request->level,
        ]);

        return redirect()->route('user.index')->with('success', 'Data petugas berhasil ditambahkan.');
    }

    /**
     * Memperbarui data petugas.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_petugas' => 'required',
            'username' => 'required|unique:petugas,username,' . $id . ',id_petugas',
            'level' => 'required|in:admin,petugas',
        ]);

        $petugas = Petugas::findOrFail($id);
        
        $data = [
            'nama_petugas' => $request->nama_petugas,
            'username' => $request->username,
            'level' => $request->level,
        ];

        // Hanya mengupdate password jika kolom password diisi
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $petugas->update($data);

        return redirect()->route('user.index')->with('success', 'Data petugas berhasil diperbarui.');
    }

    /**
     * Menghapus akun petugas.
     */
    public function destroy($id)
    {
        $petugas = Petugas::findOrFail($id);
        $petugas->delete();

        return redirect()->route('user.index')->with('success', 'Data petugas berhasil dihapus.');
    }
}
