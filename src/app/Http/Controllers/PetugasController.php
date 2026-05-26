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
     * Menyimpan akun petugas/admin baru. (Sedang dalam pengembangan)
     */
    public function store(Request $request)
    {
        // Logika sedang dalam pengembangan
        return redirect()->back();
    }

    /**
     * Memperbarui data petugas. (Sedang dalam pengembangan)
     */
    public function update(Request $request, $id)
    {
        // Logika sedang dalam pengembangan
        return redirect()->back();
    }

    /**
     * Menghapus akun petugas. (Sedang dalam pengembangan)
     */
    public function destroy($id)
    {
        // Logika sedang dalam pengembangan
        return redirect()->back();
    }
}
