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

        <a href="<?= BASE_URL ?>/letters/add-guardian-invit-letter" class="flex items-start p-5 bg-white border border-gray-200 rounded-xl shadow-sm hover:shadow-md hover:border-amber-400 hover:bg-amber-50 transition-all text-left group cursor-pointer">
            <div class="p-3 bg-amber-100 text-amber-600 rounded-lg group-hover:bg-amber-200 transition-colors">
                <i class="fas fa-envelope-open-text text-xl"></i>
            </div>
            <div class="ml-4">
                <h3 class="text-base font-semibold text-gray-900 group-hover:text-amber-700">Panggilan Orang Tua/Wali</h3>
                <p class="text-sm text-gray-500 mt-1">Buat surat undangan pertemuan resmi.</p>
            </div>
        </a>

        <a href="<?= BASE_URL ?>/letters/add-guardian-agreement-letter" class="flex items-start p-6 bg-white border border-gray-200 rounded-xl shadow-sm hover:shadow-md hover:border-emerald-400 hover:bg-emerald-50 transition-all text-left group cursor-pointer">
            <div class="p-3 bg-emerald-100 text-emerald-600 rounded-lg group-hover:bg-emerald-200 transition-colors">
                <i class="fas fa-handshake text-xl"></i>
            </div>
            <div class="ml-4">
                <h3 class="text-base font-semibold text-gray-900 group-hover:text-emerald-700">Perjanjian Orang Tua/Wali</h3>
                <p class="text-sm text-gray-500 mt-1">Buat surat kesepakatan dengan orang tua.</p>
            </div>
        </a>

        <a href="<?= BASE_URL ?>/letters/add-school-transfer-letter" class="flex items-start p-5 bg-white border border-gray-200 rounded-xl shadow-sm hover:shadow-md hover:border-purple-400 hover:bg-purple-50 transition-all text-left group cursor-pointer">
            <div class="p-3 bg-purple-100 text-purple-600 rounded-lg group-hover:bg-purple-200 transition-colors">
                <i class="fas fa-exchange-alt text-xl"></i>
            </div>
            <div class="ml-4">
                <h3 class="text-base font-semibold text-gray-900 group-hover:text-purple-700">Surat Pindah Sekolah</h3>
                <p class="text-sm text-gray-500 mt-1">Penerbitan dokumen mutasi siswa.</p>
            </div>
        </a>

        <!-- <a href="<?= BASE_URL ?>/letters/add-point-reduction-letter" class="flex items-start p-5 bg-white border border-gray-200 rounded-xl shadow-sm hover:shadow-md hover:border-rose-400 hover:bg-rose-50 transition-all text-left group cursor-pointer">
            <div class="p-3 bg-rose-100 text-rose-600 rounded-lg group-hover:bg-rose-200 transition-colors">
                <i class="fas fa-shield-alt text-xl"></i>
            </div>
            <div class="ml-4">
                <h3 class="text-base font-semibold text-gray-900 group-hover:text-rose-700">Pengurangan Poin</h3>
                <p class="text-sm text-gray-500 mt-1">Dokumen resmi pemulihan poin pelanggaran.</p>
            </div>
        </a> -->

    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center bg-white flex-col md:flex-row gap-4">
            <h2 class="text-lg font-semibold text-gray-900">Riwayat Surat Terakhir</h2>

            <div class="relative w-full md:w-fit">
                <input type="text" placeholder="Cari siswa..." class="pl-9 pr-4 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 w-full">
                <i class="fas fa-search absolute left-3 top-2.5 text-gray-400"></i>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 text-gray-600 text-sm **:whitespace-nowrap">
                        <th class="px-6 py-3 font-medium border-b border-gray-200">No</th>
                        <th class="px-6 py-3 font-medium border-b border-gray-200">No. Surat</th>
                        <th class="px-6 py-3 font-medium border-b border-gray-200">Tanggal</th>
                        <th class="px-6 py-3 font-medium border-b border-gray-200">Jenis Surat</th>
                        <th class="px-6 py-3 font-medium border-b border-gray-200">Dibuat Oleh</th>
                        <th class="px-6 py-3 font-medium border-b border-gray-200">Nama Siswa</th>
                        <th class="px-6 py-3 font-medium border-b border-gray-200">Status</th>
                        <th class="px-6 py-3 font-medium border-b border-gray-200 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-sm text-gray-700 divide-y divide-gray-100 **:whitespace-nowrap">
                    <?php if (!empty($letters['data'])): ?>
                        <?php
                        $count = ($letters['pagination']['current_page'] - 1) * 10 + 1;
                        foreach ($letters['data'] as $letter):
                        ?>
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4"><?= str_pad($count++, 2, '0', STR_PAD_LEFT) ?></td>
                                <td class="px-6 py-4 font-medium text-gray-900"><?= $letter['no_letter'] ?? "-" ?></td>
                                <td class="px-6 py-4"><?= $letter['issued_date'] ?></td>
                                <td class="px-6 py-4">
                                    <?php if ($letter['letter_type'] === "Perjanjian Siswa"): ?>
                                        <span class="bg-blue-100 text-blue-700 px-2.5 py-1 rounded-full text-xs font-medium"><?= $letter['letter_type'] ?></span>
                                    <?php elseif ($letter['letter_type'] === "Panggilan Wali"): ?>
                                        <span class="bg-amber-100 text-amber-700 px-2.5 py-1 rounded-full text-xs font-medium"><?= $letter['letter_type'] ?></span>
                                    <?php elseif ($letter['letter_type'] === "Perjanjian Wali"): ?>
                                        <span class="bg-emerald-100 text-emerald-700 px-2.5 py-1 rounded-full text-xs font-medium"><?= $letter['letter_type'] ?></span>
                                    <?php elseif ($letter['letter_type'] === "Pindah Sekolah"): ?>
                                        <span class="bg-purple-100 text-purple-700 px-2.5 py-1 rounded-full text-xs font-medium"><?= $letter['letter_type'] ?></span>
                                    <?php elseif ($letter['letter_type'] === "Pengurangan Poin"): ?>
                                        <span class="bg-red-100 text-red-700 px-2.5 py-1 rounded-full text-xs font-medium"><?= $letter['letter_type'] ?></span>
                                    <?php endif; ?>
                                </td>
                                <td class="px-6 py-4"><?= $letter['creator_fullname'] ?></td>
                                <td class="px-6 py-4"><?= $letter['student_name'] ?></td>
                                <td class="px-6 py-4">
                                    <?php if ($letter['letter_status'] === "draft"): ?>
                                        <span class="text-amber-600 font-medium"><i class="fas fa-clock mr-1"></i>Menunggu</span>
                                    <?php elseif ($letter['letter_status'] === "accepted"): ?>
                                        <span class="text-emerald-600 font-medium"><i class="fas fa-check-circle mr-1"></i>Diterima</span>
                                    <?php elseif ($letter['letter_status'] === "rejected"): ?>
                                        <span class="text-zinc-600 font-medium"><i class="fas fa-x mr-1"></i>Ditolak</span>
                                    <?php elseif ($letter['letter_status'] === "printed"): ?>
                                        <span class="text-blue-600 font-medium"><i class="fas fa-print mr-1"></i>Di Print</span>
                                    <?php endif; ?>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <?php if ($letter['letter_type'] === "Perjanjian Siswa"): ?>
                                        <a href="<?= BASE_URL . '/letters/student-agreement-letter/' . $letter['letter_id'] ?>" class="inline-flex items-center px-3 py-1.5 bg-white border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50 hover:text-blue-600 transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 shadow-sm cursor-pointer">
                                            <i class="fas fa-eye mr-2"></i> Detail
                                        </a>
                                    <?php elseif ($letter['letter_type'] === "Panggilan Wali"): ?>
                                        <a href="<?= BASE_URL . '/letters/guardian-invit-letter/' . $letter['letter_id'] ?>" class="inline-flex items-center px-3 py-1.5 bg-white border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50 hover:text-blue-600 transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 shadow-sm cursor-pointer">
                                            <i class="fas fa-eye mr-2"></i> Detail
                                        </a>
                                    <?php elseif ($letter['letter_type'] === "Perjanjian Wali"): ?>
                                        <a href="<?= BASE_URL . '/letters/guardian-agreement-letter/' . $letter['letter_id'] ?>" class="inline-flex items-center px-3 py-1.5 bg-white border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50 hover:text-blue-600 transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 shadow-sm cursor-pointer">
                                            <i class="fas fa-eye mr-2"></i> Detail
                                        </a>
                                    <?php elseif ($letter['letter_type'] === "Pindah Sekolah"): ?>
                                        <a href="<?= BASE_URL . '/letters/school-transfer-letter/' . $letter['letter_id'] ?>" class="inline-flex items-center px-3 py-1.5 bg-white border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50 hover:text-blue-600 transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 shadow-sm cursor-pointer">
                                            <i class="fas fa-eye mr-2"></i> Detail
                                        </a>
                                    <?php elseif ($letter['letter_type'] === "Pengurangan Poin"): ?>
                                        <a href="<?= BASE_URL . '/letters/point-reduction-letter/' . $letter['letter_id'] ?>" class="inline-flex items-center px-3 py-1.5 bg-white border border-gray-300 rounded-md text-gray-700 hover:bg-gray-50 hover:text-blue-600 transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 shadow-sm cursor-pointer">
                                            <i class="fas fa-eye mr-2"></i> Detail
                                        </a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 font-semibold text-gray-600 text-xl text-center" colspan="9">Belum ada surat tercetak</td>
                        </tr>
                    <?php endif; ?>

                </tbody>
            </table>
        </div>

    </div>
