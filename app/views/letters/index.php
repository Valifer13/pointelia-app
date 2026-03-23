<div class="flex flex-col md:flex-row justify-between gap-4 items-start lg:items-center mb-8 bg-white p-4 rounded-md shadow-md">
    <div class="flex flex-col gap-1">
        <h1 class="text-2xl font-semibold tracking-wide text-zinc-600"><?= $title ?></h1>
        <?php get_breadcrumb() ?>
    </div>
</div>

<div class="w-full overflow-x-auto mb-6">

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mb-8">

        <a href="<?= BASE_URL ?>/letters/add-student-agreement-letter" class="flex items-start p-5 bg-white border border-gray-200 rounded-xl shadow-sm hover:shadow-md hover:border-blue-400 hover:bg-blue-50 transition-all text-left group cursor-pointer">
            <div class="p-3 bg-blue-100 text-blue-600 rounded-lg group-hover:bg-blue-200 transition-colors">
                <i class="fas fa-user-edit text-xl"></i>
            </div>
            <div class="ml-4">
                <h3 class="text-base font-semibold text-gray-900 group-hover:text-blue-700">Surat Perjanjian Siswa</h3>
                <p class="text-sm text-gray-500 mt-1">Buat form komitmen dan perjanjian untuk siswa.</p>
            </div>
        </a>

        <a href="<?= BASE_URL ?>/letters/parental-summons-letter" class="flex items-start p-5 bg-white border border-gray-200 rounded-xl shadow-sm hover:shadow-md hover:border-amber-400 hover:bg-amber-50 transition-all text-left group cursor-pointer">
            <div class="p-3 bg-amber-100 text-amber-600 rounded-lg group-hover:bg-amber-200 transition-colors">
                <i class="fas fa-envelope-open-text text-xl"></i>
            </div>
            <div class="ml-4">
                <h3 class="text-base font-semibold text-gray-900 group-hover:text-amber-700">Panggilan Orang Tua/Wali</h3>
                <p class="text-sm text-gray-500 mt-1">Buat surat undangan pertemuan resmi.</p>
            </div>
        </a>

        <a href="<?= BASE_URL ?>/letters/parental-agreement-letter" class="flex items-start p-6 bg-white border border-gray-200 rounded-xl shadow-sm hover:shadow-md hover:border-emerald-400 hover:bg-emerald-50 transition-all text-left group cursor-pointer">
            <div class="p-3 bg-emerald-100 text-emerald-600 rounded-lg group-hover:bg-emerald-200 transition-colors">
                <i class="fas fa-handshake text-xl"></i>
            </div>
            <div class="ml-4">
                <h3 class="text-base font-semibold text-gray-900 group-hover:text-emerald-700">Perjanjian Orang Tua/Wali</h3>
                <p class="text-sm text-gray-500 mt-1">Buat surat kesepakatan dengan orang tua.</p>
            </div>
        </a>

        <a href="<?= BASE_URL ?>/letters/school-transfer-letter" class="flex items-start p-5 bg-white border border-gray-200 rounded-xl shadow-sm hover:shadow-md hover:border-purple-400 hover:bg-purple-50 transition-all text-left group cursor-pointer">
            <div class="p-3 bg-purple-100 text-purple-600 rounded-lg group-hover:bg-purple-200 transition-colors">
                <i class="fas fa-exchange-alt text-xl"></i>
            </div>
            <div class="ml-4">
                <h3 class="text-base font-semibold text-gray-900 group-hover:text-purple-700">Surat Pindah Sekolah</h3>
                <p class="text-sm text-gray-500 mt-1">Penerbitan dokumen mutasi siswa.</p>
            </div>
        </a>

        <a href="<?= BASE_URL ?>/letters/point-reduction-letter" class="flex items-start p-5 bg-white border border-gray-200 rounded-xl shadow-sm hover:shadow-md hover:border-rose-400 hover:bg-rose-50 transition-all text-left group cursor-pointer">
            <div class="p-3 bg-rose-100 text-rose-600 rounded-lg group-hover:bg-rose-200 transition-colors">
                <i class="fas fa-shield-alt text-xl"></i>
            </div>
            <div class="ml-4">
                <h3 class="text-base font-semibold text-gray-900 group-hover:text-rose-700">Pengurangan Poin</h3>
                <p class="text-sm text-gray-500 mt-1">Dokumen resmi pemulihan poin pelanggaran.</p>
            </div>
        </a>

    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center bg-white">
            <h2 class="text-lg font-semibold text-gray-900">Riwayat Surat Terakhir</h2>

            <div class="relative">
                <input type="text" placeholder="Cari siswa..." class="pl-9 pr-4 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                <i class="fas fa-search absolute left-3 top-2.5 text-gray-400"></i>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 text-gray-600 text-sm">
                        <th class="px-6 py-3 font-medium border-b border-gray-200">No. Surat</th>
                        <th class="px-6 py-3 font-medium border-b border-gray-200">Tanggal</th>
                        <th class="px-6 py-3 font-medium border-b border-gray-200">Jenis Surat</th>
                        <th class="px-6 py-3 font-medium border-b border-gray-200">Nama Siswa</th>
                        <th class="px-6 py-3 font-medium border-b border-gray-200">Status</th>
                        <th class="px-6 py-3 font-medium border-b border-gray-200 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-sm text-gray-700 divide-y divide-gray-100">
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 font-medium text-gray-900">SRT/24/001</td>
                        <td class="px-6 py-4">20 Mar 2026</td>
                        <td class="px-6 py-4">
                            <span class="bg-blue-100 text-blue-700 px-2.5 py-1 rounded-full text-xs font-medium">Perjanjian Siswa</span>
                        </td>
                        <td class="px-6 py-4">Budi Santoso</td>
                        <td class="px-6 py-4">
                            <span class="text-emerald-600 font-medium"><i class="fas fa-check-circle mr-1"></i>Selesai</span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <button onclick="cetakSurat('SRT/24/001')" class="inline-flex items-center px-3 py-1.5 bg-white border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50 hover:text-blue-600 transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 shadow-sm cursor-pointer">
                                <i class="fas fa-print mr-2"></i> Cetak
                            </button>
                        </td>
                    </tr>

                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 font-medium text-gray-900">SRT/24/002</td>
                        <td class="px-6 py-4">18 Mar 2026</td>
                        <td class="px-6 py-4">
                            <span class="bg-amber-100 text-amber-700 px-2.5 py-1 rounded-full text-xs font-medium">Panggilan Ortu</span>
                        </td>
                        <td class="px-6 py-4">Siti Aminah</td>
                        <td class="px-6 py-4">
                            <span class="text-amber-600 font-medium"><i class="fas fa-clock mr-1"></i>Menunggu</span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <button onclick="cetakSurat('SRT/24/002')" class="inline-flex items-center px-3 py-1.5 bg-white border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50 hover:text-blue-600 transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 shadow-sm">
                                <i class="fas fa-print mr-2"></i> Cetak
                            </button>
                        </td>
                    </tr>

                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 font-medium text-gray-900">SRT/24/003</td>
                        <td class="px-6 py-4">15 Mar 2026</td>
                        <td class="px-6 py-4">
                            <span class="bg-purple-100 text-purple-700 px-2.5 py-1 rounded-full text-xs font-medium">Pindah Sekolah</span>
                        </td>
                        <td class="px-6 py-4">Agus Pratama</td>
                        <td class="px-6 py-4">
                            <span class="text-emerald-600 font-medium"><i class="fas fa-check-circle mr-1"></i>Selesai</span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <button onclick="cetakSurat('SRT/24/003')" class="inline-flex items-center px-3 py-1.5 bg-white border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50 hover:text-blue-600 transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 shadow-sm">
                                <i class="fas fa-print mr-2"></i> Cetak
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="px-6 py-4 border-t border-gray-200 bg-gray-50 flex items-center justify-between">
            <span class="text-sm text-gray-500">Menampilkan 1 hingga 3 dari 12 data</span>
            <div class="flex space-x-2">
                <button class="px-3 py-1 border border-gray-300 rounded bg-white text-gray-500 hover:bg-gray-100 disabled:opacity-50" disabled>Sebelumnya</button>
                <button class="px-3 py-1 border border-gray-300 rounded bg-white text-gray-700 hover:bg-gray-100">Selanjutnya</button>
            </div>
        </div>
    </div>

</div>

<script>
    function buatSurat(jenisSurat) {
        // Di aplikasi nyata, ini bisa membuka modal atau pindah ke halaman form
        alert(`Membuka form pembuatan: ${jenisSurat}`);
    }

    function cetakSurat(nomorSurat) {
        // Di aplikasi nyata, ini bisa memicu window.print() atau mengunduh PDF
        if (confirm(`Apakah Anda yakin ingin mencetak dokumen dengan nomor ${nomorSurat}?`)) {
            console.log(`Mencetak ${nomorSurat}...`);
            // window.print();
        }
    }
</script>