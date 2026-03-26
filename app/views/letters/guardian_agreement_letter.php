<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Surat Pernyataan Orang Tua</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Times+New+Roman&family=Linux+Libertine+O&display=swap" rel="stylesheet" />
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&display=swap');

    body {
      font-family: 'Libre Baskerville', 'Times New Roman', serif;
      background: #e5e5e5;
    }

    .page {
      width: 210mm;
      min-height: 297mm;
      background: white;
      margin: 0 auto;
      padding: 15mm 20mm 20mm 25mm;
      box-shadow: 0 4px 24px rgba(0,0,0,0.15);
    }

    @media print {
      body {
        background: white;
        margin: 0;
        padding: 0;
      }
      .page {
        box-shadow: none;
        margin: 0;
        padding: 15mm 20mm 20mm 25mm;
        width: 100%;
        min-height: 100vh;
      }
      .no-print {
        display: none !important;
      }
    }

    .header-border {
      border-top: 3px solid #1a1a1a;
      border-bottom: 1.5px solid #1a1a1a;
    }

    .title-section {
      letter-spacing: 0.05em;
    }

    .field-row td {
      vertical-align: top;
      padding-bottom: 6px;
    }

    .underline-field {
      border-bottom: 1px solid #333;
      display: inline-block;
      min-width: 220px;
    }
  </style>
