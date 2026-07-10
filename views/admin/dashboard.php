<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - KodeMarket</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <script>const BASE_URL = '<?= BASE_URL ?>';</script>
</head>
<body class="bg-gray-900 text-white font-sans antialiased">

<div class="flex min-h-screen">
    
    <?php $currentPage = 'dashboard'; ?>
    <?php require VIEW_PATH . 'templates/sidebar_admin.php'; ?>

    <!-- Main Content -->
    <main class="flex-1 p-6 lg:p-10 pt-20 lg:pt-10 transition-all duration-300">
        <div class="max-w-7xl mx-auto">
            <!-- Header dengan animasi -->
            <div class="mb-8 animate-fade-in-up">
                <h1 class="text-3xl font-bold bg-gradient-to-r from-yellow-400 to-pink-500 bg-clip-text text-transparent">Dashboard</h1>
                <p class="text-gray-400 mt-1">Selamat datang, <?= Auth::user()['full_name'] ?? Auth::user()['username'] ?></p>
            </div>

            <!-- Statistik Cards dengan animasi hover -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="bg-white/5 backdrop-blur-lg border border-white/10 rounded-2xl p-6 hover:scale-105 hover:bg-white/10 transition-all duration-300 animate-fade-in-up delay-100">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-400 text-sm">Total User</p>
                            <p class="text-3xl font-bold mt-1"><?= $totalUsers ?></p>
                        </div>
                        <div class="p-3 bg-blue-500/20 rounded-xl">
                            <svg class="w-8 h-8 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        </div>
                    </div>
                </div>

                <div class="bg-white/5 backdrop-blur-lg border border-white/10 rounded-2xl p-6 hover:scale-105 hover:bg-white/10 transition-all duration-300 animate-fade-in-up delay-200">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-400 text-sm">Total Produk</p>
                            <p class="text-3xl font-bold mt-1"><?= $totalProducts ?></p>
                        </div>
                        <div class="p-3 bg-green-500/20 rounded-xl">
                            <svg class="w-8 h-8 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                        </div>
                    </div>
                </div>

                <div class="bg-white/5 backdrop-blur-lg border border-white/10 rounded-2xl p-6 hover:scale-105 hover:bg-white/10 transition-all duration-300 animate-fade-in-up delay-300">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-400 text-sm">Total Order</p>
                            <p class="text-3xl font-bold mt-1"><?= $totalOrders ?></p>
                        </div>
                        <div class="p-3 bg-yellow-500/20 rounded-xl">
                            <svg class="w-8 h-8 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                        </div>
                    </div>
                </div>

                <div class="bg-white/5 backdrop-blur-lg border border-white/10 rounded-2xl p-6 hover:scale-105 hover:bg-white/10 transition-all duration-300 animate-fade-in-up delay-400">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-400 text-sm">Pendapatan</p>
                            <p class="text-3xl font-bold mt-1">Rp <?= number_format((float)$revenue, 0, ',', '.') ?></p>
                        </div>
                        <div class="p-3 bg-pink-500/20 rounded-xl">
                            <svg class="w-8 h-8 text-pink-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Grafik & Recent Orders -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <div class="lg:col-span-2 bg-white/5 backdrop-blur-lg border border-white/10 rounded-2xl p-6 animate-fade-in-up delay-500">
                    <h2 class="text-lg font-semibold mb-4">Order per Bulan</h2>
                    <div style="max-height: 220px;">
                        <canvas id="orderChart" height="100"></canvas>
                    </div>
                </div>
                <div class="bg-white/5 backdrop-blur-lg border border-white/10 rounded-2xl p-6 animate-fade-in-up delay-600">
                    <h2 class="text-lg font-semibold mb-4">Order Terbaru</h2>
                    <?php if (!empty($recentOrders)): ?>
                        <div class="space-y-4">
                            <?php foreach ($recentOrders as $ord): ?>
                            <div class="flex justify-between items-center border-b border-white/10 pb-2 text-sm">
                                <div>
                                    <p class="font-medium"><?= htmlspecialchars($ord['product_title']) ?></p>
                                    <p class="text-gray-400"><?= htmlspecialchars($ord['buyer_name']) ?></p>
                                </div>
                                <span class="px-2 py-1 rounded-full text-xs <?= $ord['status']=='paid' ? 'bg-green-400/20 text-green-400' : 'bg-yellow-400/20 text-yellow-400' ?>"><?= $ord['status'] ?></span>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    <?php else: ?>
                        <p class="text-gray-400 text-sm">Belum ada order.</p>
                    <?php endif; ?>
                    <a href="<?= BASE_URL ?>/admin/transactions" class="block text-center text-yellow-400 text-sm mt-4 hover:underline">Lihat semua</a>
                </div>
            </div>
        </div>
    </main>
</div>

<script>
// Chart dengan ukuran lebih pendek
const ctx = document.getElementById('orderChart').getContext('2d');
new Chart(ctx, {
    type: 'bar',
    data: {
        labels: <?= json_encode($chartLabels) ?>,
        datasets: [{
            label: 'Jumlah Order',
            data: <?= json_encode($chartData) ?>,
            backgroundColor: 'rgba(250, 204, 21, 0.6)',
            borderColor: 'rgba(250, 204, 21, 1)',
            borderWidth: 1,
            borderRadius: 8,
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        animation: {
            duration: 800,
            easing: 'easeOutBounce'
        },
        scales: {
            y: {
                beginAtZero: true,
                ticks: { color: '#aaa', stepSize: 1, precision: 0 },
                grid: { color: 'rgba(255,255,255,0.1)' }
            },
            x: {
                ticks: { color: '#aaa' },
                grid: { display: false }
            }
        },
        plugins: {
            legend: { display: false }
        }
    }
});
</script>
</body>
</html>