<?php require VIEW_PATH . 'templates/header.php'; ?>

<div class="flex min-h-screen bg-gradient-to-br from-gray-900 via-indigo-900 to-purple-800">
    
    <?php $currentPage = 'products'; ?>
    <?php require VIEW_PATH . 'templates/sidebar_user.php'; ?>

    <main class="flex-1 p-6 lg:p-10 pt-20 lg:pt-10 transition-all duration-300">
        <div class="max-w-7xl mx-auto">
            <div class="mb-8 animate-fade-in-up">
                <h1 class="text-3xl font-bold bg-gradient-to-r from-yellow-400 to-pink-500 bg-clip-text text-transparent">Produk Saya</h1>
                <p class="text-gray-400 mt-1">Daftar produk yang Anda upload.</p>
            </div>

            <div class="bg-white/5 backdrop-blur-lg border border-white/10 rounded-2xl overflow-hidden animate-fade-in-up delay-100">
                <?php if (!empty($products)): ?>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead class="bg-white/5">
                            <tr class="text-left text-gray-400">
                                <th class="p-4">Judul</th>
                                <th class="p-4">Harga</th>
                                <th class="p-4">Status</th>
                                <th class="p-4">Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($products as $p): ?>
                            <tr class="border-t border-white/5">
                                <td class="p-4 font-medium"><?= htmlspecialchars($p['title']) ?></td>
                                <td class="p-4">Rp <?= number_format($p['price_regular'],0,',','.') ?></td>
                                <td class="p-4">
                                    <?php
                                    $statusColors = [
                                        'approved' => 'bg-green-400/20 text-green-400',
                                        'pending' => 'bg-yellow-400/20 text-yellow-400',
                                        'rejected' => 'bg-red-400/20 text-red-400'
                                    ];
                                    $color = $statusColors[$p['status']] ?? 'bg-gray-400/20 text-gray-400';
                                    ?>
                                    <span class="px-2 py-1 rounded-full text-xs <?= $color ?>"><?= $p['status'] ?></span>
                                </td>
                                <td class="p-4 text-gray-400"><?= date('d M Y', strtotime($p['created_at'])) ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <?php else: ?>
                <div class="p-12 text-center text-gray-400">
                    <p>Anda belum mengupload produk.</p>
                    <a href="<?= BASE_URL ?>/product/upload" class="text-yellow-400 hover:underline mt-2 inline-block">Upload sekarang</a>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </main>
</div>

<?php require VIEW_PATH . 'templates/footer.php'; ?>