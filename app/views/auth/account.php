<div class="w-full max-w-3xl bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden mx-auto">

    <div class="p-8 border-b border-gray-100 flex flex-col md:flex-row items-center gap-6">
        <div class="w-24 h-24 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 text-3xl font-bold shrink-0">
            BS
        </div>
        <div class="text-center md:text-left">
            <h1 class="text-2xl font-bold text-gray-900"><?= $fullname ?></h1>
            <p class="text-gray-500 mt-1">NIP. XXXX XXXX XXXX</p>
        </div>
    </div>

    <div class="p-8">
        <h2 class="text-lg font-semibold text-gray-900 mb-6">Informasi Akun</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">

            <div>
                <p class="text-sm text-gray-500 mb-1">Username</p>
                <p class="font-medium text-gray-900"><?= $username ?></p>
            </div>

            <div>
                <p class="text-sm text-gray-500 mb-1">Email</p>
                <p class="font-medium text-gray-900"><?= $email ?></p>
            </div>

            <div>
                <p class="text-sm text-gray-500 mb-1">Nomor Telepon</p>
                <p class="font-medium text-gray-900"><?= $phone_number ?></p>
            </div>

            <div>
                <p class="text-sm text-gray-500 mb-1">Jabatan</p>
                <p class="font-medium text-gray-900"><?= $position ?></p>
            </div>

            <div>
                <p class="text-sm text-gray-500 mb-2">Hak Akses</p>
                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-50 text-blue-700 border border-blue-200">
                    <?= $role ?>
                </span>
            </div>

            <div>
                <p class="text-sm text-gray-500 mb-2">Status Akun</p>
                <?php if ($is_active === 1): ?>
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-50 text-green-700 border border-green-200">
                        <span class="w-1.5 h-1.5 rounded-full bg-green-500 mr-2"></span> Aktif
                    </span>
                <?php else: ?>
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-zinc-50 text-zinc-700 border border-zinc-200">
                        <span class="w-1.5 h-1.5 rounded-full bg-zinc-500 mr-2"></span> Tidak Aktif
                    </span>
                <?php endif; ?>
            </div>

        </div>
    </div>

    <div class="p-6 md:p-8 bg-gray-50 border-t border-gray-100 flex flex-col sm:flex-row justify-end gap-4">
        <a href="<?= BASE_URL ?>/change-password" type="button" class="px-5 py-2.5 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-100 font-medium transition-colors shadow-sm text-sm cursor-pointer text-center w-full md:w-fit whitespace-nowrap">
            Reset Password
        </a>

        <form action="<?= BASE_URL ?>/logout" method="post" class="w-full">
            <button type="submit" class="px-5 py-2.5 bg-red-600 text-white rounded-lg hover:bg-red-700 font-medium transition-colors shadow-sm text-sm cursor-pointer w-full md:w-fit">
                Keluar (Logout)
            </button>
        </form>
    </div>

</div>