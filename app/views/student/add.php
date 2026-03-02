<div class="mb-6 flex flex-col gap-2">
    <h1 class="text-2xl font-semibold tracking-wide">Tambah Data Siswa</h1>
    <?php get_breadcrumb() ?>
</div>

<form class="flex flex-col gap-6" action="" method="post">
    <input type="hidden" name="action" value="add">
    <div class="flex flex-col gap-4 bg-white rounded-lg p-6 shadow-md">
        <h2 class="text-xl font-semibold text-nowrap whitespace-nowrap">Data Siswa</h2>
        <div class="w-full h-px bg-zinc-300"></div>
        <div class="w-full flex flex-col gap-4">
            <div class="flex flex-col md:flex-row gap-4">
                <div class="flex flex-col gap-1">
                    <label class="font-semibold" for="nis">NIS:</label>
                    <input class="bg-white border border-zinc-300 p-2 rounded-md focus:outline-zinc-400 disabled:bg-zinc-100 read-only:text-zinc-400" readonly type="text" name="nis" id="nis" value="<?= str_pad($lastNis, 4, "0", STR_PAD_LEFT) ?>">
                </div>
                <div class="flex flex-col gap-1">
                    <label for="nisn">NISN:</label>
                    <input required class="bg-white border border-zinc-300 p-2 rounded-md focus:outline-zinc-400 disabled:bg-zinc-100" type="text" name="nisn" id="nisn" placeholder="XXXXXXXX">
                </div>
            </div>
            <div class="flex flex-col gap-1">
                <label class="font-semibold" for="name">Nama:</label>
                <input required class="bg-white border border-zinc-300 p-2 rounded-md focus:outline-zinc-400 disabled:bg-zinc-100" type="text" name="name" id="name" placeholder="Nama siswa..." autocomplete="off">
            </div>
            <div class="flex flex-col gap-1">
                <label class="font-semibold" for="email">Email:</label>
                <input required class="bg-white border border-zinc-300 p-2 rounded-md focus:outline-zinc-400 disabled:bg-zinc-100" type="email" name="email" id="email" placeholder="Email siswa..." autocomplete="off">
            </div>
            <div class="flex flex-col gap-1">
                <label class="font-semibold" for="phone_number">Nomor HP:</label>
                <input required class="bg-white border border-zinc-300 p-2 rounded-md focus:outline-zinc-400 disabled:bg-zinc-100" type="tel" id="phone_number" name="phone_number" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}">
            </div>
            <div class="flex flex-col md:flex-row gap-4">
                <div class="flex flex-col gap-1">
                    <label class="font-semibold" for="gender">Gender:</label>
                    <select required class="bg-white border border-zinc-300 p-2 rounded-md focus:outline-zinc-400 disabled:bg-zinc-100" name="gender" id="gender">
                        <option value="M">Laki-Laki</option>
                        <option value="F">Perempuan</option>
                    </select>
                </div>
                <div class="flex flex-col gap-1">
                    <label class="font-semibold" for="class">Kelas:</label>
                    <input required class="bg-white border border-zinc-300 p-2 rounded-md focus:outline-zinc-400 disabled:bg-zinc-100" type="text" list="Classes" name="class" id="class">
                    <datalist id="Classes">
                        <?php foreach ($studentClasses as $studentClass): ?>
                            <option value="<?= $studentClass['grade'] . ' ' . $studentClass['major_name'] . ' ' . $studentClass['rombel'] ?>"></option>
                        <?php endforeach; ?>
                    </datalist>
                </div>
            </div>
            <div class="flex flex-col gap-1">
                <label class="font-semibold" for="address">Alamat:</label>
                <textarea required class="bg-white border border-zinc-300 p-2 rounded-md focus:outline-zinc-400 disabled:bg-zinc-100" name="address" id="address" placeholder="Alamat siswa..."></textarea>
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
    </div>
</form>