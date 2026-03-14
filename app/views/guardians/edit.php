<div class="flex flex-col gap-1 mb-6 bg-white p-4 rounded-md shadow-md">
    <h1 class="text-2xl font-semibold tracking-wide">Edit Data Orang Tua / Wali</h1>
    <?php get_breadcrumb() ?>
</div>

<form class="flex flex-col gap-6" action="" method="post">
    <input type="hidden" name="id" value="<?= $guardian['id'] ?>">
    <div class="flex flex-col gap-4 bg-white rounded-lg p-6 shadow-md">
        <h2 class="text-xl font-semibold text-nowrap whitespace-nowrap">Data Wali</h2>
        <div class="w-full h-px bg-zinc-300"></div>
        <div class="w-full flex flex-col gap-4">
            <div class="flex w-full gap-4">
                <div class="w-full">
                    <label class="font-semibold" for="name">Nama</label>
                    <input required class="w-full p-2 rounded-md border border-zinc-300 bg-zinc-50 focus:outline-none" type="text" name="name" id="name" placeholder="Nama wali..." autocomplete="off" value="<?= $guardian['name'] ?>">
                </div>
                <div class="w-full">
                    <label class="font-semibold" for="job">Pekerjaan</label>
                    <input required class="w-full p-2 rounded-md border border-zinc-300 bg-zinc-50 focus:outline-none" type="job" name="job" id="job" placeholder="Pekerjaan wali" autocomplete="off" value="<?= $guardian['job'] ?>">
                </div>
            </div>
            <div class="flex w-full gap-4">
                <div class="w-full">
                    <label class="font-semibold" for="phone_number">Nomor HP</label>
                    <input required class="w-full p-2 rounded-md border border-zinc-300 bg-zinc-50 focus:outline-none" type="tel" id="phone_number" name="phone_number" placeholder="Nomor handphone wali..." value="<?= $guardian['phone_number'] ?>">
                </div>
            </div>
            <div class="flex flex-col gap-1">
                <label class="font-semibold" for="address">Alamat</label>
                <textarea required class="bg-zinc-50 border border-zinc-300 p-2 rounded-md focus:outline-zinc-400 disabled:bg-zinc-100" name="address" id="address" placeholder="Alamat siswa..."><?= $guardian['address'] ?></textarea>
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