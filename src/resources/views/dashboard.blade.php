@extends('layouts.main')

@section('title', 'Dashboard Admin')

@section('content')
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-gray-800">Dashboard Utama</h1>
        <p class="text-gray-500 mt-1">Ringkasan data aplikasi SPP hari ini.</p>
    </div>

    <!-- Kartu Ringkasan: Menampilkan total data untuk akses cepat -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Kartu 1: Total Siswa -->
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 flex items-center">
            <div class="w-14 h-14 rounded-full bg-[#4A6CF7]/10 flex items-center justify-center text-[#4A6CF7] mr-4">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
            </div>
            <div>
                <p class="text-sm font-semibold text-gray-500 uppercase tracking-wide">Total Siswa</p>
                <p class="text-2xl font-extrabold text-gray-800">{{ $totalSiswa ?? 0 }}</p>
            </div>
        </div>

        <!-- Kartu 2: Total Petugas -->
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 flex items-center">
            <div class="w-14 h-14 rounded-full bg-green-50 flex items-center justify-center text-green-600 mr-4">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
            </div>
            <div>
                <p class="text-sm font-semibold text-gray-500 uppercase tracking-wide">Total Petugas</p>
                <p class="text-2xl font-extrabold text-gray-800">{{ $totalPetugas ?? 0 }}</p>
            </div>
        </div>

        <!-- Kartu 3: Total Kelas -->
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 flex items-center">
            <div class="w-14 h-14 rounded-full bg-purple-50 flex items-center justify-center text-purple-600 mr-4">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
            </div>
            <div>
                <p class="text-sm font-semibold text-gray-500 uppercase tracking-wide">Total Kelas</p>
                <p class="text-2xl font-extrabold text-gray-800">{{ $totalKelas ?? 0 }}</p>
            </div>
        </div>

        <!-- Kartu 4: Total SPP -->
        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 flex items-center">
            <div class="w-14 h-14 rounded-full bg-yellow-50 flex items-center justify-center text-yellow-600 mr-4">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
            </div>
            <div>
                <p class="text-sm font-semibold text-gray-500 uppercase tracking-wide">Data SPP</p>
                <p class="text-2xl font-extrabold text-gray-800">{{ $totalSPP ?? 0 }}</p>
            </div>
        </div>
    </div>

    <!-- Tabel Transaksi Terbaru: Daftar pembayaran yang baru saja dilakukan -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="p-6 border-b border-gray-100 flex items-center justify-between">
            <h2 class="text-lg font-bold text-gray-800">Transaksi Pembayaran Terbaru</h2>
            <a href="{{ route('pembayaran.index') }}" class="text-sm font-semibold text-[#4A6CF7] hover:underline">Lihat Semua</a>
        </div>
        <table class="w-full text-left border-collapse">
            <thead class="bg-gray-50 text-gray-500 text-xs uppercase font-semibold tracking-wider">
                <tr>
                    <th class="p-4">Siswa</th>
                    <th class="p-4">Tanggal Bayar</th>
                    <th class="p-4">Bulan/Tahun</th>
                    <th class="p-4">Jumlah</th>
                    <th class="p-4">Petugas</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse ($recentPembayaran ?? [] as $pembayaran)
                <tr class="hover:bg-gray-50/50 transition-colors">
                    <td class="p-4">
                        <p class="font-bold text-gray-900">{{ $pembayaran->siswa->nama ?? 'N/A' }}</p>
                        <p class="text-xs text-gray-500">{{ $pembayaran->nisn }}</p>
                    </td>
                    <td class="p-4 text-sm text-gray-600">{{ $pembayaran->tgl_bayar }}</td>
                    <td class="p-4">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                            {{ $pembayaran->bulan_dibayar }} {{ $pembayaran->tahun_dibayar }}
                        </span>
                    </td>
                    <td class="p-4 font-semibold text-gray-900">Rp {{ number_format($pembayaran->jumlah_bayar, 0, ',', '.') }}</td>
                    <td class="p-4 text-sm text-gray-500">{{ $pembayaran->petugas->nama_petugas ?? 'N/A' }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="p-8 text-center text-gray-500">Belum ada transaksi pembayaran.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection