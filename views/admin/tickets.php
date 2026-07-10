<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tiket Support - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/style.css">
    <script>const BASE_URL = '<?= BASE_URL ?>';</script>
</head>
<body class="bg-gray-900 text-white font-sans antialiased">

<div class="flex min-h-screen">
    <?php $currentPage = 'tickets'; ?>
    <?php require VIEW_PATH . 'templates/sidebar_admin.php'; ?>

    <main class="flex-1 p-6 lg:p-10 pt-20 lg:pt-10 transition-all duration-300">
        <div class="max-w-7xl mx-auto">
            <div class="mb-8 animate-fade-in-up">
                <h1 class="text-3xl font-bold bg-gradient-to-r from-yellow-400 to-pink-500 bg-clip-text text-transparent">Tiket Support</h1>
                <p class="text-gray-400 mt-1">Balas pertanyaan atau keluhan pengguna.</p>
            </div>

            <div class="space-y-6">
                <?php if (!empty($tickets)): ?>
                    <?php foreach ($tickets as $ticket): ?>
                    <div class="bg-white/5 backdrop-blur-lg border border-white/10 rounded-2xl p-6 animate-fade-in-up">
                        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-start mb-4">
                            <div>
                                <h3 class="font-semibold text-lg"><?= htmlspecialchars($ticket['subject']) ?></h3>
                                <p class="text-gray-400 text-sm">Dari: <?= htmlspecialchars($ticket['username']) ?> &bull; <?= date('d M Y H:i', strtotime($ticket['created_at'])) ?></p>
                            </div>
                            <span class="px-2 py-1 rounded-full text-xs <?= $ticket['status'] == 'open' ? 'bg-yellow-400/20 text-yellow-400' : 'bg-green-400/20 text-green-400' ?> mt-2 sm:mt-0 self-start">
                                <?= $ticket['status'] ?>
                            </span>
                        </div>
                        <div class="bg-white/5 rounded-xl p-4 mb-4">
                            <p class="text-gray-300"><?= nl2br(htmlspecialchars($ticket['message'])) ?></p>
                        </div>
                        <?php if ($ticket['admin_reply']): ?>
                        <div class="bg-green-400/10 border border-green-400/20 rounded-xl p-4 mb-4">
                            <p class="text-green-400 text-sm font-medium mb-1">Balasan Admin:</p>
                            <p class="text-gray-300"><?= nl2br(htmlspecialchars($ticket['admin_reply'])) ?></p>
                        </div>
                        <?php endif; ?>
                        <?php if ($ticket['status'] == 'open'): ?>
                        <form action="<?= BASE_URL ?>/admin/replyTicket" method="POST" class="flex flex-col sm:flex-row gap-3">
                            <input type="hidden" name="csrf_token" value="<?= $this->csrfToken() ?>">
                            <input type="hidden" name="ticket_id" value="<?= $ticket['id'] ?>">
                            <textarea name="reply" rows="2" class="flex-1 bg-white/10 border border-white/20 rounded-xl p-3 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-yellow-400" placeholder="Tulis balasan..."></textarea>
                            <button type="submit" class="bg-yellow-400 text-gray-900 px-6 py-2 rounded-xl font-semibold hover:bg-yellow-300 transition self-end">Kirim</button>
                        </form>
                        <?php endif; ?>
                    </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="bg-white/5 backdrop-blur-lg border border-white/10 rounded-2xl p-12 text-center text-gray-400">
                        <p>Tidak ada tiket.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </main>
</div>
</body>
</html>