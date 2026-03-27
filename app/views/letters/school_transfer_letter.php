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
<div class="no-print flex justify-center mb-4 gap-4 items-center">
	<a href="<?= BASE_URL ?>/letters" class="flex gap-2 items-center bg-zinc-400 hover:bg-zinc-500 text-white font-semibold px-4 py-2 rounded shadow transition">
		<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 16 16">
			<path fill="currentColor" fill-rule="evenodd" d="m2.87 7.75l1.97 1.97a.75.75 0 1 1-1.06 1.06L.53 7.53L0 7l.53-.53l3.25-3.25a.75.75 0 0 1 1.06 1.06L2.87 6.25h9.88a3.25 3.25 0 0 1 0 6.5h-2a.75.75 0 0 1 0-1.5h2a1.75 1.75 0 1 0 0-3.5z" clip-rule="evenodd" />
		</svg>
		<span>Kembali</span>
	</a>
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

        <!-- Judul Surat -->
        <div class="text-center font-bold uppercase mb-10" style="font-size: 14pt;">
            <u style="text-underline-offset: 3px;">KETERANGAN PINDAH SEKOLAH</u><br>
            <?= $letter['no_letter'] ?>
        </div>

        <!-- Isi Surat -->
        <div class="text-justify text-sm">
            <p class="mb-3">Yang bertandatangan di bawah ini Kepala SMK TI BALI GLOBAL Denpasar, kecamatan Denpasar Selatan, Kota Denpasar, Provinsi Bali, Menerangkan bahwa :</p>

            <!-- Data Siswa -->
            <div class="pl-8 mb-3">
                <div class="flex mb-1">
                    <div class="shrink-0" style="width: 160px;">Nama Siswa</div>
                    <div class="shrink-0 w-4">:</div>
                    <div class="grow border-b border-dotted border-black" style="position: relative; top: -5px;"><?= $letter['student_name'] ?></div>
                </div>
                <div class="flex mb-1">
                    <div class="shrink-0" style="width: 160px;">Kelas/Program</div>
                    <div class="shrink-0 w-4">:</div>
                    <div class="grow border-b border-dotted border-black" style="position: relative; top: -5px;"><?= $letter['grade'] . " " . $letter['major_name'] . " " . $letter['class_rombel'] ?></div>
                </div>
                <div class="flex mb-1">
                    <div class="shrink-0" style="width: 160px;">NIS</div>
                    <div class="shrink-0 w-4">:</div>
                    <div class="grow border-b border-dotted border-black" style="position: relative; top: -5px;"><?= $letter['student_nis'] ?></div>
                </div>
                <div class="flex mb-1">
                    <div class="shrink-0" style="width: 160px;">Jenis Kelamin</div>
                    <div class="shrink-0 w-4">:</div>
                    <div class="grow border-b border-dotted border-black" style="position: relative; top: -5px;"><?= $letter['student_gender'] === "M" ? "Laki - Laki" : "Perempuan" ?></div>
                </div>
                <div class="flex mb-1">
                    <div class="shrink-0" style="width: 160px;">Alamat</div>
                    <div class="shrink-0 w-4">:</div>
                    <div class="grow border-b border-dotted border-black" style="position: relative; top: -5px;"><?= $letter['student_address'] ?></div>
                </div>
            </div>

            <p class="mb-3">Sesuai dengan surat permohonan pindah sekolah dari Orang Tua/Wali siswa</p>

            <!-- Data Orang Tua -->
            <div class="pl-8 mb-3">
                <div class="flex mb-1">
                    <div class="shrink-0" style="width: 160px;">Nama</div>
                    <div class="shrink-0 w-4">:</div>
                    <div class="grow border-b border-dotted border-black" style="position: relative; top: -5px;"><?= $letter['guardian_name'] ?></div>
                </div>
                <div class="flex mb-1">
                    <div class="shrink-0" style="width: 160px;">Alamat</div>
                    <div class="shrink-0 w-4">:</div>
                    <div class="grow border-b border-dotted border-black" style="position: relative; top: -5px;"><?= $letter['guardian_address'] ?></div>
                </div>
            </div>

            <p class="mb-16">
                Telah mengajukan surat permohonan pindah ke <?= $letter['target_school'] ?>, dengan alasan <?= $letter['reason_for_moving'] ?>
                dan untuk kelengkapan administrasi sudah diselesaikan.<br>
                Demikian surat pindah ini dibuat untuk dipergunakan sebagaimana mestinya.
            </p>

            <!-- Tanda Tangan -->
            <div class="grid mt-6" style="grid-template-columns: 1fr 1fr;">
                <div></div>
                <div class="pl-10">
                    <div>Denpasar, <?= getFormatedDate($letter['issued_date']) ?></div>
                    <div>Kepala SMK TI Bali Global Denpasar</div>
                    <div style="margin-top: 60px; text-decoration: underline; width: 80%; display: inline-block;">
                        <?= $headschool['fullname'] ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>