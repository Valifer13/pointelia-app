<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pointer — Sistem Pencatatan Pelanggaran Siswa</title>
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <link rel="stylesheet" href="<?= BASE_URL ?>/css/output.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;500;600;700;800&family=DM+Sans:ital,wght@0,300;0,400;0,500;1,300&display=swap" rel="stylesheet" />
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        display: ['Syne', 'sans-serif'],
                        body: ['DM Sans', 'sans-serif'],
                    },
                    colors: {
                        blue: {
                            accent: '#2563EB',
                            light: '#3B82F6',
                            pale: '#DBEAFE',
                            deep: '#1D4ED8',
                        }
                    },
                    animation: {
                        'fade-up': 'fadeUp 0.7s ease forwards',
                        'fade-in': 'fadeIn 0.6s ease forwards',
                        'pulse-slow': 'pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                        'grid-fade': 'gridFade 8s ease-in-out infinite',
                    },
                    keyframes: {
                        fadeUp: {
                            '0%': {
                                opacity: '0',
                                transform: 'translateY(24px)'
                            },
                            '100%': {
                                opacity: '1',
                                transform: 'translateY(0)'
                            },
                        },
                        fadeIn: {
                            '0%': {
                                opacity: '0'
                            },
                            '100%': {
                                opacity: '1'
                            },
                        },
                        gridFade: {
                            '0%, 100%': {
                                opacity: '0.03'
                            },
                            '50%': {
                                opacity: '0.07'
                            },
                        }
                    }
                }
            }
        }
    </script>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: #ffffff;
            color: #0a0a0a;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: 'Poppins', sans-serif;
        }

        .grid-bg {
            background-image:
                linear-gradient(rgba(0, 0, 0, 0.06) 1px, transparent 1px),
                linear-gradient(90deg, rgba(0, 0, 0, 0.06) 1px, transparent 1px);
            background-size: 40px 40px;
            animation: gridFade 8s ease-in-out infinite;
        }

        .hero-grid {
            background-image:
                linear-gradient(rgba(37, 99, 235, 0.07) 1px, transparent 1px),
                linear-gradient(90deg, rgba(37, 99, 235, 0.07) 1px, transparent 1px);
            background-size: 48px 48px;
        }

        .noise-overlay::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.04'/%3E%3C/svg%3E");
            opacity: 0.4;
            pointer-events: none;
        }

        .bento-card {
            border: 1px solid #e5e7eb;
            border-radius: 16px;
            background: #fff;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            overflow: hidden;
            position: relative;
        }

        .bento-card::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(37, 99, 235, 0.04), transparent 60%);
            opacity: 0;
            transition: opacity 0.3s ease;
            pointer-events: none;
        }

        .bento-card:hover {
            border-color: #2563EB;
            transform: translateY(-3px);
            box-shadow: 0 12px 40px rgba(37, 99, 235, 0.12), 0 4px 12px rgba(0, 0, 0, 0.06);
        }

        .bento-card:hover::after {
            opacity: 1;
        }

        .step-line::after {
            content: '';
            position: absolute;
            left: 24px;
            top: 56px;
            bottom: -32px;
            width: 1px;
            background: linear-gradient(to bottom, #2563EB, transparent);
        }

        .text-gradient {
            background: linear-gradient(135deg, #0a0a0a 0%, #2563EB 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .btn-primary {
            background: #0a0a0a;
            color: #fff;
            border: 1.5px solid #0a0a0a;
            transition: all 0.25s ease;
            position: relative;
            overflow: hidden;
        }

        .btn-primary::before {
            content: '';
            position: absolute;
            inset: 0;
            background: #2563EB;
            transform: translateX(-100%);
            transition: transform 0.3s ease;
        }

        .btn-primary:hover::before {
            transform: translateX(0);
        }

        .btn-primary span {
            position: relative;
            z-index: 1;
        }

        .btn-outline {
            border: 1.5px solid #e5e7eb;
            color: #0a0a0a;
            transition: all 0.25s ease;
        }

        .btn-outline:hover {
            border-color: #2563EB;
            color: #2563EB;
            background: rgba(37, 99, 235, 0.04);
        }

        .nav-link {
            position: relative;
            color: #4b5563;
            transition: color 0.2s;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 1.5px;
            background: #2563EB;
            transition: width 0.25s ease;
        }

        .nav-link:hover {
            color: #0a0a0a;
        }

        .nav-link:hover::after {
            width: 100%;
        }

        .icon-box {
            width: 44px;
            height: 44px;
            background: #f1f5fe;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            transition: background 0.3s;
        }

        .bento-card:hover .icon-box {
            background: #2563EB;
        }

        .bento-card:hover .icon-box svg {
            color: #fff;
        }

        .stat-card {
            border: 1px solid #e5e7eb;
            border-radius: 14px;
            padding: 24px;
            background: #fff;
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            border-color: #2563EB;
            background: #f8fbff;
        }

        .tag {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: #f1f5fe;
            color: #2563EB;
            border: 1px solid #DBEAFE;
            border-radius: 999px;
            padding: 4px 12px;
            font-size: 13px;
            font-weight: 500;
            font-family: 'DM Sans', sans-serif;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-8px);
            }
        }

        .float {
            animation: float 4s ease-in-out infinite;
        }

        .float-delay {
            animation: float 4s ease-in-out 1s infinite;
        }

        .mobile-menu {
            display: none;
        }

        .mobile-menu.open {
            display: flex;
        }

        [data-aos] {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.7s ease, transform 0.7s ease;
        }

        [data-aos].aos-animate {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>

<body class="antialiased">

    <!-- ============================================================ NAVBAR -->
    <header id="navbar" class="fixed top-0 left-0 right-0 z-50 bg-white/90 backdrop-blur-md border-b border-gray-100 transition-all duration-300">
        <nav class="max-w-7xl mx-auto px-5 sm:px-6 lg:px-8 h-16 flex items-center justify-between">

            <!-- Logo -->
            <a href="#" class="flex items-center gap-2.5">
                <div class="w-8 h-8 bg-[#0a0a0a] text-white rounded-lg flex items-center justify-center">
                    <svg width="20" height="20" viewBox="0 0 20 26" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_356_42)">
                            <path d="M0.999523 10.1961C0.447237 10.1961 -0.00565863 10.6537 0.0494773 11.214C0.213727 12.8832 0.780063 14.4908 1.70475 15.891C2.81624 17.574 4.39495 18.8806 6.23887 19.6437C8.08277 20.4067 10.1081 20.5915 12.0556 20.1743C14.003 19.7571 15.7842 18.757 17.171 17.3019C18.5579 15.8468 19.4874 14.0029 19.8407 12.0061C20.194 10.0093 19.9549 7.95044 19.1541 6.09297C18.3533 4.2355 17.0271 2.66387 15.3453 1.5792C13.9462 0.676826 12.3539 0.145614 10.7128 0.0259641C10.1619 -0.0142003 9.72622 0.460481 9.74202 1.02337L9.85182 4.93348C9.86762 5.49635 10.3339 5.92734 10.8739 6.04556C11.3508 6.15002 11.8086 6.33972 12.2253 6.60844C12.9255 7.06002 13.4776 7.7144 13.811 8.48773C14.1445 9.2611 14.244 10.1183 14.0969 10.9497C13.9498 11.7811 13.5628 12.5488 12.9854 13.1546C12.408 13.7604 11.6664 14.1768 10.8556 14.3505C10.0447 14.5242 9.20147 14.4473 8.43377 14.1296C7.66607 13.8119 7.00877 13.2679 6.54597 12.5672C6.27062 12.1502 6.07157 11.689 5.95552 11.2059C5.82412 10.659 5.38827 10.1961 4.83601 10.1961H0.999523Z" fill="currentColor" />
                            <path d="M5 10.1961H1C0.447715 10.1961 0 10.6526 0 11.2157V24.9804C0 25.5435 0.447715 26 1 26H5C5.55228 26 6 25.5435 6 24.9804V11.2157C6 10.6526 5.55228 10.1961 5 10.1961Z" fill="currentColor" />
                            <path d="M6 3.05882C6 1.36948 4.65685 0 3 0C1.34315 0 0 1.36948 0 3.05882C0 4.74816 1.34315 6.11765 3 6.11765C4.65685 6.11765 6 4.74816 6 3.05882Z" fill="currentColor" />
                        </g>
                        <defs>
                            <clipPath id="clip0_356_42">
                                <rect width="20" height="26" fill="white" />
                            </clipPath>
                        </defs>
                    </svg>
                </div>
                <span class="font-display font-700 text-[15px] tracking-tight text-gray-900" style="font-weight:700;">Pointer</span>
            </a>

            <!-- Desktop nav -->
            <div class="hidden md:flex items-center gap-7">
                <a href="#fitur" class="nav-link text-sm font-medium">Fitur</a>
                <a href="#cara-kerja" class="nav-link text-sm font-medium">Cara Kerja</a>
                <a href="#keunggulan" class="nav-link text-sm font-medium">Keunggulan</a>
                <a href="#dokumen" class="nav-link text-sm font-medium">Dokumen</a>
            </div>

            <!-- CTA -->
            <div class="hidden md:flex items-center gap-3">
                <a href="<?= BASE_URL ?>/login/teacher" class="btn-outline text-sm font-medium px-4 py-2 rounded-lg">Masuk</a>
                <a href="#mulai" class="btn-primary text-sm font-medium px-4 py-2 rounded-lg"><span>Coba Gratis</span></a>
            </div>

            <!-- Mobile hamburger -->
            <button id="menu-toggle" class="md:hidden p-2 rounded-lg hover:bg-gray-100 transition-colors" aria-label="Menu">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </nav>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="mobile-menu flex-col bg-white border-t border-gray-100 px-5 pb-5 pt-3 gap-1 md:hidden">
            <a href="#fitur" class="py-2.5 text-sm font-medium text-gray-700 hover:text-blue-600 border-b border-gray-50">Fitur</a>
            <a href="#cara-kerja" class="py-2.5 text-sm font-medium text-gray-700 hover:text-blue-600 border-b border-gray-50">Cara Kerja</a>
            <a href="#keunggulan" class="py-2.5 text-sm font-medium text-gray-700 hover:text-blue-600 border-b border-gray-50">Keunggulan</a>
            <a href="#dokumen" class="py-2.5 text-sm font-medium text-gray-700 hover:text-blue-600">Dokumen</a>
            <div class="flex flex-col gap-2 mt-3">
                <a href="#" class="btn-outline text-sm font-medium px-4 py-2.5 rounded-lg text-center">Masuk</a>
                <a href="#mulai" class="btn-primary text-sm font-medium px-4 py-2.5 rounded-lg text-center"><span>Coba Gratis</span></a>
            </div>
        </div>
    </header>

    <!-- ============================================================ HERO -->
    <section class="relative min-h-screen flex items-center justify-center overflow-hidden pt-16 hero-grid">
        <!-- Background blobs -->
        <div class="absolute -top-32 -right-32 w-96 h-96 bg-blue-100 rounded-full opacity-40 blur-3xl pointer-events-none"></div>
        <div class="absolute -bottom-32 -left-32 w-80 h-80 bg-blue-50 rounded-full opacity-60 blur-3xl pointer-events-none"></div>

        <div class="relative max-w-5xl mx-auto px-5 sm:px-6 lg:px-8 py-20 text-center">
            <div class="tag mb-6 mx-auto w-fit" data-aos>
                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
                Sistem Manajemen Pelanggaran Siswa
            </div>

            <h1 class="font-display text-5xl sm:text-6xl lg:text-7xl font-800 leading-[1.05] tracking-tight mb-6" style="font-weight:800;" data-aos>
                Kelola Kedisiplinan Siswa<br />
                <span class="text-gradient">Lebih Cerdas & Efisien</span>
            </h1>

            <p class="text-lg sm:text-xl text-gray-500 max-w-2xl mx-auto leading-relaxed mb-10 font-300" data-aos>
                Platform digital terpadu untuk sekolah dalam mencatat, memantau, dan menindaklanjuti pelanggaran siswa — dari data hingga dokumen resmi, semuanya dalam satu sistem.
            </p>

            <div class="flex flex-col sm:flex-row gap-3 justify-center items-center mb-16" data-aos>
                <a href="#mulai" class="btn-primary text-sm font-600 px-7 py-3.5 rounded-xl w-full sm:w-auto" style="font-weight:600;">
                    <span class="flex items-center gap-2 justify-center">
                        Mulai Sekarang — Gratis
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                        </svg>
                    </span>
                </a>
                <a href="#cara-kerja" class="bg-white hover:bg-white! btn-outline text-sm font-500 px-7 py-3.5 rounded-xl w-full sm:w-auto" style="font-weight:500;">
                    Lihat Demo
                </a>
            </div>

            <!-- Hero Stats -->
            <div class="grid grid-cols-3 gap-4 max-w-lg mx-auto" data-aos>
                <div class="stat-card text-center">
                    <div class="font-display text-2xl font-700 text-gray-900 mb-0.5" style="font-weight:700;">500+</div>
                    <div class="text-xs text-gray-500 font-400">Sekolah Aktif</div>
                </div>
                <div class="stat-card text-center">
                    <div class="font-display text-2xl font-700 text-gray-900 mb-0.5" style="font-weight:700;">50K+</div>
                    <div class="text-xs text-gray-500 font-400">Data Siswa</div>
                </div>
                <div class="stat-card text-center">
                    <div class="font-display text-2xl font-700 text-gray-900 mb-0.5" style="font-weight:700;">99%</div>
                    <div class="text-xs text-gray-500 font-400">Uptime</div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================================ FEATURES (BENTO) -->
    <section id="fitur" class="py-24 px-5 sm:px-6 lg:px-8 bg-gray-50">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-14" data-aos>
                <div class="tag mb-4 mx-auto w-fit">Fitur Utama</div>
                <h2 class="font-display text-4xl sm:text-5xl font-700 tracking-tight text-gray-900 mb-4" style="font-weight:700;">Semua yang Dibutuhkan<br />Sekolah Modern</h2>
                <p class="text-gray-500 max-w-xl mx-auto">Dirancang khusus untuk kebutuhan administrasi kesiswaan yang kompleks, dengan antarmuka yang mudah digunakan.</p>
            </div>

            <!-- Bento Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">

                <!-- Card 1 — Large -->
                <div class="bento-card p-7 lg:col-span-2" data-aos>
                    <div class="flex items-start gap-4 mb-5">
                        <div class="icon-box">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-display font-600 text-lg text-gray-900 mb-1" style="font-weight:600;">Manajemen Data Siswa & Guru</h3>
                            <p class="text-gray-500 text-sm leading-relaxed">Kelola profil lengkap seluruh siswa dan guru dalam satu basis data terpusat. Pencarian cepat, filter canggih, dan ekspor data dengan mudah.</p>
                        </div>
                    </div>
                    <div class="bg-gray-50 rounded-xl p-4 border border-gray-100">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center text-white text-xs font-700" style="font-weight:700;">AS</div>
                            <div>
                                <div class="text-xs font-500 text-gray-900" style="font-weight:500;">Ahmad Santoso — XII RPL 2</div>
                                <div class="text-xs text-gray-400">NIS: 6074</div>
                            </div>
                            <span class="ml-auto text-xs bg-yellow-50 text-yellow-700 border border-yellow-200 px-2 py-0.5 rounded-full font-500" style="font-weight:500;">3 Pelanggaran</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-component text-white text-xs font-700 justify-center" style="font-weight:700;">DI</div>
                            <div>
                                <div class="text-xs font-500 text-gray-900" style="font-weight:500;">Dewi Indah — X DKV 1</div>
                                <div class="text-xs text-gray-400">NIS: 6781</div>
                            </div>
                            <span class="ml-auto text-xs bg-green-50 text-green-700 border border-green-200 px-2 py-0.5 rounded-full font-500" style="font-weight:500;">Bersih</span>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="bento-card p-7" data-aos>
                    <div class="icon-box mb-4">
                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                    </div>
                    <h3 class="font-display font-600 text-lg text-gray-900 mb-2" style="font-weight:600;">Pencatatan Pelanggaran</h3>
                    <p class="text-gray-500 text-sm leading-relaxed mb-4">Input cepat pelanggaran dengan kategori, tanggal, saksi, dan keterangan. Riwayat lengkap tersimpan otomatis.</p>
                    <div class="space-y-2">
                        <div class="flex items-center gap-2 text-xs">
                            <div class="w-2 h-2 rounded-full bg-red-400 shrink-0"></div>
                            <span class="text-gray-600">Pelanggaran Berat — Bolos Sekolah</span>
                        </div>
                        <div class="flex items-center gap-2 text-xs">
                            <div class="w-2 h-2 rounded-full bg-yellow-400 shrink-0"></div>
                            <span class="text-gray-600">Pelanggaran Sedang — Terlambat</span>
                        </div>
                        <div class="flex items-center gap-2 text-xs">
                            <div class="w-2 h-2 rounded-full bg-blue-400 shrink-0"></div>
                            <span class="text-gray-600">Pelanggaran Ringan — Seragam</span>
                        </div>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="bento-card p-7" data-aos>
                    <div class="icon-box mb-4">
                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <h3 class="font-display font-600 text-lg text-gray-900 mb-2" style="font-weight:600;">Dokumen Otomatis</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">Generate surat perjanjian, berita acara, dan laporan resmi secara otomatis dari data yang sudah tercatat.</p>
                </div>

                <!-- Card 4 -->
                <div class="bento-card p-7" data-aos>
                    <div class="icon-box mb-4">
                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                    </div>
                    <h3 class="font-display font-600 text-lg text-gray-900 mb-2" style="font-weight:600;">Panggilan Orang Tua</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">Buat surat panggilan orang tua secara profesional dengan template yang sudah disesuaikan standar sekolah.</p>
                </div>

                <!-- Card 5 — Large -->
                <div class="bento-card p-7 lg:col-span-2" data-aos>
                    <div class="flex items-start gap-4 mb-5">
                        <div class="icon-box">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-display font-600 text-lg text-gray-900 mb-1" style="font-weight:600;">Dashboard & Laporan Analitik</h3>
                            <p class="text-gray-500 text-sm leading-relaxed">Pantau tren pelanggaran secara real-time, identifikasi siswa yang perlu perhatian khusus, dan buat laporan berkala untuk kepala sekolah.</p>
                        </div>
                    </div>
                    <div class="grid grid-cols-3 gap-3">
                        <div class="bg-gray-50 rounded-xl p-3 border border-gray-100 text-center">
                            <div class="font-display text-xl font-700 text-blue-600 mb-0.5" style="font-weight:700;">24</div>
                            <div class="text-xs text-gray-500">Pelanggaran Bulan Ini</div>
                        </div>
                        <div class="bg-gray-50 rounded-xl p-3 border border-gray-100 text-center">
                            <div class="font-display text-xl font-700 text-gray-900 mb-0.5" style="font-weight:700;">8</div>
                            <div class="text-xs text-gray-500">Siswa Dipantau</div>
                        </div>
                        <div class="bg-gray-50 rounded-xl p-3 border border-gray-100 text-center">
                            <div class="font-display text-xl font-700 text-green-600 mb-0.5" style="font-weight:700;">↓12%</div>
                            <div class="text-xs text-gray-500">vs Bulan Lalu</div>
                        </div>
                    </div>
                </div>

                <!-- Card 6 -->
                <div class="bento-card p-7" data-aos>
                    <div class="icon-box mb-4">
                        <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="font-display font-600 text-lg text-gray-900 mb-2" style="font-weight:600;">Multi-Role Akses</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">Hak akses berbeda untuk Kepala Sekolah, Guru BK, Wali Kelas, dan Tata Usaha. Aman dan terkontrol.</p>
                </div>

            </div>
        </div>
    </section>

    <!-- ============================================================ HOW IT WORKS -->
    <section id="cara-kerja" class="py-24 px-5 sm:px-6 lg:px-8 bg-white">
        <div class="max-w-5xl mx-auto">
            <div class="text-center mb-16" data-aos>
                <div class="tag mb-4 mx-auto w-fit">Cara Kerja</div>
                <h2 class="font-display text-4xl sm:text-5xl font-700 tracking-tight text-gray-900 mb-4" style="font-weight:700;">Sederhana, Cepat,<br />dan Terstruktur</h2>
                <p class="text-gray-500 max-w-xl mx-auto">Dari pencatatan hingga penerbitan dokumen resmi, semua selesai dalam beberapa langkah mudah.</p>
            </div>

            <div class="relative space-y-6">

                <!-- Step 1 -->
                <div class="flex gap-6 items-start relative step-line" data-aos>
                    <div class="shrink-0 w-12 h-12 bg-[#0a0a0a] rounded-xl flex items-center justify-center text-white font-display font-700 text-base relative z-10" style="font-weight:700;">01</div>
                    <div class="bento-card p-6 flex-1">
                        <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                            <div>
                                <h3 class="font-display font-600 text-lg text-gray-900 mb-1.5" style="font-weight:600;">Input Data Siswa & Guru</h3>
                                <p class="text-gray-500 text-sm leading-relaxed">Daftarkan seluruh data siswa dan guru ke dalam sistem. Impor dari Excel atau input manual. Satu kali setup, digunakan selamanya.</p>
                            </div>
                            <div class="sm:ml-auto shrink-0">
                                <span class="text-xs bg-blue-50 text-blue-600 border border-blue-100 px-3 py-1 rounded-full font-500 whitespace-nowrap" style="font-weight:500;">Setup Awal</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Step 2 -->
                <div class="flex gap-6 items-start relative step-line" data-aos>
                    <div class="shrink-0 w-12 h-12 bg-[#0a0a0a] rounded-xl flex items-center justify-center text-white font-display font-700 text-base relative z-10" style="font-weight:700;">02</div>
                    <div class="bento-card p-6 flex-1">
                        <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                            <div>
                                <h3 class="font-display font-600 text-lg text-gray-900 mb-1.5" style="font-weight:600;">Catat Pelanggaran</h3>
                                <p class="text-gray-500 text-sm leading-relaxed">Guru atau petugas BK mencatat pelanggaran siswa lengkap dengan kategori, tingkat keparahan, saksi, dan keterangan detail. Real-time tersimpan di cloud.</p>
                            </div>
                            <div class="sm:ml-auto shrink-0">
                                <span class="text-xs bg-orange-50 text-orange-600 border border-orange-100 px-3 py-1 rounded-full font-500 whitespace-nowrap" style="font-weight:500;">Harian</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Step 3 -->
                <div class="flex gap-6 items-start relative step-line" data-aos>
                    <div class="shrink-0 w-12 h-12 bg-[#0a0a0a] rounded-xl flex items-center justify-center text-white font-display font-700 text-base relative z-10" style="font-weight:700;">03</div>
                    <div class="bento-card p-6 flex-1">
                        <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                            <div>
                                <h3 class="font-display font-600 text-lg text-gray-900 mb-1.5" style="font-weight:600;">Tindak Lanjut Otomatis</h3>
                                <p class="text-gray-500 text-sm leading-relaxed">Sistem otomatis menghitung akumulasi poin pelanggaran dan merekomendasikan tindakan sesuai kebijakan sekolah yang telah dikonfigurasi.</p>
                            </div>
                            <div class="sm:ml-auto shrink-0">
                                <span class="text-xs bg-purple-50 text-purple-600 border border-purple-100 px-3 py-1 rounded-full font-500 whitespace-nowrap" style="font-weight:500;">Otomatis</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Step 4 -->
                <div class="flex gap-6 items-start" data-aos>
                    <div class="shrink-0 w-12 h-12 bg-blue-600 rounded-xl flex items-center justify-center text-white font-display font-700 text-base" style="font-weight:700;">04</div>
                    <div class="bento-card p-6 flex-1">
                        <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                            <div>
                                <h3 class="font-display font-600 text-lg text-gray-900 mb-1.5" style="font-weight:600;">Buat & Cetak Dokumen Resmi</h3>
                                <p class="text-gray-500 text-sm leading-relaxed">Generate surat perjanjian siswa, perjanjian orang tua, surat panggilan, atau surat pindah sekolah dalam hitungan detik. Tinggal cetak dan tanda tangan.</p>
                            </div>
                            <div class="sm:ml-auto shrink-0">
                                <span class="text-xs bg-green-50 text-green-600 border border-green-100 px-3 py-1 rounded-full font-500 whitespace-nowrap" style="font-weight:500;">Instan</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ============================================================ DOCUMENT TYPES -->
    <section id="dokumen" class="py-24 px-5 sm:px-6 lg:px-8 bg-[#0a0a0a] relative overflow-hidden">
        <div class="grid-bg absolute inset-0 opacity-20"></div>
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-96 h-64 bg-blue-600 opacity-10 rounded-full blur-3xl pointer-events-none"></div>

        <div class="relative max-w-7xl mx-auto">
            <div class="text-center mb-14" data-aos>
                <div class="tag mb-4 mx-auto w-fit" style="background: rgba(37,99,235,0.15); border-color: rgba(37,99,235,0.3); color: #93C5FD;">Dokumen Resmi</div>
                <h2 class="font-display text-4xl sm:text-5xl font-700 tracking-tight text-white mb-4" style="font-weight:700;">5 Jenis Dokumen<br />Siap Cetak</h2>
                <p class="text-gray-400 max-w-xl mx-auto">Semua template dokumen resmi yang dibutuhkan sekolah sudah tersedia. Isi data otomatis, cetak langsung.</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4">

                <div class="rounded-2xl border border-white/10 bg-white/5 p-6 hover:bg-white/10 hover:border-blue-500/40 transition-all duration-300 group cursor-pointer" data-aos>
                    <div class="w-10 h-10 bg-blue-600/20 rounded-xl flex items-center justify-center mb-4 group-hover:bg-blue-600/30 transition-colors">
                        <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <h4 class="font-display font-600 text-white text-sm mb-2" style="font-weight:600;">Surat Perjanjian Siswa</h4>
                    <p class="text-gray-500 text-xs leading-relaxed">Pernyataan komitmen siswa atas pelanggaran yang dilakukan</p>
                </div>

                <div class="rounded-2xl border border-white/10 bg-white/5 p-6 hover:bg-white/10 hover:border-blue-500/40 transition-all duration-300 group cursor-pointer" data-aos>
                    <div class="w-10 h-10 bg-blue-600/20 rounded-xl flex items-center justify-center mb-4 group-hover:bg-blue-600/30 transition-colors">
                        <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                    </div>
                    <h4 class="font-display font-600 text-white text-sm mb-2" style="font-weight:600;">Surat Perjanjian Orang Tua</h4>
                    <p class="text-gray-500 text-xs leading-relaxed">Kesepakatan bersama orang tua/wali untuk pembinaan siswa</p>
                </div>

                <div class="rounded-2xl border border-white/10 bg-white/5 p-6 hover:bg-white/10 hover:border-blue-500/40 transition-all duration-300 group cursor-pointer" data-aos>
                    <div class="w-10 h-10 bg-blue-600/20 rounded-xl flex items-center justify-center mb-4 group-hover:bg-blue-600/30 transition-colors">
                        <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                    </div>
                    <h4 class="font-display font-600 text-white text-sm mb-2" style="font-weight:600;">Surat Panggilan Orang Tua</h4>
                    <p class="text-gray-500 text-xs leading-relaxed">Undangan resmi orang tua untuk konsultasi ke sekolah</p>
                </div>

                <div class="rounded-2xl border border-white/10 bg-white/5 p-6 hover:bg-white/10 hover:border-blue-500/40 transition-all duration-300 group cursor-pointer" data-aos>
                    <div class="w-10 h-10 bg-blue-600/20 rounded-xl flex items-center justify-center mb-4 group-hover:bg-blue-600/30 transition-colors">
                        <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                        </svg>
                    </div>
                    <h4 class="font-display font-600 text-white text-sm mb-2" style="font-weight:600;">Surat Pindah Sekolah</h4>
                    <p class="text-gray-500 text-xs leading-relaxed">Dokumen resmi pemindahan siswa ke sekolah lain</p>
                </div>

                <div class="rounded-2xl border border-white/10 bg-white/5 p-6 hover:bg-white/10 hover:border-blue-500/40 transition-all duration-300 group cursor-pointer" data-aos>
                    <div class="w-10 h-10 bg-blue-600/20 rounded-xl flex items-center justify-center mb-4 group-hover:bg-blue-600/30 transition-colors">
                        <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <h4 class="font-display font-600 text-white text-sm mb-2" style="font-weight:600;">Laporan Pelanggaran</h4>
                    <p class="text-gray-500 text-xs leading-relaxed">Rekapitulasi pelanggaran siswa dalam periode tertentu</p>
                </div>

            </div>
        </div>
    </section>

    <!-- ============================================================ BENEFITS -->
    <section id="keunggulan" class="py-24 px-5 sm:px-6 lg:px-8 bg-white">
        <div class="max-w-7xl mx-auto">
            <div class="grid lg:grid-cols-2 gap-16 items-center">

                <div data-aos>
                    <div class="tag mb-5 w-fit">Keunggulan Sistem</div>
                    <h2 class="font-display text-4xl sm:text-5xl font-700 tracking-tight text-gray-900 mb-6 leading-tight" style="font-weight:700;">Mengapa Sekolah<br />Memilih Pointer?</h2>
                    <p class="text-gray-500 leading-relaxed mb-8">Kami memahami tantangan administrasi kesiswaan yang kompleks. Pointer dirancang bersama praktisi pendidikan untuk memenuhi kebutuhan nyata di lapangan.</p>

                    <div class="space-y-4">
                        <div class="flex gap-4">
                            <div class="w-10 h-10 bg-green-50 rounded-xl flex items-center justify-center shrink-0 border border-green-100">
                                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-display font-600 text-gray-900 mb-1" style="font-weight:600;">Hemat Waktu Administrasi</h4>
                                <p class="text-gray-500 text-sm">Dokumen yang dulu butuh 30 menit, kini selesai dalam 2 menit. Fokus pada pembinaan, bukan paperwork.</p>
                            </div>
                        </div>

                        <div class="flex gap-4">
                            <div class="w-10 h-10 bg-blue-50 rounded-xl flex items-center justify-center shrink-0 border border-blue-100">
                                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-display font-600 text-gray-900 mb-1" style="font-weight:600;">Data Terpusat & Aman</h4>
                                <p class="text-gray-500 text-sm">Semua riwayat pelanggaran tersimpan aman di cloud, tidak hilang meski berganti petugas BK atau laptop rusak.</p>
                            </div>
                        </div>

                        <div class="flex gap-4">
                            <div class="w-10 h-10 bg-purple-50 rounded-xl flex items-center justify-center shrink-0 border border-purple-100">
                                <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-display font-600 text-gray-900 mb-1" style="font-weight:600;">Transparansi & Akuntabilitas</h4>
                                <p class="text-gray-500 text-sm">Kepala sekolah dapat memantau kondisi kedisiplinan secara real-time. Audit trail lengkap untuk setiap perubahan data.</p>
                            </div>
                        </div>

                        <div class="flex gap-4">
                            <div class="w-10 h-10 bg-orange-50 rounded-xl flex items-center justify-center shrink-0 border border-orange-100">
                                <svg class="w-5 h-5 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="font-display font-600 text-gray-900 mb-1" style="font-weight:600;">Mudah Digunakan</h4>
                                <p class="text-gray-500 text-sm">Antarmuka intuitif yang bisa dikuasai dalam satu hari. Tidak perlu pelatihan teknis panjang untuk seluruh staf.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Stats visual -->
                <div class="grid grid-cols-2 gap-4" data-aos>
                    <div class="bento-card p-7 bg-[#0a0a0a] border-[#1a1a1a] col-span-2">
                        <div class="tag mb-3" style="background: rgba(37,99,235,0.15); border-color: rgba(37,99,235,0.3); color: #93C5FD;">Dampak Nyata</div>
                        <h3 class="font-display font-700 text-white text-2xl mb-1" style="font-weight:700;">Sekolah melaporkan penurunan<br />pelanggaran hingga <span class="text-blue-400">40%</span></h3>
                        <p class="text-gray-500 text-sm">setelah mengimplementasikan sistem pencatatan yang konsisten.</p>
                    </div>
                    <div class="bento-card p-6 text-center">
                        <div class="font-display text-3xl font-800 text-blue-600 mb-1" style="font-weight:800;">95%</div>
                        <div class="text-sm text-gray-600 font-500" style="font-weight:500;">Kepuasan Pengguna</div>
                        <div class="text-xs text-gray-400 mt-1">Dari survei internal</div>
                    </div>
                    <div class="bento-card p-6 text-center">
                        <div class="font-display text-3xl font-800 text-gray-900 mb-1" style="font-weight:800;">2 Jam</div>
                        <div class="text-sm text-gray-600 font-500" style="font-weight:500;">Waktu Onboarding</div>
                        <div class="text-xs text-gray-400 mt-1">Rata-rata setup awal</div>
                    </div>
                    <div class="bento-card p-6 text-center">
                        <div class="font-display text-3xl font-800 text-gray-900 mb-1" style="font-weight:800;">24/7</div>
                        <div class="text-sm text-gray-600 font-500" style="font-weight:500;">Dukungan Teknis</div>
                        <div class="text-xs text-gray-400 mt-1">Siap membantu kapanpun</div>
                    </div>
                    <div class="bento-card p-6 text-center">
                        <div class="font-display text-3xl font-800 text-gray-900 mb-1" style="font-weight:800;">≤5s</div>
                        <div class="text-sm text-gray-600 font-500" style="font-weight:500;">Generate Dokumen</div>
                        <div class="text-xs text-gray-400 mt-1">Dari data ke dokumen siap cetak</div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ============================================================ CTA -->
    <section id="mulai" class="py-24 px-5 sm:px-6 lg:px-8 bg-gray-50">
        <div class="max-w-4xl mx-auto">
            <div class="relative bg-[#0a0a0a] rounded-3xl p-10 sm:p-16 text-center overflow-hidden noise-overlay" data-aos>
                <!-- Decorative elements -->
                <div class="absolute top-0 left-1/2 -translate-x-1/2 w-64 h-32 bg-blue-600 opacity-20 rounded-full blur-3xl pointer-events-none"></div>
                <div class="absolute -bottom-8 -right-8 w-48 h-48 bg-blue-800 opacity-10 rounded-full blur-2xl pointer-events-none"></div>

                <div class="relative">
                    <div class="tag mb-6 mx-auto w-fit" style="background: rgba(37,99,235,0.15); border-color: rgba(37,99,235,0.3); color: #93C5FD;">Mulai Sekarang</div>
                    <h2 class="font-display text-4xl sm:text-5xl font-700 text-white mb-5 tracking-tight leading-tight" style="font-weight:700;">Siap Modernisasi<br />Sistem Sekolah Anda?</h2>
                    <p class="text-gray-400 max-w-xl mx-auto mb-10 leading-relaxed">Bergabunglah dengan ratusan sekolah yang telah mempercayai Pointer. Mulai gratis, tidak perlu kartu kredit.</p>

                    <div class="flex flex-col sm:flex-row gap-3 justify-center">
                        <a href="<?= BASE_URL ?>/dashboard" class="inline-flex items-center justify-center gap-2 bg-white text-[#0a0a0a] font-600 text-sm px-8 py-4 rounded-xl hover:bg-gray-100 transition-colors" style="font-weight:600;">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                            Daftar Gratis Sekarang
                        </a>
                        <a href="#" class="inline-flex items-center justify-center gap-2 border border-white/20 text-white font-500 text-sm px-8 py-4 rounded-xl hover:border-white/40 hover:bg-white/5 transition-colors" style="font-weight:500;">
                            Jadwalkan Demo
                        </a>
                    </div>

                    <p class="text-gray-600 text-xs mt-6">✓ 14 hari gratis &nbsp;&nbsp; ✓ Tidak perlu kartu kredit &nbsp;&nbsp; ✓ Batalkan kapan saja</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================================ FOOTER -->
    <footer class="bg-[#0a0a0a] border-t border-white/5 pt-16 pb-8 px-5 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10 mb-12">

                <!-- Brand -->
                <div class="lg:col-span-1">
                    <div class="flex items-center gap-2.5 mb-4">
                        <div class="w-8 h-8 bg-white text-black rounded-lg flex items-center justify-center">
                            <svg width="20" height="20" viewBox="0 0 20 26" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_356_42)">
                                    <path d="M0.999523 10.1961C0.447237 10.1961 -0.00565863 10.6537 0.0494773 11.214C0.213727 12.8832 0.780063 14.4908 1.70475 15.891C2.81624 17.574 4.39495 18.8806 6.23887 19.6437C8.08277 20.4067 10.1081 20.5915 12.0556 20.1743C14.003 19.7571 15.7842 18.757 17.171 17.3019C18.5579 15.8468 19.4874 14.0029 19.8407 12.0061C20.194 10.0093 19.9549 7.95044 19.1541 6.09297C18.3533 4.2355 17.0271 2.66387 15.3453 1.5792C13.9462 0.676826 12.3539 0.145614 10.7128 0.0259641C10.1619 -0.0142003 9.72622 0.460481 9.74202 1.02337L9.85182 4.93348C9.86762 5.49635 10.3339 5.92734 10.8739 6.04556C11.3508 6.15002 11.8086 6.33972 12.2253 6.60844C12.9255 7.06002 13.4776 7.7144 13.811 8.48773C14.1445 9.2611 14.244 10.1183 14.0969 10.9497C13.9498 11.7811 13.5628 12.5488 12.9854 13.1546C12.408 13.7604 11.6664 14.1768 10.8556 14.3505C10.0447 14.5242 9.20147 14.4473 8.43377 14.1296C7.66607 13.8119 7.00877 13.2679 6.54597 12.5672C6.27062 12.1502 6.07157 11.689 5.95552 11.2059C5.82412 10.659 5.38827 10.1961 4.83601 10.1961H0.999523Z" fill="currentColor" />
                                    <path d="M5 10.1961H1C0.447715 10.1961 0 10.6526 0 11.2157V24.9804C0 25.5435 0.447715 26 1 26H5C5.55228 26 6 25.5435 6 24.9804V11.2157C6 10.6526 5.55228 10.1961 5 10.1961Z" fill="currentColor" />
                                    <path d="M6 3.05882C6 1.36948 4.65685 0 3 0C1.34315 0 0 1.36948 0 3.05882C0 4.74816 1.34315 6.11765 3 6.11765C4.65685 6.11765 6 4.74816 6 3.05882Z" fill="currentColor" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_356_42">
                                        <rect width="20" height="26" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>
                        </div>
                        <span class="font-display font-700 text-white text-sm" style="font-weight:700;">Pointer</span>
                    </div>
                    <p class="text-gray-500 text-sm leading-relaxed mb-5">Sistem Pencatatan Pelanggaran Siswa modern untuk sekolah Indonesia.</p>
                    <div class="flex gap-3">
                        <a href="#" class="w-8 h-8 bg-white/5 hover:bg-white/10 border border-white/10 rounded-lg flex items-center justify-center transition-colors">
                            <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 4.56v14.91A4.536 4.536 0 0119.455 24H4.545A4.536 4.536 0 010 19.455V4.545A4.536 4.536 0 014.545 0h14.91A4.536 4.536 0 0124 4.545v.015z" />
                            </svg>
                        </a>
                        <a href="#" class="w-8 h-8 bg-white/5 hover:bg-white/10 border border-white/10 rounded-lg flex items-center justify-center transition-colors">
                            <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M22.46 6c-.77.35-1.6.58-2.46.69.88-.53 1.56-1.37 1.88-2.38-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29 0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15 0 1.49.75 2.81 1.91 3.56-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 01-1.93.07 4.28 4.28 0 004 2.98 8.521 8.521 0 01-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21 16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56.84-.6 1.56-1.36 2.14-2.23z" />
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Links -->
                <div>
                    <h5 class="font-display font-600 text-white text-sm mb-4" style="font-weight:600;">Produk</h5>
                    <ul class="space-y-2.5">
                        <li><a href="#fitur" class="text-gray-500 hover:text-white text-sm transition-colors">Fitur</a></li>
                        <li><a href="#cara-kerja" class="text-gray-500 hover:text-white text-sm transition-colors">Cara Kerja</a></li>
                        <li><a href="#dokumen" class="text-gray-500 hover:text-white text-sm transition-colors">Dokumen</a></li>
                        <li><a href="#" class="text-gray-500 hover:text-white text-sm transition-colors">Harga</a></li>
                    </ul>
                </div>

                <div>
                    <h5 class="font-display font-600 text-white text-sm mb-4" style="font-weight:600;">Perusahaan</h5>
                    <ul class="space-y-2.5">
                        <li><a href="#" class="text-gray-500 hover:text-white text-sm transition-colors">Tentang Kami</a></li>
                        <li><a href="#" class="text-gray-500 hover:text-white text-sm transition-colors">Blog</a></li>
                        <li><a href="#" class="text-gray-500 hover:text-white text-sm transition-colors">Karir</a></li>
                        <li><a href="#" class="text-gray-500 hover:text-white text-sm transition-colors">Kontak</a></li>
                    </ul>
                </div>

                <div>
                    <h5 class="font-display font-600 text-white text-sm mb-4" style="font-weight:600;">Dukungan</h5>
                    <ul class="space-y-2.5">
                        <li><a href="#" class="text-gray-500 hover:text-white text-sm transition-colors">Dokumentasi</a></li>
                        <li><a href="#" class="text-gray-500 hover:text-white text-sm transition-colors">Pusat Bantuan</a></li>
                        <li><a href="#" class="text-gray-500 hover:text-white text-sm transition-colors">Status Sistem</a></li>
                        <li><a href="#" class="text-gray-500 hover:text-white text-sm transition-colors">Kebijakan Privasi</a></li>
                    </ul>
                </div>

            </div>

            <div class="border-t border-white/5 pt-6 flex flex-col sm:flex-row items-center justify-between gap-3">
                <p class="text-gray-600 text-xs">© 2026 Pointer. Hak cipta dilindungi undang-undang.</p>
                <p class="text-gray-600 text-xs">Dibuat dengan ❤️ untuk pendidikan Indonesia</p>
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        const toggle = document.getElementById('menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');
        toggle.addEventListener('click', () => {
            mobileMenu.classList.toggle('open');
        });

        // Close mobile menu on link click
        mobileMenu.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => mobileMenu.classList.remove('open'));
        });

        // Scroll-based AOS
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry, idx) => {
                if (entry.isIntersecting) {
                    setTimeout(() => entry.target.classList.add('aos-animate'), idx * 80);
                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        });

        document.querySelectorAll('[data-aos]').forEach(el => observer.observe(el));

        // Navbar shadow on scroll
        const navbar = document.getElementById('navbar');
        window.addEventListener('scroll', () => {
            navbar.style.boxShadow = window.scrollY > 10 ?
                '0 2px 24px rgba(0,0,0,0.06)' :
                'none';
        });
    </script>
</body>

</html>