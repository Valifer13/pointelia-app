<style>
    @media print {
        /* 1. Sembunyikan elemen yang tidak ingin dicetak secara permanen */
        #header,
        #aside,
        button[onclick="window.print()"],
        .mb-6 /* Kontainer breadcrumb dan judul */ {
            display: none !important;
        }

        /* 2. Reset tinggi dan overflow pada parent agar konten tidak terpotong kertas */
        html, body, #main, section {
            height: auto !important;
            min-height: 100% !important;
            overflow: visible !important;
            background-color: white !important;
            display: block !important;
        }

        /* 3. Pastikan margin dan padding menyesuaikan kertas secara alami */
        @page {
            size: A4; /* atau margin yang sesuai */
            margin: 0;
        }

        .page {
            visibility: visible;
            margin: 0 !important;
            padding: 10mm 20mm !important; /* Sesuaikan dengan kebutuhan cetak */
            box-shadow: none !important;
            border: none !important;
            width: 100% !important;
        }
    }
</style>

<div class="flex flex-col md:flex-row justify-between gap-4 items-start lg:items-center mb-6 bg-white p-4 rounded-md shadow-md">
    <div class="flex flex-col gap-1">
        <h1 class="text-2xl font-semibold tracking-wide text-zinc-600">Detail Pelanggaran <?= $student['name'] ?></h1>
        <?php get_breadcrumb() ?>
    </div>
    <button
        onclick="window.print()"
        class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded shadow transition">
        🖨️ Cetak Ulang
    </button>
</div>

