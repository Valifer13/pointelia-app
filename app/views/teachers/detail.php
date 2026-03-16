<div class="flex flex-col gap-1 mb-6 bg-white p-4 rounded-md shadow-md">
    <h1 class="text-2xl font-semibold tracking-wide">Detail Guru</h1>
    <?php get_breadcrumb() ?>
</div>

<div class="bg-white text-zinc-800 p-4 shadow-md rounded-md">
  <div class="max-w-6xl mx-auto">

    <div class="flex flex-col md:flex-row gap-8 items-start mb-16">
      <div class="w-28 h-28 rounded-3xl overflow-hidden shrink-0 bg-zinc-100 shadow-sm border border-zinc-200/50">
        <img src="https://ui-avatars.com/api/?name=Budi+Santoso&background=f4f4f5&color=18181b&size=200" alt="Avatar Budi" class="w-full h-full object-cover grayscale opacity-90">
      </div>

      <div class="flex-1 w-full pt-1">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6">
          <div>
            <h1 class="text-3xl font-semibold tracking-tight text-zinc-900"><?= $teacher['fullname'] ?></h1>
            <p class="text-zinc-500 mt-1.5 text-base"><?= $teacher['position'] ?> &nbsp;&bull;&nbsp; <span class="font-medium <?= $teacher['is_active'] ? "text-emerald-600" : "text-red-600" ?>"><?= $teacher['is_active'] ? "Status Aktif" : "Status Tidak Aktif" ?></span></p>
          </div>
          <div class="flex gap-3">
            <a href="<?= BASE_URL ?>/teachers/edit/<?= $teacher['code'] ?>" class="px-6 py-2.5 rounded-full bg-blue-600 text-white text-sm font-medium hover:bg-blue-700 transition-all shadow-sm cursor-pointer">Edit Profil</a>
          </div>
        </div>
      </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
      <div class="space-y-7">
        <div>
          <p class="text-[11px] text-zinc-400 uppercase tracking-widest font-semibold mb-1.5">Email Akses</p>
          <p class="text-zinc-800 font-medium"><?= $teacher['email'] ?></p>
        </div>
        <div>
          <p class="text-[11px] text-zinc-400 uppercase tracking-widest font-semibold mb-1.5">Nomor Telepon</p>
          <p class="text-zinc-800 font-medium"><?= $teacher['phone_number'] ?></p>
        </div>
      </div>
      <div class="space-y-7">
        <div>
          <p class="text-[11px] text-zinc-400 uppercase tracking-widest font-semibold mb-1.5">Nomor Induk (NIP)</p>
          <p class="text-zinc-800 font-medium">19850412 201001 1 015</p>
        </div>
        <div>
          <p class="text-[11px] text-zinc-400 uppercase tracking-widest font-semibold mb-1.5">Pendidikan Terakhir</p>
          <p class="text-zinc-800 font-medium">S2 Pend. Matematika</p>
          <p class="text-zinc-500 text-sm mt-0.5">Universitas Indonesia</p>
        </div>
      </div>
      <div class="space-y-7">
        <div>
          <p class="text-[11px] text-zinc-400 uppercase tracking-widest font-semibold mb-1.5">Tugas Tambahan</p>
          <p class="text-zinc-800 font-medium">Wali Kelas XII-IPA 1</p>
        </div>
        <div>
          <p class="text-[11px] text-zinc-400 uppercase tracking-widest font-semibold mb-1.5">Mulai Bergabung</p>
          <p class="text-zinc-800 font-medium">12 Juli 2018</p>
        </div>
      </div>
    </div>
  </div>
</div>