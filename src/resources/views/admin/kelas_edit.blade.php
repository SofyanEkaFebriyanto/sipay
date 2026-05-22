@extends('layouts.main')

@section('title', 'Edit Data Kelas')

@section('content')

    <div class="mb-8">
        <h1 class="text-2xl font-bold text-gray-800 tracking-tight">Edit Data Kelas</h1>
        <p class="text-gray-500 mt-1 font-medium">Ubah informasi data kelas di bawah ini.</p>
    </div>

    <div class="max-w-2xl bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <form action="{{ route('kelas.update', $kelas->id_kelas) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="nama_kelas" class="block text-sm font-semibold text-gray-700 mb-2">Nama Kelas</label>
                <input type="text" name="nama_kelas" id="nama_kelas" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" value="{{ $kelas->nama_kelas }}" required>
                @error('nama_kelas')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="kompetensi_keahlian" class="block text-sm font-semibold text-gray-700 mb-2">Kompetensi Keahlian</label>
                <input type="text" name="kompetensi_keahlian" id="kompetensi_keahlian" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" value="{{ $kelas->kompetensi_keahlian }}" required>
                @error('kompetensi_keahlian')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-end space-x-3">
                <a href="{{ route('kelas.index') }}" class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-lg transition-colors">Batal</a>
                <button type="submit" class="px-4 py-2 text-sm font-medium text-white bg-[#4A6CF7] hover:bg-[#3b5edb] rounded-lg shadow-sm transition-colors">Perbarui Data</button>
            </div>
        </form>
    </div>

@endsection
