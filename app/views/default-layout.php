<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/output.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.15.8/dist/cdn.min.js"></script>

    <style>
        /* * { outline: 1px red solid; } */
    </style>
</head>

<body id="body" class="font-main bg-zinc-100 h-screen overflow-hidden antialiased">
    <header id="header" class="sticky top-0 z-50 h-[72px] lg:h-[65px] w-full flex lg:justify-between bg-white border-b border-zinc-300">
        <div id="logo-container" class="relative w-full lg:w-fit justify-between lg:justify-normal flex gap-4 items-center p-4">
            <a href="<?= BASE_URL ?>" class="logo flex gap-2 items-center font-bold text-2xl px-3">
                <svg width="20" height="24" viewBox="0 0 20 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_356_42)">
                        <path d="M0.999523 10.1961C0.447237 10.1961 -0.00565863 10.6537 0.0494773 11.214C0.213727 12.8832 0.780063 14.4908 1.70475 15.891C2.81624 17.574 4.39495 18.8806 6.23887 19.6437C8.08277 20.4067 10.1081 20.5915 12.0556 20.1743C14.003 19.7571 15.7842 18.757 17.171 17.3019C18.5579 15.8468 19.4874 14.0029 19.8407 12.0061C20.194 10.0093 19.9549 7.95044 19.1541 6.09297C18.3533 4.2355 17.0271 2.66387 15.3453 1.5792C13.9462 0.676826 12.3539 0.145614 10.7128 0.0259641C10.1619 -0.0142003 9.72622 0.460481 9.74202 1.02337L9.85182 4.93348C9.86762 5.49635 10.3339 5.92734 10.8739 6.04556C11.3508 6.15002 11.8086 6.33972 12.2253 6.60844C12.9255 7.06002 13.4776 7.7144 13.811 8.48773C14.1445 9.2611 14.244 10.1183 14.0969 10.9497C13.9498 11.7811 13.5628 12.5488 12.9854 13.1546C12.408 13.7604 11.6664 14.1768 10.8556 14.3505C10.0447 14.5242 9.20147 14.4473 8.43377 14.1296C7.66607 13.8119 7.00877 13.2679 6.54597 12.5672C6.27062 12.1502 6.07157 11.689 5.95552 11.2059C5.82412 10.659 5.38827 10.1961 4.83601 10.1961H0.999523Z" fill="black" />
                        <path d="M5 10.1961H1C0.447715 10.1961 0 10.6526 0 11.2157V24.9804C0 25.5435 0.447715 26 1 26H5C5.55228 26 6 25.5435 6 24.9804V11.2157C6 10.6526 5.55228 10.1961 5 10.1961Z" fill="black" />
                        <path d="M6 3.05882C6 1.36948 4.65685 0 3 0C1.34315 0 0 1.36948 0 3.05882C0 4.74816 1.34315 6.11765 3 6.11765C4.65685 6.11765 6 4.74816 6 3.05882Z" fill="black" />
                    </g>
                    <defs>
                        <clipPath id="clip0_356_42">
                            <rect width="20" height="26" fill="white" />
                        </clipPath>
                    </defs>
                </svg>
                <span>Pointer</span>
            </a>
            <button id="sidebar-collapse-btn" class="hidden lg:block text-zinc-500 cursor-pointer">
                <svg id="sidebar-collapse-icon" class="bg-white" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                    <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5">
                        <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2" />
                        <path d="M7.25 10L5.5 12l1.75 2m2.25 7V3" />
                    </g>
                </svg>
                <svg id="sidebar-collapse-arrow-icon" class="hidden bg-white" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                    <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m13 16l4-4l-4-4m-6 8l4-4l-4-4" />
                </svg>
            </button>
            <button id="mobile-sidebar-btn" class="block lg:hidden text-zinc-500 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path fill="currentColor" d="M4 18q-.425 0-.712-.288T3 17t.288-.712T4 16h16q.425 0 .713.288T21 17t-.288.713T20 18zm0-5q-.425 0-.712-.288T3 12t.288-.712T4 11h16q.425 0 .713.288T21 12t-.288.713T20 13zm0-5q-.425 0-.712-.288T3 7t.288-.712T4 6h16q.425 0 .713.288T21 7t-.288.713T20 8z" />
                </svg>
            </button>
        </div>
        <div class="w-full justify-between items-center p-4 hidden lg:flex">
            <div class="flex gap-1 items-center border border-zinc-300 p-1 rounded-md text-zinc-500 bg-zinc-50">
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
            <div class="flex gap-4 items-center">
                <div class="flex flex-col justify-between items-end">
                    <p class="font-medium"><?= $_SESSION['user']['fullname'] ?></p>
                    <span class="text-xs text-zinc-400"><?= $_SESSION['user']['role'] ?></span>
                </div>
                <div class="size-10 overflow-hidden rounded-full">
                    <img src="https://placehold.co/400" alt="student profile">
                </div>
            </div>
        </div>
    </header>

    <main id="main" class="grid grid-cols-1 lg:grid-cols-[16rem_1fr] h-[calc(100vh-65px)] overflow-hidden transition-all duration-300">
        <aside id="aside" class="h-0 lg:h-full bg-white overflow-hidden">
            <nav id="navbar" class="expand fixed inset-y-0 left-0 top-[72px] w-64 bg-white p-4 z-50 overflow-y-auto overflow-x-hidden transform -translate-x-full transition-transform duration-300 lg:sticky lg:top-0 lg:inset-auto lg:w-full lg:translate-x-0 lg:h-full lg:z-0 border-r border-zinc-300">
                <div class="flex flex-col gap-1">
                    <span class="nav-divider-title text-xs text-zinc-400">Main</span>
                    <a title="Dashboard" href="<?= BASE_URL ?>/dashboard" class="nav-item relative flex gap-2 items-center px-3 py-2 rounded-xl border-2 overflow-hidden transition-all duration-300 bg-transparent border-transparent group hover:bg-zinc-50 hover:border-zinc-200">
                        <div class="w-2 h-6 rounded-md absolute -left-1 transition-all duration-300 bg-transparent group-hover:bg-zinc-200"></div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M14 9q-.425 0-.712-.288T13 8V4q0-.425.288-.712T14 3h6q.425 0 .713.288T21 4v4q0 .425-.288.713T20 9zM4 13q-.425 0-.712-.288T3 12V4q0-.425.288-.712T4 3h6q.425 0 .713.288T11 4v8q0 .425-.288.713T10 13zm10 8q-.425 0-.712-.288T13 20v-8q0-.425.288-.712T14 11h6q.425 0 .713.288T21 12v8q0 .425-.288.713T20 21zM4 21q-.425 0-.712-.288T3 20v-4q0-.425.288-.712T4 15h6q.425 0 .713.288T11 16v4q0 .425-.288.713T10 21z" />
                        </svg>
                        <span>
                            Dashboard
                        </span>
                    </a>
                    <a title="Pelanggaran" href="<?= BASE_URL ?>/violations" class="nav-item relative flex gap-2 items-center px-3 py-2 rounded-xl border-2 overflow-hidden transition-all duration-300 bg-transparent border-transparent group hover:bg-zinc-50 hover:border-zinc-200">
                        <div class="w-2 h-6 rounded-md absolute -left-1 transition-all duration-300 bg-transparent group-hover:bg-zinc-200"></div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="currentColor" fill-rule="evenodd" d="M7.843 3.802C9.872 2.601 10.886 2 12 2s2.128.6 4.157 1.802l.686.406c2.029 1.202 3.043 1.803 3.6 2.792c.557.99.557 2.19.557 4.594v.812c0 2.403 0 3.605-.557 4.594s-1.571 1.59-3.6 2.791l-.686.407C14.128 21.399 13.114 22 12 22s-2.128-.6-4.157-1.802l-.686-.407c-2.029-1.2-3.043-1.802-3.6-2.791C3 16.01 3 14.81 3 12.406v-.812C3 9.19 3 7.989 3.557 7s1.571-1.59 3.6-2.792zM13 16a1 1 0 1 1-2 0a1 1 0 0 1 2 0m-1-9.75a.75.75 0 0 1 .75.75v6a.75.75 0 0 1-1.5 0V7a.75.75 0 0 1 .75-.75" clip-rule="evenodd" />
                        </svg>
                        <span>
                            Pelanggaran
                        </span>
                    </a>
                    <a title="Surat" href="<?= BASE_URL ?>/letters" class="nav-item relative flex gap-2 items-center px-3 py-2 rounded-xl border-2 overflow-hidden transition-all duration-300 bg-transparent border-transparent group hover:bg-zinc-50 hover:border-zinc-200">
                        <div class="w-2 h-6 rounded-md absolute -left-1 transition-all duration-300 bg-transparent group-hover:bg-zinc-200"></div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M4 20q-.825 0-1.412-.587T2 18V6q0-.825.588-1.412T4 4h16q.825 0 1.413.588T22 6v12q0 .825-.587 1.413T20 20zm8.263-7.212q.137-.038.262-.113L19.6 8.25q.2-.125.3-.312t.1-.413q0-.5-.425-.75T18.7 6.8L12 11L5.3 6.8q-.45-.275-.875-.012T4 7.525q0 .25.1.438t.3.287l7.075 4.425q.125.075.263.113t.262.037t.263-.037" />
                        </svg>
                        <span>
                            Surat
                        </span>
                    </a>
                </div>

                <div class="flex flex-col gap-1">
                    <div class="nav-divider hidden w-full h-px bg-zinc-300"></div>
                    <span class="nav-divider-title text-xs text-zinc-400">Data</span>
                    <a title="Orang Tua" href="<?= BASE_URL ?>/guardians" class="nav-item relative flex gap-2 items-center px-3 py-2 rounded-xl border-2 overflow-hidden transition-all duration-300 bg-transparent border-transparent group hover:bg-zinc-50 hover:border-zinc-200">
                        <div class="w-2 h-6 rounded-md absolute -left-1 transition-all duration-300 bg-transparent group-hover:bg-zinc-200"></div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M7 11a4.5 4.5 0 1 1 0-9a4.5 4.5 0 0 1 0 9m10.5 4a4 4 0 1 1 0-8a4 4 0 0 1 0 8m0 1a4.5 4.5 0 0 1 4.5 4.5v.5h-9v-.5a4.5 4.5 0 0 1 4.5-4.5M7 12a5 5 0 0 1 5 5v4H2v-4a5 5 0 0 1 5-5" />
                        </svg>
                        <span>
                            Orang Tua
                        </span>
                    </a>
                    <a title="Siswa" href="<?= BASE_URL ?>/students" class="nav-item relative flex gap-2 items-center px-3 py-2 rounded-xl border-2 overflow-hidden transition-all duration-300 bg-transparent border-transparent group hover:bg-zinc-50 hover:border-zinc-200">
                        <div class="w-2 h-6 rounded-md absolute -left-1 transition-all duration-300 bg-transparent group-hover:bg-zinc-200"></div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M16 8c0 2.21-1.79 4-4 4s-4-1.79-4-4l.11-.94L5 5.5L12 2l7 3.5v5h-1V6l-2.11 1.06zm-4 6c4.42 0 8 1.79 8 4v2H4v-2c0-2.21 3.58-4 8-4" />
                        </svg>
                        <span>
                            Siswa
                        </span>
                    </a>
                    <a title="Guru" href="<?= BASE_URL ?>/teachers" class="nav-item relative flex gap-2 items-center px-3 py-2 rounded-xl border-2 overflow-hidden transition-all duration-300 bg-transparent border-transparent group hover:bg-zinc-50 hover:border-zinc-200">
                        <div class="w-2 h-6 rounded-md absolute -left-1 transition-all duration-300 bg-transparent group-hover:bg-zinc-200"></div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M12 4a4 4 0 0 1 4 4a4 4 0 0 1-4 4a4 4 0 0 1-4-4a4 4 0 0 1 4-4m0 10c4.42 0 8 1.79 8 4v2H4v-2c0-2.21 3.58-4 8-4" />
                        </svg>
                        <span>
                            Guru
                        </span>
                    </a>
                    <a title="Kelas" href="<?= BASE_URL ?>/classes" class="nav-item relative flex gap-2 items-center px-3 py-2 rounded-xl border-2 overflow-hidden transition-all duration-300 bg-transparent border-transparent group hover:bg-zinc-50 hover:border-zinc-200">
                        <div class="w-2 h-6 rounded-md absolute -left-1 transition-all duration-300 bg-transparent group-hover:bg-zinc-200"></div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M23 2H1a1 1 0 0 0-1 1v18a1 1 0 0 0 1 1h22a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1m-1 18h-2v-1h-5v1H2V4h20zM10.29 9.71A1.71 1.71 0 0 1 12 8c.95 0 1.71.77 1.71 1.71c0 .95-.76 1.72-1.71 1.72s-1.71-.77-1.71-1.72m-4.58 1.58c0-.71.58-1.29 1.29-1.29a1.29 1.29 0 0 1 1.29 1.29c0 .71-.58 1.28-1.29 1.28S5.71 12 5.71 11.29m10 0A1.29 1.29 0 0 1 17 10a1.29 1.29 0 0 1 1.29 1.29c0 .71-.58 1.28-1.29 1.28s-1.29-.57-1.29-1.28M20 15.14V16H4v-.86c0-.94 1.55-1.71 3-1.71c.55 0 1.11.11 1.6.3c.75-.69 2.1-1.16 3.4-1.16s2.65.47 3.4 1.16c.49-.19 1.05-.3 1.6-.3c1.45 0 3 .77 3 1.71" />
                        </svg>
                        <span>
                            Kelas
                        </span>
                    </a>
                </div>

                <div class="flex flex-col gap-1">
                    <div class="nav-divider hidden w-full h-px bg-zinc-300"></div>
                    <span class="nav-divider-title text-xs text-zinc-400">Lainnya</span>
                    <a title="Notifikasi" href="<?= BASE_URL ?>/notifications" class="nav-item relative flex gap-2 items-center px-3 py-2 rounded-xl border-2 overflow-hidden transition-all duration-300 bg-transparent border-transparent group hover:bg-zinc-50 hover:border-zinc-200">
                        <div class="w-2 h-6 rounded-md absolute -left-1 transition-all duration-300 bg-transparent group-hover:bg-zinc-200"></div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <g fill="none">
                                <path d="m12.594 23.258l-.012.002l-.071.035l-.02.004l-.014-.004l-.071-.036q-.016-.004-.024.006l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.016-.018m.264-.113l-.014.002l-.184.093l-.01.01l-.003.011l.018.43l.005.012l.008.008l.201.092q.019.005.029-.008l.004-.014l-.034-.614q-.005-.019-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.003-.011l.018-.43l-.003-.012l-.01-.01z" />
                                <path fill="currentColor" d="M12 2a7 7 0 0 0-7 7v3.528a1 1 0 0 1-.105.447l-1.717 3.433A1.1 1.1 0 0 0 4.162 18h15.676a1.1 1.1 0 0 0 .984-1.592l-1.716-3.433a1 1 0 0 1-.106-.447V9a7 7 0 0 0-7-7m0 19a3 3 0 0 1-2.83-2h5.66A3 3 0 0 1 12 21" />
                            </g>
                        </svg>
                        <span>
                            Notifikasi
                        </span>
                    </a>
                    <a title="Aktivitas" href="<?= BASE_URL ?>/activities" class="nav-item relative flex gap-2 items-center px-3 py-2 rounded-xl border-2 overflow-hidden transition-all duration-300 bg-transparent border-transparent group hover:bg-zinc-50 hover:border-zinc-200">
                        <div class="w-2 h-6 rounded-md absolute -left-1 transition-all duration-300 bg-transparent group-hover:bg-zinc-200"></div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M6.962 2.421c1.276-.171 2.908-.171 4.981-.171h.114c2.073 0 3.705 0 4.98.171c1.31.176 2.354.545 3.175 1.367c.822.821 1.19 1.866 1.367 3.174c.171 1.276.171 2.908.171 4.981v.114c0 2.073 0 3.705-.171 4.98c-.176 1.31-.545 2.354-1.367 3.175c-.821.822-1.866 1.19-3.174 1.367c-1.276.171-2.908.171-4.981.171h-.114c-2.073 0-3.705 0-4.98-.171c-1.31-.176-2.354-.545-3.175-1.367c-.822-.821-1.19-1.866-1.367-3.174c-.171-1.276-.171-2.908-.171-4.981v-.114c0-2.073 0-3.705.171-4.98c.176-1.31.545-2.354 1.367-3.175c.821-.822 1.866-1.19 3.174-1.367m4.773 4.432a.75.75 0 0 0-1.431-.132L8.492 11.25H7a.75.75 0 0 0 0 1.5h2a.75.75 0 0 0 .696-.472l1.063-2.657l1.506 7.526a.75.75 0 0 0 1.431.132l1.812-4.529H17a.75.75 0 0 0 0-1.5h-2a.75.75 0 0 0-.696.471L13.24 14.38z" />
                        </svg>
                        <span>
                            Aktivitas
                        </span>
                    </a>
                    <form action="<?= BASE_URL ?>/logout" method="post">
                        <button type="submit" title="Logout" class="relative flex gap-2 items-center px-3 py-2 rounded-xl border-2 overflow-hidden transition-all duration-300 bg-transparent border-transparent group hover:bg-red-50 hover:border-red-200 w-full text-red-500 cursor-pointer">
                            <div class="w-2 h-6 rounded-md absolute -left-1 transition-all duration-300 bg-transparent group-hover:bg-red-200"></div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M5 21q-.825 0-1.412-.587T3 19V5q0-.825.588-1.412T5 3h6q.425 0 .713.288T12 4t-.288.713T11 5H5v14h6q.425 0 .713.288T12 20t-.288.713T11 21zm12.175-8H10q-.425 0-.712-.288T9 12t.288-.712T10 11h7.175L15.3 9.125q-.275-.275-.275-.675t.275-.7t.7-.313t.725.288L20.3 11.3q.3.3.3.7t-.3.7l-3.575 3.575q-.3.3-.712.288t-.713-.313q-.275-.3-.262-.712t.287-.688z" />
                            </svg>
                            <span>
                                Logout
                            </span>
                        </button>
                    </form>
                </div>
            </nav>
        </aside>

        <section class="relative w-full h-full min-h-screen overflow-y-auto overflow-x-hidden max-w-[1440px] px-4 md:px-8 lg:px-10 pt-6 pb-32 mx-auto">
            <?php require_once "../app/views/" . $viewPath . ".php"; ?>
        </section>

        <?php Flasher::flash() ?>
    </main>

    <script src="<?= BASE_URL ?>/js/script.js" defer></script>
</body>

</html>