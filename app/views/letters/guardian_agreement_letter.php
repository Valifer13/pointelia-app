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
		box-shadow: 0 4px 24px rgba(0, 0, 0, 0.15);
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
<div class="no-print flex justify-center mb-4 items-center gap-4">
	<a href="<?= BASE_URL ?>/letters" class="flex gap-2 items-center bg-zinc-400 hover:bg-zinc-500 text-white font-semibold px-4 py-2 rounded shadow transition">
		<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 16 16">
			<path fill="currentColor" fill-rule="evenodd" d="m2.87 7.75l1.97 1.97a.75.75 0 1 1-1.06 1.06L.53 7.53L0 7l.53-.53l3.25-3.25a.75.75 0 0 1 1.06 1.06L2.87 6.25h9.88a3.25 3.25 0 0 1 0 6.5h-2a.75.75 0 0 1 0-1.5h2a1.75 1.75 0 1 0 0-3.5z" clip-rule="evenodd" />
		</svg>
		<span>Kembali</span>
	</a>
	<button
		onclick="window.print()"
		class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded shadow transition cursor-pointer">
		🖨️ Print / Save as PDF
	</button>
</div>

<div class="page">

	<!-- HEADER -->
	<img class="w-full pb-4" src="/assets/icons/kop.jpg" alt="">

	<!-- DOCUMENT TITLE -->
	<div class="title-section text-center mb-6">
		<h1 class="text-base font-bold tracking-tight uppercase">
			SURAT PERNYATAAN SISWA
		</h1>
	</div>

	<!-- OPENING -->
	<p class="text-base mb-4 text-justify leading-relaxed">
		Yang bertandatangan di bawah ini orang tua/wali siswa SMK TI Bali Global Denpasar :
	</p>

	<!-- DATA TABLE -->
	<table class="w-full text-base mb-6 ms-8 field-row" style="border-collapse: collapse;">
		<tbody>
			<tr class="field-row">
				<td class="w-36 pr-2">Nama</td>
				<td class="w-4 pr-2">:</td>
				<td class="border-b border-gray-400 w-full border-dotted">
					<span class="editable" contenteditable="true"><?= $letter['guardian_name'] ?></span>
				</td>
			</tr>
			<tr class="field-row">
				<td class="pr-2 whitespace-nowrap">Tempat/ tanggal Lahir</td>
				<td class="pr-2">:</td>
				<td class="border-b border-gray-400 border-dotted">
					<span class="editable" contenteditable="true"><?= $letter['guardian_birthplace'] ?>/ <?= getFormatedDate($letter['guardian_date_of_birth']) ?></span>
				</td>
			</tr>
			<tr class="field-row">
				<td class="pr-2">Pekerjaan</td>
				<td class="pr-2">:</td>
				<td class="border-b border-gray-400 border-dotted">
					<span class="editable" contenteditable="true"><?= $letter['guardian_job'] ?></span>
				</td>
			</tr>
			<tr class="field-row">
				<td class="pr-2">Alamat Rumah</td>
				<td class="pr-2">:</td>
				<td class="border-b border-gray-400 border-dotted">
					<span class="editable" contenteditable="true"><?= $letter['guardian_address'] ?></span>
				</td>
			</tr>
			<tr class="field-row">
				<td class="pr-2">No. Hp./Telp.</td>
				<td class="pr-2">:</td>
				<td class="border-b border-gray-400 border-dotted">
					<span class="editable" contenteditable="true"><?= $letter['guardian_phone_number'] ?></span>
				</td>
			</tr>
		</tbody>
	</table>

	<!-- BODY PARAGRAPH 1 -->
	<p class="text-base mb-4 text-justify leading-relaxed">
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Menyatakan memang benar sanggup membina anak kami yang bernama
		<strong><u><span class="editable" contenteditable="true"><?= $letter['student_name'] ?></span></u></strong>,
		Kelas :
		<strong><u><span class="editable" contenteditable="true"><?= $letter['grade'] . " " . $letter['major_name'] . " " . $letter['class_rombel'] ?></span></u></strong>
		untuk lebih disiplin mengikuti proses pembelajaran dan mengikuti Tata Tertib Sekolah.
	</p>

	<!-- BODY PARAGRAPH 2 -->
	<p class="text-base mb-8 text-justify leading-relaxed">
		Demikian pernyataan kami dan jika tidak sesuai dengan pernyataan diatas, anak kami dapat
		dikeluarkan dari sekolah ini dengan rekomendasi pindah ke SMK lain yang serumpun.
	</p>

	<!-- SIGNATURE SECTION -->
	<div class="flex justify-end mb-8">
		<div class="text-base" style="min-width: 180px;">
			<p class="mb-1">
				<span class="editable" contenteditable="true">Denpasar</span>, <span class="editable" contenteditable="true"><?= getFormatedDate($letter['issued_date']) ?></span>
			</p>
			<p>Yang membuat pernyataan</p>
			<p class="mb-16">Orang Tua/Wali siswa</p>
			<p class="font-bold">
				<span class="editable underline" contenteditable="true"><?= $letter['guardian_name'] ?></span>
			</p>
		</div>
	</div>

	<!-- NB SECTION -->
	<div class="text-base">
		<p class="font-bold mb-1">NB :</p>
		<p class="underline text-justify leading-relaxed">
			<span class="editable" contenteditable="true">
				Jika siswa tidak bisa mengikuti proses pembelajaran sampai bulan <?= monthConverter(date("m", strtotime($letter['issued_date'] . " +3 months"))) ?> <?= date("Y", strtotime($letter['issued_date'])) ?> maka
				Siswa dinyatakan mengundurkan diri.
			</span>
		</p>
	</div>

</div>

<!-- Helper hint for editing -->
<div class="no-print text-center mt-3 text-gray-500 text-xs">
	💡 Click on any text to edit it before printing.
</div>