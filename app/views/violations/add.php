<div class="flex flex-col gap-1 mb-6 bg-white p-4 rounded-md shadow-md">
    <h1 class="text-2xl font-semibold tracking-wide text-zinc-600">Tambah Laporan Pelanggaran</h1>
    <?php get_breadcrumb() ?>
</div>

<form class="flex flex-col gap-6" action="" method="post">
    <div class="flex flex-col gap-4 bg-white rounded-lg p-6 shadow-md">
        <h2 class="text-xl font-semibold text-nowrap whitespace-nowrap">Data Siswa</h2>
        <div class="w-full h-px bg-zinc-300"></div>
        <div class="w-full flex flex-col gap-4">
            <div class="flex w-full gap-4 flex-col md:flex-row">
                <div class="w-full">
                    <label class="font-semibold" for="student_nis">NIS Siswa</label>
                    <input required class="w-full p-2 rounded-md border border-zinc-300 bg-zinc-50 focus:outline-none read-only:text-zinc-400" type="text" name="student_nis" id="student_nis" list="Students">
                    <datalist id="Students">
                        <?php foreach($students as $student): ?>
                            <option value="<?= $student['nis'] ?>"><?= $student['name'] ?></option>
                        <?php endforeach; ?>
                    </datalist>
                </div>
                <div class="w-full">
                    <label class="font-semibold" for="violation_type">Tipe Pelanggaran:</label>
                    <input required class="w-full p-2 rounded-md border border-zinc-300 bg-zinc-50 focus:outline-none" type="text" name="violation_type" id="violation_type" list="ViolationTypes">
                    <datalist id="ViolationTypes">
                        <?php foreach($violationTypes as $violationType): ?>
                            <option value="<?= $violationType['id'] ?>"><?= $violationType['name'] ?></option>
                        <?php endforeach; ?>
                    </datalist>
                </div>
            </div>
            <div class="flex w-full gap-4 flex-col md:flex-row">
                <div class="w-full">
                    <label class="font-semibold" for="occurrence_date">Tanggal Terjadi</label>
                    <input required class="w-full p-2 rounded-md border border-zinc-300 bg-zinc-50 focus:outline-none" type="date" name="occurrence_date" id="occurrence_date">
                </div>
                <div class="w-full">
                    <label class="font-semibold" for="status">Status:</label>
                    <input required class="w-full p-2 rounded-md border border-zinc-300 bg-zinc-50 focus:outline-none" type="text" name="status" id="status" placeholder="Pilih Status" list="Status">
                    <datalist id="Status">
                        <option value="Antrian"></option>
                        <option value="Diterima"></option>
                        <option value="Ditolak"></option>
                    </datalist>
                </div>
            </div>
            <!-- <div class="space-y-3">
                <p class="font-semibold">Jenis Kelamin:</p>
                <div class="flex gap-4">
                    <div class="w-full">
                        <label for="gender_male" class="flex items-center gap-4 rounded border border-gray-300 bg-white p-3 text-sm font-medium shadow-sm transition-colors hover:bg-zinc-50 has-checked:border-blue-600 has-checked:ring-1 has-checked:ring-blue-600 has-checked:bg-blue-100">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 14a5 5 0 1 0 10 0a5 5 0 1 0-10 0m14-9l-5.4 5.4M19 5h-5m5 0v5" />
                            </svg>

                            <p class="text-gray-700">Laki-Laki</p>

                            <input type="radio" name="gender" value="M" id="gender_male" class="sr-only" checked="">
                        </label>
                    </div>

                    <div class="w-full">
                        <label for="gender_female" class="flex items-center gap-4 rounded border border-gray-300 bg-white p-3 text-sm font-medium shadow-sm transition-colors hover:bg-zinc-50 has-checked:border-pink-600 has-checked:ring-1 has-checked:ring-pink-600 has-checked:bg-pink-100">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M19.75 7.75a7.75 7.75 0 1 0-9.2 7.6a.27.27 0 0 1 .2.25v2.65a.25.25 0 0 1-.25.25H9A1.25 1.25 0 0 0 9 21h1.5a.25.25 0 0 1 .25.25v1.5a1.25 1.25 0 0 0 2.5 0v-1.5a.25.25 0 0 1 .25-.25H15a1.25 1.25 0 0 0 0-2.5h-1.5a.25.25 0 0 1-.25-.25V15.6a.27.27 0 0 1 .2-.25a7.75 7.75 0 0 0 6.3-7.6m-13 0A5.25 5.25 0 1 1 12 13a5.26 5.26 0 0 1-5.25-5.25" />
                            </svg>

                            <p class="text-gray-700">Perempuan</p>

                            <input type="radio" name="gender" value="F" id="gender_female" class="sr-only">
                        </label>
                    </div>
                </div>
            </div> -->
            <div class="flex flex-col gap-1">
                <label class="font-semibold" for="notes">Catatan:</label>
                <textarea class="bg-zinc-50 border border-zinc-300 p-2 rounded-md focus:outline-zinc-400 disabled:bg-zinc-100" name="notes" id="notes" placeholder="Deskripsi yang terjadi pada siswa..."></textarea>
            </div>
            <div class="flex justify-end">
                <button type="submit" class="flex w-full justify-center md:w-fit gap-2 items-center px-3 py-2 bg-blue-600 hover:bg-blue-700 transition-colors duration-300 cursor-pointer text-white rounded-md">
                    Submit
                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="16" viewBox="0 0 15 16">
                        <path fill="currentColor" d="M12.49 7.14L3.44 2.27c-.76-.41-1.64.3-1.4 1.13l1.24 4.34q.075.27 0 .54l-1.24 4.34c-.24.83.64 1.54 1.4 1.13l9.05-4.87a.98.98 0 0 0 0-1.72Z" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</form>

<script>
    const dateOfOccurrenceInput = document.getElementById('occurrence_date');

    dateOfOccurrenceInput.valueAsDate = new Date();
</script>