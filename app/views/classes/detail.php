<div class="flex flex-col gap-1 mb-6 bg-white p-4 rounded-md shadow-md">
  <h1 class="text-2xl font-semibold tracking-wide text-zinc-600">Detail Kelas</h1>
  <?php get_breadcrumb() ?>
</div>

<div class="bg-white text-zinc-800 px-4 py-10 rounded-md shadow-md">
  <div class="">

    <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-12">
      <div>
        <div class="flex items-center gap-3 mb-2">
          <h1 class="text-4xl font-semibold tracking-tight text-zinc-900"><?= $student_class['grade'] . " " . $student_class['major_name'] . " " . $student_class['rombel'] ?></h1>
          <span class="px-3 py-1 bg-zinc-100 text-zinc-600 text-[11px] font-semibold uppercase tracking-widest rounded-full">Tahun 2025/2026</span>
        </div>
        <p class="text-zinc-500 text-base">Wali Kelas: <a href="#" class="text-zinc-900 font-medium hover:underline"><?= $student_class['form_tutor_name'] ?></a></p>
      </div>

      <div class="flex gap-3">
        <button class="px-5 py-2.5 rounded-full border border-zinc-200 text-zinc-600 text-sm font-medium hover:border-zinc-300 hover:text-zinc-900 hover:bg-white transition-all flex items-center gap-2 cursor-pointer">
          Unduh Laporan
        </button>
        <button class="px-5 py-2.5 rounded-full bg-blue-600 text-white text-sm font-medium hover:bg-blue-700 transition-all shadow-sm flex items-center gap-2 cursor-pointer">
          + Tambah Siswa
        </button>
      </div>
    </div>

    <div class="flex gap-8 border-b border-zinc-200 mb-8">
      <button class="pb-4 text-sm font-medium text-zinc-900 border-b-2 border-zinc-900">Daftar Siswa (<?= count($students_in_this_class) ?>)</button>
    </div>

    <div class="w-full overflow-x-auto">
      <table class="w-full text-left border-collapse">
        <thead>
          <tr class="text-[11px] text-zinc-400 uppercase tracking-widest border-b border-zinc-200 **:whitespace-nowrap">
            <th class="pb-4 px-4 font-semibold pl-2 w-16">No</th>
            <th class="pb-4 px-4 font-semibold w-2/5">Nama Lengkap</th>
            <th class="pb-4 px-4 font-semibold w-1/5">NIS / NISN</th>
            <th class="pb-4 px-4 font-semibold w-1/5">Jenis Kelamin</th>
            <th class="pb-4 px-4 font-semibold text-right pr-2">Aksi</th>
          </tr>
        </thead>
        <tbody class="text-sm">

          <?php if (count($students_in_this_class) > 0): ?>
            <?php
            $count = 0;
            foreach ($students_in_this_class as $student):
              $count++
            ?>
              <tr class="border-b border-zinc-100 hover:bg-zinc-50/80 transition-colors group **:whitespace-nowrap">
                <td class="py-4 px-2 pl-2 text-zinc-400"><?= str_pad($count, 2, '0', STR_PAD_LEFT) ?></td>
                <td class="py-4 px-2">
                  <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-full bg-zinc-100 flex items-center justify-center text-xs font-medium text-zinc-500">AD</div>
                    <span class="text-zinc-900 font-medium"><?= $student['name'] ?></span>
                  </div>
                </td>
                <td class="py-4 px-2 text-zinc-600"><?= $student['nis'] ?><br><span class="text-xs text-zinc-400"><?= $student['nisn'] ?></span></td>
                <?php if ($student["gender"] === "M"): ?>
                  <td class="p-4 flex gap-2 items-center text-blue-600">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24">
                      <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 14a5 5 0 1 0 10 0a5 5 0 1 0-10 0m14-9l-5.4 5.4M19 5h-5m5 0v5" />
                    </svg>
                    <p class="text-blue-600">Laki-Laki</p>
                  </td>
                <?php elseif ($student["gender"] === "F"): ?>
                  <td class="p-4 flex gap-2 items-center text-pink-600">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24">
                      <path fill="currentColor" d="M19.75 7.75a7.75 7.75 0 1 0-9.2 7.6a.27.27 0 0 1 .2.25v2.65a.25.25 0 0 1-.25.25H9A1.25 1.25 0 0 0 9 21h1.5a.25.25 0 0 1 .25.25v1.5a1.25 1.25 0 0 0 2.5 0v-1.5a.25.25 0 0 1 .25-.25H15a1.25 1.25 0 0 0 0-2.5h-1.5a.25.25 0 0 1-.25-.25V15.6a.27.27 0 0 1 .2-.25a7.75 7.75 0 0 0 6.3-7.6m-13 0A5.25 5.25 0 1 1 12 13a5.26 5.26 0 0 1-5.25-5.25" />
                    </svg>
                    <p class="text-pink-600">Perempuan</p>
                  </td>
                <?php endif; ?>
                <td class="py-4 px-2 text-right pr-2">
                  <button class="data-option-btn p-1 border border-zinc-200 w-fit rounded-md inset-shadow-zinc-400 transition-all duration-500 cursor-pointer" data-id="<?= $student['nis'] ?>" data-name="<?= $student['name'] ?>">
                    <svg class="text-zinc-400 group-hover:text-zinc-800 transition-all duration-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                      <path fill="currentColor" d="M7 12a2 2 0 1 1-4 0a2 2 0 0 1 4 0m7 0a2 2 0 1 1-4 0a2 2 0 0 1 4 0m7 0a2 2 0 1 1-4 0a2 2 0 0 1 4 0" />
                    </svg>
                  </button>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php else: ?>
            <tr class="border-b border-zinc-100 hover:bg-zinc-50/80 transition-colors group">
              <td class="p-4 text-zinc-400 text-center text-lg" colspan="6">Belum ada laporan pelanggaran!</td>
            </tr>
          <?php endif; ?>

        </tbody>
      </table>
    </div>

  </div>
