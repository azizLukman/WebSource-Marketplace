<?php require VIEW_PATH . 'templates/header.php'; ?>

<div class="flex min-h-screen bg-gradient-to-br from-gray-900 via-indigo-900 to-purple-800">
    
    <?php $currentPage = 'orders'; ?>
    <?php require VIEW_PATH . 'templates/sidebar_user.php'; ?>

    <!-- Main Content -->
    <main class="flex-1 p-6 lg:p-10 pt-20 lg:pt-10 transition-all duration-300">
        <div class="max-w-7xl mx-auto">
            <div class="mb-8 animate-fade-in-up">
                <h1 class="text-3xl font-bold bg-gradient-to-r from-yellow-400 to-pink-500 bg-clip-text text-transparent">Pembelian Saya</h1>
                <p class="text-gray-400 mt-1">Daftar produk yang Anda beli.</p>
            </div>

            <?php
            // Info rekening dari settings
            $bankName = Helper::getSetting('bank_name');
            $accountNumber = Helper::getSetting('account_number');
            $accountHolder = Helper::getSetting('account_holder');
            ?>
            <?php if ($bankName && $accountNumber): ?>
            <div class="bg-yellow-400/10 border border-yellow-400/20 rounded-2xl p-4 mb-6 animate-fade-in-up">
                <p class="text-yellow-400 text-sm font-semibold mb-1">Informasi Pembayaran</p>
                <p class="text-gray-300 text-sm">
                    Transfer ke <strong><?= htmlspecialchars($bankName) ?></strong> 
                    <span class="text-white font-mono"><?= htmlspecialchars($accountNumber) ?></span> 
                    a.n <strong><?= htmlspecialchars($accountHolder) ?></strong>
                </p>
            </div>
            <?php endif; ?>

            <div class="bg-white/5 backdrop-blur-lg border border-white/10 rounded-2xl overflow-hidden animate-fade-in-up delay-100">
                <?php if (!empty($orders)): ?>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead class="bg-white/5">
                            <tr class="text-left text-gray-400">
                                <th class="p-4">Produk</th>
                                <th class="p-4">Lisensi</th>
                                <th class="p-4">Jumlah</th>
                                <th class="p-4">Status</th>
                                <th class="p-4">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($orders as $order): ?>
                            <tr class="border-t border-white/5">
                                <td class="p-4 font-medium"><?= htmlspecialchars($order['product_title']) ?></td>
                                <td class="p-4"><?= $order['license_type'] ?></td>
                                <td class="p-4">Rp <?= number_format($order['amount'],0,',','.') ?></td>
                                <td class="p-4">
                                    <?php
                                    $statusColors = [
                                        'paid' => 'bg-green-400/20 text-green-400',
                                        'pending' => 'bg-yellow-400/20 text-yellow-400',
                                        'cancelled' => 'bg-red-400/20 text-red-400',
                                        'completed' => 'bg-blue-400/20 text-blue-400'
                                    ];
                                    $color = $statusColors[$order['status']] ?? 'bg-gray-400/20 text-gray-400';
                                    ?>
                                    <span class="px-2 py-1 rounded-full text-xs <?= $color ?>"><?= $order['status'] ?></span>
                                </td>
                                <td class="p-4">
                                    <?php if ($order['status'] == 'pending' && !$order['payment_proof']): ?>
                                        <a href="<?= BASE_URL ?>/payment/upload/<?= $order['id'] ?>" class="text-yellow-400 hover:underline">Upload Bukti</a>
                                    <?php elseif ($order['status'] == 'paid'): ?>
                                        <a href="<?= BASE_URL ?>/user/download/<?= $order['id'] ?>" class="text-green-400 hover:underline">Download</a>
                                    <?php else: ?>
                                        <span class="text-gray-500">-</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <?php else: ?>
                <div class="p-12 text-center text-gray-400">
                    <p>Anda belum membeli produk apapun.</p>
                    <a href="<?= BASE_URL ?>" class="text-yellow-400 hover:underline mt-2 inline-block">Lihat Produk</a>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </main>
</div>

<?php require VIEW_PATH . 'templates/footer.php'; ?>