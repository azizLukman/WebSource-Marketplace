<?php require VIEW_PATH . 'templates/header.php'; ?>

<div class="flex min-h-screen bg-gradient-to-br from-gray-900 via-indigo-900 to-purple-800">
    <?php $currentPage = 'orders'; ?>
    <?php require VIEW_PATH . 'templates/sidebar_user.php'; ?>

    <main class="flex-1 p-6 lg:p-10 pt-20 lg:pt-10 transition-all duration-300">
        <div class="max-w-lg mx-auto">
            <div class="bg-white/5 backdrop-blur-lg border border-white/10 rounded-2xl p-6 animate-fade-in-up">
                <h1 class="text-2xl font-bold text-white mb-4">Upload Bukti Pembayaran</h1>
                <p class="text-gray-400 mb-2">Order #<?= $order['id'] ?> - <?= htmlspecialchars($order['product_title']) ?></p>
                <p class="text-2xl font-bold text-yellow-400 mb-6">Rp <?= number_format($order['amount'], 0, ',', '.') ?></p>

                <?php
                $bankName = Helper::getSetting('bank_name');
                $accountNumber = Helper::getSetting('account_number');
                $accountHolder = Helper::getSetting('account_holder');
                ?>
                <?php if ($bankName && $accountNumber): ?>
                <div class="bg-yellow-400/10 border border-yellow-400/20 rounded-xl p-4 mb-6 text-sm text-gray-300">
                    <p class="font-medium text-yellow-400 mb-1">Rekening Tujuan</p>
                    <p><strong><?= htmlspecialchars($bankName) ?></strong> - <?= htmlspecialchars($accountNumber) ?> (<?= htmlspecialchars($accountHolder) ?>)</p>
                </div>
                <?php endif; ?>

                <form method="POST" enctype="multipart/form-data" class="space-y-4">
                    <input type="hidden" name="csrf_token" value="<?= $this->csrfToken() ?>">
                    <div>
                        <input type="file" name="payment_proof" required 
                               class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white file:bg-yellow-400 file:text-gray-900 file:border-0 file:rounded-xl file:px-4 file:py-2 file:mr-4">
                    </div>
                    <button type="submit" 
                            class="w-full py-3 bg-gradient-to-r from-yellow-400 to-pink-500 text-gray-900 font-bold rounded-xl hover:from-yellow-300 hover:to-pink-400 transition">
                        Upload Bukti
                    </button>
                </form>
            </div>
        </div>
    </main>
</div>

<?php require VIEW_PATH . 'templates/footer.php'; ?>