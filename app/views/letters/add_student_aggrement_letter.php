<div x-data="studentSearch()" class="max-w-4xl mx-auto px-4 sm:px-6 py-8">

    <div class="mb-8 flex items-center justify-between bg-white p-4 rounded-md shadow-md">
        <div>
            <a href="<?= BASE_URL ?>/letters" class="text-sm text-blue-600 hover:text-blue-800 font-medium mb-2 inline-block">
                <i class="fas fa-arrow-left mr-1"></i> Kembali ke Menu Surat
            </a>
            <h1 class="text-2xl font-semibold tracking-wide text-gray-600">Buat Surat Perjanjian Siswa</h1>
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

    <!-- <div x-show="!student">
        <h2 class="text-lg font-bold text-gray-900 mb-4 border-b pb-2">Siswa yang memiliki poin di atas 25.</h2>

        <div class="bg-white w-full overflow-x-auto p-4 rounded-md shadow-md mb-6">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="text-[11px] text-zinc-400 uppercase tracking-widest whitespace-nowrap border-b border-zinc-200">
                        <th class="pb-4 px-4 font-semibold pl-2 w-16">No</th>
                        <th class="pb-4 px-4 font-semibold w-2/5">Nama Lengkap</th>
                        <th class="pb-4 px-4 font-semibold w-1/5">NIS / NISN</th>
                        <th class="pb-4 px-4 font-semibold w-1/5">Poin</th>
                        <th class="pb-4 px-4 font-semibold text-right pr-2">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-sm">

                    <?php
                    $count = 1;
                    $point_count = 0;
                    foreach ($students as $student):
                    ?>
                        <tr class="border-b border-zinc-100 hover:bg-zinc-50/80 whitespace-nowrap transition-colors group">
                            <td class="p-4 pl-2 text-zinc-400"><?= str_pad($count++, 2, '0', STR_PAD_LEFT) ?></td>
                            <td class="p-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-full bg-zinc-100 flex items-center justify-center text-xs font-medium text-zinc-500"><?= $student['name'][0] ?></div>
                                    <span class="text-zinc-900 font-medium"><?= $student['name'] ?></span>
                                </div>
                            </td>
                            <td class="p-4 text-zinc-600"># <?= $student['nis'] ?></td>

                            <td class="p-4 text-zinc-600"><?= $student['total_points'] ?></td>

                            <td class="p-4 text-right pr-2">
                                <button @click="nis = '<?= $student['nis'] ?>'" class="data-option-btn p-1 border border-zinc-200 w-fit rounded-md inset-shadow-zinc-400 transition-all duration-500 cursor-pointer">
                                    Pilih Siswa
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div> -->

    <div x-show="student" x-transition.opacity.duration.500ms>

        <h2 class="text-lg font-bold text-gray-900 mb-4 border-b pb-2">Langkah 2: Verifikasi Data & Pilih Orang Tua/Wali</h2>

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

        <h3 class="text-md font-semibold text-gray-800 mb-3">Pilih Data Orang Tua/Wali untuk Surat:</h3>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <form href="" x-show="dataAyah" class="bg-white border border-gray-200 rounded-xl p-5 hover:border-blue-400 hover:shadow-md transition-all flex flex-col justify-between" method="post">
                <div>
                    <input type="hidden" name="letter_type" value="student-agreement-letter">
                    <input type="hidden" name="student_nis" :value="student?.nis">
                    <input type="hidden" name="guardian_id" :value="dataAyah?.guardian_id">
                    <div class="flex justify-between items-center mb-3">
                        <span class="bg-blue-100 text-blue-700 text-xs font-bold px-2.5 py-1 rounded">Ayah</span>
                        <i class="fas fa-male text-gray-400 text-lg"></i>
                    </div>
                    <h4 class="text-lg font-bold text-gray-900" x-text="dataAyah?.name"></h4>
                    <ul class="mt-3 text-sm text-gray-600 space-y-1">
                        <li><i class="fas fa-briefcase w-5 text-center text-gray-400"></i> <span x-text="dataAyah?.job"></span></li>
                        <li><i class="fas fa-phone w-5 text-center text-gray-400"></i> <span x-text="dataAyah?.phone_number"></span></li>
                    </ul>
                </div>
                <button type="submit" class="mt-5 w-full bg-gray-50 text-blue-600 border border-blue-200 hover:bg-blue-600 hover:text-white font-medium py-2 rounded-lg transition-colors flex justify-center items-center cursor-pointer">
                    <i class="fas fa-print mr-2"></i> Cetak dengan Data Ayah
                </button>
            </form>

            <form href="" x-show="dataIbu" class="bg-white border border-gray-200 rounded-xl p-5 hover:border-pink-400 hover:shadow-md transition-all flex flex-col justify-between" method="post">
                <div>
                    <input type="hidden" name="letter_type" value="student-agreement-letter">
                    <input type="hidden" name="student_nis" :value="student?.nis">
                    <input type="hidden" name="guardian_id" :value="dataIbu?.guardian_id">
                    <div class="flex justify-between items-center mb-3">
                        <span class="bg-pink-100 text-pink-700 text-xs font-bold px-2.5 py-1 rounded">Ibu</span>
                        <i class="fas fa-female text-gray-400 text-lg"></i>
                    </div>
                    <h4 class="text-lg font-bold text-gray-900" x-text="dataIbu?.name"></h4>
                    <ul class="mt-3 text-sm text-gray-600 space-y-1">
                        <li><i class="fas fa-briefcase w-5 text-center text-gray-400"></i> <span x-text="dataIbu?.job"></span></li>
                        <li><i class="fas fa-phone w-5 text-center text-gray-400"></i> <span x-text="dataIbu?.address"></span></li>
                    </ul>
                </div>
                <button type="submit" class="mt-5 w-full bg-gray-50 text-pink-600 border border-pink-200 hover:bg-pink-600 hover:text-white font-medium py-2 rounded-lg transition-colors flex justify-center items-center cursor-pointer">
                    <i class="fas fa-print mr-2"></i> Cetak dengan Data Ibu
                </button>
            </form>

            <form href="" x-show="dataWali" class="bg-white border border-gray-200 rounded-xl p-5 hover:border-orange-400 hover:shadow-md transition-all flex flex-col justify-between" method="post">
                <div>
                    <input type="hidden" name="letter_type" value="student-agreement-letter">
                    <input type="hidden" name="student_nis" :value="student?.nis">
                    <input type="hidden" name="guardian_id" :value="dataWali?.guardian_id">
                    <div class="flex justify-between items-center mb-3">
                        <span class="bg-orange-100 text-orange-700 text-xs font-bold px-2.5 py-1 rounded" x-text="dataWali?.relationship"></span>
                        <i class="fas fa-question text-gray-400 text-lg"></i>
                    </div>
                    <h4 class="text-lg font-bold text-gray-900" x-text="dataWali?.name"></h4>
                    <ul class="mt-3 text-sm text-gray-600 space-y-1">
                        <li><i class="fas fa-briefcase w-5 text-center text-gray-400"></i> <span x-text="dataWali?.job"></span></li>
                        <li><i class="fas fa-phone w-5 text-center text-gray-400"></i> <span x-text="dataWali?.address"></span></li>
                    </ul>
                </div>
                <button type="submit" class="mt-5 w-full bg-gray-50 text-orange-600 border border-orange-200 hover:bg-orange-600 hover:text-white font-medium py-2 rounded-lg transition-colors flex justify-center items-center cursor-pointer">
                    <p>
                        <i class="fas fa-print mr-1"></i> Cetak dengan Data <span x-text="dataWali?.relationship"></span>
                    </p>
                </button>
            </form>
        </div>
    </div>

</div>

<script>
    function studentSearch() {
        return {
            nis: "<?= isset($student_nis) ? (string) $student_nis : '' ?>",
            student: null,
            studentClass: null,
            dataAyah: null,
            dataIbu: null,
            dataWali: null,
            guardians: [],
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
                        this.dataAyah = data.data.dataAyah
                        this.dataIbu = data.data.dataIbu
                        this.dataWali = data.data.dataWali
                        this.guardians = data.data.guardians ?? []
                    }
                } catch (e) {
                    this.error = 'Data siswa tidak ditemukan'
                }

                this.loading = false
            }
        }
    }
</script>