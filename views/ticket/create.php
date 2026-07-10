<?php require VIEW_PATH . 'templates/header.php'; ?>

<div class="min-h-screen bg-gradient-to-br from-gray-900 via-indigo-900 to-purple-800 py-8">
    <div class="max-w-md mx-auto px-4">
        <div class="bg-white/5 backdrop-blur-lg border border-white/10 rounded-2xl p-6 animate-fade-in-up">
            <h1 class="text-2xl font-bold text-white mb-4">Buat Tiket Baru</h1>
            <form method="POST" action="<?= BASE_URL ?>/tickets/create">
                <input type="hidden" name="csrf_token" value="<?= $this->csrfToken() ?>">
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-300 mb-1">Subjek</label>
                    <input type="text" name="subject" required class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-300 mb-1">Pesan</label>
                    <textarea name="message" rows="5" required class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-yellow-400"></textarea>
                </div>
                <button type="submit" class="w-full py-2 bg-gradient-to-r from-yellow-400 to-pink-500 text-gray-900 font-bold rounded-xl hover:from-yellow-300 hover:to-pink-400 transition">Kirim</button>
            </form>
        </div>
    </div>
</div>

<?php require VIEW_PATH . 'templates/footer.php'; ?>