<div class="flex flex-col md:flex-row justify-between gap-4 items-start lg:items-center mb-6 bg-white p-4 rounded-md shadow-md">
    <div class="flex flex-col gap-1">
        <h1 class="text-2xl font-semibold tracking-wide text-zinc-600">List Tipe Pelanggaran</h1>
        <?php get_breadcrumb() ?>
    </div>
    <div class="flex gap-4">
        <button class="flex gap-2 items-center px-3 py-2 bg-white border border-zinc-300 text-zinc-800 rounded-md cursor-pointer transition-colors duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path fill="currentColor" d="M8.71 7.71L11 5.41V15a1 1 0 0 0 2 0V5.41l2.29 2.3a1 1 0 0 0 1.42 0a1 1 0 0 0 0-1.42l-4-4a1 1 0 0 0-.33-.21a1 1 0 0 0-.76 0a1 1 0 0 0-.33.21l-4 4a1 1 0 1 0 1.42 1.42M21 14a1 1 0 0 0-1 1v4a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-4a1 1 0 0 0-2 0v4a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3v-4a1 1 0 0 0-1-1" />
            </svg>
            Export
        </button>
        <a href="<?= BASE_URL ?>/violation-types/add" class="flex gap-2 items-center px-3 py-2 bg-blue-600 hover:bg-blue-700 transition-colors duration-300 cursor-pointer text-white rounded-md font-medium">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path fill="currentColor" d="M11 13H6q-.425 0-.712-.288T5 12t.288-.712T6 11h5V6q0-.425.288-.712T12 5t.713.288T13 6v5h5q.425 0 .713.288T19 12t-.288.713T18 13h-5v5q0 .425-.288.713T12 19t-.712-.288T11 18z" />
            </svg>
            Tambah Tipe Pelanggaran
        </a>
    </div>
</div>

<div class="flex bg-white p-0.5 w-fit h-fit rounded-full shadow-md mb-4">
    <a title="Riwayat pelanggaran yang terjadi" href="<?= BASE_URL ?>/violations" class="bg-white hover:bg-zinc-100 rounded-full px-4 py-2 cursor-pointer">Riwayat</a>
    <a title="Manajemen tipe-tipe pelanggaran" href="<?= BASE_URL ?>/violation-types" class="bg-zinc-300 rounded-full px-4 py-2 cursor-pointer">Jenis</a>
</div>

<div class="bg-white w-full overflow-x-auto p-4 rounded-md shadow-md mb-6">
    <table class="w-full text-left border-collapse">
        <thead>
            <tr class="text-[11px] text-zinc-400 uppercase tracking-widest whitespace-nowrap border-b border-zinc-200">
                <th class="pb-4 px-4 font-semibold pl-2 w-16">No</th>
                <th class="pb-4 px-4 font-semibold w-2/5">Tipe</th>
                <th class="pb-4 px-4 font-semibold w-1/5">Deskripsi</th>
                <th class="pb-4 px-4 font-semibold w-1/5">Poin</th>
                <th class="pb-4 px-4 font-semibold text-right pr-2">Aksi</th>
            </tr>
        </thead>
        <tbody class="text-sm">

            <?php if (!empty($violation_types['data'])): ?>
                <?php
                $count = 1;
                foreach ($violation_types['data'] as $violation):
                ?>
                    <tr class="border-b border-zinc-100 hover:bg-zinc-50/80 whitespace-nowrap transition-colors group">
                        <td class="p-4 pl-2 text-zinc-400"><?= str_pad($count++, 2, '0', STR_PAD_LEFT) ?></td>
                        <td class="p-4">
                            <span class="text-zinc-900 font-medium"><?= $violation['name'] ?></span>
                        </td>
                        <td class="p-4 text-zinc-600"><?= $violation['description'] ?></td>
                        <td class="p-4 text-zinc-600"><?= $violation['point_value'] ?></td>
                        <td class="p-4 text-right pr-2">
                            <button class="data-option-btn p-1 border border-zinc-200 w-fit rounded-md inset-shadow-zinc-400 transition-all duration-500 cursor-pointer" data-id="<?= $violation['id'] ?>" data-name="<?= $violation['name'] ?>">
                                <svg class="text-zinc-400 group-hover:text-zinc-800 transition-all duration-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M7 12a2 2 0 1 1-4 0a2 2 0 0 1 4 0m7 0a2 2 0 1 1-4 0a2 2 0 0 1 4 0m7 0a2 2 0 1 1-4 0a2 2 0 0 1 4 0" />
                                </svg>
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr class="border-b border-zinc-100 hover:bg-zinc-50/80 whitespace-nowrap transition-colors group">
                    <td class="p-4 text-zinc-400 text-center text-lg" colspan="6">Belum ada tipe laporan pelanggaran!</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<div class="pagination flex gap-5 py-4 justify-center px-5 bg-white rounded-md shadow-md">
    <ul class="flex justify-center gap-1 text-gray-900">

        <!-- PREVIOUS -->
        <li>
            <a href="<?= $violation_types['pagination']['has_prev'] ? BASE_URL . '/violations-types/page/' . ($violation_types['pagination']['current_page'] - 1) : '#' ?>"
               class="grid size-8 place-content-center rounded border border-gray-200 transition-colors 
               <?= !$violation_types['pagination']['has_prev'] ? 'opacity-50 cursor-not-allowed' : 'hover:bg-gray-50' ?>"
               aria-label="Previous page">
               
                <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                </svg>
            </a>
        </li>

        <!-- PAGE NUMBERS -->
        <?php for ($i = 1; $i <= $violation_types['pagination']['last_page']; $i++): ?>
            <li>
                <?php if ($i == $violation_types['pagination']['current_page']): ?>
                    <span class="block size-8 rounded border border-blue-600 bg-blue-600 text-center text-sm/8 font-medium text-white">
                        <?= $i ?>
                    </span>
                <?php else: ?>
                    <a href="<?= BASE_URL ?>/violations-types/page/<?= $i ?>"
                       class="block size-8 rounded border border-gray-200 text-center text-sm/8 font-medium transition-colors hover:bg-gray-50">
                        <?= $i ?>
                    </a>
                <?php endif; ?>
            </li>
        <?php endfor; ?>

        <!-- NEXT -->
        <li>
            <a href="<?= $violation_types['pagination']['has_next'] ? BASE_URL . '/violations-types/page/' . ($violation_types['pagination']['current_page'] + 1) : '#' ?>"
               class="grid size-8 place-content-center rounded border border-gray-200 transition-colors 
               <?= !$violation_types['pagination']['has_next'] ? 'opacity-50 cursor-not-allowed' : 'hover:bg-gray-50' ?>"
               aria-label="Next page">
               
                <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                </svg>
            </a>
        </li>

    </ul>
</div>

<div id="floating-menu"
    class="fixed bg-white border border-zinc-300 rounded-md p-1 shadow-lg invisible opacity-0 scale-95 transition-all duration-100 z-50">
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