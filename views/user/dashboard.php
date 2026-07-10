<?php require VIEW_PATH . 'templates/header.php'; ?>

<div class="flex min-h-screen bg-gradient-to-br from-gray-900 via-indigo-900 to-purple-800">
    
    <?php $currentPage = 'dashboard'; ?>
    <?php require VIEW_PATH . 'templates/sidebar_user.php'; ?>

    <!-- Main Content -->
    <main class="flex-1 p-6 lg:p-10 pt-20 lg:pt-10 transition-all duration-300">
        <div class="max-w-7xl mx-auto">
            <!-- Flash Message -->
            <?php if ($flash = $this->getFlash('success')): ?>
                <div class="bg-green-500/20 border border-green-400 text-green-200 px-6 py-4 rounded-2xl mb-6 flex items-center justify-between animate-fade-in-up">
                    <span><?= $flash ?></span>
                    <button onclick="this.parentElement.remove()" class="text-green-300 hover:text-white text-xl leading-none">&times;</button>
                </div>
            <?php endif; ?>

            <!-- Header -->
            <div class="mb-8 animate-fade-in-up">
                <h1 class="text-3xl font-bold bg-gradient-to-r from-yellow-400 to-pink-500 bg-clip-text text-transparent">Dashboard Saya</h1>
                <p class="text-gray-400 mt-1">Selamat datang, <?= Auth::user()['full_name'] ?? Auth::user()['username'] ?></p>
            </div>

            <!-- Info Saldo & Stats -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white/5 backdrop-blur-lg border border-white/10 rounded-2xl p-6 hover:scale-105 transition-all duration-300 animate-fade-in-up delay-100">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-400 text-sm">Saldo Anda</p>
                            <p class="text-3xl font-bold mt-1">Rp <?= number_format(Auth::user()['balance'] ?? 0, 0, ',', '.') ?></p>
                        </div>
                        <div class="p-3 bg-green-500/20 rounded-xl">
                            <svg class="w-8 h-8 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                    </div>
                </div>
                <div class="bg-white/5 backdrop-blur-lg border border-white/10 rounded-2xl p-6 hover:scale-105 transition-all duration-300 animate-fade-in-up delay-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-400 text-sm">Pembelian</p>
                            <p class="text-3xl font-bold mt-1"><?= $totalOrders ?? 0 ?></p>
                        </div>
                        <div class="p-3 bg-blue-500/20 rounded-xl">
                            <svg class="w-8 h-8 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                        </div>
                    </div>
                </div>
                <div class="bg-white/5 backdrop-blur-lg border border-white/10 rounded-2xl p-6 hover:scale-105 transition-all duration-300 animate-fade-in-up delay-300">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-400 text-sm">Penjualan</p>
                            <p class="text-3xl font-bold mt-1"><?= $totalSales ?? 0 ?></p>
                        </div>
                        <div class="p-3 bg-yellow-500/20 rounded-xl">
                            <svg class="w-8 h-8 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Menu Cepat -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
                <a href="<?= BASE_URL ?>/user/orders" class="bg-white/5 backdrop-blur-lg border border-white/10 rounded-2xl p-6 text-center hover:bg-white/10 transition-all duration-300 hover:scale-105 animate-fade-in-up delay-100">
                    <div class="text-4xl mb-3">🛒</div>
                    <h3 class="text-white font-semibold text-sm">Pembelian</h3>
                    <p class="text-gray-400 text-xs mt-1">Lihat order</p>
                </a>
                <a href="<?= BASE_URL ?>/user/sales" class="bg-white/5 backdrop-blur-lg border border-white/10 rounded-2xl p-6 text-center hover:bg-white/10 transition-all duration-300 hover:scale-105 animate-fade-in-up delay-200">
                    <div class="text-4xl mb-3">💰</div>
                    <h3 class="text-white font-semibold text-sm">Penjualan</h3>
                    <p class="text-gray-400 text-xs mt-1">Produk terjual</p>
                </a>
                <a href="<?= BASE_URL ?>/product/upload" class="bg-white/5 backdrop-blur-lg border border-white/10 rounded-2xl p-6 text-center hover:bg-white/10 transition-all duration-300 hover:scale-105 animate-fade-in-up delay-300">
                    <div class="text-4xl mb-3">📦</div>
                    <h3 class="text-white font-semibold text-sm">Upload</h3>
                    <p class="text-gray-400 text-xs mt-1">Jual produk</p>
                </a>
                <a href="<?= BASE_URL ?>/user/wishlist" class="bg-white/5 backdrop-blur-lg border border-white/10 rounded-2xl p-6 text-center hover:bg-white/10 transition-all duration-300 hover:scale-105 animate-fade-in-up delay-400">
                    <div class="text-4xl mb-3">❤️</div>
                    <h3 class="text-white font-semibold text-sm">Wishlist</h3>
                    <p class="text-gray-400 text-xs mt-1">Favorit</p>
                </a>
            </div>

            <!-- Notifikasi -->
            <?php if (!empty($notifications)): ?>
            <div class="bg-white/5 backdrop-blur-lg border border-white/10 rounded-2xl p-6 animate-fade-in-up delay-500">
                <h2 class="text-lg font-semibold mb-4">Notifikasi</h2>
                <div class="space-y-3">
                    <?php foreach ($notifications as $notif): ?>
                    <div class="flex items-start gap-3 p-3 rounded-xl <?= $notif['is_read'] ? 'bg-transparent' : 'bg-yellow-400/10' ?>">
                        <div class="w-2 h-2 mt-2 rounded-full <?= $notif['is_read'] ? 'bg-gray-500' : 'bg-yellow-400' ?>"></div>
                        <div class="flex-1">
                            <p class="text-sm text-gray-300"><?= htmlspecialchars($notif['message']) ?></p>
                            <span class="text-xs text-gray-500"><?= date('d M H:i', strtotime($notif['created_at'])) ?></span>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </main>
</div>

<?php require VIEW_PATH . 'templates/footer.php'; ?>