<div x-data="studentSearch()" class="max-w-4xl mx-auto px-4 sm:px-6 py-8">

    <div class="mb-8 flex items-center justify-between bg-white p-4 rounded-md shadow-md">
        <div>
            <a href="<?= BASE_URL ?>/letters" class="text-sm text-blue-600 hover:text-blue-800 font-medium mb-2 inline-block">
                <i class="fas fa-arrow-left mr-1"></i> Kembali ke Menu Surat
            </a>
            <h1 class="text-2xl font-semibold tracking-wide text-gray-600">Buat Surat Panggilan Orang Tua/Wali</h1>
            <?php get_breadcrumb() ?>
        </div>
        <div class="hidden sm:block p-3 bg-blue-100 text-blue-600 rounded-lg">
            <i class="fas fa-user-edit text-2xl"></i>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-md border border-gray-200 p-6 mb-6">
        <p class="text-gray-900 mt-1 text-lg font-semibold">Langkah 1: Cari data siswa menggunakan Nomor Induk Siswa (NIS).</p>
        <div class="w-full h-px bg-zinc-400 my-4"></div>
        <label for="nis" class="block text-sm font-medium text-gray-700 mb-2">Masukkan NIS Siswa</label>
        <div class="flex flex-col sm:flex-row gap-3">
            <div class="relative grow">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fas fa-id-card text-gray-400"></i>
                </div>
                <input type="text" id="nis" name="nis" x-model="nis" placeholder="Contoh: 0001" @keyup.enter="cekData"
                    class="pl-10 w-full px-4 py-2.5 bg-gray-50 border border-gray-300 rounded-lg text-gray-900 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
            </div>
            <button id="btn-cek" @click="cekData" :disabled="loading" class="inline-flex justify-center items-center px-6 py-2.5 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all cursor-pointer">
                <span id="btn-text" x-text="loading ? 'Mencari...' : 'Cek Data'"></span>
                <i id="btn-icon" x-show="!loading" class="fas fa-search ml-2"></i>
                <svg id="btn-spinner" x-show="loading" class="animate-spin ml-2 h-5 w-5 text-white hidden" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
            </button>
        </div>
        <p x-show="error" x-text="error" class="text-red-500 text-sm mt-2"></p>
    </div>

    <div x-show="student" x-transition.opacity.duration.500ms>

        <h2 class="text-lg font-bold text-gray-900 mb-4 border-b pb-2">Langkah 2: Verifikasi Data & Isi Keterangan Surat</h2>

        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-6">
            <div class="flex items-start">
                <div class="h-16 w-16 bg-gray-200 rounded-full flex items-center justify-center text-gray-500 text-2xl mr-4">
                    <i class="fas fa-user-graduate"></i>
                </div>
                <div>
                    <h3 class="text-xl font-bold text-gray-900" x-text="student?.name"></h3>
                    <div class="mt-2 grid grid-cols-1 sm:grid-cols-2 gap-x-8 gap-y-2 text-sm text-gray-600">
                        <p><b class="font-medium">NIS:</b> <span x-text="student?.nis"></span></p>
                        <p><b class="font-medium">Kelas:</b> <span x-text="studentClass?.grade + ' ' + studentClass?.major_name + ' ' + studentClass?.rombel"></span></p>
                        <p><b class="font-medium">Jurusan:</b> <span x-text="studentClass?.major_name"></span></p>
                        <p><b class="font-medium">Alamat:</b> <span x-text="student?.address"></span></p>
                    </div>
                </div>
            </div>
        </div>

        <h3 class="text-md font-semibold text-gray-800 mb-3">Isi data surat:</h3>

        <form action="" method="post" class="w-full bg-white border border-zinc-200 rounded-2xl p-6 shadow-sm flex flex-col gap-6">
            <input type="hidden" name="letter_type" value="guardian-invit-letter">
            <input type="hidden" name="student_nis" :value="student?.nis">

            <div class="flex flex-col gap-4">

                <div class="flex flex-col gap-1.5">
                    <label for="no_letter" class="text-sm font-medium text-zinc-700">Nomor Surat</label>
                    <input type="number" name="no_letter" id="no_letter" placeholder="Masukkan nomor surat"
                        class="w-full px-3 py-2 bg-transparent border border-zinc-300 rounded-lg text-sm text-zinc-900 placeholder-zinc-400 focus:outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all">
                </div>

                <div class="flex flex-col gap-1.5">
                    <label for="schedule" class="text-sm font-medium text-zinc-700">Jadwal Pertemuan</label>
                    <input type="datetime-local" name="schedule" id="schedule"
                        class="w-full px-3 py-2 bg-transparent border border-zinc-300 rounded-lg text-sm text-zinc-900 focus:outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all">
                </div>

                <div class="flex flex-col gap-1.5">
                    <label for="reason" class="text-sm font-medium text-zinc-700">Keperluan</label>
                    <textarea id="reason" name="reason" rows="3" placeholder="Jelaskan keperluan pemanggilan..."
                        class="w-full px-3 py-2 bg-transparent border border-zinc-300 rounded-lg text-sm text-zinc-900 placeholder-zinc-400 resize-none focus:outline-none focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 transition-all"></textarea>
                </div>

            </div>

            <button type="submit" class="w-full flex justify-center items-center gap-2 px-4 py-2.5 bg-blue-600 hover:bg-blue-800 text-white text-sm font-medium rounded-lg transition-colors focus:outline-none focus:ring-4 focus:ring-zinc-900/10 cursor-pointer">
                <i class="fas fa-print"></i>
                Cetak Surat
            </button>
        </form>
    </div>

</div>

<script>
    function studentSearch() {
        return {
            nis: '',
            student: null,
            studentClass: null,
            loading: false,
            error: '',

            async cekData() {
                if (this.nis.trim() === '') {
                    this.error = 'Mohon masukkan NIS terlebih dahulu.'
                    return
                }

                this.loading = true
                this.error = ''
                this.student = null
                this.studentClass = null
                this.guardians = []

                try {
                    let res = await fetch(`http://pointer.test/students_api/detail/${this.nis}`)
                    let data = await res.json()

                    if (!data.success || !data.data) {
                        this.error = 'Data tidak ditemukan'
                    } else {
                        this.student = data.data.student
                        this.studentClass = data.data.studentClass
                    }
                } catch (e) {
                    this.error = 'Data siswa tidak ditemukan'
                }

                this.loading = false
            }
        }
    }
</script>