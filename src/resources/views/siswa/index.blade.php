@extends('layouts.main')

@section('title', 'Kelola Data Siswa')

@section('content')

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
        <button onclick="document.getElementById('modal-add-siswa').classList.remove('hidden')" class="bg-[#4e73df] text-white px-6 py-2.5 rounded-xl font-bold flex items-center gap-2 hover:bg-blue-700 transition shadow-lg shadow-blue-200">
            <span class="text-xl">+</span> Tambah
        </button>
    </div>
</div>

@if(session('success'))
<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
    <span class="block sm:inline">{{ session('success') }}</span>
</div>
@endif

@if($errors->any())
<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
    <ul class="list-disc pl-5">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif  

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
            @forelse($siswa as $s)
            <tr class="hover:bg-slate-50/80 transition duration-200">
                <td class="px-8 py-5 text-sm text-slate-500 font-medium">{{ $s->nisn }}</td>
                <td class="px-8 py-5 text-sm font-bold text-slate-700 uppercase">{{ $s->nama }}</td>
                <td class="px-8 py-5 text-sm text-slate-500 font-medium">{{ $s->kelas->nama_kelas ?? 'N/A' }}</td>
                <td class="px-8 py-5 text-sm text-slate-500 font-medium">{{ $s->no_telp }}</td>
                <td class="px-8 py-5 flex justify-center gap-3">
                    <button onclick="openEditModalSiswa('{{ $s->nisn }}', '{{ $s->nis }}', '{{ addslashes($s->nama) }}', '{{ $s->id_kelas }}', '{{ addslashes($s->alamat) }}', '{{ $s->no_telp }}', '{{ $s->id_spp }}')" class="p-2.5 bg-orange-50 text-orange-500 rounded-xl hover:bg-orange-100 transition shadow-sm border border-orange-100" title="Edit">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                    </button>
                    <form action="{{ route('siswa.destroy', $s->nisn) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus data siswa ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="p-2.5 bg-red-50 text-red-500 rounded-xl hover:bg-red-100 transition shadow-sm border border-red-100" title="Hapus">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="px-8 py-10 text-center text-slate-400">Belum ada data siswa tersedia</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@push('modals')
