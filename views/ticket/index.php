<?php require VIEW_PATH . 'templates/header.php'; ?>

<div class="flex min-h-screen bg-gradient-to-br from-gray-900 via-indigo-900 to-purple-800">
    
    <?php $currentPage = 'tickets'; ?>
    <?php require VIEW_PATH . 'templates/sidebar_user.php'; ?>

    <!-- Main Content -->
    <main class="flex-1 p-6 lg:p-10 pt-20 lg:pt-10 transition-all duration-300">
        <div class="max-w-4xl mx-auto">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8 animate-fade-in-up">
                <div>
                    <h1 class="text-3xl font-bold bg-gradient-to-r from-yellow-400 to-pink-500 bg-clip-text text-transparent">Tiket Support</h1>
                    <p class="text-gray-400 mt-1">Keluhan atau pertanyaan untuk admin.</p>
                </div>
                <a href="<?= BASE_URL ?>/tickets/create" class="mt-4 sm:mt-0 inline-flex items-center gap-2 bg-yellow-400 text-gray-900 px-5 py-2.5 rounded-xl font-semibold hover:bg-yellow-300 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                    Buat Tiket
                </a>
            </div>

            <?php if (!empty($tickets)): ?>
            <div class="space-y-4">
                <?php foreach ($tickets as $ticket): ?>
                <div class="bg-white/5 backdrop-blur-lg border border-white/10 rounded-2xl p-6 animate-fade-in-up">
                    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-start gap-2 mb-4">
                        <div>
                            <h3 class="text-white font-semibold text-lg"><?= htmlspecialchars($ticket['subject']) ?></h3>
                            <p class="text-gray-400 text-sm">
                                Dibuat: <?= date('d M Y H:i', strtotime($ticket['created_at'])) ?>
                            </p>
                        </div>
                        <span class="px-3 py-1 rounded-full text-xs font-medium self-start <?= $ticket['status'] == 'open' ? 'bg-yellow-400/20 text-yellow-400' : 'bg-green-400/20 text-green-400' ?>">
                            <?= $ticket['status'] == 'open' ? 'Menunggu' : 'Terjawab' ?>
                        </span>
                    </div>
                    <div class="bg-white/5 rounded-xl p-4 mb-4">
                        <p class="text-gray-300 text-sm"><?= nl2br(htmlspecialchars($ticket['message'])) ?></p>
                    </div>
                    <?php if ($ticket['admin_reply']): ?>
                        <div class="bg-green-400/10 border border-green-400/20 rounded-xl p-4">
                            <p class="text-green-400 text-sm font-medium mb-1">Balasan Admin:</p>
                            <p class="text-gray-300 text-sm"><?= nl2br(htmlspecialchars($ticket['admin_reply'])) ?></p>
                        </div>
                    <?php else: ?>
                        <p class="text-gray-500 text-xs italic">Belum ada balasan dari admin.</p>
                    <?php endif; ?>
                </div>
                <?php endforeach; ?>
            </div>
            <?php else: ?>
            <div class="bg-white/5 backdrop-blur-lg border border-white/10 rounded-2xl p-12 text-center text-gray-400 animate-fade-in-up">
                <p>Belum ada tiket.</p>
                <a href="<?= BASE_URL ?>/tickets/create" class="text-yellow-400 hover:underline mt-2 inline-block">Buat tiket pertama</a>
            </div>
            <?php endif; ?>
        </div>
    </main>
</div>

<?php require VIEW_PATH . 'templates/footer.php'; ?>