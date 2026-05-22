<x-app-layout>
    <div class="mb-8 flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-bold text-gray-800 tracking-tight">Data Petugas</h1>
            <p class="text-gray-500 mt-1 font-medium">Mengelola Data Petugas dan Administrator</p>
        </div>
        <div class="flex space-x-3">
            <button class="bg-[#4A6CF7] hover:bg-[#3451b2] text-white px-5 py-2.5 rounded-lg shadow-sm flex items-center font-semibold transition-colors">
                <svg class="w-5 h-5 mr-2 -ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                Tambah
            </button>
        </div>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50 border-b border-gray-100 text-gray-600 text-sm uppercase tracking-wider">
                    <th class="p-4 font-semibold">Username</th>
                    <th class="p-4 font-semibold">Nama Petugas</th>
                    <th class="p-4 font-semibold">Level</th>
                    <th class="p-4 font-semibold text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-700 divide-y divide-gray-100">
                <tr>
                    <td colspan="4" class="p-8 text-center text-gray-500">Halaman Data Petugas (Placeholder)</td>
                </tr>
            </tbody>
        </table>
    </div>
</x-app-layout>
