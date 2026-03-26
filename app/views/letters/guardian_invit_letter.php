<style>
    @media print {
        body * {
            visibility: hidden;
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
            border: none !important;
        }
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

<div class="w-full flex justify-center bg-gray-100 py-6 px-4" style="font-family: 'Times New Roman', Times, serif; font-size: 12pt; line-height: 1.5;">
    <div class="page bg-white border border-gray-300 rounded shadow-sm" style="width: 210mm; min-height: 297mm; padding: 20mm; box-sizing: border-box;">

        <!-- Header / Kop Surat -->
        <div class="w-full mb-4">
            <img src="/assets/icons/kop.jpg" alt="kepala surat" class="w-full">
        </div>

        <!-- Info Surat -->
        <table class="w-full mb-6 text-base">
            <tbody>
                <tr>
                    <td class="w-28">No.</td>
                    <td class="w-4">:</td>
                    <td><?= $letter['no_letter'] ?></td>
                </tr>
                <tr>
                    <td>Lamp.</td>
                    <td>:</td>
                    <td>-</td>
                </tr>
                <tr>
                    <td>Perihal</td>
                    <td>:</td>
                    <td><strong>Pemanggilan Orang Tua / Wali Siswa</strong></td>
                </tr>
            </tbody>
        </table>

        <!-- Kepada -->
        <div class="mb-1 text-base">
            Kepada<br>
            Yth. Bapak/ Ibu
        </div>
        <table class="w-full mb-6 text-base ml-9">
            <tbody>
                <tr>
                    <td class="w-48">Orang Tua / Wali dari</td>
                    <td class="w-4">:</td>
                    <td><?= $letter['student_name'] ?></td>
                </tr>
                <tr>
                    <td>Kelas / Nis</td>
                    <td>:</td>
                    <td><?= $letter['grade'] . ' ' . $letter['major_name'] . ' ' . $letter['class_rombel'] ?> / <?= $letter['student_nis'] ?></td>
                </tr>
            </tbody>
        </table>

        <!-- Body Surat -->
        <p class="mb-2 text-base">Dengan hormat,</p>
        <p class="mb-4 text-base">Bersama surat ini, kami mengharapkan kehadiran Bapak / Ibu pada :</p>

        <table class="w-full mb-6 text-base ml-9">
            <tbody>
                <tr>
                    <td class="w-40">Hari / Tanggal</td>
                    <td class="w-4">:</td>
                    <td><?= day($letter['invit_schedule']) ?> / <?= getFormatedDate($letter['invit_schedule']) ?></td>
                </tr>
                <tr>
                    <td>Pukul</td>
                    <td>:</td>
                    <td><?= hourAndMinute($letter['invit_schedule']) ?> WITA</td>
                </tr>
                <tr>
                    <td>Tempat</td>
                    <td>:</td>
                    <td>SMK TI Bali Global Denpasar</td>
                </tr>
                <tr>
                    <td>Keperluan</td>
                    <td>:</td>
                    <td><?= $letter['invit_reason'] ?></td>
                </tr>
            </tbody>
        </table>

        <p class="text-base text-justify">
            <span class="inline-block w-10"></span>Demikian surat ini kami sampaikan, besar harapan kami pertemuan ini agar tidak diwakilkan.<br>
            Atas perhatian dan kerjasamanya, kami ucapkan terimakasih.
        </p>

        <!-- Tanda Tangan -->
        <div class="mt-10">
            <table class="w-full text-base ml-10">
                <tbody>
                    <tr>
                        <td class="w-3/5">Mengetahui,</td>
                        <td>Denpasar, <?= getFormatedDate($letter['issued_date']) ?></td>
                    </tr>
                    <tr>
                        <td>Waka Kesiswaan</td>
                        <td>Guru BK</td>
                    </tr>
                    <tr>
                        <td colspan="2" class="py-10"></td>
                    </tr>
                    <tr>
                        <td><u><?= $waka_kesiswaan['fullname'] ?></u></td>
                        <td><u><?= $bk_teacher['fullname'] ?></u></td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</div>