</div>

<div class="pagination flex gap-5 py-4 justify-center px-5 bg-white rounded-md shadow-md">
    <ul class="flex justify-center gap-3 text-gray-900">
        <li>
            <a href="<?= $letters['pagination']['has_prev'] ? BASE_URL . '/letters/page/' . ($letters['pagination']['current_page'] - 1) : '#' ?>" class="grid size-8 place-content-center rounded border border-gray-200 transition-colors hover:bg-gray-50 rtl:rotate-180" aria-label="Previous page">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                </svg>
            </a>
        </li>

        <li class="text-sm/8 font-medium tracking-widest"><?= $letters['pagination']['current_page'] ?>/<?= $letters['pagination']['last_page'] ?></li>

        <li>
            <a href="<?= $letters['pagination']['has_next'] ? BASE_URL . '/letters/page/' . ($letters['pagination']['current_page'] + 1) : '#' ?>" class="grid size-8 place-content-center rounded border border-gray-200 transition-colors hover:bg-gray-50 rtl:rotate-180" aria-label="Next page">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                </svg>
            </a>
        </li>
    </ul>
</div>

<script>
    // function buatSurat(jenisSurat) {
    //     // Di aplikasi nyata, ini bisa membuka modal atau pindah ke halaman form
    //     alert(`Membuka form pembuatan: ${jenisSurat}`);
    // }

    // function cetakSurat(nomorSurat) {
    //     // Di aplikasi nyata, ini bisa memicu window.print() atau mengunduh PDF
    //     if (confirm(`Apakah Anda yakin ingin mencetak dokumen dengan nomor ${nomorSurat}?`)) {
    //         console.log(`Mencetak ${nomorSurat}...`);
    //         // window.print();
    //     }
    // }
</script>