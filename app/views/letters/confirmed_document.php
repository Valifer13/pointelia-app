<div class="no-print flex justify-center mb-4 items-center gap-4">
	<a href="<?= BASE_URL ?>/letters" class="flex gap-2 items-center bg-zinc-400 hover:bg-zinc-500 text-white font-semibold px-4 py-2 rounded shadow transition">
		<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 16 16">
			<path fill="currentColor" fill-rule="evenodd" d="m2.87 7.75l1.97 1.97a.75.75 0 1 1-1.06 1.06L.53 7.53L0 7l.53-.53l3.25-3.25a.75.75 0 0 1 1.06 1.06L2.87 6.25h9.88a3.25 3.25 0 0 1 0 6.5h-2a.75.75 0 0 1 0-1.5h2a1.75 1.75 0 1 0 0-3.5z" clip-rule="evenodd" />
		</svg>
		<span>Kembali</span>
	</a>
</div>

<div class="w-full flex justify-center bg-gray-100 py-6 px-4" style="font-family: 'Times New Roman', Times, serif; font-size: 12pt; line-height: 1.5;">
    <div class="page bg-white border border-gray-300 rounded shadow-sm" style="width: 210mm; min-height: 297mm; box-sizing: border-box;">

    <img src="/assets/uploads/letters/<?= $letter['document_name'] ?>" alt="document" class="w-full h-full">

    </div>
</div>