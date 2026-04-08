<div class="flex flex-col md:flex-row justify-between gap-4 items-start lg:items-center mb-6 bg-white p-4 rounded-md shadow-md">
    <div class="flex flex-col gap-1">
        <h1 class="text-2xl font-semibold tracking-wide text-zinc-600">List Siswa</h1>
        <?php get_breadcrumb() ?>
    </div>
    <div class="flex gap-4">
        <button class="flex gap-2 items-center px-3 py-2 bg-white border border-zinc-300 text-zinc-800 rounded-md cursor-pointer transition-colors duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path fill="currentColor" d="M8.71 7.71L11 5.41V15a1 1 0 0 0 2 0V5.41l2.29 2.3a1 1 0 0 0 1.42 0a1 1 0 0 0 0-1.42l-4-4a1 1 0 0 0-.33-.21a1 1 0 0 0-.76 0a1 1 0 0 0-.33.21l-4 4a1 1 0 1 0 1.42 1.42M21 14a1 1 0 0 0-1 1v4a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-4a1 1 0 0 0-2 0v4a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3v-4a1 1 0 0 0-1-1" />
            </svg>
            Export
        </button>
        <?php if (AuthMiddleware::checkRoleForBool(['admin'])): ?>
            <a href="<?= BASE_URL ?>/students/add" class="flex gap-2 items-center px-3 py-2 bg-blue-600 hover:bg-blue-700 transition-colors duration-300 cursor-pointer text-white rounded-md font-medium">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M11 13H6q-.425 0-.712-.288T5 12t.288-.712T6 11h5V6q0-.425.288-.712T12 5t.713.288T13 6v5h5q.425 0 .713.288T19 12t-.288.713T18 13h-5v5q0 .425-.288.713T12 19t-.712-.288T11 18z" />
                </svg>
                Tambah Siswa
            </a>
        <?php endif; ?>
    </div>
</div>

<div class="bg-white w-full overflow-x-auto p-4 rounded-md shadow-md mb-6">
    <table class="w-full text-left border-collapse">
        <thead>
            <tr class="text-[11px] text-zinc-400 uppercase tracking-widest whitespace-nowrap border-b border-zinc-200">
                <th class="pb-4 px-4 font-semibold pl-2 w-16">No</th>
                <th class="pb-4 px-4 font-semibold w-2/5">Nama Lengkap</th>
                <th class="pb-4 px-4 font-semibold w-1/5">NIS / NISN</th>
                <th class="pb-4 px-4 font-semibold w-1/5">Jenis Kelamin</th>
                <th class="pb-4 px-4 font-semibold w-1/5">Poin</th>
                <?php if (AuthMiddleware::checkRoleForBool(['admin'])): ?>
                    <th class="pb-4 px-4 font-semibold text-right pr-2">Aksi</th>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody class="text-sm">

            <?php
            $count = ($students['pagination']['current_page'] - 1) * 10 + 1;
            $point_count = 0;
            foreach ($students['data'] as $student):
            ?>
                <tr class="border-b border-zinc-100 hover:bg-zinc-50/80 whitespace-nowrap transition-colors group">
                    <td class="p-4 pl-2 text-zinc-400"><?= str_pad($count++, 2, '0', STR_PAD_LEFT) ?></td>
                    <td class="p-4">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-zinc-100 flex items-center justify-center text-xs font-medium text-zinc-500"><?= $student['name'][0] ?></div>
                            <span class="text-zinc-900 font-medium"><?= $student['name'] ?></span>
                        </div>
                    </td>
                    <td class="p-4 text-zinc-600"># <?= $student['nis'] ?><br><span class="text-xs text-zinc-400"><?= $student['nisn'] ?></span></td>
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
                    <td class="p-4 text-zinc-600"><?= $total_violation_point_per_students[$point_count++] ?></td>
 
                    <?php if (AuthMiddleware::checkRoleForBool(['admin'])): ?>
                        <td class="p-4 text-right pr-2">
                            <button class="data-option-btn p-1 border border-zinc-200 w-fit rounded-md inset-shadow-zinc-400 transition-all duration-500 cursor-pointer" data-id="<?= $student['nis'] ?>" data-name="<?= $student['name'] ?>">
                                <svg class="text-zinc-400 group-hover:text-zinc-800 transition-all duration-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M7 12a2 2 0 1 1-4 0a2 2 0 0 1 4 0m7 0a2 2 0 1 1-4 0a2 2 0 0 1 4 0m7 0a2 2 0 1 1-4 0a2 2 0 0 1 4 0" />
                                </svg>
                            </button>
                        </td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>
</div>

<div class="pagination flex gap-5 py-4 justify-center px-5 bg-white rounded-md shadow-md">
    <ul class="flex justify-center gap-3 text-gray-900">
        <li>
            <a href="<?= $students['pagination']['has_prev'] ? BASE_URL . '/students/page/' . ($students['pagination']['current_page'] - 1) : '#' ?>" class="grid size-8 place-content-center rounded border border-gray-200 transition-colors hover:bg-gray-50 rtl:rotate-180" aria-label="Previous page">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                </svg>
            </a>
        </li>

        <li class="text-sm/8 font-medium tracking-widest"><?= $students['pagination']['current_page'] ?>/<?= $students['pagination']['last_page'] ?></li>

        <li>
            <a href="<?= $students['pagination']['has_next'] ? BASE_URL . '/students/page/' . ($students['pagination']['current_page'] + 1) : '#' ?>" class="grid size-8 place-content-center rounded border border-gray-200 transition-colors hover:bg-gray-50 rtl:rotate-180" aria-label="Next page">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                </svg>
            </a>
        </li>
    </ul>
</div>

<div id="floating-menu"
    class="fixed bg-white border border-zinc-100 rounded-md p-1 shadow-lg invisible opacity-0 scale-95 transition-all duration-100 z-50">
    <?php if (AuthMiddleware::checkRoleForBool(['admin'])): ?>
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
    <?php endif; ?>
</div>