<div>
    <div class="mb-6 flex flex-col gap-2">
        <h1 class="text-2xl font-semibold tracking-wide">List Siswa</h1>
        <?php get_breadcrumb() ?>
    </div>
    <div class="flex justify-between items-center mb-6">
        <div class="flex gap-1 items-center border border-zinc-300 p-1 rounded-md text-zinc-500 bg-zinc-100">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                <path fill="currentColor" d="M9.5 16q-2.725 0-4.612-1.888T3 9.5t1.888-4.612T9.5 3t4.613 1.888T16 9.5q0 1.1-.35 2.075T14.7 13.3l5.6 5.6q.275.275.275.7t-.275.7t-.7.275t-.7-.275l-5.6-5.6q-.75.6-1.725.95T9.5 16m0-2q1.875 0 3.188-1.312T14 9.5t-1.312-3.187T9.5 5T6.313 6.313T5 9.5t1.313 3.188T9.5 14" />
            </svg>
            <input id="searchInput" class="focus:outline-none text-zinc-800" type="text" placeholder="Cari...">
            <button id="clearBtn" class="hidden cursor-pointer hover:text-zinc-800">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                    <path fill="currentColor" d="m12 13.4l-4.9 4.9q-.275.275-.7.275t-.7-.275t-.275-.7t.275-.7l4.9-4.9l-4.9-4.9q-.275-.275-.275-.7t.275-.7t.7-.275t.7.275l4.9 4.9l4.9-4.9q.275-.275.7-.275t.7.275t.275.7t-.275.7L13.4 12l4.9 4.9q.275.275.275.7t-.275.7t-.7.275t-.7-.275z" />
                </svg>
            </button>
        </div>
        <div class="flex gap-4">
            <button class="flex gap-2 items-center px-3 py-2 bg-zinc-200 hover:bg-zinc-300 rounded-md cursor-pointer transition-colors duration-300 border border-zinc-300">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M8.71 7.71L11 5.41V15a1 1 0 0 0 2 0V5.41l2.29 2.3a1 1 0 0 0 1.42 0a1 1 0 0 0 0-1.42l-4-4a1 1 0 0 0-.33-.21a1 1 0 0 0-.76 0a1 1 0 0 0-.33.21l-4 4a1 1 0 1 0 1.42 1.42M21 14a1 1 0 0 0-1 1v4a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-4a1 1 0 0 0-2 0v4a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3v-4a1 1 0 0 0-1-1" />
                </svg>
                Export
            </button>
            <a href="<?= BASE_URL ?>/students/add" class="flex gap-2 items-center px-3 py-2 bg-zinc-900 hover:bg-zinc-700 transition-colors duration-300 cursor-pointer text-white rounded-md">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M11 13H6q-.425 0-.712-.288T5 12t.288-.712T6 11h5V6q0-.425.288-.712T12 5t.713.288T13 6v5h5q.425 0 .713.288T19 12t-.288.713T18 13h-5v5q0 .425-.288.713T12 19t-.712-.288T11 18z" />
                </svg>
                Tambah Siswa
            </a>
        </div>
    </div>
    <div class="bg-white rounded-lg w-full shadow-md p-1">
        <table class="w-full">
            <thead class="**:border-b **:text-left **:border-b-zinc-300 **:py-2 **:px-5 *:font-bold">
                <th>No.</th>
                <th>NIS</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>Kelas</th>
                <th>Option</th>
            </thead>

            <tbody class="*:border-b *:border-b-zinc-300 text-zinc-500">
                <?php
                $count = 1;
                foreach ($data["students"] as $student): ?>
                    <tr class="*:py-2 *:px-5">
                        <td><?= $count++ ?></td>
                        <td><?= str_pad($student["nis"], 4, '0', STR_PAD_LEFT) ?></td>
                        <td class="text-zinc-800"><?= $student["name"] ?></td>
                        <td><?= $student["gender"] == "M" ? "Laki-Laki" : "Perempuan" ?></td>
                        <td><?= $student["address"] ?></td>
                        <td><?= $student["class"] ?? "-" ?></td>
                        <td class="text-zinc-500">
                            <div class="relative p-2 border border-zinc-400 w-fit rounded-md inset-shadow-zinc-400 inset-shadow-xs group hover:inset-shadow-sm transition-all duration-500">
                                <svg class="group-hover:text-zinc-800 transition-all duration-500" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M19.9 12.66a1 1 0 0 1 0-1.32l1.28-1.44a1 1 0 0 0 .12-1.17l-2-3.46a1 1 0 0 0-1.07-.48l-1.88.38a1 1 0 0 1-1.15-.66l-.61-1.83a1 1 0 0 0-.95-.68h-4a1 1 0 0 0-1 .68l-.56 1.83a1 1 0 0 1-1.15.66L5 4.79a1 1 0 0 0-1 .48L2 8.73a1 1 0 0 0 .1 1.17l1.27 1.44a1 1 0 0 1 0 1.32L2.1 14.1a1 1 0 0 0-.1 1.17l2 3.46a1 1 0 0 0 1.07.48l1.88-.38a1 1 0 0 1 1.15.66l.61 1.83a1 1 0 0 0 1 .68h4a1 1 0 0 0 .95-.68l.61-1.83a1 1 0 0 1 1.15-.66l1.88.38a1 1 0 0 0 1.07-.48l2-3.46a1 1 0 0 0-.12-1.17ZM18.41 14l.8.9l-1.28 2.22l-1.18-.24a3 3 0 0 0-3.45 2L12.92 20h-2.56L10 18.86a3 3 0 0 0-3.45-2l-1.18.24l-1.3-2.21l.8-.9a3 3 0 0 0 0-4l-.8-.9l1.28-2.2l1.18.24a3 3 0 0 0 3.45-2L10.36 4h2.56l.38 1.14a3 3 0 0 0 3.45 2l1.18-.24l1.28 2.22l-.8.9a3 3 0 0 0 0 3.98m-6.77-6a4 4 0 1 0 4 4a4 4 0 0 0-4-4m0 6a2 2 0 1 1 2-2a2 2 0 0 1-2 2" />
                                </svg>

                                <div class="flex flex-col gap-1 absolute top-10 left-0 bg-white border border-zinc-300 z-10 p-1 rounded-md opacity-0 scale-95 invisible group-hover:opacity-100 group-hover:scale-100 group-hover:visible transition-all duration-100 ease-out">
                                    <a class="text-blue-500 hover:text-white hover:bg-blue-500 py-2 px-3 rounded-sm transition-colors duration-300 flex gap-2 items-center" href="<?= BASE_URL ?>/students/detail/<?= $student['nis'] ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                            <path fill="currentColor" d="M12 9a3 3 0 0 0-3 3a3 3 0 0 0 3 3a3 3 0 0 0 3-3a3 3 0 0 0-3-3m0 8a5 5 0 0 1-5-5a5 5 0 0 1 5-5a5 5 0 0 1 5 5a5 5 0 0 1-5 5m0-12.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5" />
                                        </svg>
                                        Detail
                                    </a>
                                    <a class="text-yellow-400 hover:text-white hover:bg-yellow-400 py-2 px-3 rounded-sm transition-colors duration-300 flex gap-2 items-center" href="<?= BASE_URL ?>/students/<?= $student['nis'] ?>/edit">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                            <path fill="currentColor" d="M4 21q-.425 0-.712-.288T3 20v-2.425q0-.4.15-.763t.425-.637L16.2 3.575q.3-.275.663-.425t.762-.15t.775.15t.65.45L20.425 5q.3.275.437.65T21 6.4q0 .4-.138.763t-.437.662l-12.6 12.6q-.275.275-.638.425t-.762.15zM17.6 7.8L19 6.4L17.6 5l-1.4 1.4z" />
                                        </svg>
                                        Edit
                                    </a>
                                    <form action="<?= BASE_URL ?>/students/delete/<?= $student['nis'] ?>" method="post">
                                        <button type="submit" class="text-red-500 hover:text-white hover:bg-red-500 py-2 px-3 rounded-sm transition-colors duration-300 flex gap-2 items-center cursor-pointer">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 512 512">
                                                <path fill="none" d="M296 64h-80a7.91 7.91 0 0 0-8 8v24h96V72a7.91 7.91 0 0 0-8-8" />
                                                <path fill="currentColor" d="M432 96h-96V72a40 40 0 0 0-40-40h-80a40 40 0 0 0-40 40v24H80a16 16 0 0 0 0 32h17l19 304.92c1.42 26.85 22 47.08 48 47.08h184c26.13 0 46.3-19.78 48-47l19-305h17a16 16 0 0 0 0-32M192.57 416H192a16 16 0 0 1-16-15.43l-8-224a16 16 0 1 1 32-1.14l8 224A16 16 0 0 1 192.57 416M272 400a16 16 0 0 1-32 0V176a16 16 0 0 1 32 0Zm32-304h-96V72a7.91 7.91 0 0 1 8-8h80a7.91 7.91 0 0 1 8 8Zm32 304.57A16 16 0 0 1 320 416h-.58A16 16 0 0 1 304 399.43l8-224a16 16 0 1 1 32 1.14Z" />
                                            </svg>
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php endforeach;
                ?>
            </tbody>
        </table>
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