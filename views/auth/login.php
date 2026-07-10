<?php require VIEW_PATH . 'templates/header.php'; ?>

<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-gray-900 via-indigo-900 to-purple-800 relative overflow-hidden">
    <!-- Background pattern -->
    <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>
    
    <!-- Card Container -->
    <div class="relative z-10 w-full max-w-md mx-4">
    <!-- Ilustrasi kecil -->
<div class="flex justify-center mb-6">
    <img src="https://illustrations.popsy.co/amber/secure-login.svg" alt="Login" class="w-32 h-32 animate-float">
</div>    
    <div class="bg-white/10 backdrop-blur-lg rounded-3xl shadow-2xl p-8 border border-white/20 reveal fade-up">
            <!-- Logo / Brand -->
            <div class="text-center mb-8">
                <a href="<?= BASE_URL ?>" class="text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-yellow-300 to-pink-400">
                    KodeMarket
                </a>
                <p class="text-gray-300 mt-2">Masuk ke akun Anda</p>
            </div>

            <!-- Error Message -->
            <?php if (isset($error)): ?>
                <div class="bg-red-500/20 border border-red-400 text-red-200 px-4 py-3 rounded-xl mb-4 text-sm">
                    <?= $error ?>
                </div>
            <?php endif; ?>

            <!-- Login Form -->
            <form method="POST" class="space-y-5">
                <input type="hidden" name="csrf_token" value="<?= $this->csrfToken() ?>">
                
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-300 mb-1">Email</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </span>
                        <input type="email" name="email" id="email" required 
                            class="w-full pl-10 pr-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent transition"
                            placeholder="anda@email.com">
                    </div>
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-300 mb-1">Password</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                        </span>
                        <input type="password" name="password" id="password" required 
                            class="w-full pl-10 pr-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:border-transparent transition"
                            placeholder="••••••••">
                    </div>
                </div>

                <button type="submit" 
                    class="w-full py-3 bg-gradient-to-r from-yellow-400 to-pink-500 text-gray-900 font-bold rounded-xl hover:from-yellow-300 hover:to-pink-400 transition transform hover:-translate-y-0.5 shadow-lg">
                    Masuk
                </button>
            </form>

            <!-- Register Link -->
            <p class="text-center text-gray-400 text-sm mt-6">
                Belum punya akun? 
                <a href="<?= BASE_URL ?>/auth/register" class="text-yellow-400 hover:text-yellow-300 font-medium transition">Daftar sekarang</a>
            </p>
        </div>
    </div>
</div>

<?php require VIEW_PATH . 'templates/footer.php'; ?>