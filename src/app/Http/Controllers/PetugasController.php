<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PetugasController extends Controller
{
    public function index()
    {
        $users = Petugas::all();
        return view('user.index', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_petugas' => 'required',
            'username' => 'required|unique:petugas,username',
            'password' => 'required|min:6',
            'level' => 'required|in:admin,petugas',
        ]);

        Petugas::create([
            'nama_petugas' => $request->nama_petugas,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'level' => $request->level,
        ]);

        return redirect()->route('user.index')->with('success', 'Data petugas berhasil ditambahkan.');
    }

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

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $petugas->update($data);

        return redirect()->route('user.index')->with('success', 'Data petugas berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $petugas = Petugas::findOrFail($id);
        $petugas->delete();

        return redirect()->route('user.index')->with('success', 'Data petugas berhasil dihapus.');
    }
}
