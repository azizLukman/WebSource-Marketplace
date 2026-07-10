<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/style.css">
    <script>const BASE_URL = '<?= BASE_URL ?>';</script>
</head>
<body class="bg-gray-900 text-white font-sans antialiased">

<div class="flex min-h-screen">
    <?php $currentPage = 'transactions'; ?>
    <?php require VIEW_PATH . 'templates/sidebar_admin.php'; ?>

    <main class="flex-1 p-6 lg:p-10 pt-20 lg:pt-10 transition-all duration-300">
        <div class="max-w-7xl mx-auto">
            <div class="mb-8 animate-fade-in-up">
                <h1 class="text-3xl font-bold bg-gradient-to-r from-yellow-400 to-pink-500 bg-clip-text text-transparent">Transaksi</h1>
                <p class="text-gray-400 mt-1">Verifikasi pembayaran dan kelola order.</p>
            </div>

            <div class="bg-white/5 backdrop-blur-lg border border-white/10 rounded-2xl overflow-hidden animate-fade-in-up delay-100">
                <?php if (!empty($orders)): ?>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead class="bg-white/5">
                            <tr class="text-left text-gray-400">
                                <th class="p-4">ID</th>
                                <th class="p-4">Pembeli</th>
                                <th class="p-4">Produk</th>
                                <th class="p-4">Jumlah</th>
                                <th class="p-4">Status</th>
                                <th class="p-4">Bukti</th>
                                <th class="p-4">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($orders as $o): ?>
                            <tr class="border-t border-white/5">
                                <td class="p-4">#<?= $o['id'] ?></td>
                                <td class="p-4"><?= htmlspecialchars($o['buyer_name']) ?></td>
                                <td class="p-4"><?= htmlspecialchars($o['product_title']) ?></td>
                                <td class="p-4">Rp <?= number_format($o['amount'],0,',','.') ?></td>
                                <td class="p-4">
                                    <?php
                                    $statusColors = [
                                        'paid' => 'bg-green-400/20 text-green-400',
                                        'pending' => 'bg-yellow-400/20 text-yellow-400',
                                        'cancelled' => 'bg-red-400/20 text-red-400',
                                        'completed' => 'bg-blue-400/20 text-blue-400'
                                    ];
                                    $color = $statusColors[$o['status']] ?? 'bg-gray-400/20 text-gray-400';
                                    ?>
                                    <span class="px-2 py-1 rounded-full text-xs <?= $color ?>"><?= $o['status'] ?></span>
                                </td>
                                <td class="p-4">
                                    <?php if ($o['payment_proof']): ?>
                                        <a href="<?= BASE_URL ?>/storage/payments/<?= $o['payment_proof'] ?>" target="_blank" class="text-blue-400 hover:underline">Lihat</a>
                                    <?php else: ?>
                                        <span class="text-gray-500">-</span>
                                    <?php endif; ?>
                                </td>
                                <td class="p-4">
                                    <?php if ($o['status'] == 'pending' && $o['payment_proof']): ?>
                                        <a href="<?= BASE_URL ?>/admin/verifyPayment/<?= $o['id'] ?>" class="text-green-400 hover:underline">Verifikasi</a>
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
                    <p>Tidak ada transaksi.</p>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </main>
</div>
</body>
</html>