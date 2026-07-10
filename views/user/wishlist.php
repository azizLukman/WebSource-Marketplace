<?php require VIEW_PATH . 'templates/header.php'; ?>

<div class="flex min-h-screen bg-gradient-to-br from-gray-900 via-indigo-900 to-purple-800">
    
    <?php $currentPage = 'wishlist'; ?>
    <?php require VIEW_PATH . 'templates/sidebar_user.php'; ?>

    <!-- Main Content -->
    <main class="flex-1 p-6 lg:p-10 pt-20 lg:pt-10 transition-all duration-300">
        <div class="max-w-7xl mx-auto">
            <div class="mb-8 animate-fade-in-up">
                <h1 class="text-3xl font-bold bg-gradient-to-r from-yellow-400 to-pink-500 bg-clip-text text-transparent">Wishlist Saya</h1>
                <p class="text-gray-400 mt-1">Produk yang Anda favoritkan.</p>
            </div>

            <?php if (!empty($products)): ?>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                <?php foreach ($products as $p): ?>
                    <div class="bg-white/5 backdrop-blur-lg border border-white/10 rounded-2xl p-4 hover:scale-105 transition-all duration-300 animate-fade-in-up">
                        <h3 class="text-white font-semibold"><?= htmlspecialchars($p['title']) ?></h3>
                        <p class="text-gray-400 text-sm">Rp <?= number_format($p['price_regular'],0,',','.') ?></p>
                        <a href="<?= BASE_URL ?>/product/detail/<?= $p['id'] ?>" class="text-yellow-400 hover:underline text-sm">Detail</a>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php else: ?>
            <div class="text-center py-12 text-gray-400 bg-white/5 backdrop-blur-lg border border-white/10 rounded-2xl animate-fade-in-up">
                <p>Wishlist kosong.</p>
                <a href="<?= BASE_URL ?>" class="text-yellow-400 hover:underline mt-2 inline-block">Jelajahi Produk</a>
            </div>
            <?php endif; ?>
        </div>
    </main>
</div>

<?php require VIEW_PATH . 'templates/footer.php'; ?>