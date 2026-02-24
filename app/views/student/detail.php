<div class="mb-6 flex flex-col gap-2">
    <h1 class="text-2xl font-semibold tracking-wide">Detail Siswa</h1>
    <div class="flex gap-1 text-zinc-400 *:hover:text-zinc-950 *:hover:underline">
        <?php get_breadcrumb() ?>
    </div>
</div>

<div class="bg-white p-5 rounded-lg shadow-md mb-6">
    <h2 class="text-xl font-semibold">Profil Siswa</h2>
    <div class="w-full h-px bg-zinc-300 my-4"></div>
    <div class="flex gap-5">
        <div class="size-32 overflow-hidden">
            <img src="https://placehold.co/400" alt="student profile">
        </div>
        <div class="flex flex-col gap-4">
            <div class="flex flex-col">
                <div class="flex gap-3 items-center">
                    <h3 class="text-lg font-semibold text-zinc-600"><?= $student['name'] ?></h3>
                    <div class="w-1.5 h-1.5 bg-zinc-400 rounded-full"></div>
                    <p class="text-zinc-400 text-lg font-semibold">#<?= $student['nis'] ?></p>
                </div>
                <a href="#" class="hover:underline cursor-pointer w-fit"><?= $student['email'] ?></a>
            </div>

            <table>
                <tbody class="*:*:pb-1">
                    <tr>
                        <td class="min-w-20 text-zinc-400">NISN</td>
                        <td>: <?= $student['nisn'] ?></td>
                    </tr>
                    <tr>
                        <td class="min-w-20 text-zinc-400">Nomor</td>
                        <td>: <?= $student['phone_number'] ?></td>
                    </tr>
                    <tr>
                        <td class="min-w-20 text-zinc-400">Kelas</td>
                        <td>: <?= $studentClass['grade'] ?> <?= $studentClass['major_name'] ?> <?= $studentClass['rombel'] ?></td>
                    </tr>
                    <tr>
                        <td class="min-w-20 text-zinc-400">Alamat</td>
                        <td>: <?= $student['address'] ?></td>
                    </tr>
                    <tr>
                        <td class="min-w-20 text-zinc-400">Gender</td>
                        <?php if ($student['gender'] === 'M'): ?>
                            <td>: Laki-Laki</td>
                        <?php elseif ($student['gender'] === 'F'): ?>
                            <td>: Perempuan</td>
                        <?php endif; ?>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="flex gap-5 mb-6">
    <div class="bg-white p-5 rounded-lg shadow-md w-full">
        <h2 class="text-xl font-semibold">Riwayat Pelanggaran Terbaru</h2>
        <div class="w-full h-px bg-zinc-300 my-4"></div>
        <?php if (!empty($studnetViolations)): ?>
            <table class="w-full bg-zinc-50 border border-zinc-200 rounded-md">
                <thead>
                    <tr class="*:text-start *:text-zinc-500 *:border-b *:border-zinc-200 *:p-2">
                        <th>No</th>
                        <th>Pelanggaran</th>
                        <th>Deskripsi</th>
                        <th>Dilapor Oleh</th>
                        <th>Disetujui Oleh</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="*:p-2 *:border-b *:border-zinc-200">
                        <td>1</td>
                        <td>Seragam Sekolah</td>
                        <td>Tidak memakai dasi</td>
                        <td>Bu. Nuri</td>
                        <td>Bu. Chandra</td>
                        <td>07/01/2026</td>
                    </tr>
                    <tr class="*:p-2 *:border-b *:border-zinc-200">
                        <td>2</td>
                        <td>Seragam Sekolah</td>
                        <td>Tidak memakai dasi</td>
                        <td>Bu. Nuri</td>
                        <td>Bu. Chandra</td>
                        <td>07/01/2026</td>
                    </tr>
                    <tr class="*:p-2 *:border-b *:border-zinc-200">
                        <td>3</td>
                        <td>Seragam Sekolah</td>
                        <td>Tidak memakai dasi</td>
                        <td>Bu. Nuri</td>
                        <td>Bu. Chandra</td>
                        <td>07/01/2026</td>
                    </tr>
                    <tr class="*:p-2 *:border-b *:border-zinc-200">
                        <td>4</td>
                        <td>Seragam Sekolah</td>
                        <td>Tidak memakai dasi</td>
                        <td>Bu. Nuri</td>
                        <td>Bu. Chandra</td>
                        <td>07/01/2026</td>
                    </tr>
                    <tr class="*:p-2 *:border-b *:border-zinc-200">
                        <td>5</td>
                        <td>Seragam Sekolah</td>
                        <td>Tidak memakai dasi</td>
                        <td>Bu. Nuri</td>
                        <td>Bu. Chandra</td>
                        <td>07/01/2026</td>
                    </tr>
                </tbody>
            </table>
        <?php else: ?>
            <p class="text-center font-semibold text-lg text-zinc-400">Siswa Tidak Memiliki Pelanggaran Apapun.</p>
        <?php endif; ?>
    </div>

    <div class="bg-white p-5 rounded-lg shadow-md min-w-[300px]">
        <h2 class="text-xl font-semibold">Skor Pelanggaran</h2>
        <div class="w-full h-px bg-zinc-300 my-4"></div>
        <p class="w-full text-6xl font-bold text-center">86</p>
    </div>
