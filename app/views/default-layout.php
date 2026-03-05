<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/output.css">

    <style>
        /* * { outline: 1px red solid; } */
    </style>
</head>

<body id="body" class="font-main bg-zinc-50 h-screen overflow-hidden">
    <header id="header" class="sticky top-0 z-50 h-[72px] lg:h-[65px] w-full flex lg:justify-between bg-white border-b border-zinc-300">
        <div id="logo-container" class="relative w-full lg:w-fit justify-between lg:justify-normal flex gap-4 items-center p-4">
            <a href="<?= BASE_URL ?>" class="logo flex gap-1 items-center font-bold text-2xl px-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
                    <g fill="none">
                        <path fill="#00a6ed" d="M8 26h19V4a2 2 0 0 0-2-2H8z" />
                        <path fill="#d3d3d3" d="M6 27h21v2H6z" />
                        <path fill="#0074ba" d="M6.5 2A1.5 1.5 0 0 0 5 3.5V28h1a1 1 0 0 1 1-1h1V2z" />
                        <path fill="#0074ba" d="M6.5 26A1.5 1.5 0 0 0 5 27.5v1A1.5 1.5 0 0 0 6.5 30h19a1.5 1.5 0 0 0 1.415-1H7a1 1 0 1 1 0-2h20v-1z" />
                    </g>
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
                <div class="size-10 overflow-hidden rounded-full">
                    <img src="https://placehold.co/400" alt="student profile">
                </div>
                <div class="flex flex-col justify-between">
                    <p class="font-medium">Admin</p>
                    <span class="text-xs text-zinc-400">Guru</span>
                </div>
            </div>
        </div>
    </header>

    <main id="main" class="grid grid-cols-1 lg:grid-cols-[16rem_1fr] h-[calc(100vh-65px)] overflow-hidden transition-all duration-300">
        <aside id="aside" class="h-0 lg:h-full bg-whiteoverflow-hidden">
            <nav id="navbar" class="expand fixed inset-y-0 left-0 top-[72px] w-64 bg-white p-4 z-50 overflow-y-auto overflow-x-hidden transform -translate-x-full transition-transform duration-300 lg:sticky lg:top-0 lg:inset-auto lg:w-full lg:translate-x-0 lg:h-full lg:z-0 border-r border-zinc-300 ">
                <div class="flex flex-col gap-1">
                    <span class="nav-divider-title text-xs text-zinc-400">Main</span>
                    <a href="<?= BASE_URL ?>/dashboard" class="nav-item relative flex gap-2 items-center px-3 py-2 rounded-xl border-2 overflow-hidden transition-all duration-300 bg-transparent border-transparent group hover:bg-zinc-50 hover:border-zinc-200">
                        <div class="w-2 h-6 rounded-md absolute -left-1 transition-all duration-300 bg-transparent group-hover:bg-zinc-200"></div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M14 9q-.425 0-.712-.288T13 8V4q0-.425.288-.712T14 3h6q.425 0 .713.288T21 4v4q0 .425-.288.713T20 9zM4 13q-.425 0-.712-.288T3 12V4q0-.425.288-.712T4 3h6q.425 0 .713.288T11 4v8q0 .425-.288.713T10 13zm10 8q-.425 0-.712-.288T13 20v-8q0-.425.288-.712T14 11h6q.425 0 .713.288T21 12v8q0 .425-.288.713T20 21zM4 21q-.425 0-.712-.288T3 20v-4q0-.425.288-.712T4 15h6q.425 0 .713.288T11 16v4q0 .425-.288.713T10 21z" />
                        </svg>
                        <span>
                            Dashboard
                        </span>
                    </a>
                    <a href="<?= BASE_URL ?>/violations" class="nav-item relative flex gap-2 items-center px-3 py-2 rounded-xl border-2 overflow-hidden transition-all duration-300 bg-transparent border-transparent group hover:bg-zinc-50 hover:border-zinc-200">
                        <div class="w-2 h-6 rounded-md absolute -left-1 transition-all duration-300 bg-transparent group-hover:bg-zinc-200"></div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="currentColor" fill-rule="evenodd" d="M7.843 3.802C9.872 2.601 10.886 2 12 2s2.128.6 4.157 1.802l.686.406c2.029 1.202 3.043 1.803 3.6 2.792c.557.99.557 2.19.557 4.594v.812c0 2.403 0 3.605-.557 4.594s-1.571 1.59-3.6 2.791l-.686.407C14.128 21.399 13.114 22 12 22s-2.128-.6-4.157-1.802l-.686-.407c-2.029-1.2-3.043-1.802-3.6-2.791C3 16.01 3 14.81 3 12.406v-.812C3 9.19 3 7.989 3.557 7s1.571-1.59 3.6-2.792zM13 16a1 1 0 1 1-2 0a1 1 0 0 1 2 0m-1-9.75a.75.75 0 0 1 .75.75v6a.75.75 0 0 1-1.5 0V7a.75.75 0 0 1 .75-.75" clip-rule="evenodd" />
                        </svg>
                        <span>
                            Pelanggaran
                        </span>
                    </a>
                    <a href="<?= BASE_URL ?>/letters" class="nav-item relative flex gap-2 items-center px-3 py-2 rounded-xl border-2 overflow-hidden transition-all duration-300 bg-transparent border-transparent group hover:bg-zinc-50 hover:border-zinc-200">
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
                    <a href="<?= BASE_URL ?>/guardians" class="nav-item relative flex gap-2 items-center px-3 py-2 rounded-xl border-2 overflow-hidden transition-all duration-300 bg-transparent border-transparent group hover:bg-zinc-50 hover:border-zinc-200">
                        <div class="w-2 h-6 rounded-md absolute -left-1 transition-all duration-300 bg-transparent group-hover:bg-zinc-200"></div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M7 11a4.5 4.5 0 1 1 0-9a4.5 4.5 0 0 1 0 9m10.5 4a4 4 0 1 1 0-8a4 4 0 0 1 0 8m0 1a4.5 4.5 0 0 1 4.5 4.5v.5h-9v-.5a4.5 4.5 0 0 1 4.5-4.5M7 12a5 5 0 0 1 5 5v4H2v-4a5 5 0 0 1 5-5" />
                        </svg>
                        <span>
                            Orang Tua
                        </span>
                    </a>
                    <a href="<?= BASE_URL ?>/students" class="nav-item relative flex gap-2 items-center px-3 py-2 rounded-xl border-2 overflow-hidden transition-all duration-300 bg-transparent border-transparent group hover:bg-zinc-50 hover:border-zinc-200">
                        <div class="w-2 h-6 rounded-md absolute -left-1 transition-all duration-300 bg-transparent group-hover:bg-zinc-200"></div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M16 8c0 2.21-1.79 4-4 4s-4-1.79-4-4l.11-.94L5 5.5L12 2l7 3.5v5h-1V6l-2.11 1.06zm-4 6c4.42 0 8 1.79 8 4v2H4v-2c0-2.21 3.58-4 8-4" />
                        </svg>
                        <span>
                            Siswa
                        </span>
                    </a>
                    <a href="<?= BASE_URL ?>/teachers" class="nav-item relative flex gap-2 items-center px-3 py-2 rounded-xl border-2 overflow-hidden transition-all duration-300 bg-transparent border-transparent group hover:bg-zinc-50 hover:border-zinc-200">
                        <div class="w-2 h-6 rounded-md absolute -left-1 transition-all duration-300 bg-transparent group-hover:bg-zinc-200"></div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M12 4a4 4 0 0 1 4 4a4 4 0 0 1-4 4a4 4 0 0 1-4-4a4 4 0 0 1 4-4m0 10c4.42 0 8 1.79 8 4v2H4v-2c0-2.21 3.58-4 8-4" />
                        </svg>
                        <span>
                            Guru
                        </span>
                    </a>
                    <a href="<?= BASE_URL ?>/management" class="nav-item relative flex gap-2 items-center px-3 py-2 rounded-xl border-2 overflow-hidden transition-all duration-300 bg-transparent border-transparent group hover:bg-zinc-50 hover:border-zinc-200">
                        <div class="w-2 h-6 rounded-md absolute -left-1 transition-all duration-300 bg-transparent group-hover:bg-zinc-200"></div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M13 8.58c.78 0 1.44.61 1.44 1.42s-.66 1.44-1.44 1.44s-1.42-.66-1.42-1.44s.61-1.42 1.42-1.42M13 3c3.88 0 7 3.14 7 7c0 2.8-1.63 5.19-4 6.31V21H9v-3H8c-1.11 0-2-.89-2-2v-3H4.5c-.42 0-.66-.5-.42-.81L6 9.66A7.003 7.003 0 0 1 13 3m3 7c0-.16 0-.25-.06-.39l.89-.66c.05-.04.09-.18.05-.28l-.8-1.36c-.05-.09-.19-.14-.28-.09l-.99.42c-.18-.19-.42-.33-.65-.42L14 6.19c-.03-.14-.08-.19-.22-.19h-1.59c-.1 0-.19.05-.19.19l-.14 1.03c-.23.09-.47.23-.66.42l-1.03-.42c-.09-.05-.17 0-.23.09l-.8 1.36c-.05.14-.05.24.05.28l.84.66c0 .14-.03.28-.03.39c0 .13.03.27.03.41l-.84.65c-.1.05-.1.14-.05.24l.8 1.4c.06.1.14.1.23.1l.99-.43c.23.19.42.29.7.38l.14 1.08c0 .09.09.17.19.17h1.59c.14 0 .19-.08.22-.17l.16-1.08c.23-.09.47-.19.65-.37l.99.42c.09 0 .23 0 .28-.1l.8-1.4c.04-.1 0-.19-.05-.24l-.83-.65z" />
                        </svg>
                        <span>
                            Management
                        </span>
                    </a>
                </div>

                <div class="flex flex-col gap-1">
                    <div class="nav-divider hidden w-full h-px bg-zinc-300"></div>
                    <span class="nav-divider-title text-xs text-zinc-400">Lainnya</span>
                    <a href="<?= BASE_URL ?>/notifications" class="nav-item relative flex gap-2 items-center px-3 py-2 rounded-xl border-2 overflow-hidden transition-all duration-300 bg-transparent border-transparent group hover:bg-zinc-50 hover:border-zinc-200">
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
                    <a href="<?= BASE_URL ?>/activities" class="nav-item relative flex gap-2 items-center px-3 py-2 rounded-xl border-2 overflow-hidden transition-all duration-300 bg-transparent border-transparent group hover:bg-zinc-50 hover:border-zinc-200">
                        <div class="w-2 h-6 rounded-md absolute -left-1 transition-all duration-300 bg-transparent group-hover:bg-zinc-200"></div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M6.962 2.421c1.276-.171 2.908-.171 4.981-.171h.114c2.073 0 3.705 0 4.98.171c1.31.176 2.354.545 3.175 1.367c.822.821 1.19 1.866 1.367 3.174c.171 1.276.171 2.908.171 4.981v.114c0 2.073 0 3.705-.171 4.98c-.176 1.31-.545 2.354-1.367 3.175c-.821.822-1.866 1.19-3.174 1.367c-1.276.171-2.908.171-4.981.171h-.114c-2.073 0-3.705 0-4.98-.171c-1.31-.176-2.354-.545-3.175-1.367c-.822-.821-1.19-1.866-1.367-3.174c-.171-1.276-.171-2.908-.171-4.981v-.114c0-2.073 0-3.705.171-4.98c.176-1.31.545-2.354 1.367-3.175c.821-.822 1.866-1.19 3.174-1.367m4.773 4.432a.75.75 0 0 0-1.431-.132L8.492 11.25H7a.75.75 0 0 0 0 1.5h2a.75.75 0 0 0 .696-.472l1.063-2.657l1.506 7.526a.75.75 0 0 0 1.431.132l1.812-4.529H17a.75.75 0 0 0 0-1.5h-2a.75.75 0 0 0-.696.471L13.24 14.38z" />
                        </svg>
                        <span>
                            Aktivitas
                        </span>
                    </a>
                </div>

                <div class="flex flex-col lg:hidden mt-10">
                    <a href="#" class="nav-item relative flex gap-2 items-center px-3 py-2 rounded-xl border-2 overflow-hidden transition-all duration-300 bg-transparent border-transparent group hover:bg-zinc-50 hover:border-zinc-200">
                        <div class="w-2 h-6 rounded-md absolute -left-1 transition-all duration-300 bg-transparent group-hover:bg-zinc-200"></div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M12.838 17.638q.362-.363.362-.888t-.362-.888t-.888-.362t-.887.363t-.363.887t.363.888t.887.362t.888-.363M11.05 14.15h1.85q0-.825.188-1.3t1.062-1.3q.65-.65 1.025-1.238T15.55 8.9q0-1.4-1.025-2.15T12.1 6q-1.425 0-2.312.75T8.55 8.55l1.65.65q.125-.45.563-.975T12.1 7.7q.8 0 1.2.438t.4.962q0 .5-.3.938t-.75.812q-1.1.975-1.35 1.475t-.25 1.825M12 22q-2.075 0-3.9-.787t-3.175-2.138T2.788 15.9T2 12t.788-3.9t2.137-3.175T8.1 2.788T12 2t3.9.788t3.175 2.137T21.213 8.1T22 12t-.788 3.9t-2.137 3.175t-3.175 2.138T12 22" />
                        </svg>
                        <span>
                            Bantuan
                        </span>
                    </a>
                    <a href="<?= BASE_URL ?>/settings" class="nav-item relative flex gap-2 items-center px-3 py-2 rounded-xl border-2 overflow-hidden transition-all duration-300 bg-transparent border-transparent group hover:bg-zinc-50 hover:border-zinc-200">
                        <div class="w-2 h-6 rounded-md absolute -left-1 transition-all duration-300 bg-transparent group-hover:bg-zinc-200"></div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M10.825 22q-.675 0-1.162-.45t-.588-1.1L8.85 18.8q-.325-.125-.612-.3t-.563-.375l-1.55.65q-.625.275-1.25.05t-.975-.8l-1.175-2.05q-.35-.575-.2-1.225t.675-1.075l1.325-1Q4.5 12.5 4.5 12.337v-.675q0-.162.025-.337l-1.325-1Q2.675 9.9 2.525 9.25t.2-1.225L3.9 5.975q.35-.575.975-.8t1.25.05l1.55.65q.275-.2.575-.375t.6-.3l.225-1.65q.1-.65.588-1.1T10.825 2h2.35q.675 0 1.163.45t.587 1.1l.225 1.65q.325.125.613.3t.562.375l1.55-.65q.625-.275 1.25-.05t.975.8l1.175 2.05q.35.575.2 1.225t-.675 1.075l-1.325 1q.025.175.025.338v.674q0 .163-.05.338l1.325 1q.525.425.675 1.075t-.2 1.225l-1.2 2.05q-.35.575-.975.8t-1.25-.05l-1.5-.65q-.275.2-.575.375t-.6.3l-.225 1.65q-.1.65-.587 1.1t-1.163.45zm1.225-6.5q1.45 0 2.475-1.025T15.55 12t-1.025-2.475T12.05 8.5q-1.475 0-2.488 1.025T8.55 12t1.013 2.475T12.05 15.5" />
                        </svg>
                        <span>
                            Pengaturan
                        </span>
                    </a>
                </div>
            </nav>
        </aside>

        <section class="relative w-full h-full overflow-y-auto overflow-x-hidden max-w-[1440px] px-4 md:px-8 lg:px-10 pt-6 pb-20">
            <?php require_once "../app/views/" . $viewPath . ".php"; ?>
        </section>

        <?php Flasher::flash() ?>
    </main>

    <script src="<?= BASE_URL ?>/js/script.js" defer></script>
</body>

</html>
