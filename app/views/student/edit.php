<div class="mb-6 flex flex-col gap-2">
    <h1 class="text-2xl font-semibold tracking-wide">Edit Data Siswa</h1>
    <div class="flex gap-1 text-zinc-400 *:hover:text-zinc-950 *:hover:underline">
        <?php get_breadcrumb() ?>
    </div>
</div>

<form class="flex flex-col gap-6" action="" method="post">
    <input type="hidden" name="action" value="add">
    <div class="flex justify-between bg-white rounded-lg p-6 shadow-sm">
        <legend class="font-semibold">Data Siswa</legend>
        <div class="w-full min-w-sm max-w-4xl flex flex-col gap-4">
            <div class="flex gap-4">
                <input type="hidden" name="student_id" value="<?= $student['id'] ?>">
                <div class="flex flex-col gap-1">
                    <label class="font-semibold" for="nis">NIS:</label>
                    <input class="bg-white border border-zinc-300 p-2 rounded-md focus:outline-zinc-400 disabled:bg-zinc-100 read-only:text-zinc-400" readonly type="text" name="nis" id="nis" value="<?= $student['nis']; ?>">
                </div>
                <div class="flex flex-col gap-1">
                    <label for="nisn">NISN:</label>
                    <input required class="bg-white border border-zinc-300 p-2 rounded-md focus:outline-zinc-400 disabled:bg-zinc-100" type="text" name="nisn" id="nisn" placeholder="XXXXXXXX" value="<?= $student['nisn']; ?>">
                </div>
            </div>
            <div class="flex flex-col gap-1">
                <label class="font-semibold" for="name">Nama:</label>
                <input required class="bg-white border border-zinc-300 p-2 rounded-md focus:outline-zinc-400 disabled:bg-zinc-100" type="text" name="name" id="name" placeholder="Nama siswa..." autocomplete="off" value="<?= $student['name']; ?>">
            </div>
            <div class="flex flex-col gap-1">
                <label class="font-semibold" for="email">Email:</label>
                <input required class="bg-white border border-zinc-300 p-2 rounded-md focus:outline-zinc-400 disabled:bg-zinc-100" type="email" name="email" id="email" placeholder="Email siswa..." autocomplete="off" value="<?= $student['email']; ?>">
            </div>
            <div class="flex flex-col gap-1">
                <label class="font-semibold" for="phone_number">Nomor HP:</label>
                <input required class="bg-white border border-zinc-300 p-2 rounded-md focus:outline-zinc-400 disabled:bg-zinc-100" type="text" name="phone_number" id="phone_number" placeholder="Nomor Handphone siswa..." autocomplete="off" value="<?= $student['phone_number'] ?>">
            </div>
            <div class="flex gap-4">
                <div class="flex flex-col gap-1">
                    <label class="font-semibold" for="gender">Gender:</label>
                    <select required class="bg-white border border-zinc-300 p-2 rounded-md focus:outline-zinc-400 disabled:bg-zinc-100" name="gender" id="gender">
                        <option value="M" <?php $student['gender'] === 'M' ? "selected" : ""; ?>>Laki-Laki</option>
                        <option value="F" <?php $student['gender'] === 'F' ? "selected" : ""; ?>>Perempuan</option>
                    </select>
                </div>
                <div class="flex flex-col gap-1">
                    <label class="font-semibold" for="class">Kelas:</label>
                    <input required class="bg-white border border-zinc-300 p-2 rounded-md focus:outline-zinc-400 disabled:bg-zinc-100" type="text" list="Classes" name="class" id="class" value="<?= $studentClass['grade'] ?> <?= $studentClass['major_name'] ?> <?= $studentClass['rombel'] ?>">
                    <datalist id="Classes">
                        <?php foreach ($studentClasses as $studentClass): ?>
                            <option value="<?= $studentClass['grade'] . ' ' . $studentClass['major_name'] . ' ' . $studentClass['rombel'] ?>"></option>
                        <?php endforeach; ?>
                    </datalist>
                </div>
            </div>
            <div class="flex flex-col gap-1">
                <label class="font-semibold" for="address">Alamat:</label>
                <textarea required class="bg-white border border-zinc-300 p-2 rounded-md focus:outline-zinc-400 disabled:bg-zinc-100" name="address" id="address" placeholder="Alamat siswa..."><?= $student['address'] ?></textarea>
            </div>
            <div class="flex justify-end">
                <button type="submit" class="flex w-fit gap-2 items-center px-3 py-2 bg-zinc-900 hover:bg-zinc-700 transition-colors duration-300 cursor-pointer text-white rounded-md">
                    Submit
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="16" viewBox="0 0 15 16">
                        <path fill="currentColor" d="M12.49 7.14L3.44 2.27c-.76-.41-1.64.3-1.4 1.13l1.24 4.34q.075.27 0 .54l-1.24 4.34c-.24.83.64 1.54 1.4 1.13l9.05-4.87a.98.98 0 0 0 0-1.72Z" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div class="flex justify-between bg-white rounded-lg p-6 shadow-sm">
        <div class="flex flex-col gap-4">
            <legend class="font-semibold">Data Orang Tua / Wali</legend>
        </div>
        <div class="w-full min-w-sm max-w-4xl flex flex-col gap-4">
            <div class="flex items-center gap-1">
                <div class="bg-zinc-400 w-8 h-0.5"></div>
                <span class="text-zinc-400">Ayah</span>
                <div class="bg-zinc-400 w-full h-0.5"></div>
            </div>
            <input type="hidden" name="ayah[id]" value="<?= $dataAyah['guardian_id'] ?? "" ?>">
            <div class="flex flex-col gap-1">
                <label class="font-semibold" for="ayah_name">Nama Ayah:</label>
                <input class="bg-white border border-zinc-300 p-2 rounded-md focus:outline-zinc-400 disabled:bg-zinc-100" type="text" name="ayah[name]" id="ayah_name" placeholder="Nama ayah..." autocomplete="off" value="<?= $dataAyah['name'] ?? "" ?>">
            </div>
            <div class="flex flex-col gap-1">
                <label class="font-semibold" for="ayah_job">Pekerjaan Ayah:</label>
                <input class="bg-white border border-zinc-300 p-2 rounded-md focus:outline-zinc-400 disabled:bg-zinc-100" type="text" name="ayah[job]" id="ayah_job" placeholder="Pekerjaan ayah..." autocomplete="off" value="<?= $dataAyah['job'] ?? "" ?>">
            </div>
            <div class="flex flex-col gap-1">
                <label class="font-semibold" for="ayah_phone_number">Nomor Ayah:</label>
                <input class="bg-white border border-zinc-300 p-2 rounded-md focus:outline-zinc-400 disabled:bg-zinc-100" type="text" name="ayah[phone_number]" id="ayah_phone_number" placeholder="Nomor ayah..." autocomplete="off" value="<?= $dataAyah['phone_number'] ?? "" ?>">
            </div>
            <div class="flex flex-col gap-1">
                <label class="font-semibold" for="ayah_address">Alamat Ayah:</label>
                <textarea class="bg-white border border-zinc-300 p-2 rounded-md focus:outline-zinc-400 disabled:bg-zinc-100" name="ayah[address]" id="ayah_address" placeholder="Alamat ayah..."><?= $dataAyah['address'] ?? "" ?></textarea>
            </div>
            <div class="flex flex-col gap-1">
                <p class="font-semibold">Wali Utama:</p>
                <div class="flex gap-2">
                    <!-- <input class="hidden" type="radio" name="ayah[is_primary]" id="ayah_null_primary" checked value=""> -->
                    <input type="radio" id="ayah_primary" name="ayah[is_primary]" value="true" <?php if (!empty($dataAyah)) echo $dataAyah['is_primary'] ? "checked" : ""; ?>>
                    <label for="ayah_primary">Utama</label>
                    <input type="radio" id="ayah_nonprimary" name="ayah[is_primary]" value="false" <?php if (!empty($dataAyah)) echo $dataAyah['is_primary'] ? "" : "checked"; ?>>
                    <label for="ayah_nonprimary">Tidak Utama</label>
                </div>
            </div>
            <div class="flex flex-col gap-1">
                <p class="font-semibold">Tinggal Bersama:</p>
                <div class="flex gap-2">
                    <!-- <input class="hidden" type="radio" name="ayah[lives_with]" id="ayah_null_liveswith" checked value=""> -->
                    <input type="radio" id="ayah_lives_with" name="ayah[lives_with]" value="true" <?php if (!empty($dataAyah)) echo $dataAyah['lives_with'] ? "checked" : ""; ?>>
                    <label for="ayah_lives_with">Bersama</label>
                    <input type="radio" id="ayah_not_lives_with" name="ayah[lives_with]" value="false" <?php if (!empty($dataAyah)) echo $dataAyah['lives_with'] ? "" : "checked"; ?>>
                    <label for="ayah_not_lives_with">Tidak Bersama</label>
                </div>
            </div>
            <div class="flex items-center gap-1">
                <div class="bg-zinc-400 w-8 h-0.5"></div>
                <span class="text-zinc-400">Ibu</span>
                <div class="bg-zinc-400 w-full h-0.5"></div>
            </div>
            <input type="hidden" name="ibu[id]" value="<?= $dataIbu['guardian_id'] ?? "" ?>">
            <div class="flex flex-col gap-1">
                <label class="font-semibold" for="ibu_name">Nama Ibu:</label>
                <input class="bg-white border border-zinc-300 p-2 rounded-md focus:outline-zinc-400 disabled:bg-zinc-100" type="text" name="ibu[name]" id="ibu_name" placeholder="Nama ibu..." autocomplete="off" value="<?= $dataIbu['name'] ?? "" ?>">
            </div>
            <div class="flex flex-col gap-1">
                <label class="font-semibold" for="ibu_job">Pekerjaan Ibu:</label>
                <input class="bg-white border border-zinc-300 p-2 rounded-md focus:outline-zinc-400 disabled:bg-zinc-100" type="text" name="ibu[job]" id="ibu_job" placeholder="Pekerjaan ibu..." autocomplete="off" value="<?= $dataIbu['job'] ?? "" ?>">
            </div>
            <div class="flex flex-col gap-1">
                <label class="font-semibold" for="ibu_phone_number">Nomor Ibu:</label>
                <input class="bg-white border border-zinc-300 p-2 rounded-md focus:outline-zinc-400 disabled:bg-zinc-100" type="text" name="ibu[phone_number]" id="ibu_phone_number" placeholder="Nomor ibu..." autocomplete="off" value="<?= $dataIbu['phone_number'] ?? "" ?>">
            </div>
            <div class="flex flex-col gap-1">
                <label class="font-semibold" for="ibu_address">Alamat Ibu:</label>
                <textarea class="bg-white border border-zinc-300 p-2 rounded-md focus:outline-zinc-400 disabled:bg-zinc-100" name="ibu[address]" id="ibu_address" placeholder="Alamat ibu..."><?= $dataIbu['address'] ?? "" ?></textarea>
            </div>
            <div class="flex flex-col gap-1">
                <p class="font-semibold">Wali Utama:</p>
                <div class="flex gap-2">
                    <!-- <input class="hidden" type="radio" name="ibu[is_primary]" id="ibu_null_primary" checked value=""> -->
                    <input type="radio" id="ibu_primary" name="ibu[is_primary]" value="true" <?php if (!empty($dataIbu)) echo $dataIbu['is_primary'] ? "checked" : "" ?>>
                    <label for="ibu_primary">Utama</label>
                    <input type="radio" id="ibu_nonprimary" name="ibu[is_primary]" value="false" <?php if (!empty($dataIbu)) echo $dataIbu['is_primary'] ? "" : "checked" ?>>
                    <label for="ibu_nonprimary">Tidak Utama</label>
                </div>
            </div>
            <div class="flex flex-col gap-1">
                <p class="font-semibold">Tinggal Bersama:</p>
                <div class="flex gap-2">
                    <!-- <input class="hidden" type="radio" name="ibu[lives_with]" id="ibu_null_liveswith" checked value=""> -->
                    <input type="radio" id="ibu_lives_with" name="ibu[lives_with]" value="true" <?php if (!empty($dataIbu)) echo $dataIbu['lives_with'] ? "checked" : "" ?>>
                    <label for="ibu_lives_with">Bersama</label>
                    <input type="radio" id="ibu_not_lives_with" name="ibu[lives_with]" value="false" <?php if (!empty($dataIbu)) echo $dataIbu['lives_with'] ? "" : "checked" ?>>
                    <label for="ibu_not_lives_with">Tidak Bersama</label>
                </div>
            </div>
            <div class="flex items-center gap-1">
                <div class="bg-zinc-400 w-8 h-0.5"></div>
                <span class="text-zinc-400">Wali</span>
                <div class="bg-zinc-400 w-full h-0.5"></div>
            </div>
            <input type="hidden" name="wali[id]" value="<?= $dataWali['guardian_id'] ?? "" ?>">
            <div class="flex flex-col gap-1">
                <label class="font-semibold" for="wali_name">Nama Wali:</label>
                <input class="bg-white border border-zinc-300 p-2 rounded-md focus:outline-zinc-400 disabled:bg-zinc-100" type="text" name="wali[name]" id="wali_name" placeholder="Nama wali..." autocomplete="off" value="<?= $dataWali['name'] ?? "" ?>">
            </div>
            <div class="flex flex-col gap-1">
                <label class="font-semibold" for="wali_job">Pekerjaan Wali:</label>
                <input class="bg-white border border-zinc-300 p-2 rounded-md focus:outline-zinc-400 disabled:bg-zinc-100" type="text" name="wali[job]" id="wali_job" placeholder="Pekerjaan wali..." autocomplete="off" value="<?= $dataWali['job'] ?? "" ?>">
            </div>
            <div class="flex flex-col gap-1">
                <label class="font-semibold" for="wali_phone_number">Nomor Wali:</label>
                <input class="bg-white border border-zinc-300 p-2 rounded-md focus:outline-zinc-400 disabled:bg-zinc-100" type="text" name="wali[phone_number]" id="wali_phone_number" placeholder="Nomor wali..." autocomplete="off" value="<?= $dataWali['phone_number'] ?? "" ?>">
            </div>
            <div class="flex flex-col gap-1">
                <label class="font-semibold" for="wali_relationship">Wali Berhubungan Sebagai:</label>
                <input class="bg-white border border-zinc-300 p-2 rounded-md focus:outline-zinc-400 disabled:bg-zinc-100" list="wali_relationships" id="wali_relationship" name="wali[relationship]" type="text" value="<?= $dataWali['relationship'] ?? "" ?>">
                <datalist id="wali_relationships">
                    <option value="Ayah Tiri"></option>
                    <option value="Ibu Tiri"></option>
                    <option value="Paman"></option>
                    <option value="Bibi"></option>
                    <option value="Kakak Kandung"></option>
                    <option value="Adik Kandung"></option>
                    <option value="Kakak Tiri"></option>
                    <option value="Adik Tiri"></option>
                </datalist>
            </div>
            <div class="flex flex-col gap-1">
                <label class="font-semibold" for="wali_address">Alamat Wali:</label>
                <textarea class="bg-white border border-zinc-300 p-2 rounded-md focus:outline-zinc-400 disabled:bg-zinc-100" name="wali[address]" id="wali_address" placeholder="Alamat wali..."><?= $dataWali['address'] ?? "" ?></textarea>
            </div>
            <div class="flex flex-col gap-1">
                <p class="font-semibold">Wali Utama:</p>
                <div class="flex gap-2">
                    <!-- <input class="hidden" type="radio" name="wali[is_primary]" id="wali_null_primary" checked value=""> -->
                    <input type="radio" id="wali_primary" name="wali[is_primary]" value="true" <?php if (!empty($dataWali)) echo $dataWali['is_primary'] ? "checked" : "" ?>>
                    <label for="wali_primary">Utama</label>
                    <input type="radio" id="wali_nonprimary" name="wali[is_primary]" value="false" <?php if (!empty($dataWali)) echo $dataWali['is_primary'] ? "" : "checked" ?>>
                    <label for="wali_nonprimary">Tidak Utama</label>
                </div>
            </div>
            <div class="flex flex-col gap-1">
                <p class="font-semibold">Tinggal Bersama:</p>
                <div class="flex gap-2">
                    <!-- <input class="hidden" type="radio" name="wali[lives_with]" id="wali_null_liveswith" checked value=""> -->
                    <input type="radio" id="wali_lives_with" name="wali[lives_with]" value="true" <?php if (!empty($dataWali)) echo $dataWali['lives_with'] ? "checked" : "" ?>>
                    <label for="wali_lives_with">Bersama</label>
                    <input type="radio" id="wali_not_lives_with" name="wali[lives_with]" value="false" <?php if (!empty($dataWali)) echo $dataWali['lives_with'] ? "" : "checked" ?>>
                    <label for="wali_not_lives_with">Tidak Bersama</label>
                </div>
            </div>
            <div class="flex justify-end">
                <button type="submit" class="flex w-fit gap-2 items-center px-3 py-2 bg-zinc-900 hover:bg-zinc-700 transition-colors duration-300 cursor-pointer text-white rounded-md">
                    Submit
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="16" viewBox="0 0 15 16">
                        <path fill="currentColor" d="M12.49 7.14L3.44 2.27c-.76-.41-1.64.3-1.4 1.13l1.24 4.34q.075.27 0 .54l-1.24 4.34c-.24.83.64 1.54 1.4 1.13l9.05-4.87a.98.98 0 0 0 0-1.72Z" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</form>