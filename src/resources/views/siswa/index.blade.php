<x-app-layout>
    <div class="mb-8 flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-bold text-gray-800 tracking-tight">Data Siswa</h1>
            <p class="text-gray-500 mt-1 font-medium">Mengelola Data dan Informasi Siswa</p>
        </div>
        <div class="flex space-x-3">
            <button onclick="document.getElementById('modal-add').classList.remove('hidden')" class="bg-[#4A6CF7] hover:bg-[#3451b2] text-white px-5 py-2.5 rounded-lg shadow-sm flex items-center font-semibold transition-colors">
                <svg class="w-5 h-5 mr-2 -ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                Tambah
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

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50 border-b border-gray-100 text-gray-600 text-sm uppercase tracking-wider">
                    <th class="p-4 font-semibold">NISN</th>
                    <th class="p-4 font-semibold">Nama Siswa</th>
                    <th class="p-4 font-semibold">Kelas</th>
                    <th class="p-4 font-semibold text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-700 divide-y divide-gray-100">
                @forelse($siswa as $s)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="p-4 font-medium">{{ $s->nisn }}</td>
                    <td class="p-4 font-bold uppercase">{{ $s->nama }}</td>
                    <td class="p-4">{{ $s->kelas->nama_kelas ?? 'N/A' }}</td>
                    <td class="p-4 flex justify-center space-x-2">
                        <button onclick="openEditModal('{{ $s->nisn }}', '{{ $s->nis }}', '{{ addslashes($s->nama) }}', '{{ $s->id_kelas }}', '{{ addslashes($s->alamat) }}', '{{ $s->no_telp }}', '{{ $s->id_spp }}')" class="w-8 h-8 rounded-full bg-orange-100 text-orange-500 flex items-center justify-center hover:bg-orange-200 transition-colors" title="Edit">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                        </button>
                        <form action="{{ route('siswa.destroy', $s->nisn) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus data siswa ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="w-8 h-8 rounded-full bg-red-100 text-red-500 flex items-center justify-center hover:bg-red-200 transition-colors" title="Hapus">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="p-8 text-center text-gray-500">Belum ada data Siswa tersedia.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @push('modals')
    <!-- Modal Tambah Siswa -->
    <div id="modal-add" class="fixed inset-0 bg-gray-900 bg-opacity-50 hidden flex items-center justify-center z-50 p-4">
        <div class="bg-white rounded-2xl w-full max-w-2xl p-6 shadow-xl">
            <div class="flex justify-between items-center mb-5">
                <h2 class="text-xl font-bold text-gray-800">Tambah Data Siswa</h2>
                <button onclick="document.getElementById('modal-add').classList.add('hidden')" class="text-gray-400 hover:text-gray-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
            <form action="{{ route('siswa.store') }}" method="POST">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">NISN</label>
                        <input type="text" name="nisn" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#4A6CF7] focus:border-[#4A6CF7] block w-full p-2.5" placeholder="10 digit NISN">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">NIS</label>
                        <input type="text" name="nis" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#4A6CF7] focus:border-[#4A6CF7] block w-full p-2.5" placeholder="8 digit NIS">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                        <input type="text" name="nama" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#4A6CF7] focus:border-[#4A6CF7] block w-full p-2.5" placeholder="Nama Lengkap Siswa">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                        <input type="password" name="password" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#4A6CF7] focus:border-[#4A6CF7] block w-full p-2.5" placeholder="Password Login">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Kelas</label>
                        <select name="id_kelas" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#4A6CF7] focus:border-[#4A6CF7] block w-full p-2.5">
                            <option value="">Pilih Kelas</option>
                            @foreach($kelas as $k)
                            <option value="{{ $k->id_kelas }}">{{ $k->nama_kelas }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
                        <textarea name="alamat" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#4A6CF7] focus:border-[#4A6CF7] block w-full p-2.5" rows="2"></textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">No. Telepon</label>
                        <input type="text" name="no_telp" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#4A6CF7] focus:border-[#4A6CF7] block w-full p-2.5" placeholder="Contoh: 0812...">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">SPP</label>
                        <select name="id_spp" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#4A6CF7] focus:border-[#4A6CF7] block w-full p-2.5">
                            <option value="">Pilih Tahun SPP</option>
                            @foreach($spp as $s)
                            <option value="{{ $s->id_spp }}">{{ $s->tahun }} - Rp {{ number_format($s->nominal, 0, ',', '.') }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="flex justify-end space-x-3 mt-6">
                    <button type="button" onclick="document.getElementById('modal-add').classList.add('hidden')" class="px-4 py-2 text-gray-500 bg-gray-100 hover:bg-gray-200 rounded-lg font-medium transition-colors">Batal</button>
                    <button type="submit" class="px-4 py-2 text-white bg-[#4A6CF7] hover:bg-[#3451b2] rounded-lg font-medium transition-colors">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Edit Siswa -->
    <div id="modal-edit" class="fixed inset-0 bg-gray-900 bg-opacity-50 hidden flex items-center justify-center z-50 p-4">
        <div class="bg-white rounded-2xl w-full max-w-2xl p-6 shadow-xl">
            <div class="flex justify-between items-center mb-5">
                <h2 class="text-xl font-bold text-gray-800">Edit Data Siswa</h2>
                <button onclick="document.getElementById('modal-edit').classList.add('hidden')" class="text-gray-400 hover:text-gray-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                </button>
            </div>
            <form id="form-edit" method="POST">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">NISN (Read Only)</label>
                        <input type="text" id="edit-nisn" disabled class="bg-gray-100 border border-gray-300 text-gray-500 text-sm rounded-lg block w-full p-2.5">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">NIS</label>
                        <input type="text" id="edit-nis" name="nis" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#4A6CF7] focus:border-[#4A6CF7] block w-full p-2.5">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                        <input type="text" id="edit-nama" name="nama" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#4A6CF7] focus:border-[#4A6CF7] block w-full p-2.5">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Password (Kosongkan jika tidak ganti)</label>
                        <input type="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#4A6CF7] focus:border-[#4A6CF7] block w-full p-2.5">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Kelas</label>
                        <select id="edit-id_kelas" name="id_kelas" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#4A6CF7] focus:border-[#4A6CF7] block w-full p-2.5">
                            @foreach($kelas as $k)
                            <option value="{{ $k->id_kelas }}">{{ $k->nama_kelas }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
                        <textarea id="edit-alamat" name="alamat" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#4A6CF7] focus:border-[#4A6CF7] block w-full p-2.5" rows="2"></textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">No. Telepon</label>
                        <input type="text" id="edit-no_telp" name="no_telp" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#4A6CF7] focus:border-[#4A6CF7] block w-full p-2.5">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">SPP</label>
                        <select id="edit-id_spp" name="id_spp" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-[#4A6CF7] focus:border-[#4A6CF7] block w-full p-2.5">
                            @foreach($spp as $s)
                            <option value="{{ $s->id_spp }}">{{ $s->tahun }} - Rp {{ number_format($s->nominal, 0, ',', '.') }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="flex justify-end space-x-3 mt-6">
                    <button type="button" onclick="document.getElementById('modal-edit').classList.add('hidden')" class="px-4 py-2 text-gray-500 bg-gray-100 hover:bg-gray-200 rounded-lg font-medium transition-colors">Batal</button>
                    <button type="submit" class="px-4 py-2 text-white bg-[#4A6CF7] hover:bg-[#3451b2] rounded-lg font-medium transition-colors">Perbarui</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openEditModal(nisn, nis, nama, id_kelas, alamat, no_telp, id_spp) {
            document.getElementById('edit-nisn').value = nisn;
            document.getElementById('edit-nis').value = nis;
            document.getElementById('edit-nama').value = nama;
            document.getElementById('edit-id_kelas').value = id_kelas;
            document.getElementById('edit-alamat').value = alamat;
            document.getElementById('edit-no_telp').value = no_telp;
            document.getElementById('edit-id_spp').value = id_spp;
            
            document.getElementById('form-edit').action = '/siswa/' + nisn;
            document.getElementById('modal-edit').classList.remove('hidden');
        }
    </script>
    @endpush
</x-app-layout>
