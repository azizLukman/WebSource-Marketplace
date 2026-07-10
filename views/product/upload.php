<?php require VIEW_PATH . 'templates/header.php'; ?>

<div class="flex min-h-screen bg-gradient-to-br from-gray-900 via-indigo-900 to-purple-800">
    
    <?php $currentPage = 'upload'; ?>
    <?php require VIEW_PATH . 'templates/sidebar_user.php'; ?>

    <!-- Main Content -->
    <main class="flex-1 p-6 lg:p-10 pt-20 lg:pt-10 transition-all duration-300">
        <div class="max-w-3xl mx-auto">
            <div class="mb-8 animate-fade-in-up">
                <h1 class="text-3xl font-bold bg-gradient-to-r from-yellow-400 to-pink-500 bg-clip-text text-transparent">Upload Produk</h1>
                <p class="text-gray-400 mt-1">Jual website atau source code Anda.</p>
            </div>

            <div class="bg-white/5 backdrop-blur-lg border border-white/10 rounded-2xl p-6 animate-fade-in-up delay-100">
                <?php if (isset($error)): ?>
                    <div class="bg-red-500/20 border border-red-400 text-red-200 px-4 py-3 rounded-xl mb-4"><?= $error ?></div>
                <?php endif; ?>

                <form method="POST" enctype="multipart/form-data" class="space-y-5">
                    <input type="hidden" name="csrf_token" value="<?= $this->csrfToken() ?>">
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-1">Judul Produk</label>
                        <input type="text" name="title" required class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-1">Kategori (ID)</label>
                        <input type="number" name="category_id" class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-yellow-400" placeholder="Opsional">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-1">Deskripsi</label>
                        <textarea name="description" rows="5" class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-yellow-400"></textarea>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-1">Harga Regular</label>
                            <input type="number" name="price_regular" required class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-yellow-400">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-300 mb-1">Harga Extended</label>
                            <input type="number" name="price_extended" class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-yellow-400" placeholder="Opsional">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-1">File Produk (zip)</label>
                        <input type="file" name="product_file" required class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white file:bg-yellow-400 file:text-gray-900 file:border-0 file:rounded-xl file:px-4 file:py-2 file:mr-4">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-300 mb-1">Demo URL</label>
                        <input type="url" name="demo_url" class="w-full px-4 py-3 bg-white/10 border border-white/20 rounded-xl text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-yellow-400" placeholder="Opsional">
                    </div>
                    <button type="submit" class="w-full py-3 bg-gradient-to-r from-yellow-400 to-pink-500 text-gray-900 font-bold rounded-xl hover:from-yellow-300 hover:to-pink-400 transition transform hover:-translate-y-0.5">Upload</button>
                </form>
            </div>
        </div>
    </main>
</div>

<?php require VIEW_PATH . 'templates/footer.php'; ?>