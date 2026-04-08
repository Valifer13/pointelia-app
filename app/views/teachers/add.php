<div class="flex flex-col gap-1 mb-6 bg-white p-4 rounded-md shadow-md">
    <h1 class="text-2xl font-semibold tracking-wide text-zinc-600">Tambah Guru</h1>
    <?php get_breadcrumb() ?>
</div>

<form class="flex flex-col gap-6" action="" method="post">
    <div class="flex flex-col bg-white rounded-lg shadow-md">
        <h2 class="text-xl font-semibold text-nowrap whitespace-nowrap px-6 py-4">Profil Guru</h2>
        <div class="w-full h-px bg-zinc-300"></div>
        <div class="w-full flex flex-col gap-4 p-6">
            <div class="flex w-full gap-4 flex-col md:flex-row">
                <div class="w-full">
                    <label class="font-semibold" for="code">Code<span class="text-red-500">*</span></label>
                    <input required class="w-full p-2 rounded-md border border-zinc-300 bg-zinc-50 focus:outline-none read-only:text-zinc-400" type="text" name="code" id="code" value="0021.">
                </div>
                <div class="w-full">
                    <label class="font-semibold" for="username">Username<span class="text-red-500">*</span></label>
                    <input required class="w-full p-2 rounded-md border border-zinc-300 bg-zinc-50 focus:outline-none" type="text" name="username" id="username" placeholder="Username guru..." autocomplete="off">
                </div>
            </div>
            <div class="flex w-full gap-4 flex-col md:flex-row">
                <div class="w-full">
                    <label class="font-semibold" for="fullname">Nama<span class="text-red-500">*</span></label>
                    <input required class="w-full p-2 rounded-md border border-zinc-300 bg-zinc-50 focus:outline-none" type="text" name="fullname" id="fullname" placeholder="Nama guru..." autocomplete="off">
                </div>
                <div class="w-full">
                    <label class="font-semibold" for="email">Email<span class="text-red-500">*</span></label>
                    <input required class="w-full p-2 rounded-md border border-zinc-300 bg-zinc-50 focus:outline-none" type="email" name="email" id="email" placeholder="Email guru..." autocomplete="off">
                </div>
            </div>
            <div class="flex w-full gap-4">
                <div class="w-full">
                    <label class="font-semibold" for="phone_number">Nomor HP<span class="text-red-500">*</span></label>
                    <input required class="w-full p-2 rounded-md border border-zinc-300 bg-zinc-50 focus:outline-none" type="tel" id="phone_number" name="phone_number">
                </div>
            </div>
        </div>
    </div>
    <div class="flex flex-col bg-white rounded-lg shadow-md">
        <h2 class="text-xl font-semibold text-nowrap whitespace-nowrap px-6 py-4">Otoritas Guru</h2>
        <div class="w-full h-px bg-zinc-300"></div>
        <div class="w-full flex flex-col gap-4 p-6">
            <div class="flex flex-col gap-1">
                <label class="font-semibold" for="position">Jabatan<span class="text-red-500">*</span></label>
                <input required class="w-full p-2 rounded-md border border-zinc-300 bg-zinc-50 focus:outline-none" type="text" name="position" id="position" placeholder="Jabatan guru..." autocomplete="off">
            </div>
            <div class="space-y-3">
                <p class="font-semibold">Hak Akses</p>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="w-full">
                        <label for="teacher_access" class="flex items-center gap-2 rounded border border-gray-300 bg-white p-3 text-sm text-zinc-700 font-medium shadow-sm transition-colors hover:bg-zinc-50 has-checked:border-green-600 has-checked:ring-1 has-checked:ring-green-600 has-checked:bg-green-100 has-checked:text-green-600">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 20 20">
                                <path fill="currentColor" d="M7 7.5C7 4.424 9.424 2 12.5 2S18 4.424 18 7.5S15.576 13 12.5 13a5.8 5.8 0 0 1-1.5-.18V13a1 1 0 0 1-1 1H9v1a1 1 0 0 1-1 1H7v.5A1.5 1.5 0 0 1 5.5 18h-2A1.5 1.5 0 0 1 2 16.5v-1.586c0-.398.158-.78.44-1.06l4.54-4.541c.134-.134.2-.368.142-.638A5.6 5.6 0 0 1 7 7.5M15 6a1 1 0 1 0-2 0a1 1 0 0 0 2 0" />
                            </svg>

                            <p class="font-semibold">Guru</p>

                            <input type="radio" name="access" value="Guru" id="teacher_access" class="sr-only" checked>
                        </label>
                    </div>

                    <div class="w-full">
                        <label for="admin_access" class="flex items-center gap-2 rounded border border-gray-300 bg-white p-3 text-sm text-zinc-700 font-medium shadow-sm transition-colors hover:bg-zinc-50 has-checked:border-blue-700 has-checked:ring-1 has-checked:ring-blue-700 has-checked:bg-blue-100 has-checked:text-blue-700">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 20 20">
                                <path fill="currentColor" d="M7 7.5C7 4.424 9.424 2 12.5 2S18 4.424 18 7.5S15.576 13 12.5 13a5.8 5.8 0 0 1-1.5-.18V13a1 1 0 0 1-1 1H9v1a1 1 0 0 1-1 1H7v.5A1.5 1.5 0 0 1 5.5 18h-2A1.5 1.5 0 0 1 2 16.5v-1.586c0-.398.158-.78.44-1.06l4.54-4.541c.134-.134.2-.368.142-.638A5.6 5.6 0 0 1 7 7.5M15 6a1 1 0 1 0-2 0a1 1 0 0 0 2 0" />
                            </svg>

                            <p class="font-semibold">Admin</p>

                            <input type="radio" name="access" value="Admin" id="admin_access" class="sr-only">
                        </label>
                    </div>

                    <div class="w-full">
                        <label for="wakasek_access" class="flex items-center gap-2 rounded border border-gray-300 bg-white p-3 text-sm text-zinc-700 font-medium shadow-sm transition-colors hover:bg-zinc-50 has-checked:border-violet-600 has-checked:ring-1 has-checked:ring-violet-600 has-checked:bg-violet-100 has-checked:text-violet-600">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 20 20">
                                <path fill="currentColor" d="M7 7.5C7 4.424 9.424 2 12.5 2S18 4.424 18 7.5S15.576 13 12.5 13a5.8 5.8 0 0 1-1.5-.18V13a1 1 0 0 1-1 1H9v1a1 1 0 0 1-1 1H7v.5A1.5 1.5 0 0 1 5.5 18h-2A1.5 1.5 0 0 1 2 16.5v-1.586c0-.398.158-.78.44-1.06l4.54-4.541c.134-.134.2-.368.142-.638A5.6 5.6 0 0 1 7 7.5M15 6a1 1 0 1 0-2 0a1 1 0 0 0 2 0" />
                            </svg>

                            <p class="font-semibold">Wakasek</p>

                            <input type="radio" name="access" value="Wakasek" id="wakasek_access" class="sr-only">
                        </label>
                    </div>

                    <div class="w-full">
                        <label for="headschool_access" class="flex items-center gap-2 rounded border border-gray-300 bg-white p-3 text-sm text-zinc-700 font-medium shadow-sm transition-colors hover:bg-zinc-50 has-checked:border-orange-600 has-checked:ring-1 has-checked:ring-orange-600 has-checked:bg-orange-100">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                <path fill="currentColor" d="M7 7.5C7 4.424 9.424 2 12.5 2S18 4.424 18 7.5S15.576 13 12.5 13a5.8 5.8 0 0 1-1.5-.18V13a1 1 0 0 1-1 1H9v1a1 1 0 0 1-1 1H7v.5A1.5 1.5 0 0 1 5.5 18h-2A1.5 1.5 0 0 1 2 16.5v-1.586c0-.398.158-.78.44-1.06l4.54-4.541c.134-.134.2-.368.142-.638A5.6 5.6 0 0 1 7 7.5M15 6a1 1 0 1 0-2 0a1 1 0 0 0 2 0" />
                            </svg>

                            <p class="font-semibold">Kepala Sekolah</p>

                            <input type="radio" name="access" value="Kepala Sekolah" id="headschool_access" class="sr-only">
                        </label>
                    </div>
                </div>
            </div>
            <div class="space-y-3">
                <p class="font-semibold">Status</p>
                <div class="grid grid-cols-2 gap-4">
                    <div class="w-full">
                        <label for="status_active" class="flex items-center gap-2 rounded border border-gray-300 bg-white p-3 text-sm text-zinc-700 font-medium shadow-sm transition-colors hover:bg-zinc-50 has-checked:border-green-600 has-checked:ring-1 has-checked:ring-green-600 has-checked:bg-green-100 has-checked:text-green-600">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 20 20">
                                <path fill="currentColor" d="M7 7.5C7 4.424 9.424 2 12.5 2S18 4.424 18 7.5S15.576 13 12.5 13a5.8 5.8 0 0 1-1.5-.18V13a1 1 0 0 1-1 1H9v1a1 1 0 0 1-1 1H7v.5A1.5 1.5 0 0 1 5.5 18h-2A1.5 1.5 0 0 1 2 16.5v-1.586c0-.398.158-.78.44-1.06l4.54-4.541c.134-.134.2-.368.142-.638A5.6 5.6 0 0 1 7 7.5M15 6a1 1 0 1 0-2 0a1 1 0 0 0 2 0" />
                            </svg>

                            <p class="font-semibold">Aktif</p>

                            <input type="radio" name="status" value="1" id="status_active" class="sr-only" checked>
                        </label>
                    </div>

                    <div class="w-full">
                        <label for="status_nonactive" class="flex items-center gap-2 rounded border border-gray-300 bg-white p-3 text-sm text-zinc-700 font-medium shadow-sm transition-colors hover:bg-zinc-50 has-checked:border-red-700 has-checked:ring-1 has-checked:ring-red-700 has-checked:bg-red-100 has-checked:text-red-700">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 20 20">
                                <path fill="currentColor" d="M7 7.5C7 4.424 9.424 2 12.5 2S18 4.424 18 7.5S15.576 13 12.5 13a5.8 5.8 0 0 1-1.5-.18V13a1 1 0 0 1-1 1H9v1a1 1 0 0 1-1 1H7v.5A1.5 1.5 0 0 1 5.5 18h-2A1.5 1.5 0 0 1 2 16.5v-1.586c0-.398.158-.78.44-1.06l4.54-4.541c.134-.134.2-.368.142-.638A5.6 5.6 0 0 1 7 7.5M15 6a1 1 0 1 0-2 0a1 1 0 0 0 2 0" />
                            </svg>

                            <p class="font-semibold">Tidak Aktif</p>

                            <input type="radio" name="status" value="0" id="status_nonactive" class="sr-only">
                        </label>
                    </div>
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