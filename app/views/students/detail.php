<div class="flex flex-col gap-1 mb-6 bg-white p-4 rounded-md shadow-md">
    <h1 class="text-2xl font-semibold tracking-wide">Detail Siswa</h1>
    <?php get_breadcrumb() ?>
</div>

<section class="bg-white p-5 rounded-lg shadow-md mb-6">
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
</section>

<section class="flex gap-5 mb-6">
    <div class="bg-white p-5 rounded-lg shadow-md w-full min-w-0"> <!-- min-w-0 is the key fix -->
        <h2 class="text-xl font-semibold">Riwayat Pelanggaran Terbaru</h2>
        <div class="w-full h-px bg-zinc-300 my-4"></div>
        <?php if (!empty($studentViolations)): ?>
            <div class="overflow-x-auto w-full"> <!-- wrapper needs overflow-x-auto -->
                <table class="w-full bg-zinc-50 border border-zinc-200 rounded-md">
                    <thead>
                        <tr class="*:text-start *:text-zinc-500 *:border-b *:border-zinc-200 *:p-2 *:whitespace-nowrap">
                            <th>No</th>
                            <th>Pelanggaran</th>
                            <th>Deskripsi</th>
                            <th>Dilapor Oleh</th>
                            <th>Disetujui Oleh</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $count = 0;
                        foreach($studentViolations as $violation):
                            $count++;
                        ?>
                        <tr class="*:p-2 *:border-b *:border-zinc-200 *:whitespace-nowrap">
                            <td><?= $count ?></td>
                            <td><?= $violation['violation_name'] ?></td>
                            <td><?= $violation['notes'] ?></td>
                            <td><?= $violation['reporter_name'] ?></td>
                            <td><?= $violation['validator_name'] ?></td>
                            <td><?= $violation['violation_date'] ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <p class="text-center font-semibold text-lg text-zinc-400">Siswa Tidak Memiliki Pelanggaran Apapun.</p>
        <?php endif; ?>
    </div>
    <div class="bg-white p-5 rounded-lg shadow-md min-w-[300px]">
        <h2 class="text-xl font-semibold">Skor Pelanggaran</h2>
        <div class="w-full h-px bg-zinc-300 my-4"></div>
        <p class="w-full text-6xl font-bold text-center">86</p>
    </div>
</section>

