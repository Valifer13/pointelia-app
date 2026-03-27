<style>
    body {
        background: #e5e5e5;
    }

    .page {
        width: 210mm;
        min-height: 297mm;
        background: white;
        margin: 0 auto;
        padding: 20mm;
        box-shadow: 0 4px 24px rgba(0, 0, 0, 0.15);
    }

    /* @media print {
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
        } */

    @media print {

        head *,
        body * {
            visibility: hidden;
        }

        body {
            padding: 0 !important;
        }

        .page,
        .page * {
            visibility: visible;
        }

        .page {
            position: absolute;
            top: 0;
            left: 0;
            margin: 0;
            padding: 0 20mm;
            box-shadow: none;
            width: 100%;
        }
    }

    .header-border-top {
        border-top: 3px solid #1a1a1a;
    }

    .header-border-bottom {
        border-bottom: 1.5px solid #1a1a1a;
    }

    .field-row td {
        vertical-align: top;
        padding-bottom: 2px;
    }

    [contenteditable="true"]:focus {
        outline: 2px dashed #3b82f6;
        border-radius: 2px;
        padding: 0 2px;
    }

    #table-data tr td:first-child {
        min-width: 160px;
    }
</style>

<!-- Print Button -->
<div class="no-print flex justify-center mb-4">
    <button
        onclick="window.print()"
        class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded shadow transition">
        🖨️ Print / Save as PDF
    </button>
</div>

<div class="page font-letter">

    <!-- HEADER -->
    <img class="mb-2" src="/assets/icons/kop.jpg" alt="">

    <!-- DOCUMENT TITLE -->
    <div class="text-center mb-5">
        <h1 class="text-base font-bold tracking-tight uppercase">
            SURAT PERNYATAAN SISWA
        </h1>
    </div>

    <!-- OPENING -->
    <p class="text-base mb-3 leading-relaxed">
        Yang bertandatangan di bawah ini :
    </p>

    <!-- DATA TABLE -->
    <table id="table-data" class="w-full text-base mb-2 field-row ms-7" style="border-collapse: collapse;">
        <tbody>
            <tr>
                <td class="pr-2" style="width:130px;">Nama</td>
                <td class="pr-2" style="width:12px;">:</td>
                <td class="border-b border-dotted border-gray-400">
                    <span contenteditable="true"><?= $letter['student_name'] ?></span>
                </td>
            </tr>
            <tr>
                <td class="pr-2">NIS</td>
                <td class="pr-2">:</td>
                <td class="border-b border-dotted border-gray-400">
                    <span contenteditable="true"><?= $letter['student_nis'] ?></span>
                </td>
            </tr>
            <tr>
                <td class="pr-2">Kelas</td>
                <td class="pr-2">:</td>
                <td class="border-b border-dotted border-gray-400">
                    <span contenteditable="true"><?= $letter['grade'] . ' ' . $letter['major_name'] . ' ' . $letter['class_rombel'] ?></span>
                </td>
            </tr>
            <tr>
                <td class="pr-2 whitespace-nowrap">Program Keahlian</td>
                <td class="pr-2">:</td>
                <td class="border-b border-dotted border-gray-400">
                    <span contenteditable="true"><?= $letter['major_description'] ?></span>
                </td>
            </tr>
            <tr>
                <td class="pr-2">Masalah</td>
                <td class="pr-2">:</td>
                <td class="border-b border-dotted border-gray-400">
                    <span contenteditable="true"></span>
                </td>
            </tr>
            <tr>
                <td class="pr-2">Nama Orang Tua</td>
                <td class="pr-2">:</td>
                <td class="border-b border-dotted border-gray-400">
                    <span contenteditable="true"><?= $letter['guardian_name'] ?></span>
                </td>
            </tr>
            <tr>
                <td class="pr-2">Pekerjaan</td>
                <td class="pr-2">:</td>
                <td class="border-b border-dotted border-gray-400">
                    <span contenteditable="true"><?= $letter['guardian_job'] ?></span>
                </td>
            </tr>
            <tr>
                <td class="pr-2">Alamat Rumah</td>
                <td class="pr-2">:</td>
                <td class="border-b border-dotted border-gray-400">
                    <span contenteditable="true"><?= $letter['guardian_address'] ?></span>
                </td>
            </tr>
            <tr>
                <td class="pr-2">No. Hp./Telp.</td>
                <td class="pr-2">:</td>
                <td class="border-b border-dotted border-gray-400">
                    <span contenteditable="true"><?= $letter['guardian_phone_number'] ?></span>
                </td>
            </tr>
        </tbody>
    </table>

    <!-- BODY PARAGRAPHS -->
    <p class="text-base mb-4 text-justify leading-relaxed indent-7">
        Menyatakan dan berjanji akan bersungguh-sungguh berubah dan bersedia mentaati aturan dan
        tata tertib sekolah. Apabila selama masa pembinaan tidak mengalami perubahan, maka siswa yang
        bersangkutan dikembalikan kepada orang tua/wali.
        <br>
        Demikian surat pernyataan ini saya buat dengan sesungguhnya tanpa ada tekanan dari siapapun.
    </p>

    <div class="grid grid-cols-2 gap-5 mb-5">
        <div class="flex flex-col gap-[60px]">
            <div>
                <p>
                    Mengetahui,<br>
                    Orang Tua/Wali Siswa
                </p>
            </div>
            <span class="underline"><?= $letter['guardian_name'] ?></span>
        </div>

        <div class="flex flex-col gap-[60px] ps-10">
            <div>
                <p>
                    Denpasar, <?= $letter['issued_date'] ?><br>
                    Siswa yang bersangkutan
                </p>
            </div>
            <span class="underline"><?= $letter['student_name'] ?></span>
        </div>

        <div class="flex flex-col gap-[60px]">
            <div>
                <p>
                    Guru Bimbingan Konseling
                </p>
            </div>
            <span class="underline"><?= $bk_teacher['fullname'] ?></span>
        </div>

        <div class="flex flex-col gap-[60px] ps-10">
            <div>
                <p>
                    Guru Wali Kelas
                </p>
            </div>
            <span class="underline"><?= $letter['class_form_tutor_fullname'] ?></span>
        </div>
    </div>

    <div class="flex flex-col gap-[60px] *:text-center">
        <p>
            Mengetahui<br>
            Wakasek Kesiswaan
        </p>
        <span class="underline"><?= $waka_kesiswaan['fullname'] ?></span>
    </div>

</div>

<!-- Helper hint -->
<div class="no-print text-center mt-3 text-gray-500 text-xs">
    💡 Klik pada teks mana pun untuk mengeditnya sebelum dicetak.
</div>