<?php require VIEW_PATH . 'templates/header.php'; ?>

<div class="min-h-screen flex bg-gradient-to-br from-gray-900 via-indigo-900 to-purple-800 relative overflow-hidden">
    <!-- Background pattern -->
    <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>

    <div class="relative z-10 flex flex-col lg:flex-row w-full max-w-6xl mx-auto my-8 lg:my-16 rounded-3xl shadow-2xl overflow-hidden bg-white/10 backdrop-blur-lg border border-white/20">
        
        <!-- Ilustrasi (kiri) - hidden di mobile -->
        <div class="hidden lg:flex lg:w-1/2 bg-gradient-to-br from-purple-600/20 to-indigo-600/20 p-12 items-center justify-center relative">
            <div class="absolute w-64 h-64 bg-purple-500 rounded-full blur-3xl opacity-20 -top-10 -left-10"></div>
            <div class="absolute w-64 h-64 bg-pink-500 rounded-full blur-3xl opacity-20 -bottom-10 -right-10"></div>
            <img src="https://illustrations.popsy.co/amber/authentication.svg" alt="Register Illustration" class="relative w-80 animate-float drop-shadow-2xl">
        </div>

        <!-- Form (kanan) -->
        <div class="w-full lg:w-1/2 p-8 md:p-12 flex flex-col justify-center">
            <!-- Ilustrasi kecil untuk mobile -->
            <div class="flex justify-center mb-6 lg:hidden">
                <img src="https://illustrations.popsy.co/amber/authentication.svg" alt="Register" class="w-32 h-32 animate-float">
            </div>

            <!-- Brand -->
            <div class="text-center mb-8">
                <a href="<?= BASE_URL ?>" class="text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-yellow-300 to-pink-400">
                    KodeMarket
                </a>
                <p class="text-gray-300 mt-2">Buat akun dan mulai jual beli</p>
            </div>

            <!-- Error Message -->
            <?php if (isset($error)): ?>
                <div class="bg-red-500/20 border border-red-400 text-red-200 px-4 py-3 rounded-xl mb-4 text-sm">
                    <?= $error ?>
                </div>
            <?php endif; ?>

            <!-- Form Register -->
            <form method="POST" class="space-y-5" id="registerForm">
                <input type="hidden" name="csrf_token" value="<?= $this->csrfToken() ?>">

                <!-- Nama Lengkap -->
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-1">Nama Lengkap</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                        </span>
                        <input type="text" name="full_name" required 
                            class="w-full pl-10 pr-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-yellow-400 transition"
                            placeholder="Nama Anda">
                    </div>
                </div>

                <!-- Username -->
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-1">Username</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </span>
                        <input type="text" name="username" required 
                            class="w-full pl-10 pr-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-yellow-400 transition"
                            placeholder="username123">
                    </div>
                </div>

                <!-- Email -->
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-1">Email</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </span>
                        <input type="email" name="email" required 
                            class="w-full pl-10 pr-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-yellow-400 transition"
                            placeholder="anda@email.com">
                    </div>
                </div>

                <!-- Password -->
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-1">Password</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                        </span>
                        <input type="password" name="password" id="password" required 
                            class="w-full pl-10 pr-12 py-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-yellow-400 transition"
                            placeholder="••••••••">
                        <button type="button" onclick="togglePassword('password', this)" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-white transition">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                        </button>
                    </div>
                </div>

                <!-- Konfirmasi Password -->
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-1">Konfirmasi Password</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                        </span>
                        <input type="password" name="password_confirm" id="password_confirm" required 
                            class="w-full pl-10 pr-12 py-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-yellow-400 transition"
                            placeholder="••••••••">
                        <button type="button" onclick="togglePassword('password_confirm', this)" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-white transition">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                        </button>
                    </div>
                </div>

                <!-- Checkbox Syarat (sudah diperbaiki) -->
                <div class="flex items-start">
                    <input type="checkbox" name="terms" id="terms" value="1" required class="mt-1 h-4 w-4 rounded border-gray-400 bg-white/10 text-yellow-400 focus:ring-yellow-400">
                    <label for="terms" class="ml-2 text-sm text-gray-300">
                        Saya setuju dengan <a href="#" class="text-yellow-400 hover:underline">Syarat & Ketentuan</a> dan <a href="#" class="text-yellow-400 hover:underline">Kebijakan Privasi</a>
                    </label>
                </div>

                <button type="submit" 
                    class="w-full py-3 bg-gradient-to-r from-yellow-400 to-pink-500 text-gray-900 font-bold rounded-xl hover:from-yellow-300 hover:to-pink-400 transition transform hover:-translate-y-0.5 shadow-lg">
                    Daftar Sekarang
                </button>
            </form>

            <!-- Divider -->
            <div class="flex items-center my-6">
                <div class="flex-1 border-t border-white/20"></div>
                <span class="px-3 text-gray-400 text-sm">atau daftar dengan</span>
                <div class="flex-1 border-t border-white/20"></div>
            </div>

            <!-- Social Login Buttons -->
            <div class="grid grid-cols-2 gap-3">
                <button onclick="alert('Login dengan Google')" class="flex items-center justify-center gap-2 py-3 px-4 bg-white/10 border border-white/20 rounded-xl text-white hover:bg-white/20 transition transform hover:-translate-y-0.5">
                    <svg class="w-5 h-5" viewBox="0 0 24 24"><path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92a5.06 5.06 0 01-2.2 3.32v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.1z"/><path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/><path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/><path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/></svg>
                    Google
                </button>
                <button onclick="alert('Login dengan GitHub')" class="flex items-center justify-center gap-2 py-3 px-4 bg-white/10 border border-white/20 rounded-xl text-white hover:bg-white/20 transition transform hover:-translate-y-0.5">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0024 12c0-6.63-5.37-12-12-12z"/></svg>
                    GitHub
                </button>
            </div>

            <!-- Login Link -->
            <p class="text-center text-gray-400 text-sm mt-6">
                Sudah punya akun? 
                <a href="<?= BASE_URL ?>/auth/login" class="text-yellow-400 hover:text-yellow-300 font-medium transition">Masuk di sini</a>
            </p>
        </div>
    </div>
</div>

<!-- Script Toggle Password -->
<script>
function togglePassword(id, btn) {
    const input = document.getElementById(id);
    const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
    input.setAttribute('type', type);
}
</script>

<?php require VIEW_PATH . 'templates/footer.php'; ?>