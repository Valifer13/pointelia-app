<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/output.css">
</head>

<body class="font-main bg-zinc-50 grid grid-cols-1 xl:grid-cols-[16rem_2.5rem_minmax(0,1fr)]">
    <header class="sticky top-0 left-0 flex flex-col justify-between px-5 py-2 w-full h-screen">
        <div class="flex flex-col gap-5 items-start">
            <div class="flex w-full justify-between items-center">
                <a href="<?= BASE_URL ?>" class="flex gap-2 items-center font-bold text-2xl">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 512 512">
                        <path fill="currentColor" d="M255.9 19.77C241.5 109.6 229.4 163 196.2 196.2s-86.6 45.3-176.43 59.7C109.6 270.3 163 282.4 196.2 315.7c33.2 33.2 45.3 86.6 59.7 176.5c14.4-89.9 26.5-143.3 59.7-176.6c33.3-33.2 86.7-45.3 176.6-59.7c-89.9-14.4-143.3-26.5-176.5-59.7c-33.3-33.2-45.4-86.6-59.8-176.43M423 89c-45.8 33.1-81 56.9-112.4 70.2c5.1 9.4 11 17.4 17.8 24.2s14.8 12.7 24.3 17.9c13.4-31.4 37.2-66.6 70.3-112.3m-333.94.06C122.2 134.8 145.9 169.9 159.2 201.2c9.4-5.1 17.4-11 24.2-17.8s12.7-14.8 17.8-24.2c-31.3-13.3-66.4-37-112.14-70.14M352.7 310.5c-9.5 5.2-17.5 11.1-24.3 17.9s-12.7 14.8-17.9 24.3C342 366 377.2 389.8 423 423c-33.2-45.8-57-81-70.3-112.5m-193.5.1C145.9 342 122.1 377.2 89 423c45.7-33.1 80.9-56.9 112.3-70.3c-5.2-9.5-11.1-17.5-17.9-24.3s-14.8-12.7-24.2-17.8" />
                    </svg>
                    LOGO
                </a>
                <button class="text-zinc-500 cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                        <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5">
                            <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2" />
                            <path d="M7.25 10L5.5 12l1.75 2m2.25 7V3" />
                        </g>
                    </svg>
                </button>
            </div>
            <nav class="flex flex-col gap-4 w-full">
                <div class="flex flex-col gap-2">
                    <div class="flex gap-1 items-center">
                        <span class="text-sm text-zinc-400">Main</span>
                        <div class="w-full h-px bg-zinc-400"></div>
                    </div>
                    <a href="#" class="">Dashboard</a>
                    <a href="#" class="">Pelanggaran</a>
                    <a href="#" class="">Surat</a>
                </div>

                <div class="flex flex-col gap-2">
                    <div class="flex gap-1 items-center">
                        <span class="text-sm text-zinc-400">Management</span>
                        <div class="w-full h-px bg-zinc-400"></div>
                    </div>
                    <a href="#" class="">Siswa</a>
                    <a href="#" class="">Guru</a>
                    <a href="#" class="">Kepala Sekolah</a>
                </div>

                <div class="flex flex-col gap-2">
                    <div class="flex gap-1 items-center">
                        <span class="text-sm text-zinc-400">Lainnya</span>
                        <div class="w-full h-px bg-zinc-400"></div>
                    </div>
                    <a href="#" class="">Notifikasi</a>
                    <a href="#" class="">Aktivitas</a>
                </div>
            </nav>
        </div>
        <div class="flex flex-col gap-2 *:text-left">
            <button>Help</button>
            <button>Setting</button>
            <button>Sign Out</button>
        </div>
    </header>

    <div></div>

    <main class="w-full mt-6 mb-20 pe-10">
        <?php require_once "../app/views/" . $viewPath . ".php"; ?>
    </main>

    <script src="<?= BASE_URL ?>/js/script.js" defer></script>
</body>

</html>