<?php require VIEW_PATH . 'templates/header.php'; ?>

<div class="flex min-h-screen bg-gradient-to-br from-gray-900 via-indigo-900 to-purple-800">
    
    <?php $currentPage = 'withdraw'; ?>
    <?php require VIEW_PATH . 'templates/sidebar_user.php'; ?>

    <!-- Main Content -->
    <main class="flex-1 p-6 lg:p-10 pt-20 lg:pt-10 transition-all duration-300">
        <div class="max-w-md mx-auto">
            <div class="mb-8 animate-fade-in-up">
                <h1 class="text-3xl font-bold bg-gradient-to-r from-yellow-400 to-pink-500 bg-clip-text text-transparent">Withdraw Saldo</h1>
                <p class="text-gray-400 mt-1">Tarik saldo ke rekening Anda.</p>
            </div>

            <div class="bg-white/5 backdrop-blur-lg border border-white/10 rounded-2xl p-6 animate-fade-in-up delay-100">
                <?php if (isset($error)): ?>
                    <div class="bg-red-500/20 border border-red-400 text-red-200 px-4 py-3 rounded-xl mb-4"><?= $error ?></div>
                <?php endif; ?>
                <div class="mb-4">
                    <p class="text-gray-400">Saldo tersedia:</p>
                    <p class="text-2xl font-bold text-white">Rp <?= number_format(Auth::user()['balance'] ?? 0, 0, ',', '.') ?></p>
                </div>
                <form method="POST" class="space-y-4">
                    <input type="hidden" name="csrf_token" value="<?= $this->csrfToken() ?>">
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-1">Jumlah Penarikan</label>
                        <input type="number" name="amount" required class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-yellow-400" placeholder="Masukkan jumlah">
                    </div>
                    <button type="submit" class="w-full py-2 bg-gradient-to-r from-yellow-400 to-pink-500 text-gray-900 font-bold rounded-xl hover:from-yellow-300 hover:to-pink-400 transition">Withdraw</button>
                </form>
            </div>
        </div>
    </main>
</div>

<?php require VIEW_PATH . 'templates/footer.php'; ?>