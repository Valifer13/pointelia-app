<div class="flex flex-col md:flex-row justify-between gap-4 items-start lg:items-center mb-6 bg-white p-4 rounded-md shadow-md">
    <div class="flex flex-col gap-1">
        <h1 class="text-2xl font-semibold tracking-wide"><?= $title ?></h1>
        <?php get_breadcrumb() ?>
    </div>
    <div class="flex gap-4">
        <button class="flex gap-2 items-center px-3 py-2 bg-white border border-zinc-300 text-zinc-800 rounded-md cursor-pointer transition-colors duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path fill="currentColor" d="M8.71 7.71L11 5.41V15a1 1 0 0 0 2 0V5.41l2.29 2.3a1 1 0 0 0 1.42 0a1 1 0 0 0 0-1.42l-4-4a1 1 0 0 0-.33-.21a1 1 0 0 0-.76 0a1 1 0 0 0-.33.21l-4 4a1 1 0 1 0 1.42 1.42M21 14a1 1 0 0 0-1 1v4a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-4a1 1 0 0 0-2 0v4a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3v-4a1 1 0 0 0-1-1" />
            </svg>
            Export
        </button>
        <a href="<?= BASE_URL ?>/teachers/add" class="flex gap-2 items-center px-3 py-2 bg-blue-600 hover:bg-blue-700 transition-colors duration-300 cursor-pointer text-white rounded-md font-medium">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path fill="currentColor" d="M11 13H6q-.425 0-.712-.288T5 12t.288-.712T6 11h5V6q0-.425.288-.712T12 5t.713.288T13 6v5h5q.425 0 .713.288T19 12t-.288.713T18 13h-5v5q0 .425-.288.713T12 19t-.712-.288T11 18z" />
            </svg>
            Tambah Guru
        </a>
    </div>
</div>

<div class="bg-white rounded-lg w-full h-fit shadow-md overflow-x-auto mb-6">
    <table class="w-full">
        <thead class="**:text-left **:py-2 **:px-5 *:whitespace-nowrap *:font-bold bg-blue-600 text-white">
            <th>Kode</th>
            <th>Nama</th>
            <th>Nomor HP.</th>
            <th>Posisi</th>
            <td>Status</td>
            <th class="rounded-tr-md">Option</th>
        </thead>

        <tbody class="*:border-b *:border-b-zinc-300 text-zinc-500">
            <?php if (!empty($data['teachers'])): ?>
                <?php foreach ($data["teachers"] as $teacher): ?>
                    <tr class="*:py-2 *:px-5 **:whitespace-nowrap">
                        <td>
                            <div class="py-1 px-2 bg-zinc-100 rounded-full w-fit">
                                <span class="text-base text-zinc-400">#</span>
                                <span class="text-sm"><?= $teacher["code"] ?></span>
                            </div>
                        </td>
                        <td><?= $teacher["fullname"] ?></td>
                        <td><?= $teacher["phone_number"] ?></td>
                        <td><?= $teacher["position"] ?></td>
                        <td>
                            <?php if ($teacher["is_active"] === 1): ?>
                            <div class="flex gap-2 items-center bg-green-100 py-1 px-4 rounded-full w-fit">
                                <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                                <span class="text-green-500 font-medium">Aktif</span>
                            </div>
                            <?php else: ?>
                            <div class="flex gap-2 items-center bg-red-100 py-1 px-4 rounded-full w-fit">
                                <div class="w-2 h-2 bg-red-500 rounded-full"></div>
                                <span class="text-red-500 font-medium">Tidak Aktif</span>
                            </div>
                            <?php endif; ?>
                        </td>
                        <td class="text-zinc-500">
                            <button class="data-option-btn p-2 border border-zinc-400 w-fit rounded-md inset-shadow-zinc-400 transition-all duration-500 cursor-pointer" data-id="<?= $teacher['code'] ?>" data-name="<?= $teacher['fullname'] ?>">
                                <svg class="group-hover:text-zinc-800 transition-all duration-500" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M19.9 12.66a1 1 0 0 1 0-1.32l1.28-1.44a1 1 0 0 0 .12-1.17l-2-3.46a1 1 0 0 0-1.07-.48l-1.88.38a1 1 0 0 1-1.15-.66l-.61-1.83a1 1 0 0 0-.95-.68h-4a1 1 0 0 0-1 .68l-.56 1.83a1 1 0 0 1-1.15.66L5 4.79a1 1 0 0 0-1 .48L2 8.73a1 1 0 0 0 .1 1.17l1.27 1.44a1 1 0 0 1 0 1.32L2.1 14.1a1 1 0 0 0-.1 1.17l2 3.46a1 1 0 0 0 1.07.48l1.88-.38a1 1 0 0 1 1.15.66l.61 1.83a1 1 0 0 0 1 .68h4a1 1 0 0 0 .95-.68l.61-1.83a1 1 0 0 1 1.15-.66l1.88.38a1 1 0 0 0 1.07-.48l2-3.46a1 1 0 0 0-.12-1.17ZM18.41 14l.8.9l-1.28 2.22l-1.18-.24a3 3 0 0 0-3.45 2L12.92 20h-2.56L10 18.86a3 3 0 0 0-3.45-2l-1.18.24l-1.3-2.21l.8-.9a3 3 0 0 0 0-4l-.8-.9l1.28-2.2l1.18.24a3 3 0 0 0 3.45-2L10.36 4h2.56l.38 1.14a3 3 0 0 0 3.45 2l1.18-.24l1.28 2.22l-.8.9a3 3 0 0 0 0 3.98m-6.77-6a4 4 0 1 0 4 4a4 4 0 0 0-4-4m0 6a2 2 0 1 1 2-2a2 2 0 0 1-2 2" />
                                </svg>
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr class="*:p-5 **:whitespace-nowrap">
                    <td colspan="7" class="text-xl font-semibold text-zinc-400 text-center">Belum terdapat data guru!</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<div class="pagination flex gap-5 py-4 justify-center px-5 bg-white rounded-md shadow-md">
    <ul class="flex justify-center gap-1 text-gray-900">
        <li>
            <a href="#" class="grid size-8 place-content-center rounded border border-gray-200 transition-colors hover:bg-gray-50 rtl:rotate-180" aria-label="Previous page">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                </svg>
            </a>
        </li>

        <li>
            <a href="#" class="block size-8 rounded border border-gray-200 text-center text-sm/8 font-medium transition-colors hover:bg-gray-50">
                1
            </a>
        </li>

        <li class="block size-8 rounded border border-blue-600 bg-blue-600 text-center text-sm/8 font-medium text-white">
            2
        </li>

        <li>
            <a href="#" class="block size-8 rounded border border-gray-200 text-center text-sm/8 font-medium transition-colors hover:bg-gray-50">
                3
            </a>
        </li>

        <li>
            <a href="#" class="block size-8 rounded border border-gray-200 text-center text-sm/8 font-medium transition-colors hover:bg-gray-50">
                4
            </a>
        </li>

        <li>
            <a href="#" class="grid size-8 place-content-center rounded border border-gray-200 transition-colors hover:bg-gray-50 rtl:rotate-180" aria-label="Next page">
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