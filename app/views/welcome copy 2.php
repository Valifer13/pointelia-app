<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pointer — Sistem Poin Pelanggaran Siswa</title>
    <!-- <link rel="stylesheet" href="<?= BASE_URL ?>/css/output.css"> -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet" />
    <style>
        :root {
            --blue-deep: #0B2FFF;
            --blue-mid: #1A56FF;
            --blue-light: #E8EEFF;
            --blue-glow: rgba(11, 47, 255, 0.12);
            --ink: #0A0F2E;
            --muted: #6B7280;
            --border: rgba(11, 47, 255, 0.13);
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: #F7F8FF;
            color: var(--ink);
            overflow-x: hidden;
        }

        /* ── grid noise overlay ── */
        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background-image:
                linear-gradient(rgba(11, 47, 255, 0.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(11, 47, 255, 0.03) 1px, transparent 1px);
            background-size: 48px 48px;
            pointer-events: none;
            z-index: 0;
        }

        .mono {
            font-family: 'DM Mono', monospace;
        }

        /* ── bento card ── */
        .card {
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 20px;
            padding: 28px;
            position: relative;
            overflow: hidden;
            transition: transform .25s ease, box-shadow .25s ease;
        }

        .card:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 40px var(--blue-glow);
        }

        .card::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(11, 47, 255, 0.04) 0%, transparent 60%);
            pointer-events: none;
        }

        .card-blue {
            background: var(--blue-deep);
            border-color: transparent;
            color: #fff;
        }

        .card-blue::after {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.07) 0%, transparent 60%);
        }

        .card-dark {
            background: var(--ink);
            border-color: transparent;
            color: #fff;
        }

        /* ── pill badge ── */
        .pill {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: var(--blue-light);
            color: var(--blue-deep);
            font-size: 11px;
            font-weight: 700;
            letter-spacing: .08em;
            text-transform: uppercase;
            padding: 4px 12px;
            border-radius: 99px;
        }

        .pill-dot {
            width: 6px;
            height: 6px;
            background: var(--blue-deep);
            border-radius: 50%;
            animation: pulse 1.8s ease-in-out infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                opacity: 1;
                transform: scale(1);
            }

            50% {
                opacity: .5;
                transform: scale(.7);
            }
        }

        /* ── floating hero orb ── */
        .orb {
            position: absolute;
            border-radius: 50%;
            filter: blur(80px);
            pointer-events: none;
            animation: drift 8s ease-in-out infinite alternate;
        }

        @keyframes drift {
            from {
                transform: translate(0, 0) scale(1);
            }

            to {
                transform: translate(30px, 20px) scale(1.1);
            }
        }

        /* ── counter number ── */
        .big-number {
            font-size: clamp(3rem, 7vw, 5.5rem);
            font-weight: 800;
            line-height: 1;
            letter-spacing: -.03em;
        }

        /* ── feature icon wrapper ── */
        .icon-wrap {
            width: 44px;
            height: 44px;
            background: var(--blue-light);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .card-blue .icon-wrap,
        .card-dark .icon-wrap {
            background: rgba(255, 255, 255, 0.12);
        }

        /* ── scroll reveal ── */
        .reveal {
            opacity: 0;
            transform: translateY(24px);
            transition: opacity .6s ease, transform .6s ease;
        }

        .reveal.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* ── horizontal scroll feature strip ── */
        .scrollstrip {
            display: flex;
            gap: 12px;
            overflow-x: auto;
            padding-bottom: 8px;
            scrollbar-width: none;
        }

        .scrollstrip::-webkit-scrollbar {
            display: none;
        }

        .strip-chip {
            flex-shrink: 0;
            background: var(--blue-light);
            color: var(--blue-deep);
            font-size: 13px;
            font-weight: 600;
            padding: 8px 16px;
            border-radius: 99px;
            white-space: nowrap;
        }

        /* ── nav ── */
        nav {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 100;
            backdrop-filter: blur(16px);
            background: rgba(247, 248, 255, .88);
            border-bottom: 1px solid var(--border);
        }

        /* ── CTA button ── */
        .btn-primary {
            background: var(--blue-deep);
            color: #fff;
            font-weight: 700;
            padding: 14px 32px;
            border-radius: 12px;
            border: none;
            cursor: pointer;
            font-family: inherit;
            font-size: 15px;
            transition: background .2s, transform .2s, box-shadow .2s;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-primary:hover {
            background: #0a28e0;
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(11, 47, 255, .35);
        }

        .btn-ghost {
            background: transparent;
            color: var(--ink);
            font-weight: 600;
            padding: 14px 24px;
            border-radius: 12px;
            border: 1.5px solid var(--border);
            cursor: pointer;
            font-family: inherit;
            font-size: 15px;
            transition: border-color .2s, background .2s;
        }

        .btn-ghost:hover {
            border-color: var(--blue-deep);
            background: var(--blue-light);
            color: var(--blue-deep);
        }

        /* ── timeline dot ── */
        .tl-dot {
            width: 10px;
            height: 10px;
            background: var(--blue-deep);
            border-radius: 50%;
            flex-shrink: 0;
            margin-top: 5px;
        }

        .tl-line {
            width: 2px;
            background: var(--border);
            flex: 1;
            min-height: 24px;
            margin: 4px auto;
        }

        /* ── footer gradient ── */
        .footer-grad {
            background: linear-gradient(180deg, #F7F8FF 0%, #EFF1FF 100%);
        }

        /* ── testimonial card ── */
        .quote-mark {
            font-size: 64px;
            line-height: 1;
            color: var(--blue-light);
            font-family: Georgia, serif;
            position: absolute;
            top: 12px;
            left: 20px;
        }

        /* ── stat ring ── */
        .stat-ring {
            width: 56px;
            height: 56px;
            border-radius: 50%;
            border: 3px solid var(--blue-deep);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            font-size: 13px;
            color: var(--blue-deep);
        }

        /* ── glow line ── */
        .glow-line {
            height: 2px;
            background: linear-gradient(90deg, transparent, var(--blue-deep), transparent);
            opacity: .25;
        }

        @media (max-width: 640px) {
            .card {
                padding: 20px;
            }
        }
    </style>
</head>

<body>

    <!-- ───────────── NAV ───────────── -->
    <nav>
        <div class="max-w-6xl mx-auto px-6 flex items-center justify-between h-16">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 rounded-lg bg-blue-600 flex items-center justify-content-center items-center justify-center">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none">
                        <path d="M9 12l2 2 4-4M21 12a9 9 0 11-18 0 9 9 0 0118 0z" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
                <span class="font-extrabold text-lg tracking-tight" style="color:var(--ink)">Si<span style="color:var(--blue-deep)">Poin</span></span>
            </div>
            <div class="hidden md:flex items-center gap-8 text-sm font-medium" style="color:var(--muted)">
                <a href="#fitur" class="hover:text-blue-600 transition-colors">Fitur</a>
                <a href="#alur" class="hover:text-blue-600 transition-colors">Alur Kerja</a>
                <a href="#dokumen" class="hover:text-blue-600 transition-colors">Dokumen</a>
                <a href="#manfaat" class="hover:text-blue-600 transition-colors">Manfaat</a>
            </div>
            <button class="btn-primary text-sm py-2 px-5">Mulai Sekarang →</button>
        </div>
    </nav>

    <!-- ───────────── HERO ───────────── -->
    <section class="relative pt-28 pb-16 px-6 max-w-6xl mx-auto" style="z-index:1">

        <!-- orbs -->
        <div class="orb" style="width:400px;height:400px;background:rgba(11,47,255,0.09);top:-100px;right:-80px;"></div>
        <div class="orb" style="width:280px;height:280px;background:rgba(11,47,255,0.06);bottom:0;left:-60px;animation-delay:-4s;"></div>

        <div class="text-center mb-14 reveal">
            <div class="pill mb-5 mx-auto w-fit">
                <span class="pill-dot"></span>
                Sistem Manajemen Sekolah Modern
            </div>
            <h1 class="font-extrabold leading-tight mb-5" style="font-size:clamp(2.4rem,6vw,4.8rem);letter-spacing:-.03em;color:var(--ink)">
                Pantau &amp; Kelola<br />
                <span style="color:var(--blue-deep)">Poin Pelanggaran</span><br />
                Siswa Secara Digital
            </h1>
            <p class="text-lg max-w-2xl mx-auto mb-8" style="color:var(--muted);line-height:1.75">
                Pointer adalah platform berbasis web untuk sekolah dalam mencatat, mengelola, dan menindaklanjuti
                pelanggaran siswa — dari peringatan hingga surat perjanjian, semua dalam satu sistem terintegrasi.
            </p>
            <div class="flex items-center justify-center gap-4 flex-wrap">
                <button class="btn-primary">Lihat Demo Langsung →</button>
                <button class="btn-ghost">Pelajari Lebih Lanjut</button>
            </div>
        </div>

        <!-- ── BENTO GRID ── -->
        <div class="grid grid-cols-12 gap-4 reveal" style="transition-delay:.1s">

            <!-- Hero stat card -->
            <div class="card card-blue col-span-12 md:col-span-5 flex flex-col justify-between min-h-52" style="background:linear-gradient(135deg,#0B2FFF 0%,#1E4FFF 100%)">
                <div>
                    <div class="icon-wrap mb-4">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                            <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2" stroke="#fff" stroke-width="2" stroke-linecap="round" />
                            <circle cx="9" cy="7" r="4" stroke="#fff" stroke-width="2" />
                            <path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75" stroke="#fff" stroke-width="2" stroke-linecap="round" />
                        </svg>
                    </div>
                    <p class="text-blue-200 text-sm font-medium mb-1">Total Data Terpusat</p>
                    <div class="big-number">∞</div>
                    <p class="text-blue-200 text-sm mt-1">Siswa &amp; Guru Terkelola</p>
                </div>
                <div class="mono text-xs text-blue-300 mt-4 bg-white/10 rounded-lg px-3 py-2">
                    siswa.find({ aktif: true }) → real-time sync
                </div>
            </div>

            <!-- Quick features vertical -->
            <div class="col-span-12 md:col-span-7 grid grid-cols-2 gap-4">

                <div class="card flex flex-col gap-3">
                    <div class="icon-wrap">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                            <path d="M12 9v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" stroke="var(--blue-deep)" stroke-width="2" stroke-linecap="round" />
                        </svg>
                    </div>
                    <p class="font-bold text-base">Riwayat Pelanggaran</p>
                    <p class="text-sm" style="color:var(--muted)">Setiap pelanggaran tercatat lengkap dengan tanggal, jenis, dan poin.</p>
                </div>

                <div class="card flex flex-col gap-3">
                    <div class="icon-wrap">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                            <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" stroke="var(--blue-deep)" stroke-width="2" stroke-linecap="round" />
                        </svg>
                    </div>
                    <p class="font-bold text-base">Cetak Dokumen</p>
                    <p class="text-sm" style="color:var(--muted)">Surat perjanjian, panggilan wali, laporan — cetak sekali klik.</p>
                </div>

                <div class="card flex flex-col gap-3">
                    <div class="icon-wrap">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                            <path d="M16 8v8m-8-5v5m4-9v9" stroke="var(--blue-deep)" stroke-width="2" stroke-linecap="round" />
                            <rect x="3" y="3" width="18" height="18" rx="2" stroke="var(--blue-deep)" stroke-width="2" />
                        </svg>
                    </div>
                    <p class="font-bold text-base">Laporan &amp; Statistik</p>
                    <p class="text-sm" style="color:var(--muted)">Visualisasi data pelanggaran per kelas, per periode, per kategori.</p>
                </div>

                <div class="card card-dark flex flex-col gap-3">
                    <div class="icon-wrap">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                            <path d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" stroke="#93C5FD" stroke-width="2" stroke-linecap="round" />
                        </svg>
                    </div>
                    <p class="font-bold text-base text-white">Akses Berbasis Peran</p>
                    <p class="text-sm text-blue-300">Admin, guru BK, dan wali kelas punya hak akses berbeda.</p>
                </div>

            </div>
        </div>

        <!-- scrolling chip strip -->
        <div class="scrollstrip mt-6 reveal" style="transition-delay:.2s">
            <span class="strip-chip">✦ Manajemen Siswa</span>
            <span class="strip-chip">✦ Manajemen Guru</span>
            <span class="strip-chip">✦ Tambah Pelanggaran</span>
            <span class="strip-chip">✦ Surat Perjanjian Siswa</span>
            <span class="strip-chip">✦ Surat Perjanjian Orang Tua</span>
            <span class="strip-chip">✦ Panggilan Wali</span>
            <span class="strip-chip">✦ Mutasi / Pindah Sekolah</span>
            <span class="strip-chip">✦ Laporan Pelanggaran</span>
            <span class="strip-chip">✦ Cetak PDF</span>
            <span class="strip-chip">✦ Dashboard Statistik</span>
        </div>
    </section>

    <div class="glow-line max-w-6xl mx-auto mx-6 my-4" style="margin-left:1.5rem;margin-right:1.5rem"></div>

    <!-- ───────────── FITUR UTAMA ───────────── -->
    <section id="fitur" class="py-16 px-6 max-w-6xl mx-auto" style="z-index:1;position:relative">
        <div class="text-center mb-12 reveal">
            <div class="pill mb-4 mx-auto w-fit">Fitur Platform</div>
            <h2 class="font-extrabold text-4xl mb-3" style="letter-spacing:-.02em">Semua yang Sekolah Butuhkan</h2>
            <p style="color:var(--muted)">Dirancang untuk kemudahan guru BK, wali kelas, dan administrator sekolah.</p>
        </div>

        <!-- bento feature grid -->
        <div class="grid grid-cols-12 gap-4">

            <!-- big feature left -->
            <div class="card col-span-12 md:col-span-6 reveal" style="transition-delay:.05s">
                <div class="flex items-start gap-4 mb-6">
                    <div class="icon-wrap w-12 h-12">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none">
                            <path d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197" stroke="var(--blue-deep)" stroke-width="2" stroke-linecap="round" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-xl mb-1">Manajemen Data Siswa &amp; Guru</h3>
                        <p style="color:var(--muted);font-size:14px;line-height:1.65">Input, edit, dan kelola seluruh data siswa aktif maupun alumni, serta data guru dan staf pengajar. Pencarian cepat dan filter berdasarkan kelas atau angkatan.</p>
                    </div>
                </div>
                <div class="bg-blue-50 rounded-xl p-4 mono text-xs" style="color:var(--blue-deep)">
                    <div class="flex items-center gap-2 mb-2"><span class="w-2 h-2 bg-blue-400 rounded-full"></span> SISWA_001 · Andi Pratama · XII IPA 1</div>
                    <div class="flex items-center gap-2 mb-2"><span class="w-2 h-2 bg-green-400 rounded-full"></span> SISWA_002 · Rina Sari · X IPS 3</div>
                    <div class="flex items-center gap-2"><span class="w-2 h-2 bg-yellow-400 rounded-full"></span> SISWA_003 · Budi Santoso · XI IPA 2</div>
                </div>
            </div>

            <!-- pelanggaran poin card -->
            <div class="card card-blue col-span-12 md:col-span-6 reveal" style="transition-delay:.1s">
                <div class="icon-wrap mb-4">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none">
                        <path d="M12 9v2m0 4h.01M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z" stroke="#fff" stroke-width="2" stroke-linecap="round" />
                    </svg>
                </div>
                <h3 class="font-bold text-xl mb-2">Sistem Poin Pelanggaran</h3>
                <p class="text-blue-200 text-sm mb-5">Setiap pelanggaran memiliki nilai poin tersendiri. Akumulasi poin memicu tindakan otomatis.</p>
                <div class="space-y-3">
                    <div class="flex items-center justify-between bg-white/10 rounded-lg px-4 py-2">
                        <span class="text-sm">Terlambat masuk sekolah</span>
                        <span class="mono text-sm font-bold text-yellow-300">+5 poin</span>
                    </div>
                    <div class="flex items-center justify-between bg-white/10 rounded-lg px-4 py-2">
                        <span class="text-sm">Tidak memakai seragam</span>
                        <span class="mono text-sm font-bold text-orange-300">+10 poin</span>
                    </div>
                    <div class="flex items-center justify-between bg-white/10 rounded-lg px-4 py-2">
                        <span class="text-sm">Perkelahian</span>
                        <span class="mono text-sm font-bold text-red-300">+50 poin</span>
                    </div>
                </div>
            </div>

            <!-- 3 small cards row -->
            <div class="card col-span-12 sm:col-span-4 reveal" style="transition-delay:.15s">
                <div class="stat-ring mb-4">100%</div>
                <h4 class="font-bold mb-1">Berbasis Web</h4>
                <p class="text-sm" style="color:var(--muted)">Akses dari mana saja tanpa instalasi perangkat lunak tambahan.</p>
            </div>

            <div class="card col-span-12 sm:col-span-4 reveal" style="transition-delay:.2s">
                <div class="stat-ring mb-4" style="border-color:#22C55E;color:#22C55E">PDF</div>
                <h4 class="font-bold mb-1">Cetak Instan</h4>
                <p class="text-sm" style="color:var(--muted)">Semua dokumen resmi siap cetak langsung dari sistem tanpa format manual.</p>
            </div>

            <div class="card col-span-12 sm:col-span-4 reveal" style="transition-delay:.25s">
                <div class="stat-ring mb-4" style="border-color:#F59E0B;color:#F59E0B">Multi</div>
                <h4 class="font-bold mb-1">Multi Pengguna</h4>
                <p class="text-sm" style="color:var(--muted)">Beberapa guru dapat mengakses secara bersamaan dengan hak yang sesuai.</p>
            </div>

        </div>
    </section>

    <!-- ───────────── ALUR KERJA ───────────── -->
    <section id="alur" class="py-16 px-6" style="background:var(--ink);z-index:1;position:relative">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-12 reveal">
                <div class="pill mb-4 mx-auto w-fit" style="background:rgba(255,255,255,0.08);color:#93C5FD">Alur Kerja</div>
                <h2 class="font-extrabold text-4xl text-white mb-3" style="letter-spacing:-.02em">Dari Pelanggaran ke Tindakan,<br />Dalam Hitungan Klik</h2>
                <p class="text-blue-300">Proses yang terstruktur memastikan tidak ada pelanggaran yang terlewat.</p>
            </div>

            <div class="grid grid-cols-12 gap-6 items-start">
                <!-- timeline -->
                <div class="col-span-12 md:col-span-5 reveal" style="transition-delay:.05s">
                    <div class="space-y-0">
                        <!-- step 1 -->
                        <div class="flex gap-4">
                            <div class="flex flex-col items-center">
                                <div class="tl-dot" style="background:#60A5FA"></div>
                                <div class="tl-line"></div>
                            </div>
                            <div class="pb-8">
                                <span class="mono text-xs text-blue-400">01</span>
                                <h4 class="text-white font-bold mt-1 mb-1">Guru Mencatat Pelanggaran</h4>
                                <p class="text-sm text-blue-300">Pilih siswa, jenis pelanggaran, dan tanggal. Poin tertambah otomatis.</p>
                            </div>
                        </div>
                        <!-- step 2 -->
                        <div class="flex gap-4">
                            <div class="flex flex-col items-center">
                                <div class="tl-dot" style="background:#818CF8"></div>
                                <div class="tl-line"></div>
                            </div>
                            <div class="pb-8">
                                <span class="mono text-xs text-blue-400">02</span>
                                <h4 class="text-white font-bold mt-1 mb-1">Sistem Akumulasi Poin</h4>
                                <p class="text-sm text-blue-300">Total poin dihitung real-time. Ambang batas memicu notifikasi tindak lanjut.</p>
                            </div>
                        </div>
                        <!-- step 3 -->
                        <div class="flex gap-4">
                            <div class="flex flex-col items-center">
                                <div class="tl-dot" style="background:#A78BFA"></div>
                                <div class="tl-line"></div>
                            </div>
                            <div class="pb-8">
                                <span class="mono text-xs text-blue-400">03</span>
                                <h4 class="text-white font-bold mt-1 mb-1">Cetak Dokumen Resmi</h4>
                                <p class="text-sm text-blue-300">Pilih dokumen yang diperlukan: perjanjian siswa, surat orang tua, atau laporan.</p>
                            </div>
                        </div>
                        <!-- step 4 -->
                        <div class="flex gap-4">
                            <div class="flex flex-col items-center">
                                <div class="tl-dot" style="background:#F472B6"></div>
                            </div>
                            <div class="pb-4">
                                <span class="mono text-xs text-blue-400">04</span>
                                <h4 class="text-white font-bold mt-1 mb-1">Tindak Lanjut &amp; Arsip</h4>
                                <p class="text-sm text-blue-300">Seluruh dokumen tersimpan digital. Mudah dicari dan dipantau kapan saja.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- document showcase -->
                <div class="col-span-12 md:col-span-7 grid grid-cols-2 gap-4 reveal" id="dokumen" style="transition-delay:.1s">

                    <div class="card" style="background:#13183F;border-color:rgba(255,255,255,.07)">
                        <div class="icon-wrap mb-3" style="background:rgba(99,102,241,.2)">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none">
                                <path d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" stroke="#818CF8" stroke-width="2" stroke-linecap="round" />
                            </svg>
                        </div>
                        <p class="text-white font-bold text-sm">Surat Perjanjian Siswa</p>
                        <p class="text-xs text-blue-400 mt-1">Pernyataan resmi dari siswa beserta sanksi yang disepakati.</p>
                    </div>

                    <div class="card" style="background:#13183F;border-color:rgba(255,255,255,.07)">
                        <div class="icon-wrap mb-3" style="background:rgba(52,211,153,.15)">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none">
                                <path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" stroke="#34D399" stroke-width="2" stroke-linecap="round" />
                            </svg>
                        </div>
                        <p class="text-white font-bold text-sm">Surat Perjanjian Orang Tua</p>
                        <p class="text-xs text-blue-400 mt-1">Komitmen tertulis dari wali murid terkait pembinaan anak.</p>
                    </div>

                    <div class="card" style="background:#13183F;border-color:rgba(255,255,255,.07)">
                        <div class="icon-wrap mb-3" style="background:rgba(251,191,36,.15)">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none">
                                <path d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" stroke="#FBBF24" stroke-width="2" stroke-linecap="round" />
                            </svg>
                        </div>
                        <p class="text-white font-bold text-sm">Surat Panggilan Wali</p>
                        <p class="text-xs text-blue-400 mt-1">Undangan resmi untuk orang tua/wali hadir ke sekolah.</p>
                    </div>

                    <div class="card" style="background:#13183F;border-color:rgba(255,255,255,.07)">
                        <div class="icon-wrap mb-3" style="background:rgba(244,63,94,.15)">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none">
                                <path d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" stroke="#F43F5E" stroke-width="2" stroke-linecap="round" />
                            </svg>
                        </div>
                        <p class="text-white font-bold text-sm">Surat Pindah Sekolah</p>
                        <p class="text-xs text-blue-400 mt-1">Dokumen mutasi atau pemindahan siswa secara resmi dan terstruktur.</p>
                    </div>

                    <!-- report full-width -->
                    <div class="card col-span-2" style="background:linear-gradient(135deg,#1E2D6E 0%,#13183F 100%);border-color:rgba(255,255,255,.07)">
                        <div class="flex items-center gap-4">
                            <div class="icon-wrap" style="background:rgba(11,47,255,.3);width:48px;height:48px">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none">
                                    <path d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" stroke="#60A5FA" stroke-width="2" stroke-linecap="round" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-white font-bold">Laporan Pelanggaran Lengkap</p>
                                <p class="text-xs text-blue-400 mt-1">Rekap komprehensif per siswa, per kelas, atau seluruh sekolah. Bisa dicetak sebagai laporan periodik untuk kepala sekolah.</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- ───────────── MANFAAT ───────────── -->
    <section id="manfaat" class="py-16 px-6 max-w-6xl mx-auto" style="z-index:1;position:relative">
        <div class="text-center mb-12 reveal">
            <div class="pill mb-4 mx-auto w-fit">Mengapa Pointer?</div>
            <h2 class="font-extrabold text-4xl mb-3" style="letter-spacing:-.02em">Solusi Nyata untuk<br />Tantangan Nyata</h2>
        </div>

        <div class="grid grid-cols-12 gap-4">

            <div class="card col-span-12 md:col-span-8 reveal" style="transition-delay:.05s">
                <div class="flex flex-col md:flex-row gap-8">
                    <div class="flex-1">
                        <h3 class="font-bold text-2xl mb-3">Sebelum Pointer</h3>
                        <div class="space-y-3">
                            <div class="flex items-start gap-3 text-sm" style="color:var(--muted)">
                                <span class="text-red-400 mt-0.5">✗</span> Data pelanggaran tersebar di buku catatan fisik
                            </div>
                            <div class="flex items-start gap-3 text-sm" style="color:var(--muted)">
                                <span class="text-red-400 mt-0.5">✗</span> Sulit melacak riwayat pelanggaran siswa
                            </div>
                            <div class="flex items-start gap-3 text-sm" style="color:var(--muted)">
                                <span class="text-red-400 mt-0.5">✗</span> Surat dan dokumen dibuat manual satu per satu
                            </div>
                            <div class="flex items-start gap-3 text-sm" style="color:var(--muted)">
                                <span class="text-red-400 mt-0.5">✗</span> Laporan ke kepala sekolah memakan waktu lama
                            </div>
                            <div class="flex items-start gap-3 text-sm" style="color:var(--muted)">
                                <span class="text-red-400 mt-0.5">✗</span> Potensi data hilang atau tidak konsisten
                            </div>
                        </div>
                    </div>
                    <div class="w-px bg-blue-100 hidden md:block"></div>
                    <div class="flex-1">
                        <h3 class="font-bold text-2xl mb-3" style="color:var(--blue-deep)">Sesudah Pointer</h3>
                        <div class="space-y-3">
                            <div class="flex items-start gap-3 text-sm">
                                <span class="text-green-500 mt-0.5">✓</span> Semua data tersimpan digital, aman, dan terstruktur
                            </div>
                            <div class="flex items-start gap-3 text-sm">
                                <span class="text-green-500 mt-0.5">✓</span> Riwayat lengkap tersedia dalam satu pencarian
                            </div>
                            <div class="flex items-start gap-3 text-sm">
                                <span class="text-green-500 mt-0.5">✓</span> Dokumen resmi tercetak otomatis dari template
                            </div>
                            <div class="flex items-start gap-3 text-sm">
                                <span class="text-green-500 mt-0.5">✓</span> Laporan dihasilkan instan kapanpun dibutuhkan
                            </div>
                            <div class="flex items-start gap-3 text-sm">
                                <span class="text-green-500 mt-0.5">✓</span> Data terpusat, konsisten, dan mudah diaudit
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-span-12 md:col-span-4 grid gap-4">
                <div class="card card-blue reveal" style="transition-delay:.1s">
                    <div class="big-number mb-2">5×</div>
                    <p class="text-blue-200 text-sm">Lebih cepat dalam pembuatan laporan pelanggaran dibanding cara manual</p>
                </div>
                <div class="card reveal" style="transition-delay:.15s">
                    <div class="big-number mb-2" style="color:var(--blue-deep)">0</div>
                    <p class="text-sm" style="color:var(--muted)">Dokumen hilang. Semua tersimpan digital dengan backup otomatis.</p>
                </div>
            </div>

            <!-- 3 manfaat tambahan -->
            <div class="card col-span-12 sm:col-span-4 reveal" style="transition-delay:.2s">
                <div class="text-3xl mb-3">🎯</div>
                <h4 class="font-bold mb-2">Untuk Guru BK</h4>
                <p class="text-sm" style="color:var(--muted)">Fokus pada pembinaan, bukan pencatatan manual. Sistem mengurus administrasinya.</p>
            </div>
            <div class="card col-span-12 sm:col-span-4 reveal" style="transition-delay:.25s">
                <div class="text-3xl mb-3">👨‍👩‍👧</div>
                <h4 class="font-bold mb-2">Untuk Orang Tua</h4>
                <p class="text-sm" style="color:var(--muted)">Komunikasi lebih transparan melalui dokumen resmi yang terstandar dan tepat waktu.</p>
            </div>
            <div class="card col-span-12 sm:col-span-4 reveal" style="transition-delay:.3s">
                <div class="text-3xl mb-3">🏫</div>
                <h4 class="font-bold mb-2">Untuk Kepala Sekolah</h4>
                <p class="text-sm" style="color:var(--muted)">Visibilitas penuh atas kondisi kedisiplinan sekolah lewat dashboard dan laporan periodik.</p>
            </div>

        </div>
    </section>

    <!-- ───────────── CTA FOOTER ───────────── -->
    <section class="py-20 px-6 footer-grad" style="z-index:1;position:relative">
        <div class="max-w-3xl mx-auto text-center reveal">
            <div class="card" style="background:linear-gradient(135deg,#0B2FFF 0%,#1E4FFF 60%,#3B82F6 100%);border:none;border-radius:24px;padding:48px 40px">
                <div class="text-4xl mb-4">🚀</div>
                <h2 class="font-extrabold text-4xl text-white mb-4" style="letter-spacing:-.02em">Siap Transformasi<br />Administrasi Sekolah Anda?</h2>
                <p class="text-blue-200 mb-8 text-lg">Pointer hadir untuk membantu sekolah mengelola kedisiplinan siswa secara lebih efisien, akurat, dan profesional.</p>
                <div class="flex gap-4 justify-center flex-wrap">
                    <button class="btn-primary" style="background:#fff;color:var(--blue-deep)">Mulai Gunakan Pointer →</button>
                    <button class="btn-ghost" style="border-color:rgba(255,255,255,.3);color:#fff">Hubungi Kami</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer minimal -->
    <footer class="border-t py-8 px-6" style="border-color:var(--border)">
        <div class="max-w-6xl mx-auto flex items-center justify-between flex-wrap gap-4">
            <div class="flex items-center gap-2">
                <div class="w-7 h-7 rounded-lg bg-blue-600 flex items-center justify-center">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none">
                        <path d="M9 12l2 2 4-4M21 12a9 9 0 11-18 0 9 9 0 0118 0z" stroke="#fff" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
                <span class="font-extrabold text-base" style="color:var(--ink)">Si<span style="color:var(--blue-deep)">Poin</span></span>
            </div>
            <p class="text-sm" style="color:var(--muted)">Sistem Informasi Poin Pelanggaran Siswa · Solusi Digital untuk Sekolah Modern</p>
            <p class="mono text-xs" style="color:var(--muted)">v1.0.0 · 2025</p>
        </div>
    </footer>

    <script>
        // Scroll reveal
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(e => {
                if (e.isIntersecting) {
                    e.target.classList.add('visible');
                    observer.unobserve(e.target);
                }
            });
        }, {
            threshold: 0.1
        });

        document.querySelectorAll('.reveal').forEach(el => observer.observe(el));

        // Smooth scroll
        document.querySelectorAll('a[href^="#"]').forEach(a => {
            a.addEventListener('click', e => {
                e.preventDefault();
                const target = document.querySelector(a.getAttribute('href'));
                if (target) target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            });
        });
    </script>
</body>

</html>