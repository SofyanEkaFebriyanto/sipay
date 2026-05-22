<x-app-layout>
    <div class="mb-8 flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-bold text-gray-800 tracking-tight">Laporan Pembayaran</h1>
            <p class="text-gray-500 mt-1 font-medium">Rekapitulasi dan Laporan Transaksi SPP</p>
        </div>
        <!-- Area Aksi Laporan: Tombol untuk ekspor data -->
        <div class="flex space-x-3">
            <button class="bg-green-600 hover:bg-green-700 text-white px-5 py-2.5 rounded-lg shadow-sm flex items-center font-semibold transition-colors">
                <svg class="w-5 h-5 mr-2 -ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                Export Excel
            </button>
        </div>
    </div>

    <!-- Kontainer Laporan -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="p-8 text-center text-gray-500">Halaman Laporan Pembayaran (Placeholder)</div>
    </div>
</x-app-layout>
