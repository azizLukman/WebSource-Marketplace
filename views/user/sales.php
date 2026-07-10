<?php require VIEW_PATH . 'templates/header.php'; ?>

<div class="flex min-h-screen bg-gradient-to-br from-gray-900 via-indigo-900 to-purple-800">
    
    <?php $currentPage = 'sales'; ?>
    <?php require VIEW_PATH . 'templates/sidebar_user.php'; ?>

    <!-- Main Content -->
    <main class="flex-1 p-6 lg:p-10 pt-20 lg:pt-10 transition-all duration-300">
        <div class="max-w-7xl mx-auto">
            <div class="mb-8 animate-fade-in-up">
                <h1 class="text-3xl font-bold bg-gradient-to-r from-yellow-400 to-pink-500 bg-clip-text text-transparent">Penjualan Saya</h1>
                <p class="text-gray-400 mt-1">Produk yang Anda jual.</p>
            </div>

            <div class="bg-white/5 backdrop-blur-lg border border-white/10 rounded-2xl overflow-hidden animate-fade-in-up delay-100">
                <?php if (!empty($sales)): ?>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead class="bg-white/5">
                            <tr class="text-left text-gray-400">
                                <th class="p-4">Pembeli</th>
                                <th class="p-4">Produk</th>
                                <th class="p-4">Jumlah</th>
                                <th class="p-4">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($sales as $sale): ?>
                            <tr class="border-t border-white/5">
                                <td class="p-4 font-medium"><?= htmlspecialchars($sale['buyer_name']) ?></td>
                                <td class="p-4"><?= htmlspecialchars($sale['product_title']) ?></td>
                                <td class="p-4">Rp <?= number_format($sale['amount'],0,',','.') ?></td>
                                <td class="p-4">
                                    <?php
                                    $statusColors = [
                                        'paid' => 'bg-green-400/20 text-green-400',
                                        'pending' => 'bg-yellow-400/20 text-yellow-400',
                                        'cancelled' => 'bg-red-400/20 text-red-400',
                                        'completed' => 'bg-blue-400/20 text-blue-400'
                                    ];
                                    $color = $statusColors[$sale['status']] ?? 'bg-gray-400/20 text-gray-400';
                                    ?>
                                    <span class="px-2 py-1 rounded-full text-xs <?= $color ?>"><?= $sale['status'] ?></span>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <?php else: ?>
                <div class="p-12 text-center text-gray-400">
                    <p>Belum ada penjualan.</p>
                    <a href="<?= BASE_URL ?>/product/upload" class="text-yellow-400 hover:underline mt-2 inline-block">Upload Produk</a>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </main>
</div>

<?php require VIEW_PATH . 'templates/footer.php'; ?>