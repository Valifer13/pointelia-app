<div class="w-full max-w-md p-6 mx-auto">
    <div class="bg-white rounded-2xl shadow-lg p-8">

        <div class="flex justify-center items-center mb-4">
            <div class="p-4 rounded-md shadow-sm w-fit">
                <svg width="20" height="26" viewBox="0 0 20 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_356_42)">
                        <path d="M0.999523 10.1961C0.447237 10.1961 -0.00565863 10.6537 0.0494773 11.214C0.213727 12.8832 0.780063 14.4908 1.70475 15.891C2.81624 17.574 4.39495 18.8806 6.23887 19.6437C8.08277 20.4067 10.1081 20.5915 12.0556 20.1743C14.003 19.7571 15.7842 18.757 17.171 17.3019C18.5579 15.8468 19.4874 14.0029 19.8407 12.0061C20.194 10.0093 19.9549 7.95044 19.1541 6.09297C18.3533 4.2355 17.0271 2.66387 15.3453 1.5792C13.9462 0.676826 12.3539 0.145614 10.7128 0.0259641C10.1619 -0.0142003 9.72622 0.460481 9.74202 1.02337L9.85182 4.93348C9.86762 5.49635 10.3339 5.92734 10.8739 6.04556C11.3508 6.15002 11.8086 6.33972 12.2253 6.60844C12.9255 7.06002 13.4776 7.7144 13.811 8.48773C14.1445 9.2611 14.244 10.1183 14.0969 10.9497C13.9498 11.7811 13.5628 12.5488 12.9854 13.1546C12.408 13.7604 11.6664 14.1768 10.8556 14.3505C10.0447 14.5242 9.20147 14.4473 8.43377 14.1296C7.66607 13.8119 7.00877 13.2679 6.54597 12.5672C6.27062 12.1502 6.07157 11.689 5.95552 11.2059C5.82412 10.659 5.38827 10.1961 4.83601 10.1961H0.999523Z" fill="black" />
                        <path d="M5 10.1961H1C0.447715 10.1961 0 10.6526 0 11.2157V24.9804C0 25.5435 0.447715 26 1 26H5C5.55228 26 6 25.5435 6 24.9804V11.2157C6 10.6526 5.55228 10.1961 5 10.1961Z" fill="black" />
                        <path d="M6 3.05882C6 1.36948 4.65685 0 3 0C1.34315 0 0 1.36948 0 3.05882C0 4.74816 1.34315 6.11765 3 6.11765C4.65685 6.11765 6 4.74816 6 3.05882Z" fill="black" />
                    </g>
                    <defs>
                        <clipPath id="clip0_356_42">
                            <rect width="20" height="26" fill="white" />
                        </clipPath>
                    </defs>
                </svg>
            </div>
        </div>

        <div class="text-center mb-8">
            <h2 class="text-3xl font-bold text-gray-900 mb-2">Ubah Password</h2>
            <p class="text-gray-500 text-sm">Ubah password dengan yang baru. <a href="<?= BASE_URL ?>/account" class="text-zinc-600 font-medium hover:text-blue-500">Kembali?</a></p>
        </div>

        <?php if (isset($_SESSION['error'])): ?>
            <p class="text-red-500 bg-red-100 py-2 px-4 rounded-md mb-4">! <?= $_SESSION['error']['message'] ?></p>
        <?php endif;
        unset($_SESSION['error']); ?>

        <form action="" method="post">
            <div class="mb-5 relative">
                <label for="old_password" class="block mb-2 text-sm font-medium text-gray-700">Kata Sandi Lama</label>
                <input type="password" id="old_password" name="old_password" placeholder="••••••••" required
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
            </div>
            <div class="mb-5 relative">
                <label for="new_password" class="block mb-2 text-sm font-medium text-gray-700">Kata Sandi Baru</label>
                <input type="password" id="new_password" name="new_password" placeholder="••••••••" required
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
            </div>
            <div class="mb-5 relative">
                <label for="password_confirm" class="block mb-2 text-sm font-medium text-gray-700">Konfirmasi Kata Sandi</label>
                <input type="password" id="password_confirm" name="password_confirm" placeholder="••••••••" required
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white font-semibold py-3 rounded-lg hover:bg-blue-700 transition-colors shadow-sm">
                Ubah
            </button>
        </form>

    </div>
</div>