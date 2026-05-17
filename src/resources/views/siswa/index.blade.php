<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPP Admin Sekolah - SMK NEGERI 7 BALEENDAH</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style> body { font-family: 'Inter', sans-serif; } </style>
</head>
<body class="bg-slate-100 flex">

    <aside class="w-72 bg-[#4e73df] min-h-screen text-white flex flex-col shadow-xl">
        <div class="p-6 flex items-center gap-3">
            <div class="bg-white p-2 rounded-lg shadow-sm">
                <svg class="w-6 h-6 text-[#4e73df]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
            </div>
            <div>
                <h1 class="font-bold text-lg leading-tight tracking-wide">SPP Admin</h1>
                <p class="text-xs font-medium text-blue-100">Sekolah</p>
            </div>
        </div>

        <nav class="flex-1 px-4 mt-4 space-y-1">
            <a href="#" class="flex items-center gap-3 p-3 text-blue-100 hover:bg-white/10 rounded-xl transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                Dashboard
            </a>
            <a href="#" class="flex items-center gap-3 p-3 text-blue-100 hover:bg-white/10 rounded-xl transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                Pembayaran
            </a>
            <a href="#" class="flex items-center gap-3 p-3 bg-white/20 text-white rounded-xl font-semibold shadow-inner">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                Data Siswa
            </a>
            <a href="#" class="flex items-center gap-3 p-3 text-blue-100 hover:bg-white/10 rounded-xl transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                Data Kelas
            </a>
            <a href="#" class="flex items-center gap-3 p-3 text-blue-100 hover:bg-white/10 rounded-xl transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
                Data SPP
            </a>
            <a href="#" class="flex items-center gap-3 p-3 text-blue-100 hover:bg-white/10 rounded-xl transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                Data Petugas
            </a>
        </nav>

        <div class="p-6">
            <a href="#" class="flex items-center gap-3 p-3 text-blue-100 hover:bg-red-500 rounded-xl transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                Logout
            </a>
        </div>
    </aside>

    <div class="flex-1 flex flex-col">
        <header class="bg-white px-8 py-4 flex justify-between items-center border-b border-slate-200">
            <div>
                <h2 class="font-extrabold text-slate-800 tracking-tight">SMK NEGERI 7 BALEENDAH</h2>
                <p class="text-xs text-slate-400 font-medium">Tahun Pelajaran 2025/2026</p>
            </div>
            <div class="flex items-center gap-4">
                <div class="text-right">
                    <p class="font-bold text-slate-800 text-sm">Administrator</p>
                    <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest text-right">Admin</p>
                </div>
                <div class="w-10 h-10 bg-[#4e73df] rounded-full flex items-center justify-center text-white font-bold shadow-md">
                    A
                </div>
            </div>
        </header>

        <main class="p-10">
            <div class="flex justify-between items-end mb-10">
                <div>
                    <h1 class="text-3xl font-extrabold text-slate-800 tracking-tight">Data Siswa</h1>
                    <p class="text-slate-400 font-medium">Mengelola Data dan Informasi Siswa</p>
                </div>
                <div class="flex gap-4">
                    <div class="relative">
                        <span class="absolute inset-y-0 left-3 flex items-center text-slate-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        </span>
                        <input type="text" placeholder="Cari Siswa...." class="pl-10 pr-4 py-2.5 bg-white border border-slate-200 rounded-xl w-72 focus:outline-none focus:ring-2 focus:ring-blue-400 transition-all shadow-sm">
                    </div>
                    <button class="bg-[#4e73df] text-white px-6 py-2.5 rounded-xl font-bold flex items-center gap-2 hover:bg-blue-700 transition shadow-lg shadow-blue-200">
                        <span class="text-xl">+</span> Tambah
                    </button>
                </div>
            </div>

            <div class="bg-white rounded-[2rem] shadow-sm border border-slate-100 overflow-hidden">
                <table class="w-full text-left">
                    <thead>
                        <tr class="bg-slate-50/50 border-b border-slate-100">
                            <th class="px-8 py-5 text-[11px] font-extrabold text-slate-400 uppercase tracking-widest">NISN</th>
                            <th class="px-8 py-5 text-[11px] font-extrabold text-slate-400 uppercase tracking-widest">Nama Siswa</th>
                            <th class="px-8 py-5 text-[11px] font-extrabold text-slate-400 uppercase tracking-widest">Kelas</th>
                            <th class="px-8 py-5 text-[11px] font-extrabold text-slate-400 uppercase tracking-widest">No. Telepon</th>
                            <th class="px-8 py-5 text-[11px] font-extrabold text-slate-400 uppercase tracking-widest text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        @foreach($siswa as $s)
                        <tr class="hover:bg-slate-50/80 transition duration-200">
                            <td class="px-8 py-5 text-sm text-slate-500 font-medium">{{ $s->nisn }}</td>
                            <td class="px-8 py-5 text-sm font-bold text-slate-700 uppercase">{{ $s->nama }}</td>
                            <td class="px-8 py-5 text-sm text-slate-500 font-medium">{{ $s->kelas }}</td>
                            <td class="px-8 py-5 text-sm text-slate-500 font-medium">{{ $s->telepon }}</td>
                            <td class="px-8 py-5 flex justify-center gap-3">
                                <button class="p-2.5 bg-orange-50 text-orange-500 rounded-xl hover:bg-orange-100 transition shadow-sm border border-orange-100">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                                </button>
                                <button class="p-2.5 bg-red-50 text-red-500 rounded-xl hover:bg-red-100 transition shadow-sm border border-red-100">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                </button>
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