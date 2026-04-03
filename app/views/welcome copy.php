<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>VioTrack — Student Violation Management System</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Space+Mono:wght@400;700&family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;1,9..40,300&display=swap" rel="stylesheet"/>
  <style>
    :root {
      --blue-primary: #1D4ED8;
      --blue-mid: #2563EB;
      --blue-light: #DBEAFE;
      --blue-dark: #1E3A8A;
      --accent: #0EA5E9;
      --grid-color: rgba(29, 78, 216, 0.07);
    }
    * { box-sizing: border-box; }
    body { font-family: 'DM Sans', sans-serif; background: #fff; overflow-x: hidden; }
    .mono { font-family: 'Space Mono', monospace; }

    .grid-bg {
      background-image:
        linear-gradient(var(--grid-color) 1px, transparent 1px),
        linear-gradient(90deg, var(--grid-color) 1px, transparent 1px);
      background-size: 40px 40px;
    }

    @keyframes scan {
      0% { transform: translateY(-100%); opacity: 0; }
      10% { opacity: 1; }
      90% { opacity: 1; }
      100% { transform: translateY(100vh); opacity: 0; }
    }
    .scan-line {
      position: fixed; top: 0; left: 0; right: 0; height: 2px;
      background: linear-gradient(90deg, transparent, var(--accent), transparent);
      animation: scan 6s linear infinite;
      pointer-events: none; z-index: 50;
    }

    @keyframes fadeUp {
      from { opacity: 0; transform: translateY(28px); }
      to   { opacity: 1; transform: translateY(0); }
    }
    .fade-up { opacity: 0; animation: fadeUp 0.7s ease forwards; }
    .delay-1 { animation-delay: 0.1s; }
    .delay-2 { animation-delay: 0.22s; }
    .delay-3 { animation-delay: 0.36s; }
    .delay-4 { animation-delay: 0.50s; }
    .delay-5 { animation-delay: 0.65s; }
    .delay-6 { animation-delay: 0.80s; }

    @keyframes blink { 0%,100%{opacity:1} 50%{opacity:0} }
    .cursor::after {
      content: '▮'; display: inline-block;
      animation: blink 1s step-start infinite;
      color: var(--blue-mid); font-size: 0.85em; margin-left: 2px;
    }

    .nav-scrolled {
      box-shadow: 0 1px 0 rgba(29,78,216,0.12), 0 4px 24px rgba(29,78,216,0.06);
      background: rgba(255,255,255,0.96);
      backdrop-filter: blur(12px);
    }

    .feat-card {
      border: 1px solid #E2E8F0;
      transition: border-color 0.25s, box-shadow 0.25s, transform 0.25s;
      position: relative; overflow: hidden;
    }
    .feat-card::before {
      content: ''; position: absolute; inset: 0;
      background: linear-gradient(135deg, rgba(29,78,216,0.04) 0%, transparent 60%);
      opacity: 0; transition: opacity 0.3s;
    }
    .feat-card:hover {
      border-color: #2563EB;
      box-shadow: 0 0 0 1px #2563EB, 0 8px 32px rgba(29,78,216,0.10);
      transform: translateY(-3px);
    }
    .feat-card:hover::before { opacity: 1; }

    .bracket { position: relative; }
    .bracket::before, .bracket::after {
      content: ''; position: absolute;
      width: 14px; height: 14px;
      border-color: var(--blue-mid); border-style: solid;
    }
    .bracket::before { top: -1px; left: -1px; border-width: 2px 0 0 2px; }
    .bracket::after  { bottom: -1px; right: -1px; border-width: 0 2px 2px 0; }

    .tag {
      font-family: 'Space Mono', monospace;
      font-size: 0.68rem; letter-spacing: 0.08em;
      background: var(--blue-light); color: var(--blue-dark);
      padding: 2px 10px; border-radius: 2px;
    }

    .dot-divider { display: flex; align-items: center; gap: 12px; }
    .dot-divider::before, .dot-divider::after {
      content: ''; flex: 1; height: 1px; background: #E2E8F0;
    }

    @keyframes pulse-ring {
      0%   { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(37,99,235,0.5); }
      70%  { transform: scale(1);    box-shadow: 0 0 0 8px rgba(37,99,235,0); }
      100% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(37,99,235,0); }
    }
    .pulse-dot {
      width: 10px; height: 10px; background: #22C55E;
      border-radius: 50%; animation: pulse-ring 2s infinite;
    }

    .cta-btn {
      background: var(--blue-primary); color: white;
      font-family: 'Space Mono', monospace;
      font-size: 0.82rem; letter-spacing: 0.05em;
      padding: 14px 32px;
      border: 2px solid var(--blue-primary);
      transition: background 0.2s, color 0.2s, box-shadow 0.2s, transform 0.15s;
      cursor: pointer; position: relative; overflow: hidden;
    }
    .cta-btn:hover {
      background: var(--blue-dark); border-color: var(--blue-dark);
      box-shadow: 0 6px 28px rgba(29,78,216,0.35);
      transform: translateY(-1px);
    }
    .cta-btn.outline { background: transparent; color: var(--blue-primary); }
    .cta-btn.outline:hover { background: var(--blue-primary); color: white; }

    ::-webkit-scrollbar { width: 6px; }
    ::-webkit-scrollbar-track { background: #F8FAFF; }
    ::-webkit-scrollbar-thumb { background: #BFDBFE; border-radius: 3px; }

    .noise {
      position: absolute; inset: 0; pointer-events: none;
      background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.03'/%3E%3C/svg%3E");
      background-size: 200px 200px; opacity: 0.4;
    }

    @media (max-width: 640px) { .hero-title { font-size: 2.4rem; } }
  </style>
</head>
<body class="text-slate-800">

  <div class="scan-line"></div>

  <!-- NAV -->
  <nav id="navbar" class="fixed top-0 left-0 right-0 z-40 transition-all duration-300 py-4">
    <div class="max-w-6xl mx-auto px-6 flex items-center justify-between">
      <a href="#" class="flex items-center gap-3">
        <div class="w-8 h-8 bg-blue-700 flex items-center justify-center" style="clip-path: polygon(10% 0%, 90% 0%, 100% 10%, 100% 90%, 90% 100%, 10% 100%, 0% 90%, 0% 10%)">
          <span class="text-white text-xs font-bold mono">VT</span>
        </div>
        <span class="mono font-bold text-slate-900 tracking-tight text-base">VioTrack</span>
      </a>
      <div class="hidden md:flex items-center gap-8 text-sm text-slate-500 font-medium">
        <a href="#features" class="hover:text-blue-700 transition-colors">Features</a>
        <a href="#modules" class="hover:text-blue-700 transition-colors">Modules</a>
        <a href="#stats" class="hover:text-blue-700 transition-colors">Overview</a>
        <a href="#cta" class="cta-btn text-sm px-5 py-2.5">Get Started →</a>
      </div>
    </div>
  </nav>

  <!-- HERO -->
  <section class="relative min-h-screen grid-bg flex flex-col items-center justify-center pt-24 pb-16 overflow-hidden">
    <div class="noise"></div>
    <div class="absolute top-1/4 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] rounded-full pointer-events-none"
      style="background: radial-gradient(circle, rgba(37,99,235,0.10) 0%, transparent 70%);"></div>

    <div class="fade-up delay-1 flex items-center gap-2 mb-8">
      <div class="pulse-dot"></div>
      <span class="tag">SCHOOL MANAGEMENT SYSTEM · v2.0</span>
    </div>

    <h1 class="hero-title fade-up delay-2 text-center font-bold leading-[1.08] tracking-tight text-slate-900 max-w-3xl px-6"
      style="font-size: clamp(2.6rem, 6vw, 4.4rem);">
      Student Violation<br/>
      <span style="color: var(--blue-mid);" class="cursor">Tracking System</span>
    </h1>

    <p class="fade-up delay-3 mt-6 text-center text-slate-500 text-lg max-w-xl px-6 leading-relaxed" style="font-weight:300;">
      A unified platform for managing student discipline, teacher oversight, documentation, and institutional reporting — built for modern schools.
    </p>

    <div class="fade-up delay-4 mt-10 flex flex-wrap gap-4 justify-center px-6">
      <button class="cta-btn">Access Dashboard →</button>
      <button class="cta-btn outline">View Documentation</button>
    </div>

    <div class="fade-up delay-5 mt-16 bracket bg-white border border-slate-200 rounded-sm px-6 py-4 max-w-md w-full mx-6 shadow-sm">
      <div class="flex items-center gap-2 mb-3">
        <span class="w-3 h-3 rounded-full bg-red-400"></span>
        <span class="w-3 h-3 rounded-full bg-yellow-400"></span>
        <span class="w-3 h-3 rounded-full bg-green-400"></span>
        <span class="mono text-xs text-slate-400 ml-2">system.init</span>
      </div>
      <div class="mono text-xs text-slate-500 space-y-1.5">
        <p><span class="text-blue-600">›</span> Connecting to school database... <span class="text-green-500">OK</span></p>
        <p><span class="text-blue-600">›</span> Loading student records... <span class="text-green-500">3,421 found</span></p>
        <p><span class="text-blue-600">›</span> Violation engine... <span class="text-green-500">active</span></p>
        <p><span class="text-blue-600">›</span> Report generator... <span class="text-green-500">ready</span></p>
      </div>
    </div>

    <div class="fade-up delay-6 absolute bottom-8 left-1/2 -translate-x-1/2 flex flex-col items-center gap-1.5">
      <span class="mono text-xs text-slate-400 tracking-widest">SCROLL</span>
      <div class="w-px h-8 bg-gradient-to-b from-blue-400 to-transparent"></div>
    </div>
  </section>

  <!-- STATS BAR -->
  <section id="stats" class="border-y border-slate-100 bg-blue-700 py-10">
    <div class="max-w-6xl mx-auto px-6 grid grid-cols-2 md:grid-cols-4 gap-8">
      <div class="text-center">
        <div class="mono text-3xl font-bold text-white">3,400+</div>
        <div class="text-blue-200 text-sm mt-1 font-light">Student Records</div>
      </div>
      <div class="text-center">
        <div class="mono text-3xl font-bold text-white">150+</div>
        <div class="text-blue-200 text-sm mt-1 font-light">Teachers Managed</div>
      </div>
      <div class="text-center">
        <div class="mono text-3xl font-bold text-white">12</div>
        <div class="text-blue-200 text-sm mt-1 font-light">Document Types</div>
      </div>
      <div class="text-center">
        <div class="mono text-3xl font-bold text-white">99.9%</div>
        <div class="text-blue-200 text-sm mt-1 font-light">System Uptime</div>
      </div>
    </div>
  </section>

  <!-- FEATURES -->
  <section id="features" class="py-24 max-w-6xl mx-auto px-6">
    <div class="text-center mb-16">
      <div class="dot-divider mb-4"><span class="tag">CORE FEATURES</span></div>
      <h2 class="text-3xl md:text-4xl font-bold text-slate-900 mt-4">Everything in one place</h2>
      <p class="text-slate-500 mt-3 text-base max-w-lg mx-auto font-light">From student intake to disciplinary action — every workflow is handled with precision and traceability.</p>
    </div>

    <div class="grid md:grid-cols-3 gap-6">
      <div class="feat-card rounded-sm p-7 bg-white">
        <div class="w-10 h-10 bg-blue-50 flex items-center justify-center rounded-sm mb-5 border border-blue-100">
          <svg class="w-5 h-5 text-blue-700" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
        </div>
        <div class="tag mb-3">PEOPLE</div>
        <h3 class="font-semibold text-slate-900 text-lg mb-2">Student & Teacher Data</h3>
        <p class="text-slate-500 text-sm leading-relaxed font-light">Centralized profiles for every student and teacher. Manage class assignments, contact details, and academic history with ease.</p>
      </div>

      <div class="feat-card rounded-sm p-7 bg-white">
        <div class="w-10 h-10 bg-red-50 flex items-center justify-center rounded-sm mb-5 border border-red-100">
          <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
        </div>
        <div class="tag mb-3" style="background:#FEE2E2;color:#991B1B;">DISCIPLINE</div>
        <h3 class="font-semibold text-slate-900 text-lg mb-2">Violation Point Tracking</h3>
        <p class="text-slate-500 text-sm leading-relaxed font-light">Log and categorize rule infractions. Each violation carries weighted points that accumulate into a student's discipline score over time.</p>
      </div>

      <div class="feat-card rounded-sm p-7 bg-white">
        <div class="w-10 h-10 bg-green-50 flex items-center justify-center rounded-sm mb-5 border border-green-100">
          <svg class="w-5 h-5 text-green-700" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
        </div>
        <div class="tag mb-3" style="background:#DCFCE7;color:#166534;">DOCUMENTS</div>
        <h3 class="font-semibold text-slate-900 text-lg mb-2">Automated Document Printing</h3>
        <p class="text-slate-500 text-sm leading-relaxed font-light">Generate and print student agreements, parent agreements, parent call records, and school transfer forms in seconds — properly formatted.</p>
      </div>

      <div class="feat-card rounded-sm p-7 bg-white">
        <div class="w-10 h-10 bg-purple-50 flex items-center justify-center rounded-sm mb-5 border border-purple-100">
          <svg class="w-5 h-5 text-purple-700" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
        </div>
        <div class="tag mb-3" style="background:#F3E8FF;color:#6B21A8;">OUTREACH</div>
        <h3 class="font-semibold text-slate-900 text-lg mb-2">Parent Call Logs</h3>
        <p class="text-slate-500 text-sm leading-relaxed font-light">Record every parental communication with timestamps and outcomes. Keep a verifiable trail for compliance and accountability.</p>
      </div>

      <div class="feat-card rounded-sm p-7 bg-white">
        <div class="w-10 h-10 bg-orange-50 flex items-center justify-center rounded-sm mb-5 border border-orange-100">
          <svg class="w-5 h-5 text-orange-600" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"/></svg>
        </div>
        <div class="tag mb-3" style="background:#FFF7ED;color:#9A3412;">TRANSFERS</div>
        <h3 class="font-semibold text-slate-900 text-lg mb-2">School Transfer Management</h3>
        <p class="text-slate-500 text-sm leading-relaxed font-light">Handle outgoing and incoming student transfers. Attach supporting documents and track transfer status through the entire process.</p>
      </div>

      <div class="feat-card rounded-sm p-7 bg-white">
        <div class="w-10 h-10 bg-blue-50 flex items-center justify-center rounded-sm mb-5 border border-blue-100">
          <svg class="w-5 h-5 text-blue-700" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
        </div>
        <div class="tag mb-3">ANALYTICS</div>
        <h3 class="font-semibold text-slate-900 text-lg mb-2">Violation Reports</h3>
        <p class="text-slate-500 text-sm leading-relaxed font-light">Generate institutional violation reports filterable by class, date range, or infraction type. Export-ready for admin and board review.</p>
      </div>
    </div>
  </section>

  <!-- MODULES -->
  <section id="modules" class="bg-slate-50 border-y border-slate-100 py-24">
    <div class="max-w-6xl mx-auto px-6">
      <div class="text-center mb-16">
        <div class="dot-divider mb-4"><span class="tag">SYSTEM MODULES</span></div>
        <h2 class="text-3xl md:text-4xl font-bold text-slate-900 mt-4">How it works</h2>
      </div>

      <div class="grid md:grid-cols-2 gap-12 items-center">
        <div class="space-y-5">
          <div class="flex gap-4 items-start p-4 border border-slate-200 bg-white rounded-sm hover:border-blue-400 transition-colors group">
            <span class="mono text-xs text-blue-500 mt-0.5 shrink-0">01</span>
            <div>
              <h4 class="font-semibold text-slate-800 group-hover:text-blue-700 transition-colors">Data Management</h4>
              <p class="text-sm text-slate-500 mt-0.5 font-light">Onboard students and teachers, manage class rosters, and keep all records synchronized across the platform.</p>
            </div>
          </div>
          <div class="flex gap-4 items-start p-4 border border-blue-400 bg-white rounded-sm shadow-sm group">
            <span class="mono text-xs text-blue-500 mt-0.5 shrink-0">02</span>
            <div>
              <h4 class="font-semibold text-blue-700">Violation Logging</h4>
              <p class="text-sm text-slate-500 mt-0.5 font-light">Teachers submit violations with category, date, and description. Points are automatically tallied on the student's profile.</p>
            </div>
          </div>
          <div class="flex gap-4 items-start p-4 border border-slate-200 bg-white rounded-sm hover:border-blue-400 transition-colors group">
            <span class="mono text-xs text-blue-500 mt-0.5 shrink-0">03</span>
            <div>
              <h4 class="font-semibold text-slate-800 group-hover:text-blue-700 transition-colors">Agreement & Communication</h4>
              <p class="text-sm text-slate-500 mt-0.5 font-light">Trigger student and parent agreements automatically once point thresholds are exceeded. Log every follow-up.</p>
            </div>
          </div>
          <div class="flex gap-4 items-start p-4 border border-slate-200 bg-white rounded-sm hover:border-blue-400 transition-colors group">
            <span class="mono text-xs text-blue-500 mt-0.5 shrink-0">04</span>
            <div>
              <h4 class="font-semibold text-slate-800 group-hover:text-blue-700 transition-colors">Reporting & Escalation</h4>
              <p class="text-sm text-slate-500 mt-0.5 font-light">Generate printable reports for admin review. Escalate to school transfers when disciplinary thresholds are reached.</p>
            </div>
          </div>
        </div>

        <!-- Mock dashboard card -->
        <div class="bracket bg-white border border-slate-200 rounded-sm p-6 shadow-sm">
          <div class="flex items-center justify-between mb-5">
            <div>
              <p class="mono text-xs text-slate-400">ACTIVE CASE</p>
              <p class="font-semibold text-slate-900 mt-0.5">Ahmad Rizky — Grade 10B</p>
            </div>
            <span class="inline-block bg-red-100 text-red-700 mono text-xs px-2 py-1 rounded-sm">HIGH RISK</span>
          </div>
          <div class="mb-5">
            <div class="flex justify-between mono text-xs text-slate-400 mb-1.5">
              <span>Violation Points</span><span>78 / 100</span>
            </div>
            <div class="h-2 bg-slate-100 rounded-full overflow-hidden">
              <div class="h-full bg-gradient-to-r from-blue-500 to-red-500 rounded-full" style="width:78%"></div>
            </div>
          </div>
          <div class="space-y-2 mb-5">
            <p class="mono text-xs text-slate-400 mb-2">RECENT VIOLATIONS</p>
            <div class="flex justify-between text-sm">
              <span class="text-slate-600">Skipping class</span>
              <span class="mono text-red-500 text-xs">+15 pts</span>
            </div>
            <div class="flex justify-between text-sm">
              <span class="text-slate-600">Dress code violation</span>
              <span class="mono text-orange-500 text-xs">+8 pts</span>
            </div>
            <div class="flex justify-between text-sm">
              <span class="text-slate-600">Disruptive behavior</span>
              <span class="mono text-red-500 text-xs">+20 pts</span>
            </div>
          </div>
          <div class="grid grid-cols-2 gap-2">
            <button class="text-xs mono border border-blue-200 text-blue-700 py-2 hover:bg-blue-50 transition-colors">Print Agreement</button>
            <button class="text-xs mono border border-slate-200 text-slate-600 py-2 hover:bg-slate-50 transition-colors">Call Parent</button>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- CTA -->
  <section id="cta" class="py-28 relative overflow-hidden grid-bg">
    <div class="absolute inset-0" style="background: radial-gradient(ellipse at 50% 50%, rgba(37,99,235,0.07) 0%, transparent 70%);"></div>
    <div class="relative max-w-2xl mx-auto text-center px-6">
      <div class="dot-divider mb-6"><span class="tag">GET STARTED TODAY</span></div>
      <h2 class="text-3xl md:text-5xl font-bold text-slate-900 leading-tight mb-5">
        A disciplinary system <br/> your school can rely on.
      </h2>
      <p class="text-slate-500 font-light text-base mb-10 leading-relaxed">
        Designed for accuracy, accountability, and institutional compliance. Onboard your school in minutes.
      </p>
      <div class="flex flex-wrap gap-4 justify-center">
        <button class="cta-btn">Launch System →</button>
        <button class="cta-btn outline">Request Demo</button>
      </div>
    </div>
  </section>

  <!-- FOOTER -->
  <footer class="border-t border-slate-100 py-10 px-6">
    <div class="max-w-6xl mx-auto flex flex-col md:flex-row items-center justify-between gap-4">
      <div class="flex items-center gap-3">
        <div class="w-7 h-7 bg-blue-700 flex items-center justify-center" style="clip-path: polygon(10% 0%, 90% 0%, 100% 10%, 100% 90%, 90% 100%, 10% 100%, 0% 90%, 0% 10%)">
          <span class="text-white text-xs font-bold mono">VT</span>
        </div>
        <span class="mono text-sm font-bold text-slate-700">VioTrack</span>
        <span class="text-slate-300 text-xs ml-2">Student Violation Management System</span>
      </div>
      <p class="mono text-xs text-slate-400">© 2025 VioTrack · Built for Schools</p>
    </div>
  </footer>

  <script>
    const navbar = document.getElementById('navbar');
    window.addEventListener('scroll', () => {
      navbar.classList.toggle('nav-scrolled', window.scrollY > 20);
    });
    document.querySelectorAll('a[href^="#"]').forEach(a => {
      a.addEventListener('click', e => {
        e.preventDefault();
        const t = document.querySelector(a.getAttribute('href'));
        if (t) t.scrollIntoView({ behavior: 'smooth' });
      });
    });
  </script>
</body>
</html>