<?php require VIEW_PATH . 'templates/header.php'; ?>

<div class="flex min-h-screen bg-gradient-to-br from-gray-900 via-indigo-900 to-purple-800">
    <?php $currentPage = 'orders'; ?>
    <?php require VIEW_PATH . 'templates/sidebar_user.php'; ?>

    <main class="flex-1 p-6 lg:p-10 pt-20 lg:pt-10 transition-all duration-300">
        <div class="max-w-xl mx-auto">
            <div class="bg-white/5 backdrop-blur-lg border border-white/10 rounded-2xl p-8 animate-fade-in-up">
                <!-- Icon Sukses -->
                <div class="text-center mb-6">
                    <div class="w-16 h-16 bg-green-500/20 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-white">Pesanan Dibuat!</h2>
                    <p class="text-gray-400 mt-1">Silakan lakukan pembayaran sesuai petunjuk.</p>
                </div>

                <!-- Detail Order -->
                <div class="bg-white/5 rounded-xl p-4 mb-6">
                    <div class="flex justify-between mb-2">
                        <span class="text-gray-400">Order ID:</span>
                        <span class="text-white font-medium">#<?= $order['id'] ?></span>
                    </div>
                    <div class="flex justify-between mb-2">
                        <span class="text-gray-400">Produk:</span>
                        <span class="text-white font-medium"><?= htmlspecialchars($order['product_title']) ?></span>
                    </div>
                    <div class="flex justify-between mb-2">
                        <span class="text-gray-400">Lisensi:</span>
                        <span class="text-white font-medium"><?= $order['license_type'] ?></span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-400">Total Bayar:</span>
                        <span class="text-2xl font-bold text-yellow-400">Rp <?= number_format($order['amount'], 0, ',', '.') ?></span>
                    </div>
                </div>

                <!-- Info Rekening -->
                <div class="bg-yellow-400/10 border border-yellow-400/20 rounded-xl p-6 mb-6">
                    <h3 class="text-yellow-400 font-semibold mb-3 flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg>
                        Transfer ke Rekening
                    </h3>
                    <div class="space-y-2 text-sm">
                        <p class="text-gray-300"><span class="text-gray-400">Bank:</span> <strong><?= htmlspecialchars($bankName) ?></strong></p>
                        <p class="text-gray-300"><span class="text-gray-400">No. Rekening:</span> <strong class="text-xl tracking-wider"><?= htmlspecialchars($accountNumber) ?></strong></p>
                        <p class="text-gray-300"><span class="text-gray-400">Atas Nama:</span> <strong><?= htmlspecialchars($accountHolder) ?></strong></p>
                    </div>
                </div>

                <!-- Instruksi -->
                <div class="bg-white/5 rounded-xl p-4 mb-6 text-sm text-gray-300">
                    <ol class="list-decimal list-inside space-y-2">
                        <li>Transfer tepat <strong class="text-white">Rp <?= number_format($order['amount'], 0, ',', '.') ?></strong> ke rekening di atas.</li>
                        <li>Simpan bukti transfer (struk/screenshot).</li>
                        <li>Upload bukti melalui tombol di bawah.</li>
                        <li>Admin akan memverifikasi pembayaran Anda (max 1x24 jam).</li>
                        <li>Setelah diverifikasi, Anda bisa download produk.</li>
                    </ol>
                </div>

                <!-- Tombol Upload Bukti -->
                <a href="<?= BASE_URL ?>/payment/upload/<?= $order['id'] ?>" class="block w-full text-center py-3 bg-gradient-to-r from-yellow-400 to-pink-500 text-gray-900 font-bold rounded-xl hover:from-yellow-300 hover:to-pink-400 transition transform hover:-translate-y-0.5">
                    Upload Bukti Pembayaran
                </a>
                <a href="<?= BASE_URL ?>/user/orders" class="block w-full text-center py-2 mt-3 text-gray-400 hover:text-white transition">
                    Lihat Semua Pesanan
                </a>
            </div>
        </div>
    </main>
</div>

<?php require VIEW_PATH . 'templates/footer.php'; ?>