<!-- Modal Tambah Siswa -->
<div id="modal-add-siswa" class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm hidden flex items-center justify-center z-50 p-4">
    <div class="bg-white rounded-3xl w-full max-w-2xl shadow-2xl overflow-hidden">
        <div class="bg-[#4e73df] px-8 py-6 flex justify-between items-center text-white">
            <h2 class="text-xl font-bold">Tambah Data Siswa</h2>
            <button onclick="document.getElementById('modal-add-siswa').classList.add('hidden')" class="text-white/70 hover:text-white transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>
        <form action="{{ route('siswa.store') }}" method="POST" class="p-8">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">NISN</label>
                    <input type="text" name="nisn" required class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-400 outline-none transition" placeholder="Masukkan 10 digit NISN">
                </div>
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">NIS</label>
                    <input type="text" name="nis" required class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-400 outline-none transition" placeholder="Masukkan 8 digit NIS">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-bold text-slate-700 mb-2">Nama Lengkap</label>
                    <input type="text" name="nama" required class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-400 outline-none transition" placeholder="Masukkan Nama Lengkap">
                </div>
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Password</label>
                    <input type="password" name="password" required class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-400 outline-none transition" placeholder="Masukkan Password">
                </div>
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Kelas</label>
                    <select name="id_kelas" required class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-400 outline-none transition">
                        <option value="">Pilih Kelas</option>
                        @foreach($kelas as $k)
                        <option value="{{ $k->id_kelas }}">{{ $k->nama_kelas }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-bold text-slate-700 mb-2">Alamat</label>
                    <textarea name="alamat" required class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-400 outline-none transition" rows="3" placeholder="Masukkan Alamat Lengkap"></textarea>
                </div>
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">No. Telepon</label>
                    <input type="text" name="no_telp" required class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-400 outline-none transition" placeholder="Contoh: 08123456789">
                </div>
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">SPP (Tahun)</label>
                    <select name="id_spp" required class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-400 outline-none transition">
                        <option value="">Pilih Tahun SPP</option>
                        @foreach($spp as $s)
                        <option value="{{ $s->id_spp }}">{{ $s->tahun }} - Rp {{ number_format($s->nominal, 0, ',', '.') }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="flex justify-end gap-4 mt-8">
                <button type="button" onclick="document.getElementById('modal-add-siswa').classList.add('hidden')" class="px-6 py-2.5 text-slate-500 font-bold hover:bg-slate-100 rounded-xl transition">Batal</button>
                <button type="submit" class="px-8 py-2.5 bg-[#4e73df] text-white font-bold rounded-xl hover:bg-blue-700 transition shadow-lg shadow-blue-200">Simpan Data</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Edit Siswa -->
<div id="modal-edit-siswa" class="fixed inset-0 bg-slate-900/50 backdrop-blur-sm hidden flex items-center justify-center z-50 p-4">
    <div class="bg-white rounded-3xl w-full max-w-2xl shadow-2xl overflow-hidden">
        <div class="bg-orange-500 px-8 py-6 flex justify-between items-center text-white">
            <h2 class="text-xl font-bold">Edit Data Siswa</h2>
            <button onclick="document.getElementById('modal-edit-siswa').classList.add('hidden')" class="text-white/70 hover:text-white transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>
        <form id="form-edit-siswa" method="POST" class="p-8">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">NISN</label>
                    <input type="text" id="edit-nisn" disabled class="w-full px-4 py-2.5 bg-slate-100 border border-slate-200 rounded-xl text-slate-500">
                </div>
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">NIS</label>
                    <input type="text" id="edit-nis" name="nis" required class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-400 outline-none transition">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-bold text-slate-700 mb-2">Nama Lengkap</label>
                    <input type="text" id="edit-nama" name="nama" required class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-400 outline-none transition">
                </div>
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Password (Kosongkan jika tidak ganti)</label>
                    <input type="password" name="password" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-400 outline-none transition">
                </div>
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Kelas</label>
                    <select id="edit-id_kelas" name="id_kelas" required class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-400 outline-none transition">
                        @foreach($kelas as $k)
                        <option value="{{ $k->id_kelas }}">{{ $k->nama_kelas }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-bold text-slate-700 mb-2">Alamat</label>
                    <textarea id="edit-alamat" name="alamat" required class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-400 outline-none transition" rows="3"></textarea>
                </div>
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">No. Telepon</label>
                    <input type="text" id="edit-no_telp" name="no_telp" required class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-400 outline-none transition">
                </div>
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">SPP (Tahun)</label>
                    <select id="edit-id_spp" name="id_spp" required class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-400 outline-none transition">
                        @foreach($spp as $s)
                        <option value="{{ $s->id_spp }}">{{ $s->tahun }} - Rp {{ number_format($s->nominal, 0, ',', '.') }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="flex justify-end gap-4 mt-8">
                <button type="button" onclick="document.getElementById('modal-edit-siswa').classList.add('hidden')" class="px-6 py-2.5 text-slate-500 font-bold hover:bg-slate-100 rounded-xl transition">Batal</button>
                <button type="submit" class="px-8 py-2.5 bg-orange-500 text-white font-bold rounded-xl hover:bg-orange-600 transition shadow-lg shadow-orange-200">Perbarui Data</button>
            </div>
        </form>
    </div>
</div>

<script>
    function openEditModalSiswa(nisn, nis, nama, id_kelas, alamat, no_telp, id_spp) {
        document.getElementById('edit-nisn').value = nisn;
        document.getElementById('edit-nis').value = nis;
        document.getElementById('edit-nama').value = nama;
        document.getElementById('edit-id_kelas').value = id_kelas;
        document.getElementById('edit-alamat').value = alamat;
        document.getElementById('edit-no_telp').value = no_telp;
        document.getElementById('edit-id_spp').value = id_spp;
        
        document.getElementById('form-edit-siswa').action = '/siswa/' + nisn;
        document.getElementById('modal-edit-siswa').classList.remove('hidden');
    }
</script>
@endpush

@endsection