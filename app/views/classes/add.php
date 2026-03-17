<div class="flex flex-col gap-1 mb-6 bg-white p-4 rounded-md shadow-md">
    <h1 class="text-2xl font-semibold tracking-wide text-zinc-600">Tambah Data Kelas</h1>
    <?php get_breadcrumb() ?>
</div>

<form class="flex flex-col gap-6" action="" method="post">
    <div class="flex flex-col gap-4 bg-white rounded-lg p-6 shadow-md">
        <h2 class="text-xl font-semibold text-nowrap whitespace-nowrap">Data Kelas</h2>
        <div class="w-full h-px bg-zinc-300"></div>
        <div class="w-full flex flex-col gap-4">
            <div class="flex flex-col md:flex-row gap-4">
                <div class="flex flex-col gap-1 w-full">
                    <label class="font-semibold" for="grade_class">Tingkat Kelas</label>
                    <input required class="w-full p-2 rounded-md border border-zinc-300 bg-zinc-50 focus:outline-none" type="text" name="grade_class" id="grade_class" list="Grades">
                    <datalist id="Grades">
                        <option value="X"></option>
                        <option value="XI"></option>
                        <option value="XII"></option>
                    </datalist>
                </div>
                <div class="flex flex-col gap-1 w-full">
                    <label class="font-semibold" for="major">Jurusan</label>
                    <input required class="w-full p-2 rounded-md border border-zinc-300 bg-zinc-50 focus:outline-none" type="text" name="major" id="major" list="Majors">
                    <datalist id="Majors">
                        <?php foreach($majors as $major): ?>
                            <option value="<?= $major['name'] ?>"><?= $major['description'] ?></option>
                        <?php endforeach; ?>
                    </datalist>
                </div>
            </div>
            <div class="flex flex-col md:flex-row gap-4">
                <div class="flex flex-col gap-1 w-full">
                    <label class="font-semibold" for="form_tutor">Wali Kelas</label>
                    <input required class="w-full p-2 rounded-md border border-zinc-300 bg-zinc-50 focus:outline-none" type="text" name="form_tutor" id="form_tutor" list="FormTutors">
                    <datalist id="FormTutors">
                        <?php foreach($form_tutors as $form_tutor): ?>
                            <option value="<?= $form_tutor['code'] ?>"><?= $form_tutor['fullname'] ?></option>
                        <?php endforeach; ?>
                    </datalist>
                </div>
                <div class="flex flex-col gap-1 w-full">
                    <label class="font-semibold" for="bk_teacher">Guru BK</label>
                    <input required class="w-full p-2 rounded-md border border-zinc-300 bg-zinc-50 focus:outline-none" type="text" name="bk_teacher" id="bk_teacher" list="BKTeachers">
                    <datalist id="BKTeachers">
                        <?php foreach($bk_teachers as $bk_teacher): ?>
                            <option value="<?= $bk_teacher['code'] ?>"><?= $bk_teacher['fullname'] ?></option>
                        <?php endforeach; ?>
                    </datalist>
                </div>
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