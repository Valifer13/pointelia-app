<style>
    @media print {
        /* 1. Sembunyikan elemen yang tidak ingin dicetak secara permanen */
        #header,
        #aside,
        button[onclick="window.print()"],
        .mb-6

        /* Kontainer breadcrumb dan judul */
            {
            display: none !important;
        }

        /* 2. Reset tinggi dan overflow pada parent agar konten tidak terpotong kertas */
        html,
        body,
        #main,
        section {
            height: auto !important;
            min-height: 100% !important;
            overflow: visible !important;
            background-color: white !important;
            display: block !important;
        }

        /* 3. Pastikan margin dan padding menyesuaikan kertas secara alami */
        @page {
            size: A4;
            /* atau margin yang sesuai */
            margin: 0;
        }

        .page {
            visibility: visible;
            margin: 0 !important;
            padding: 10mm 20mm !important;
            /* Sesuaikan dengan kebutuhan cetak */
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

<div class="page w-[210mm] min-h-[297mm] p-[20mm] my-[10mm] mx-auto border border-[#D3D3D3] rounded-[5px] bg-white shadow-[0_0_5px_rgba(0,0,0,0.1)] box-border relative print:w-auto print:h-auto print:py-[10mm] print:px-[20mm] print:m-0 print:-mt-[180px] print:border-none print:shadow-none print:bg-transparent">

    <div class="w-full -mt-[10px]">
        <img src="/assets/icons/kop.jpg" alt="kepala surat" class="w-full">
    </div>

    <div class="text-center font-bold text-[14pt] uppercase mt-2">LAPORAN PELANGGARAN SISWA</div>
    <br>

    <div class="text-justify">
        <div class="pl-[30px]">
            <div class="flex">
                <div class="w-[160px] shrink-0">Nama</div>
                <div class="w-[10px] shrink-0">:</div>
                <div class="grow border-b border-dotted border-black relative -top-[5px]"><?= $student['name'] ?></div>
            </div>
            <div class="flex">
                <div class="w-[160px] shrink-0">NIS</div>
                <div class="w-[10px] shrink-0">:</div>
                <div class="grow border-b border-dotted border-black relative -top-[5px]"><?= $student['nis'] ?></div>
            </div>
            <div class="flex">
                <div class="w-[160px] shrink-0">Kelas</div>
                <div class="w-[10px] shrink-0">:</div>
                <div class="grow border-b border-dotted border-black relative -top-[5px]"><?= $student['grade'] . " " . $student['major_name'] . " " . $student['rombel'] ?></div>
            </div>
            <div class="flex">
                <div class="w-[160px] shrink-0">Program Keahlian</div>
                <div class="w-[10px] shrink-0">:</div>
                <div class="grow border-b border-dotted border-black relative -top-[5px]"><?= $student['major_description'] ?></div>
            </div>
            <div class="flex">
                <div class="w-[160px] shrink-0">Pelanggaran</div>
                <div class="w-[10px] shrink-0">:</div>
            </div>
            <br>

            <table class="w-full border-collapse border border-black">
                <thead class="text-center">
                    <tr>
                        <th class="border border-black p-2.5">No</th>
                        <th class="border border-black p-2.5">Tanggal</th>
                        <th class="border border-black p-2.5">Jenis Pelanggaran</th>
                        <th class="border border-black p-2.5">Point</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $count = 1;
                        foreach ($student_violations as $violation): ?>
                        <tr>
                            <td class="border border-black p-2.5 text-center"><?= $count++ ?></td>
                            <td class="border border-black p-2.5">
                                <?= getFormatedDate($violation['violation_date']); ?><br>23:28:42
                            </td>
                            <td class="border border-black p-2.5"><?= $violation['violation_type_name']; ?></td>
                            <td class="border border-black p-2.5 text-center" rowspan="2"><?= $violation['point_value']; ?></td>
                        </tr>
                        <tr>
                            <td class="border border-black p-2.5" colspan="3">Detail Pelanggaran : <?= $violation['notes']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td class="border border-black p-2.5 text-right" colspan="3">Total Poin</td>
                        <td class="border border-black p-2.5 text-center">
                            <?= $total_violation_poin ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>