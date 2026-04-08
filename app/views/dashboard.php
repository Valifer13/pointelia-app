<div class="flex flex-col md:flex-row justify-between gap-4 items-start lg:items-center mb-8 bg-white p-4 rounded-md shadow-md">
    <div class="flex flex-col gap-1">
        <h1 class="text-2xl font-semibold tracking-wide text-zinc-600">Ringkasan Saat Ini</h1>
    </div>
</div>

<div class="flex-1 overflow-y-auto">

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white rounded-xl border border-gray-100 p-6 shadow-sm hover:shadow-md transition-shadow">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-sm font-medium text-gray-500 mb-1">Total Kasus Bulan Ini</p>
                    <h3 class="text-3xl font-bold text-gray-900"><?= $count_violation_in_this_month ?></h3>
                </div>
                <div class="w-10 h-10 rounded-lg bg-orange-50 flex items-center justify-center text-orange-600">
                    <i class="fa-solid fa-clipboard-list"></i>
                </div>
            </div>
            <div class="mt-4 flex items-center text-sm">
                <span class="text-green-500 font-medium flex items-center gap-1">
                    <i class="fa-solid fa-arrow-down text-xs"></i> 12%
                </span>
                <span class="text-gray-400 ml-2">vs bulan lalu</span>
            </div>
        </div>

        <div class="bg-white rounded-xl border border-gray-100 p-6 shadow-sm hover:shadow-md transition-shadow">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-sm font-medium text-gray-500 mb-1">Siswa Perhatian Khusus</p>
                    <h3 class="text-3xl font-bold text-red-600"><?= $count_student_with_special_attentives ?></h3>
                </div>
                <div class="w-10 h-10 rounded-lg bg-red-50 flex items-center justify-center text-red-600">
                    <i class="fa-solid fa-user-shield"></i>
                </div>
            </div>
            <div class="mt-4 flex items-center text-sm">
                <span class="text-gray-500">Siswa dengan poin > 50</span>
            </div>
        </div>

        <div class="bg-white rounded-xl border border-gray-100 p-6 shadow-sm hover:shadow-md transition-shadow">
            <div class="flex justify-between items-start">
                <div>
                    <p class="text-sm font-medium text-gray-500 mb-1">Panggilan Orang Tua</p>
                    <h3 class="text-3xl font-bold text-gray-900"><?= $count_guardian_invit_letters ?></h3>
                </div>
                <div class="w-10 h-10 rounded-lg bg-indigo-50 flex items-center justify-center text-indigo-600">
                    <i class="fa-solid fa-envelope-open-text"></i>
                </div>
            </div>
            <div class="mt-4 flex items-center text-sm">
                <span class="text-amber-500 font-medium flex items-center gap-1">
                    <i class="fa-solid fa-clock text-xs"></i> Menunggu konfirmasi
                </span>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl border border-gray-100 shadow-sm overflow-hidden">
        <div class="px-6 py-5 border-b border-gray-100 flex justify-between items-center">
            <h2 class="text-lg font-semibold text-gray-800">Pelanggaran Terbaru</h2>
            <a href="<?= BASE_URL ?>/violations" class="text-sm text-indigo-600 font-medium hover:text-indigo-700">Lihat Semua</a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50 text-gray-500 text-sm border-b border-gray-100">
                        <th class="px-6 py-4 font-medium">Siswa</th>
                        <th class="px-6 py-4 font-medium">Kelas</th>
                        <th class="px-6 py-4 font-medium">Jenis Pelanggaran</th>
                        <th class="px-6 py-4 font-medium">Tanggal</th>
                        <th class="px-6 py-4 font-medium text-right">Poin</th>
                    </tr>
                </thead>
                <tbody class="text-sm">
                    <?php foreach ($violation_in_this_month as $violation): ?>
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-full bg-gray-200 flex items-center justify-center text-xs font-bold text-gray-600 uppercase"><?= $violation['student_name'][0] ?></div>
                                    <div>
                                        <div class="font-medium text-gray-900"><?= $violation['student_name'] ?></div>
                                        <div class="text-xs text-gray-500">NIS: <?= $violation['student_nis'] ?></div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-gray-600"><?= $violation['class_grade'] . " " . $violation['major_name'] . " " . $violation['class_rombel'] ?></td>
                            <td class="px-6 py-4"><?= $violation['violation_name'] ?></td>
                            <td class="px-6 py-4 text-gray-500"><?= getFormatedDate($violation['violation_date']) ?></td>
                            <td class="px-6 py-4 text-right">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">+<?= $violation['violation_point'] ?></span>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>