<section class="bg-white p-5 rounded-lg shadow-md w-full">
    <h2 class="text-xl font-semibold">Orang Tua / Wali</h2>
    <div class="w-full h-px bg-zinc-300 my-4"></div>
    <div>
        <div class="flex flex-col gap-4">
            <ul class="flex text-lg font-medium bg-white *:py-1.5 *:px-3 *:cursor-pointer w-fit rounded-t-md mb-2">
                <li id="tab-ayah" class="tab text-zinc-800 border-b-2 border-zinc-800">Ayah</li>

                <li id="tab-ibu" class="tab text-zinc-400 border-b-2 border-zinc-400">Ibu</li>

                <li id="tab-wali" class="tab text-zinc-400 border-b-2 border-zinc-400">Wali</li>
            </ul>

            <div class="bg-zinc-100 p-5 rounded-md">
                <table id="data-ayah" class="content w-full">
                    <tbody class="*:*:pb-1">
                        <?php if (!empty($dataAyah)): ?>
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
                        <?php else: ?>
                            <tr class="text-center font-semibold text-lg text-zinc-400">
                                <td>Siswa tidak memiliki data Ayah.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>

                <table id="data-ibu" class="content hidden w-full">
                    <tbody class="*:*:pb-1">
                        <?php if (!empty($dataIbu)): ?>
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
                        <?php else: ?>
                            <tr class="text-center font-semibold text-lg text-zinc-400">
                                <td>Siswa tidak memiliki data Ibu.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>

                <table id="data-wali" class="hidden content w-full">
                    <tbody class="*:*:pb-1">
                        <?php if (!empty($dataWali)): ?>
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
                                <td>: <?= $dataWali['is_primary'] ? "benar" : "tidak"; ?></td>
                            </tr>
                            <tr>
                                <td class="min-w-32 text-zinc-400">Tinggal Bersama</td>
                                <td>: <?= $dataWali['lives_with'] ? "benar" : "tidak"; ?></td>
                            </tr>
                        <?php else: ?>
                            <tr>
                                <td class="text-center font-semibold text-lg text-zinc-400">Siswa tidak memiliki wali alternatif.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <?php if (!(!empty($dataAyah) && !empty($dataIbu) && !empty($dataWali))): ?>
                <div class="flex gap-4">
                    <button id="createConnectionBtn" type="submit" class="flex w-full justify-center gap-2 items-center px-3 py-2 bg-violet-700 hover:bg-violet-900 transition-colors duration-300 cursor-pointer text-white rounded-md">
                        Buat Koneksi
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                            <path fill="currentColor" d="M12 10c-.8 0-1.4.3-2 .8L6.8 9c.1-.3.2-.7.2-1s-.1-.7-.2-1L10 5.2c.6.5 1.2.8 2 .8c1.7 0 3-1.3 3-3s-1.3-3-3-3s-3 1.3-3 3v.5L5.5 5.4C5.1 5.2 4.6 5 4 5C2.4 5 1 6.3 1 8c0 1.6 1.4 3 3 3c.6 0 1.1-.2 1.5-.4L9 12.5v.5c0 1.7 1.3 3 3 3s3-1.3 3-3s-1.3-3-3-3" />
                        </svg>
                    </button>
                    <button id="createGuardianDataBtn" type="submit" class="flex w-full justify-center gap-2 items-center px-3 py-2 bg-violet-700 hover:bg-violet-900 transition-colors duration-300 cursor-pointer text-white rounded-md">
                        Tambah Data Baru
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M18 12.998h-5v5a1 1 0 0 1-2 0v-5H6a1 1 0 0 1 0-2h5v-5a1 1 0 0 1 2 0v5h5a1 1 0 0 1 0 2" />
                        </svg>
                    </button>
                </div>
            <?php endif; ?>
            <div class="flex flex-col gap-4">
                <form id="createConnection" name="createConnection" action="" method="post" class="hidden">
                    <input type="hidden" name="action" value="create-connection">
                    <div id="create-connection" class="flex flex-col gap-4 bg-zinc-100 p-5 rounded-md">
                        <div class="flex flex-col gap-1">
                            <h3 class="flex gap-4 items-center text-lg font-semibold">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 16 16">
                                    <path fill="currentColor" d="M12 10c-.8 0-1.4.3-2 .8L6.8 9c.1-.3.2-.7.2-1s-.1-.7-.2-1L10 5.2c.6.5 1.2.8 2 .8c1.7 0 3-1.3 3-3s-1.3-3-3-3s-3 1.3-3 3v.5L5.5 5.4C5.1 5.2 4.6 5 4 5C2.4 5 1 6.3 1 8c0 1.6 1.4 3 3 3c.6 0 1.1-.2 1.5-.4L9 12.5v.5c0 1.7 1.3 3 3 3s3-1.3 3-3s-1.3-3-3-3" />
                                </svg>
                                Buat Koneksi
                            </h3>
                            <p class="text-sm text-zinc-400">
                                Buat koneksi dengan data orang tua yang sudah ada.
                            </p>
                        </div>
                        <div class="flex flex-col gap-1">
                            <label class="font-semibold" for="name">Nama Orang Tua:</label>
                            <input class="bg-white border border-zinc-300 p-2 rounded-md focus:outline-zinc-400 disabled:bg-zinc-100" type="text" list="Guardians" name="guardian_name" id="guardian_name" placeholder="Nama Wali...">
                            <datalist id="Guardians">
                                <?php foreach ($guardians as $guardian): ?>
                                    <option value="<?= $guardian['id'] ?>-<?= $guardian['name'] ?>"></option>
                                <?php endforeach; ?>
                            </datalist>
                        </div>
                        <div class="flex flex-col gap-1">
                            <label class="font-semibold" for="relationship">Hubungan Sebagai:</label>
                            <input class="bg-white border border-zinc-300 p-2 rounded-md focus:outline-zinc-400 disabled:bg-zinc-100" type="text" list="Relationships" name="relationship" id="relationship" placeholder="Hubungan...">
                            <datalist id="Relationships">
                                <option value="Ayah Kandung"></option>
                                <option value="Ibu Kandung"></option>
                                <option value="Kakak Kandung"></option>
                                <option value="Kakek"></option>
                                <option value="Nenek"></option>
                                <option value="Paman"></option>
                                <option value="Bibi"></option>
                                <option value="Lainnya"></option>
                            </datalist>
                        </div>
                        <div class="flex flex-col gap-1">
                            <p class="font-semibold">Wali Utama:</p>
                            <div class="flex gap-4">
                                <div class="w-full">
                                    <label for="is_primary_true" class="flex items-center gap-4 rounded border border-gray-300 bg-white p-3 text-sm font-medium shadow-sm transition-colors hover:bg-zinc-50 has-checked:border-green-600 has-checked:ring-1 has-checked:ring-green-600 has-checked:bg-green-100">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                            <g fill="none" fill-rule="evenodd">
                                                <path d="m12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035q-.016-.005-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093q.019.005.029-.008l.004-.014l-.034-.614q-.005-.018-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z" />
                                                <path fill="currentColor" d="M21.546 5.111a1.5 1.5 0 0 1 0 2.121L10.303 18.475a1.6 1.6 0 0 1-2.263 0L2.454 12.89a1.5 1.5 0 1 1 2.121-2.121l4.596 4.596L19.424 5.111a1.5 1.5 0 0 1 2.122 0" />
                                            </g>
                                        </svg>

                                        <p class="text-gray-700">Benar</p>

                                        <input type="radio" name="is_primary" value="true" id="is_primary_true" class="sr-only" checked="">
                                    </label>
                                </div>

                                <div class="w-full">
                                    <label for="is_primary_false" class="flex items-center gap-4 rounded border border-gray-300 bg-white p-3 text-sm font-medium shadow-sm transition-colors hover:bg-zinc-50 has-checked:border-red-600 has-checked:ring-1 has-checked:ring-red-600 has-checked:bg-red-100">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="m7 7l10 10M7 17L17 7" />
                                        </svg>

                                        <p class="text-gray-700">Tidak</p>

                                        <input type="radio" name="is_primary" value="false" id="is_primary_false" class="sr-only">
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col gap-1">
                            <p class="font-semibold">Tinggal Bersama:</p>
                            <div class="flex gap-4">
                                <div class="w-full">
                                    <label for="lives_with_true" class="flex items-center gap-4 rounded border border-gray-300 bg-white p-3 text-sm font-medium shadow-sm transition-colors hover:bg-zinc-50 has-checked:border-green-600 has-checked:ring-1 has-checked:ring-green-600 has-checked:bg-green-100">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                            <g fill="none" fill-rule="evenodd">
                                                <path d="m12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035q-.016-.005-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093q.019.005.029-.008l.004-.014l-.034-.614q-.005-.018-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z" />
                                                <path fill="currentColor" d="M21.546 5.111a1.5 1.5 0 0 1 0 2.121L10.303 18.475a1.6 1.6 0 0 1-2.263 0L2.454 12.89a1.5 1.5 0 1 1 2.121-2.121l4.596 4.596L19.424 5.111a1.5 1.5 0 0 1 2.122 0" />
                                            </g>
                                        </svg>

                                        <p class="text-gray-700">Benar</p>

                                        <input type="radio" name="lives_with" value="true" id="lives_with_true" class="sr-only" checked="">
                                    </label>
                                </div>

                                <div class="w-full">
                                    <label for="lives_with_false" class="flex items-center gap-4 rounded border border-gray-300 bg-white p-3 text-sm font-medium shadow-sm transition-colors hover:bg-zinc-50 has-checked:border-red-600 has-checked:ring-1 has-checked:ring-red-600 has-checked:bg-red-100">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="m7 7l10 10M7 17L17 7" />
                                        </svg>

                                        <p class="text-gray-700">Tidak</p>

                                        <input type="radio" name="lives_with" value="false" id="lives_with_false" class="sr-only">
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-end">
                            <button type="submit" class="flex w-full justify-center md:w-fit gap-2 items-center px-3 py-2 bg-zinc-900 hover:bg-zinc-700 transition-colors duration-300 cursor-pointer text-white rounded-md">
                                Connect
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="16" viewBox="0 0 15 16">
                                    <path fill="currentColor" d="M12.49 7.14L3.44 2.27c-.76-.41-1.64.3-1.4 1.13l1.24 4.34q.075.27 0 .54l-1.24 4.34c-.24.83.64 1.54 1.4 1.13l9.05-4.87a.98.98 0 0 0 0-1.72Z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </form>
                <form id="createGuardianData" name="createGuardianData" action="" method="post" class="hidden">
                    <input type="hidden" name="action" value="create-guardian-data">
                    <div id="add-new-guardian-data" class="flex flex-col gap-4 bg-zinc-100 p-5 rounded-md">
                        <div class="flex flex-col gap-1">
                            <h3 class="flex gap-4 items-center text-lg font-semibold">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <g fill="none">
                                        <path d="m12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035q-.016-.005-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093q.019.005.029-.008l.004-.014l-.034-.614q-.005-.018-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z" />
                                        <path fill="currentColor" d="M10.5 20a1.5 1.5 0 0 0 3 0v-6.5H20a1.5 1.5 0 0 0 0-3h-6.5V4a1.5 1.5 0 0 0-3 0v6.5H4a1.5 1.5 0 0 0 0 3h6.5z" />
                                    </g>
                                </svg>
                                Tambah Data Baru
                            </h3>
                            <p class="text-sm text-zinc-400">
                                Buat koneksi dengan data wali yang baru.
                            </p>
                        </div>
                        <div class="flex flex-col gap-1">
                            <label class="font-semibold" for="name">Nama:</label>
                            <input required class="bg-white border border-zinc-300 p-2 rounded-md focus:outline-zinc-400 disabled:bg-zinc-100" type="text" name="name" id="name" placeholder="Nama Wali..." autocomplete="off">
                        </div>
                        <div class="flex flex-col gap-1">
                            <label class="font-semibold" for="job">Pekerjaan:</label>
                            <input required class="bg-white border border-zinc-300 p-2 rounded-md focus:outline-zinc-400 disabled:bg-zinc-100" type="text" name="job" id="job" placeholder="Pekerjaan Wali..." autocomplete="off">
                        </div>
                        <div class="flex flex-col gap-1">
                            <label class="font-semibold" for="address">Alamat:</label>
                            <input required class="bg-white border border-zinc-300 p-2 rounded-md focus:outline-zinc-400 disabled:bg-zinc-100" type="text" name="address" id="address" placeholder="Alamat Wali..." autocomplete="off">
                        </div>
                        <div class="flex flex-col gap-1">
                            <label class="font-semibold" for="phone_number">Nomor:</label>
                            <input required class="bg-white border border-zinc-300 p-2 rounded-md focus:outline-zinc-400 disabled:bg-zinc-100" type="text" name="phone_number" id="phone_number" placeholder="Nomor Wali..." autocomplete="off">
                        </div>
                        <div class="flex flex-col gap-1">
                            <label class="font-semibold" for="relationship">Hubungan Sebagai:</label>
                            <input class="bg-white border border-zinc-300 p-2 rounded-md focus:outline-zinc-400 disabled:bg-zinc-100" type="text" list="Relationships" name="relationship" id="relationship" placeholder="Hubungan...">
                            <datalist id="Relationships">
                                <option value="Ayah Kandung"></option>
                                <option value="Ibu Kandung"></option>
                                <option value="Kakak Kandung"></option>
                                <option value="Kakek"></option>
                                <option value="Nenek"></option>
                                <option value="Paman"></option>
                                <option value="Bibi"></option>
                                <option value="Lainnya"></option>
                            </datalist>
                        </div>
                        <div class="flex flex-col gap-1">
                            <p class="font-semibold">Wali Utama:</p>
                            <div class="flex gap-5">
                                <div class="flex gap-2">
                                    <input type="radio" name="is_primary" id="is_primary_true" value="true">
                                    <label for="is_primary_true">Benar</label>
                                </div>
                                <div class="flex gap-2">
                                    <input type="radio" name="is_primary" id="is_primary_false" value="false">
                                    <label for="is_primary_false">Tidak</label>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col gap-1">
                            <p class="font-semibold">Tinggal Bersama:</p>
                            <div class="flex gap-5">
                                <div class="flex gap-2">
                                    <input type="radio" name="lives_with" id="lives_with_true" value="true">
                                    <label for="lives_with_true">Benar</label>
                                </div>
                                <div class="flex gap-2">
                                    <input type="radio" name="lives_with" id="lives_with_false" value="false">
                                    <label for="lives_with_false">Tidak</label>
                                </div>
                            </div>
                        </div>
                        <div class="flex justify-end">
                            <button type="submit" class="flex w-full justify-center md:w-fit gap-2 items-center px-3 py-2 bg-zinc-900 hover:bg-zinc-700 transition-colors duration-300 cursor-pointer text-white rounded-md">
                                Submit
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="16" viewBox="0 0 15 16">
                                    <path fill="currentColor" d="M12.49 7.14L3.44 2.27c-.76-.41-1.64.3-1.4 1.13l1.24 4.34q.075.27 0 .54l-1.24 4.34c-.24.83.64 1.54 1.4 1.13l9.05-4.87a.98.98 0 0 0 0-1.72Z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

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

            if (!tab || !content) {
                return;
            }

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
        if (!tabs[key].tab) {
            return;
        }

        tabs[key].tab.addEventListener('click', () => activeTab(key));
    });
</script>