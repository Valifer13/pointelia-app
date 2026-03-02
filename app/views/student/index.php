<div>
    <div class="flex flex-col md:flex-row justify-between gap-4 items-start lg:items-center mb-6">
        <div class="flex flex-col gap-1">
            <h1 class="text-2xl font-semibold tracking-wide">List Siswa</h1>
            <?php get_breadcrumb() ?>
        </div>
        <div class="flex gap-4">
            <button class="flex gap-2 items-center px-3 py-2 bg-concerto hover:bg-glacial-salt border border-deep-blue text-deep-blue hover:text-deep-blue rounded-md cursor-pointer transition-colors duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M8.71 7.71L11 5.41V15a1 1 0 0 0 2 0V5.41l2.29 2.3a1 1 0 0 0 1.42 0a1 1 0 0 0 0-1.42l-4-4a1 1 0 0 0-.33-.21a1 1 0 0 0-.76 0a1 1 0 0 0-.33.21l-4 4a1 1 0 1 0 1.42 1.42M21 14a1 1 0 0 0-1 1v4a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-4a1 1 0 0 0-2 0v4a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3v-4a1 1 0 0 0-1-1" />
                </svg>
                Export
            </button>
            <a href="<?= BASE_URL ?>/students/add" class="flex gap-2 items-center px-3 py-2 bg-deep-blue hover:bg-ocean-city transition-colors duration-300 cursor-pointer text-white rounded-md">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M11 13H6q-.425 0-.712-.288T5 12t.288-.712T6 11h5V6q0-.425.288-.712T12 5t.713.288T13 6v5h5q.425 0 .713.288T19 12t-.288.713T18 13h-5v5q0 .425-.288.713T12 19t-.712-.288T11 18z" />
                </svg>
                Tambah Siswa
            </a>
        </div>
    </div>
    <div class="bg-white rounded-lg w-full h-fit shadow-md">
        <div class="bg-white rounded-lg w-full h-fit shadow-md p-1 overflow-x-auto">
            <table class="w-full">
                <thead class="**:text-left **:py-2 **:px-5 *:whitespace-nowrap   *:font-bold bg-violet-100 text-violet-900">
                    <th class="rounded-l-md">No.</th>
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Kelas</th>
                    <td>Nomor HP</td>
                    <th>Skor</th>
                    <th class="rounded-r-md">Option</th>
                </thead>

                <tbody class="*:border-b *:border-b-zinc-300 text-zinc-500">
                    <?php
                    $count = 1;
                    foreach ($data["students"] as $student): ?>
                        <tr class="*:py-2 *:px-5 **:whitespace-nowrap">
                            <td><?= $count++ ?></td>
                            <td><?= str_pad($student["nis"], 4, '0', STR_PAD_LEFT) ?></td>
                            <td class="text-zinc-800"><?= $student["name"] ?></td>
                            <td><?= $student["gender"] == "M" ? "Laki-Laki" : "Perempuan" ?></td>
                            <td><?= $classes[$count - 2] ?? "-" ?></td>
                            <td><?= $student["phone_number"] ?></td>
                            <td>0</td>
                            <td class="text-zinc-500">
                                <button class="data-option-btn p-2 border border-zinc-400 w-fit rounded-md inset-shadow-zinc-400 transition-all duration-500" data-nis="<?= $student['nis'] ?>" data-name="<?= $student['name'] ?>">
                                    <svg class="group-hover:text-zinc-800 transition-all duration-500" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                        <path fill="currentColor" d="M19.9 12.66a1 1 0 0 1 0-1.32l1.28-1.44a1 1 0 0 0 .12-1.17l-2-3.46a1 1 0 0 0-1.07-.48l-1.88.38a1 1 0 0 1-1.15-.66l-.61-1.83a1 1 0 0 0-.95-.68h-4a1 1 0 0 0-1 .68l-.56 1.83a1 1 0 0 1-1.15.66L5 4.79a1 1 0 0 0-1 .48L2 8.73a1 1 0 0 0 .1 1.17l1.27 1.44a1 1 0 0 1 0 1.32L2.1 14.1a1 1 0 0 0-.1 1.17l2 3.46a1 1 0 0 0 1.07.48l1.88-.38a1 1 0 0 1 1.15.66l.61 1.83a1 1 0 0 0 1 .68h4a1 1 0 0 0 .95-.68l.61-1.83a1 1 0 0 1 1.15-.66l1.88.38a1 1 0 0 0 1.07-.48l2-3.46a1 1 0 0 0-.12-1.17ZM18.41 14l.8.9l-1.28 2.22l-1.18-.24a3 3 0 0 0-3.45 2L12.92 20h-2.56L10 18.86a3 3 0 0 0-3.45-2l-1.18.24l-1.3-2.21l.8-.9a3 3 0 0 0 0-4l-.8-.9l1.28-2.2l1.18.24a3 3 0 0 0 3.45-2L10.36 4h2.56l.38 1.14a3 3 0 0 0 3.45 2l1.18-.24l1.28 2.22l-.8.9a3 3 0 0 0 0 3.98m-6.77-6a4 4 0 1 0 4 4a4 4 0 0 0-4-4m0 6a2 2 0 1 1 2-2a2 2 0 0 1-2 2" />
                                    </svg>
                                </button>
                            </td>
                        </tr>
                    <?php endforeach;
                    ?>
                </tbody>
            </table>
        </div>
        <div class="pagination flex justify-between py-4 px-5">
            <button class="prev flex gap-2 items-center cursor-pointer text-zinc-600 hover:text-zinc-900 transition-colors duration-300">
                <svg class="rotate-180" width="4" height="7" viewBox="0 0 4 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0.41 6.484C0.298 6.484 0.201667 6.44733 0.121 6.374C0.0403336 6.29933 0 6.20167 0 6.081V0.403999C0 0.282666 0.0413329 0.185 0.124 0.111C0.206666 0.0370001 0.302666 0 0.412 0C0.44 0 0.534667 0.0433325 0.696 0.129999L3.373 2.808C3.435 2.86933 3.48267 2.93567 3.516 3.007C3.54933 3.07833 3.566 3.15667 3.566 3.242C3.566 3.32733 3.54933 3.40567 3.516 3.477C3.48267 3.54833 3.435 3.615 3.373 3.677L0.696 6.354C0.659333 6.39067 0.616334 6.42167 0.567 6.447C0.518334 6.47167 0.466 6.484 0.41 6.484Z" fill="currentColor" />
                </svg>
                Previous
            </button>
            <button class="next flex gap-2 items-center cursor-pointer text-zinc-600 hover:text-zinc-900 transition-colors duration-300">
                Next
                <svg width="4" height="7" viewBox="0 0 4 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0.41 6.484C0.298 6.484 0.201667 6.44733 0.121 6.374C0.0403336 6.29933 0 6.20167 0 6.081V0.403999C0 0.282666 0.0413329 0.185 0.124 0.111C0.206666 0.0370001 0.302666 0 0.412 0C0.44 0 0.534667 0.0433325 0.696 0.129999L3.373 2.808C3.435 2.86933 3.48267 2.93567 3.516 3.007C3.54933 3.07833 3.566 3.15667 3.566 3.242C3.566 3.32733 3.54933 3.40567 3.516 3.477C3.48267 3.54833 3.435 3.615 3.373 3.677L0.696 6.354C0.659333 6.39067 0.616334 6.42167 0.567 6.447C0.518334 6.47167 0.466 6.484 0.41 6.484Z" fill="currentColor" />
                </svg>
            </button>
        </div>
    </div>
</div>

<div id="floating-menu"
    class="fixed bg-white border border-zinc-300 rounded-md p-1 shadow-lg invisible opacity-0 scale-95 transition-all duration-100 z-50">
    <a id="menu-detail" class="block px-3 py-2 hover:bg-blue-500 hover:text-white rounded">
        Detail
    </a>

    <a id="menu-edit" class="block px-3 py-2 hover:bg-yellow-400 hover:text-white rounded">
        Edit
    </a>

    <form id="menu-delete-form" method="post">
        <button id="menu-delete-btn"
            class="w-full text-left px-3 py-2 hover:bg-red-500 hover:text-white rounded">
            Delete
        </button>
    </form>
</div>

<?php Flasher::flash() ?>