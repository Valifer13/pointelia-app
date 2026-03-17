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
        <p class="text-zinc-500 text-base">Guru BK: <a href="#" class="text-zinc-900 font-medium hover:underline"><?= $student_class['bk_teacher_name'] ?></a></p>
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
      <button class="pb-4 text-sm font-medium text-zinc-900 border-b-2 border-zinc-900">Daftar Siswa (32)</button>
    </div>

    <div class="w-full overflow-x-auto">
      <table class="w-full text-left border-collapse">
        <thead>
          <tr class="text-[11px] text-zinc-400 uppercase tracking-widest border-b border-zinc-200">
            <th class="pb-4 font-semibold pl-2 w-16">No</th>
            <th class="pb-4 font-semibold w-2/5">Nama Lengkap</th>
            <th class="pb-4 font-semibold w-1/5">NIS / NISN</th>
            <th class="pb-4 font-semibold w-1/5">Jenis Kelamin</th>
            <th class="pb-4 font-semibold text-right pr-2">Aksi</th>
          </tr>
        </thead>
        <tbody class="text-sm">
          
          <tr class="border-b border-zinc-100 hover:bg-zinc-50/80 transition-colors group">
            <td class="py-4 pl-2 text-zinc-400">01</td>
            <td class="py-4">
              <div class="flex items-center gap-3">
                <div class="w-8 h-8 rounded-full bg-zinc-100 flex items-center justify-center text-xs font-medium text-zinc-500">AD</div>
                <span class="text-zinc-900 font-medium">Aditya Darmawan</span>
              </div>
            </td>
            <td class="py-4 text-zinc-600">2023001<br><span class="text-xs text-zinc-400">0051234567</span></td>
            <td class="py-4 text-zinc-600">Laki-laki</td>
            <td class="py-4 text-right pr-2">
              <button class="text-sm text-zinc-400 hover:text-zinc-900 opacity-0 group-hover:opacity-100 transition-all font-medium">Detail</button>
            </td>
          </tr>

          <tr class="border-b border-zinc-100 hover:bg-zinc-50/80 transition-colors group">
            <td class="py-4 pl-2 text-zinc-400">02</td>
            <td class="py-4">
              <div class="flex items-center gap-3">
                <div class="w-8 h-8 rounded-full bg-zinc-100 flex items-center justify-center text-xs font-medium text-zinc-500">BN</div>
                <span class="text-zinc-900 font-medium">Bella Nadhira</span>
              </div>
            </td>
            <td class="py-4 text-zinc-600">2023002<br><span class="text-xs text-zinc-400">0052345678</span></td>
            <td class="py-4 text-zinc-600">Perempuan</td>
            <td class="py-4 text-right pr-2">
              <button class="text-sm text-zinc-400 hover:text-zinc-900 opacity-0 group-hover:opacity-100 transition-all font-medium">Detail</button>
            </td>
          </tr>

          <tr class="border-b border-zinc-100 hover:bg-zinc-50/80 transition-colors group">
            <td class="py-4 pl-2 text-zinc-400">03</td>
            <td class="py-4">
              <div class="flex items-center gap-3">
                <div class="w-8 h-8 rounded-full bg-zinc-100 flex items-center justify-center text-xs font-medium text-zinc-500">CP</div>
                <span class="text-zinc-900 font-medium">Chandra Pratama</span>
              </div>
            </td>
            <td class="py-4 text-zinc-600">2023003<br><span class="text-xs text-zinc-400">0053456789</span></td>
            <td class="py-4 text-zinc-600">Laki-laki</td>
            <td class="py-4 text-right pr-2">
              <button class="text-sm text-zinc-400 hover:text-zinc-900 opacity-0 group-hover:opacity-100 transition-all font-medium">Detail</button>
            </td>
          </tr>

        </tbody>
      </table>
      
      <div class="mt-6 flex justify-center">
        <button class="text-sm text-zinc-500 hover:text-zinc-900 font-medium transition-colors">Tampilkan lebih banyak ↓</button>
      </div>
    </div>

  </div>
</div>