<div class="page relative box-border w-[210mm] min-h-[297mm] p-[20mm] mx-auto my-[10mm] border border-[#D3D3D3] rounded-[5px] bg-white shadow-[0_0_5px_rgba(0,0,0,0.1)] print:m-0 print:shadow-none print:border-none print:w-auto print:h-auto print:bg-transparent print:-mt-[180px] print:py-[10mm] print:px-[20mm]" style="font-family: 'Times New Roman', Times, serif">

    <div class="w-full -mt-[10px]">
        <img src="/assets/icons/kop.jpg" alt="kepala surat" class="w-full">
    </div>

    <div class="text-center font-bold text-[14pt] uppercase mt-4">LAPORAN REKAPITULASI SURAT PERJANJIAN</div>
    <br>

    <div class="text-justify">
        <h1 class="text-2xl font-bold mb-2">Surat Perjanjian Siswa</h1>

        <div class="pl-[30px]">
            <table class="w-full border-collapse border border-black text-center">
                <thead>
                    <tr>
                        <th class="border border-black p-[10px]">No</th>
                        <th class="border border-black p-[10px]">Tanggal Pembuatan Surat</th>
                        <th class="border border-black p-[10px]">NIS</th>
                        <th class="border border-black p-[10px]">Nama Siswa</th>
                        <th class="border border-black p-[10px]">Tingkat</th>
                        <th class="border border-black p-[10px]">Status Dokumen</th>
                        <th class="border border-black p-[10px]">Total Poin</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border border-black p-[10px]">1</td>
                        <td class="border border-black p-[10px]">27 Maret 2026<br>21:17:16</td>
                        <td class="border border-black p-[10px]">9124</td>
                        <td class="border border-black p-[10px]">Ryan</td>
                        <td class="border border-black p-[10px]">XII</td>
                        <td class="border border-black p-[10px]">Selesai</td>
                        <td class="border border-black p-[10px]">32</td>
                    </tr>
                    <tr>
                        <td class="border border-black p-[10px]">2</td>
                        <td class="border border-black p-[10px]">27 Maret 2026<br>08:48:12</td>
                        <td class="border border-black p-[10px]">9125</td>
                        <td class="border border-black p-[10px]">Narin</td>
                        <td class="border border-black p-[10px]">XII</td>
                        <td class="border border-black p-[10px]">Selesai</td>
                        <td class="border border-black p-[10px]">103</td>
                    </tr>
                    <tr>
                        <td class="border border-black p-[10px]">3</td>
                        <td class="border border-black p-[10px]">26 Maret 2026<br>23:47:44</td>
                        <td class="border border-black p-[10px]">9125</td>
                        <td class="border border-black p-[10px]">Narin</td>
                        <td class="border border-black p-[10px]">XII</td>
                        <td class="border border-black p-[10px]">Selesai</td>
                        <td class="border border-black p-[10px]">103</td>
                    </tr>
                    <tr>
                        <td class="border border-black p-[10px]">4</td>
                        <td class="border border-black p-[10px]">26 Maret 2026<br>22:08:37</td>
                        <td class="border border-black p-[10px]">9125</td>
                        <td class="border border-black p-[10px]">Narin</td>
                        <td class="border border-black p-[10px]">XII</td>
                        <td class="border border-black p-[10px]">Selesai</td>
                        <td class="border border-black p-[10px]">103</td>
                    </tr>
                    <tr>
                        <td class="border border-black p-[10px]">5</td>
                        <td class="border border-black p-[10px]">03 April 2026<br>19:21:08</td>
                        <td class="border border-black p-[10px]">9126</td>
                        <td class="border border-black p-[10px]">Dayu</td>
                        <td class="border border-black p-[10px]">XII</td>
                        <td class="border border-black p-[10px]">Selesai</td>
                        <td class="border border-black p-[10px]">66</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <br><br>

        <h1 class="text-2xl font-bold mb-2">Surat Perjanjian Orang Tua</h1>

        <div class="pl-[30px]">
            <table class="w-full border-collapse border border-black text-center">
                <thead>
                    <tr>
                        <th class="border border-black p-[10px]">No</th>
                        <th class="border border-black p-[10px]">Tanggal Pembuatan Surat</th>
                        <th class="border border-black p-[10px]">NIS</th>
                        <th class="border border-black p-[10px]">Nama Siswa</th>
                        <th class="border border-black p-[10px]">Tingkat</th>
                        <th class="border border-black p-[10px]">Status Dokumen</th>
                        <th class="border border-black p-[10px]">Total Poin</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border border-black p-[10px]">1</td>
                        <td class="border border-black p-[10px]">03 April 2026<br>17:13:03</td>
                        <td class="border border-black p-[10px]">1010</td>
                        <td class="border border-black p-[10px]">1010</td>
                        <td class="border border-black p-[10px]">XI</td>
                        <td class="border border-black p-[10px]">Selesai</td>
                        <td class="border border-black p-[10px]">80</td>
                    </tr>
                    <tr>
                        <td class="border border-black p-[10px]">2</td>
                        <td class="border border-black p-[10px]">02 April 2026<br>23:32:03</td>
                        <td class="border border-black p-[10px]">7777</td>
                        <td class="border border-black p-[10px]">Yoda Darma</td>
                        <td class="border border-black p-[10px]">XI</td>
                        <td class="border border-black p-[10px]">Selesai</td>
                        <td class="border border-black p-[10px]">60</td>
                    </tr>
                    <tr>
                        <td class="border border-black p-[10px]">3</td>
                        <td class="border border-black p-[10px]">27 Maret 2026<br>10:14:54</td>
                        <td class="border border-black p-[10px]">9125</td>
                        <td class="border border-black p-[10px]">Narin</td>
                        <td class="border border-black p-[10px]">XII</td>
                        <td class="border border-black p-[10px]">Selesai</td>
                        <td class="border border-black p-[10px]">103</td>
                    </tr>
                    <tr>
                        <td class="border border-black p-[10px]">4</td>
                        <td class="border border-black p-[10px]">02 April 2026<br>23:51:05</td>
                        <td class="border border-black p-[10px]">9128</td>
                        <td class="border border-black p-[10px]">Dyra Involvo</td>
                        <td class="border border-black p-[10px]">X</td>
                        <td class="border border-black p-[10px]">Selesai</td>
                        <td class="border border-black p-[10px]">63</td>
                    </tr>
                    <tr>
                        <td class="border border-black p-[10px]">5</td>
                        <td class="border border-black p-[10px]">28 Maret 2026<br>21:37:07</td>
                        <td class="border border-black p-[10px]">9128</td>
                        <td class="border border-black p-[10px]">Dyra Involvo</td>
                        <td class="border border-black p-[10px]">X</td>
                        <td class="border border-black p-[10px]">Selesai</td>
                        <td class="border border-black p-[10px]">63</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>