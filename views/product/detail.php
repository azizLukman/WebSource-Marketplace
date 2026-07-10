<?php require VIEW_PATH . 'templates/header.php'; ?>

<div class="min-h-screen bg-gradient-to-br from-gray-900 via-indigo-900 to-purple-800 py-8">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="md:col-span-2 bg-white/5 backdrop-blur-lg border border-white/10 rounded-2xl p-6 animate-fade-in-up">
                <h1 class="text-2xl font-bold text-white"><?= htmlspecialchars($product['title']) ?></h1>
                <p class="text-gray-400 mt-2">oleh <?= htmlspecialchars($product['seller_name']) ?></p>
                <p class="text-gray-300 mt-4"><?= nl2br(htmlspecialchars($product['description'])) ?></p>
                <?php if ($product['demo_url']): ?>
                    <a href="<?= $product['demo_url'] ?>" target="_blank" class="text-yellow-400 hover:underline mt-2 inline-block">Demo</a>
                <?php endif; ?>
            </div>
            <div class="bg-white/5 backdrop-blur-lg border border-white/10 rounded-2xl p-6 animate-fade-in-up delay-100">
                <h3 class="text-lg font-semibold text-white mb-4">Harga</h3>
                <p class="text-2xl font-bold text-white">Rp <?= number_format($product['price_regular'],0,',','.') ?></p>
                <?php if ($product['price_extended']): ?>
                    <p class="text-lg text-gray-400">Extended: Rp <?= number_format($product['price_extended'],0,',','.') ?></p>
                <?php endif; ?>
                <?php if (Auth::check() && !Auth::isAdmin()): ?>
                <form action="<?= BASE_URL ?>/product/buy" method="POST" class="mt-4 space-y-3">
                    <input type="hidden" name="csrf_token" value="<?= $this->csrfToken() ?>">
                    <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                    <select name="license_type" class="w-full px-4 py-2 bg-white/10 border border-white/20 rounded-xl text-white">
                        <option value="regular">Regular</option>
                        <?php if ($product['price_extended']): ?>
                            <option value="extended">Extended</option>
                        <?php endif; ?>
                    </select>
                    <button type="submit" class="w-full py-2 bg-gradient-to-r from-yellow-400 to-pink-500 text-gray-900 font-bold rounded-xl hover:from-yellow-300 hover:to-pink-400 transition">Beli Sekarang</button>
                </form>
                <?php elseif (!Auth::check()): ?>
                    <a href="<?= BASE_URL ?>/auth/login" class="block text-center mt-4 py-2 bg-yellow-400 text-gray-900 rounded-xl font-bold">Login untuk Membeli</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php require VIEW_PATH . 'templates/footer.php'; ?>