</div>

<div id="floating-menu"
    class="fixed bg-white border border-zinc-100 rounded-md p-1 shadow-lg invisible opacity-0 scale-95 transition-all duration-100 z-50">
    <a id="menu-detail" class="flex gap-3 px-3 py-2 hover:bg-blue-500 hover:text-white group rounded">
        <svg class="text-blue-500 group-hover:text-white" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
            <path fill="currentColor" d="M12 9a3 3 0 0 0-3 3a3 3 0 0 0 3 3a3 3 0 0 0 3-3a3 3 0 0 0-3-3m0 8a5 5 0 0 1-5-5a5 5 0 0 1 5-5a5 5 0 0 1 5 5a5 5 0 0 1-5 5m0-12.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5" />
        </svg>
        Detail
    </a>

    <a id="menu-edit" class="flex gap-3 px-3 py-2 hover:bg-yellow-500 hover:text-white group rounded">
        <svg class="text-yellow-500 group-hover:text-white" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
            <path fill="currentColor" d="M20.71 7.04c.39-.39.39-1.04 0-1.41l-2.34-2.34c-.37-.39-1.02-.39-1.41 0l-1.84 1.83l3.75 3.75M3 17.25V21h3.75L17.81 9.93l-3.75-3.75z" />
        </svg>
        Edit
    </a>

    <form id="menu-delete-form" method="post">
        <button id="menu-delete-btn" class="flex gap-3 px-3 py-2 hover:bg-red-500 hover:text-white group rounded">
            <svg class="text-red-500 group-hover:text-white" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path fill="currentColor" d="M19 4h-3.5l-1-1h-5l-1 1H5v2h14M6 19a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V7H6z" />
            </svg>
            Delete
        </button>
    </form>
</div>