</div>

<div class="bg-white p-5 rounded-lg shadow-md w-full">
    <h2 class="text-xl font-semibold">Orang Tua / Wali</h2>
    <div class="w-full h-px bg-zinc-300 my-4"></div>
    <div>
        <div>
            <?php if (!empty($dataAyah) || !empty($dataIbu) || !empty($dataWali)): ?>
                <ul class="flex text-lg font-medium bg-white *:py-1.5 *:px-3 *:cursor-pointer w-fit rounded-t-md mb-2">
                    <?php if (!empty($dataAyah)): ?>
                        <li id="tab-ayah" class="tab text-zinc-800 border-b-2 border-zinc-800">Ayah</li>
                    <?php endif; ?>

                    <?php if (!empty($dataIbu)): ?>
                        <li id="tab-ibu" class="tab text-zinc-400 border-b-2 border-zinc-400">Ibu</li>
                    <?php endif; ?>

                    <?php if (!empty($dataWali)): ?>
                        <li id="tab-wali" class="tab text-zinc-400 border-b-2 border-zinc-400">Wali</li>
                    <?php endif; ?>
                </ul>
            <?php endif; ?>

            <div class="bg-zinc-100 p-5 rounded-md">
                <?php if (!empty($dataAyah)): ?>
                    <table id="data-ayah" class="content">
                        <tbody class="*:*:pb-1">
                            <tr>
                                <td class="min-w-32 text-zinc-400">Nama</td>
                                <td>: <?= $dataAyah['name'] ?></td>
                            </tr>
                            <tr>
                                <td class="min-w-32 text-zinc-400">Pekerjaan</td>
                                <td>: <?= $dataAyah['job'] ?></td>
                            </tr>
                            <tr>
                                <td class="min-w-32 text-zinc-400">Alamat</td>
                                <td>: <?= $dataAyah['address'] ?></td>
                            </tr>
                            <tr>
                                <td class="min-w-32 text-zinc-400">Nomor</td>
                                <td>: <?= $dataAyah['phone_number'] ?></td>
                            </tr>
                            <tr>
                                <td class="min-w-32 text-zinc-400">Wali Utama</td>
                                <td>: <?= $dataAyah['is_primary'] ? "Benar" : "Tidak"; ?></td>
                            </tr>
                            <tr>
                                <td class="min-w-32 text-zinc-400">Tinggal Bersama</td>
                                <td>: <?= $dataAyah['lives_with'] ? "Benar" : "Tidak"; ?></td>
                            </tr>
                        </tbody>
                    </table>
                <?php endif; ?>

                <?php if (!empty($dataIbu)): ?>
                    <table id="data-ibu" class="content hidden">
                        <tbody class="*:*:pb-1">
                            <tr>
                                <td class="min-w-32 text-zinc-400">Nama</td>
                                <td>: <?= $dataIbu['name'] ?></td>
                            </tr>
                            <tr>
                                <td class="min-w-32 text-zinc-400">Pekerjaan</td>
                                <td>: <?= $dataIbu['job'] ?></td>
                            </tr>
                            <tr>
                                <td class="min-w-32 text-zinc-400">Alamat</td>
                                <td>: <?= $dataIbu['address'] ?></td>
                            </tr>
                            <tr>
                                <td class="min-w-32 text-zinc-400">Nomor</td>
                                <td>: <?= $dataIbu['phone_number'] ?></td>
                            </tr>
                            <tr>
                                <td class="min-w-32 text-zinc-400">Wali Utama</td>
                                <td>: <?= $dataIbu['is_primary'] ? "Benar" : "Tidak"; ?></td>
                            </tr>
                            <tr>
                                <td class="min-w-32 text-zinc-400">Tinggal Bersama</td>
                                <td>: <?= $dataIbu['lives_with'] ? "Benar" : "Tidak"; ?></td>
                            </tr>
                        </tbody>
                    </table>
                <?php endif; ?>

                <?php if (!empty($dataWali)): ?>
                    <table id="data-wali" class="hidden content">
                        <tbody class="*:*:pb-1">
                            <tr>
                                <td class="min-w-32 text-zinc-400">Nama</td>
                                <td>: <?= $dataWali['name'] ?></td>
                            </tr>
                            <tr>
                                <td class="min-w-32 text-zinc-400">Pekerjaan</td>
                                <td>: <?= $dataWali['job'] ?></td>
                            </tr>
                            <tr>
                                <td class="min-w-32 text-zinc-400">Alamat</td>
                                <td>: <?= $dataWali['address'] ?></td>
                            </tr>
                            <tr>
                                <td class="min-w-32 text-zinc-400">Nomor</td>
                                <td>: <?= $dataWali['phone_number'] ?></td>
                            </tr>
                            <tr>
                                <td class="min-w-32 text-zinc-400">Wali Utama</td>
                                <td>: <?= $dataibu['is_primary'] ? "benar" : "tidak"; ?></td>
                            </tr>
                            <tr>
                                <td class="min-w-32 text-zinc-400">Tinggal Bersama</td>
                                <td>: <?= $dataibu['lives_with'] ? "benar" : "tidak"; ?></td>
                            </tr>
                        </tbody>
                    </table>
                <?php endif; ?>

                <?php if (empty($dataAyah) && empty($dataIbu) && empty($dataWali)): ?>
                    <p class="text-center font-semibold text-lg text-zinc-400">Hidup Mandiri</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<script>
    const tabs = {
        ayah: {
            tab: document.getElementById('tab-ayah'),
            content: document.getElementById('data-ayah')
        },
        ibu: {
            tab: document.getElementById('tab-ibu'),
            content: document.getElementById('data-ibu')
        },
        wali: {
            tab: document.getElementById('tab-wali'),
            content: document.getElementById('data-wali')
        }
    };

    const activeTab = (key) => {
        Object.keys(tabs).forEach(name => {
            const {
                tab,
                content
            } = tabs[name];

            const isActive = name === key;

            tab.classList.toggle('active', isActive);
            tab.classList.toggle('text-zinc-800', isActive);
            tab.classList.toggle('border-zinc-800', isActive);
            tab.classList.toggle('hover:text-zinc-600', !isActive);
            tab.classList.toggle('text-zinc-400', !isActive);
            tab.classList.toggle('border-zinc-400', !isActive);

            content.classList.toggle('active', isActive);
            content.classList.toggle('hidden', !isActive);
        });
    };

    // Event listener
    Object.keys(tabs).forEach(key => {
        tabs[key].tab.addEventListener('click', () => activeTab(key));
    });
</script>