</head>
<body class="py-8">

  <!-- Print Button -->
  <div class="no-print flex justify-center mb-4">
    <button
      onclick="window.print()"
      class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded shadow transition"
    >
      🖨️ Print / Save as PDF
    </button>
  </div>

  <div class="page">

    <!-- HEADER -->
    <!-- <div class="flex items-center gap-4 pb-2">
      <div class="shrink-0">
        <img
          src="https://smkti-baliglobal.sch.id/assets/logo.png"
          alt="Logo SMK TI Bali Global"
          class="w-16 h-16 object-contain"
          onerror="this.style.display='none'"
        />
      </div> -->

      <!-- School Info -->
      <!-- <div class="flex-1 text-center leading-tight">
        <div class="text-[8px] font-semibold tracking-widest text-gray-600 mb-0.5" style="font-size:7px;">
          ᬲᬾᬓᭀᬮᬄᬫᭂᬦᭂᬗᬄᬓᭂᬚᬸᬭᬸᬫᬦ᭄ᬢᭂᬓ᭄ᬦᭀᬮᭀᬕᬶᬇᬦ᭄ᬓᭀᬭᬫᬲᬶᬢ᭄ᬩᬮᬶᬕ᭄ᬮᭀᬩᬮ᭄
        </div>
        <div class="text-[10px] font-bold tracking-wider text-gray-700 uppercase" style="font-size:9px;">
          SEKOLAH MENENGAH KEJURUAN TEKNOLOGI INFORMASI BALI GLOBAL
        </div>
        <div class="text-[11px] font-black tracking-widest text-gray-900 uppercase my-0.5" style="font-size:11px; letter-spacing:0.12em;">
          SMK TI BALI GLOBAL DENPASAR
        </div>
        <div class="text-[7.5px] text-gray-600 leading-relaxed" style="font-size:7.5px;">
          JL. TJ. BUNGKAK NO.8 DENPASAR TELP. (0361) 261867 FAX. (0361) 261807<br/>
          website : www.smkti-baliglobal.sch.id | email : admin@smkti-baliglobal.sch.id
        </div>
      </div> -->

      <img class="w-full pb-4" src="/assets/icons/kop.jpg" alt="">
    <!-- </div> -->

    <!-- Header Border Line -->
    <!-- <div class="header-border mb-5"></div> -->

    <!-- DOCUMENT TITLE -->
    <div class="title-section text-center mb-6">
      <h1 class="text-base font-bold tracking-tight uppercase">
        SURAT PERNYATAAN SISWA
      </h1>
    </div>

    <!-- OPENING -->
    <p class="text-sm mb-4 text-justify leading-relaxed">
      Yang bertandatangan di bawah ini orang tua/wali siswa SMK TI Bali Global Denpasar :
    </p>

    <!-- DATA TABLE -->
    <table class="w-full text-sm mb-6 field-row" style="border-collapse: collapse;">
      <tbody>
        <tr class="field-row">
          <td class="w-36 pr-2 py-1">Nama</td>
          <td class="w-4 pr-2 py-1">:</td>
          <td class="py-1 border-b border-gray-400 w-full">
            <span class="editable" contenteditable="true">Bagus Ahmad</span>
          </td>
        </tr>
        <tr class="field-row">
          <td class="pr-2 py-1">Tempat/ tanggal Lahir</td>
          <td class="pr-2 py-1">:</td>
          <td class="py-1 border-b border-gray-400">
            <span class="editable" contenteditable="true">Denpasar/ 23 Maret 2026</span>
          </td>
        </tr>
        <tr class="field-row">
          <td class="pr-2 py-1">Pekerjaan</td>
          <td class="pr-2 py-1">:</td>
          <td class="py-1 border-b border-gray-400">
            <span class="editable" contenteditable="true">Dokter Spesialis</span>
          </td>
        </tr>
        <tr class="field-row">
          <td class="pr-2 py-1">Alamat Rumah</td>
          <td class="pr-2 py-1">:</td>
          <td class="py-1 border-b border-gray-400">
            <span class="editable" contenteditable="true">Jalan Nangka 2 A, Gang Rujak</span>
          </td>
        </tr>
        <tr class="field-row">
          <td class="pr-2 py-1">No. Hp./Telp.</td>
          <td class="pr-2 py-1">:</td>
          <td class="py-1 border-b border-gray-400">
            <span class="editable" contenteditable="true">6281679485408</span>
          </td>
        </tr>
      </tbody>
    </table>

    <!-- BODY PARAGRAPH 1 -->
    <p class="text-sm mb-4 text-justify leading-relaxed">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Menyatakan memang benar sanggup membina anak kami yang bernama
      <strong><span class="editable" contenteditable="true">Abdullah Musa</span></strong>,
      Kelas :
      <strong><u><span class="editable" contenteditable="true">XII RPL 1</span></u></strong>
      untuk lebih disiplin mengikuti proses pembelajaran dan mengikuti Tata Tertib Sekolah.
    </p>

    <!-- BODY PARAGRAPH 2 -->
    <p class="text-sm mb-8 text-justify leading-relaxed">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Demikian pernyataan kami dan jika tidak sesuai dengan pernyataan diatas, anak kami dapat
      dikeluarkan dari sekolah ini dengan rekomendasi pindah ke SMK lain yang serumpun.
    </p>

    <!-- SIGNATURE SECTION -->
    <div class="flex justify-end mb-8">
      <div class="text-center text-sm" style="min-width: 180px;">
        <p class="mb-1">
          <span class="editable" contenteditable="true">Denpasar</span>, <span class="editable" contenteditable="true">24 Maret 2026</span>
        </p>
        <p>Yang membuat pernyataan</p>
        <p class="mb-16">Orang Tua/Wali siswa</p>
        <div class="border-b border-gray-700 mx-auto mb-1" style="width:160px;"></div>
        <p class="font-bold">
          <span class="editable" contenteditable="true">Bagus Ahmad</span>
        </p>
      </div>
    </div>

    <!-- NB SECTION -->
    <div class="text-sm">
      <p class="font-bold mb-1">NB :</p>
      <p class="underline text-justify italic leading-relaxed">
        <span class="editable" contenteditable="true">
          Jika siswa tidak bisa mengikuti proses pembelajaran sampai bulan Juni 2026 maka
          Siswa dinyatakan mengundurkan diri.
        </span>
      </p>
    </div>

  </div>

  <!-- Helper hint for editing -->
  <div class="no-print text-center mt-3 text-gray-500 text-xs">
    💡 Click on any text to edit it before printing.
  </div>

</body>
</html>