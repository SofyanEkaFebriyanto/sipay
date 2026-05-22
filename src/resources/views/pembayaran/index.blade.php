<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi Pembayaran - SPP Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style> body { font-family: 'Inter', sans-serif; } </style>
</head>
<body class="bg-slate-100 flex">

    <aside class="w-72 bg-[#4e73df] min-h-screen text-white flex flex-col shadow-xl">
        <div class="p-6 flex items-center gap-3">
            <div class="bg-white p-2 rounded-lg"><svg class="w-6 h-6 text-[#4e73df]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg></div>
            <div><h1 class="font-bold text-lg leading-tight">SPP Admin</h1><p class="text-xs text-blue-100">Sekolah</p></div>
        </div>
        <nav class="flex-1 px-4 mt-4 space-y-1">
            <a href="#" class="flex items-center gap-3 p-3 text-blue-100 hover:bg-white/10 rounded-xl transition">Dashboard</a>
            <a href="#" class="flex items-center gap-3 p-3 bg-white/20 text-white rounded-xl font-semibold shadow-inner">Pembayaran</a>
            <a href="#" class="flex items-center gap-3 p-3 text-blue-100 hover:bg-white/10 rounded-xl transition">Data Siswa</a>
            <a href="#" class="flex items-center gap-3 p-3 text-blue-100 hover:bg-white/10 rounded-xl transition">Data Kelas</a>
            <a href="#" class="flex items-center gap-3 p-3 text-blue-100 hover:bg-white/10 rounded-xl transition">Data SPP</a>
            <a href="#" class="flex items-center gap-3 p-3 text-blue-100 hover:bg-white/10 rounded-xl transition">Data Petugas</a>
        </nav>
        <div class="p-6"><a href="#" class="flex items-center gap-3 p-3 text-blue-100 hover:bg-red-500 rounded-xl transition">Logout</a></div>
    </aside>

    <div class="flex-1 flex flex-col">
        <header class="bg-white px-8 py-4 flex justify-between items-center border-b border-slate-200">
            <div>
                <h2 class="font-extrabold text-slate-800 uppercase">SMK NEGERI 7 BALEENDAH</h2>
                <p class="text-xs text-slate-400">Tahun Pelajaran 2025/2026</p>
            </div>
            <div class="flex items-center gap-4 text-right">
                <div><p class="font-bold text-sm text-slate-800">Administrator</p><p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">Admin</p></div>
                <div class="w-10 h-10 bg-[#4e73df] rounded-full flex items-center justify-center text-white font-bold">A</div>
            </div>
        </header>

        <main class="p-10">
            <div class="flex justify-between items-end mb-10">
                <div>
                    <h1 class="text-3xl font-extrabold text-slate-800 tracking-tight">Transaksi Pembayaran</h1>
                    <p class="text-slate-400 font-medium">Catat dan Pantau Histori Pembayaran SPP</p>
                </div>
                <div class="flex gap-4">
                    <div class="relative">
                        <span class="absolute inset-y-0 left-3 flex items-center text-slate-400 font-bold italic text-sm">Q</span>
                        <input type="text" placeholder="Cari Transaksi...." class="pl-10 pr-4 py-2.5 bg-white border border-slate-200 rounded-xl w-64 focus:outline-none focus:ring-2 focus:ring-blue-400 transition shadow-sm">
                    </div>
                    <button class="bg-[#1cc88a] text-white px-5 py-2.5 rounded-xl font-bold flex items-center gap-2 hover:bg-green-600 transition shadow-lg shadow-green-100">
                        <span class="text-lg">⎙</span> Cetak Laporan
                    </button>
                    <button class="bg-[#4e73df] text-white px-5 py-2.5 rounded-xl font-bold flex items-center gap-2 hover:bg-blue-700 transition shadow-lg shadow-blue-200">
                        <span class="text-xl">+</span> Entry Baru
                    </button>
                </div>
            </div>

            <div class="bg-white rounded-[2rem] shadow-sm border border-slate-100 overflow-hidden">
                <table class="w-full text-left">
                    <thead>
                        <tr class="bg-slate-50/50 border-b border-slate-100">
                            <th class="px-8 py-5 text-[11px] font-extrabold text-slate-400 uppercase tracking-widest">Tanggal</th>
                            <th class="px-8 py-5 text-[11px] font-extrabold text-slate-400 uppercase tracking-widest">Siswa</th>
                            <th class="px-8 py-5 text-[11px] font-extrabold text-slate-400 uppercase tracking-widest">Untuk Bulan</th>
                            <th class="px-8 py-5 text-[11px] font-extrabold text-slate-400 uppercase tracking-widest">Nominal</th>
                            <th class="px-8 py-5 text-[11px] font-extrabold text-slate-400 uppercase tracking-widest">Petugas</th>
                            <th class="px-8 py-5 text-[11px] font-extrabold text-slate-400 uppercase tracking-widest text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        @foreach($pembayaran as $p)
                        <tr class="hover:bg-slate-50/80 transition">
                            <td class="px-8 py-5 text-sm text-slate-600">{{ $p->tanggal }}</td>
                            <td class="px-8 py-5">
                                <p class="text-sm font-extrabold text-slate-800">{{ $p->nama }}</p>
                                <p class="text-[10px] text-slate-400 font-bold uppercase tracking-tighter">NISN: {{ $p->nisn }}</p>
                            </td>
                            <td class="px-8 py-5">
                                <span class="bg-blue-50 text-blue-600 px-3 py-1 rounded-full text-[10px] font-extrabold uppercase tracking-wide border border-blue-100">
                                    {{ $p->bulan }}
                                </span>
                            </td>
                            <td class="px-8 py-5 text-sm font-bold text-slate-800">Rp {{ $p->nominal }}</td>
                            <td class="px-8 py-5 text-sm text-slate-500 font-medium">{{ $p->petugas }}</td>
                            <td class="px-8 py-5 flex justify-center gap-3">
                                <button class="p-2 bg-orange-50 text-orange-500 rounded-xl hover:bg-orange-100 border border-orange-100 transition shadow-sm">✎</button>
                                <button class="p-2 bg-red-50 text-red-500 rounded-xl hover:bg-red-100 border border-red-100 transition shadow-sm">🗑</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</body>
</html>