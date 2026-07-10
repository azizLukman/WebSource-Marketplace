<?php require VIEW_PATH . 'templates/header.php'; ?>

<!-- Hero Section -->
<section class="relative bg-gradient-to-br from-gray-900 via-indigo-900 to-purple-800 text-white overflow-hidden min-h-screen flex items-center">
    <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-28 relative z-10 w-full">
        <div class="flex flex-col lg:flex-row items-center gap-12">
            <div class="flex-1 text-center lg:text-left">
                <span class="inline-block px-3 py-1 rounded-full bg-white/20 text-sm font-medium mb-6 animate-pulse">🚀 Marketplace Digital #1</span>
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold leading-tight mb-6">
                    <span class="block">Temukan & Jual</span>
                    <span id="typing-text" class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-300 to-pink-400"></span>
                </h1>
                <p class="text-lg md:text-xl text-gray-300 max-w-2xl mb-8">
                    Platform jual beli website, source code, dan aset digital dengan lisensi resmi, sistem escrow, dan dukungan penuh.
                </p>
                <div class="flex flex-wrap gap-4 justify-center lg:justify-start">
                    <a href="#products" class="bg-white text-gray-900 px-8 py-3.5 rounded-full font-bold shadow-xl hover:shadow-2xl transition transform hover:-translate-y-1">
                        🔍 Jelajahi Produk
                    </a>
                    <?php if (!Auth::check()): ?>
                    <a href="<?= BASE_URL ?>/auth/register" class="border-2 border-white text-white px-8 py-3.5 rounded-full font-bold hover:bg-white hover:text-gray-900 transition">
                        ✨ Daftar Gratis
                    </a>
                    <?php endif; ?>
                </div>
                <div class="mt-12 grid grid-cols-3 gap-6 text-center">
                    <div class="counter-item">
                        <span class="block text-3xl md:text-4xl font-bold counter" data-target="1250">0</span>
                        <span class="text-sm text-gray-400">Produk</span>
                    </div>
                    <div class="counter-item">
                        <span class="block text-3xl md:text-4xl font-bold counter" data-target="560">0</span>
                        <span class="text-sm text-gray-400">Developer</span>
                    </div>
                    <div class="counter-item">
                        <span class="block text-3xl md:text-4xl font-bold counter" data-target="10800">0</span>
                        <span class="text-sm text-gray-400">Download</span>
                    </div>
                </div>
            </div>
            <div class="flex-1 flex justify-center">
                <div class="relative animate-float">
                    <div class="w-64 h-64 md:w-80 md:h-80 bg-gradient-to-br from-purple-400 to-pink-500 rounded-full absolute blur-3xl opacity-30 -top-10 -left-10"></div>
                    <img src="https://images.unsplash.com/photo-1517694712202-14dd9538aa97?w=600&h=400&fit=crop&auto=format" alt="Web Development" class="relative w-72 md:w-96 drop-shadow-2xl rounded-2xl">
                </div>
            </div>
        </div>
    </div>
    <div class="absolute bottom-0 w-full">
        <svg viewBox="0 0 1440 120" preserveAspectRatio="none" class="w-full h-16 fill-current text-gray-50">
            <path d="M0,64L80,58.7C160,53,320,43,480,48C640,53,800,75,960,74.7C1120,74,1280,53,1360,42.7L1440,32L1440,120L1360,120C1280,120,1120,120,960,120C800,120,640,120,480,120C320,120,160,120,80,120L0,120Z"></path>
        </svg>
    </div>
</section>

<!-- Features Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900">Kenapa Marketplace Kami?</h2>
            <p class="mt-4 text-lg text-gray-500 max-w-2xl mx-auto">Keamanan, lisensi, dan kemudahan dalam satu platform.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
            <div class="bg-white p-8 rounded-3xl shadow-md hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 reveal fade-up">
                <img src="https://images.unsplash.com/photo-1563013544-824ae1b704d3?w=96&h=96&fit=crop&crop=center" alt="Lisensi" class="w-24 h-24 mx-auto mb-6 rounded-full object-cover">
                <h3 class="text-xl font-bold text-gray-900 mb-3">Lisensi Resmi</h3>
                <p class="text-gray-600">Setiap produk dilengkapi serial key unik yang bisa diaktivasi ke domain Anda. Legal dan aman.</p>
            </div>
            <div class="bg-white p-8 rounded-3xl shadow-md hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 reveal fade-up delay-100">
                <img src="https://images.unsplash.com/photo-1554224155-8d04cb21cd6c?w=96&h=96&fit=crop&crop=center" alt="Escrow" class="w-24 h-24 mx-auto mb-6 rounded-full object-cover">
                <h3 class="text-xl font-bold text-gray-900 mb-3">Transaksi Escrow</h3>
                <p class="text-gray-600">Dana pembeli ditahan sampai Anda puas. Rilis otomatis atau manual, Anda yang tentukan.</p>
            </div>
            <div class="bg-white p-8 rounded-3xl shadow-md hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 reveal fade-up delay-200">
                <img src="https://images.unsplash.com/photo-1521791136064-7986c2920216?w=96&h=96&fit=crop&crop=center" alt="Support" class="w-24 h-24 mx-auto mb-6 rounded-full object-cover">
                <h3 class="text-xl font-bold text-gray-900 mb-3">Dukungan 24/7</h3>
                <p class="text-gray-600">Sistem tiket dan notifikasi real-time, admin responsif siap membantu.</p>
            </div>
        </div>
    </div>
</section>

<!-- How It Works -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900">Cara Kerja</h2>
            <p class="mt-4 text-lg text-gray-500">Mulai dari pilih produk hingga download dalam 4 langkah mudah.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div class="text-center reveal fade-up">
                <img src="https://images.unsplash.com/photo-1509228627152-72ae9ae6848d?w=128&h=128&fit=crop&crop=center" alt="Cari" class="w-32 h-32 mx-auto mb-4 rounded-2xl object-cover">
                <div class="w-12 h-12 bg-indigo-600 text-white rounded-full flex items-center justify-center mx-auto text-xl font-bold shadow-lg mb-4">1</div>
                <h4 class="text-lg font-bold text-gray-900">Cari Produk</h4>
                <p class="text-gray-500 mt-2 text-sm">Telusuri ribuan website & source code.</p>
            </div>
            <div class="text-center reveal fade-up delay-100">
                <img src="https://images.unsplash.com/photo-1579621970563-ebec7560ff3e?w=128&h=128&fit=crop&crop=center" alt="Bayar" class="w-32 h-32 mx-auto mb-4 rounded-2xl object-cover">
                <div class="w-12 h-12 bg-indigo-600 text-white rounded-full flex items-center justify-center mx-auto text-xl font-bold shadow-lg mb-4">2</div>
                <h4 class="text-lg font-bold text-gray-900">Bayar & Konfirmasi</h4>
                <p class="text-gray-500 mt-2 text-sm">Transfer lalu upload bukti, admin verifikasi.</p>
            </div>
            <div class="text-center reveal fade-up delay-200">
                <img src="https://images.unsplash.com/photo-1584438784894-089d6a62b8fa?w=128&h=128&fit=crop&crop=center" alt="Lisensi" class="w-32 h-32 mx-auto mb-4 rounded-2xl object-cover">
                <div class="w-12 h-12 bg-indigo-600 text-white rounded-full flex items-center justify-center mx-auto text-xl font-bold shadow-lg mb-4">3</div>
                <h4 class="text-lg font-bold text-gray-900">Aktivasi Lisensi</h4>
                <p class="text-gray-500 mt-2 text-sm">Dapatkan serial key & aktivasi domain.</p>
            </div>
            <div class="text-center reveal fade-up delay-300">
                <img src="https://images.unsplash.com/photo-1611162617474-5b21e879e113?w=128&h=128&fit=crop&crop=center" alt="Download" class="w-32 h-32 mx-auto mb-4 rounded-2xl object-cover">
                <div class="w-12 h-12 bg-indigo-600 text-white rounded-full flex items-center justify-center mx-auto text-xl font-bold shadow-lg mb-4">4</div>
                <h4 class="text-lg font-bold text-gray-900">Download & Pakai</h4>
                <p class="text-gray-500 mt-2 text-sm">Unduh file, langsung gunakan.</p>
            </div>
        </div>
    </div>
</section>

<!-- ✅ PRODUK TERBARU (DIPERBAIKI) -->
<section id="products" class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row justify-between items-center mb-10">
            <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-4 md:mb-0">Produk Terbaru</h2>
            <div class="flex space-x-3 w-full md:w-auto">
                <input type="text" id="landingSearch" placeholder="Cari produk..." class="w-full md:w-64 px-5 py-3 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-indigo-500 text-gray-700">
                <button onclick="document.getElementById('landingSearch').dispatchEvent(new Event('input'))" class="bg-indigo-600 text-white px-5 py-3 rounded-full hover:bg-indigo-700 transition">Cari</button>
            </div>
        </div>
        <div id="landingSearchResults" class="hidden bg-white shadow-2xl rounded-xl p-4 mb-6 max-h-60 overflow-y-auto"></div>

        <?php if (!empty($products)): ?>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            <?php foreach ($products as $p): ?>
                <div class="bg-white rounded-2xl shadow-sm hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 group reveal fade-up">
                    <div class="h-48 bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center relative overflow-hidden rounded-t-2xl">
                        <!-- Gambar produk (placeholder) -->
                        <img src="https://dummyimage.com/400x300/6366F1/ffffff&text=<?= urlencode($p['title']) ?>" alt="<?= htmlspecialchars($p['title']) ?>" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        <?php if ($p['price_extended']): ?>
                            <span class="absolute top-3 right-3 bg-red-500 text-white text-xs px-2 py-1 rounded-full">Sale</span>
                        <?php endif; ?>
                    </div>
                    <div class="p-5">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-xs font-semibold text-indigo-600 bg-indigo-100 px-2 py-1 rounded-full"><?= htmlspecialchars($p['seller_name']) ?></span>
                            <span class="text-xs text-gray-400"><?= date('d M', strtotime($p['created_at'])) ?></span>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-1 line-clamp-2"><?= htmlspecialchars($p['title']) ?></h3>
                        <p class="text-gray-500 text-sm mb-3 line-clamp-2"><?= htmlspecialchars(substr($p['description'], 0, 120)) ?>...</p>
                        <div class="flex items-center justify-between">
                            <div>
                                <span class="text-xl font-extrabold text-indigo-600">Rp <?= number_format($p['price_regular'], 0, ',', '.') ?></span>
                                <?php if ($p['price_extended']): ?>
                                    <span class="text-sm text-gray-400 line-through ml-1">Rp <?= number_format($p['price_extended'], 0, ',', '.') ?></span>
                                <?php endif; ?>
                            </div>
                            <a href="<?= BASE_URL ?>/product/detail/<?= $p['id'] ?>" class="text-indigo-600 hover:text-indigo-800 font-medium text-sm flex items-center">
                                Detail <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                            </a>
                        </div>
                        <?php if (Auth::check() && !Auth::isAdmin()): ?>
                            <button onclick="toggleWishlist(<?= $p['id'] ?>)" class="mt-3 w-full text-center py-2 border border-red-200 text-red-500 rounded-xl hover:bg-red-50 transition text-sm">
                                ♡ Simpan
                            </button>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <?php else: ?>
            <div class="text-center py-16">
                <img src="https://dummyimage.com/160x160/6366F1/ffffff&text=Kosong" alt="Kosong" class="w-40 mx-auto mb-4 opacity-50 rounded-2xl">
                <h3 class="text-lg font-medium text-gray-900">Belum ada produk</h3>
                <p class="text-gray-500">Jadilah yang pertama menjual di sini.</p>
                <?php if (Auth::check()): ?>
                    <a href="<?= BASE_URL ?>/product/upload" class="mt-4 inline-flex items-center px-6 py-3 bg-indigo-600 text-white rounded-full hover:bg-indigo-700 transition">Upload Produk</a>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <?php if ($totalPages > 1): ?>
            <div class="mt-10 flex justify-center">
                <nav class="flex space-x-1">
                    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                        <a href="?page=<?= $i ?>" class="px-4 py-2 border rounded-lg text-sm font-medium <?= $i == $currentPage ? 'bg-indigo-600 text-white border-indigo-600' : 'bg-white text-gray-500 hover:bg-gray-100' ?>"><?= $i ?></a>
                    <?php endfor; ?>
                </nav>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- Testimoni -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 text-center mb-12">Apa Kata Mereka?</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-gray-50 p-8 rounded-3xl shadow-sm hover:shadow-lg transition reveal fade-up">
                <p class="text-gray-600 italic mb-4">“Produk berkualitas, lisensi jelas. Proses verifikasi cepat.”</p>
                <div class="flex items-center">
                    <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=48&h=48&fit=crop&crop=face" alt="Andi" class="w-12 h-12 rounded-full mr-3 object-cover">
                    <div>
                        <div class="font-semibold text-gray-900">Andi Pratama</div>
                        <div class="text-sm text-gray-500">Web Developer</div>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 p-8 rounded-3xl shadow-sm hover:shadow-lg transition reveal fade-up delay-100">
                <p class="text-gray-600 italic mb-4">“Jualan source code di sini enak, transaksi aman.”</p>
                <div class="flex items-center">
                    <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=48&h=48&fit=crop&crop=face" alt="Siti" class="w-12 h-12 rounded-full mr-3 object-cover">
                    <div>
                        <div class="font-semibold text-gray-900">Siti Aisyah</div>
                        <div class="text-sm text-gray-500">Freelancer</div>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 p-8 rounded-3xl shadow-sm hover:shadow-lg transition reveal fade-up delay-200">
                <p class="text-gray-600 italic mb-4">“Support tiket responsif, membantu banget.”</p>
                <div class="flex items-center">
                    <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=48&h=48&fit=crop&crop=face" alt="Budi" class="w-12 h-12 rounded-full mr-3 object-cover">
                    <div>
                        <div class="font-semibold text-gray-900">Budi Santoso</div>
                        <div class="text-sm text-gray-500">Startup Founder</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 text-center mb-12">Pertanyaan Umum</h2>
        <div class="space-y-4">
            <div class="bg-white rounded-2xl p-6 shadow-sm reveal fade-up">
                <button class="faq-toggle flex justify-between w-full text-left text-lg font-semibold text-gray-900 items-center">
                    Bagaimana cara membeli produk?
                    <svg class="w-6 h-6 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div class="faq-content hidden mt-4 text-gray-600">
                    Pilih produk, klik beli, lakukan pembayaran manual, upload bukti. Admin akan verifikasi dan Anda bisa download.
                </div>
            </div>
            <div class="bg-white rounded-2xl p-6 shadow-sm reveal fade-up delay-100">
                <button class="faq-toggle flex justify-between w-full text-left text-lg font-semibold text-gray-900 items-center">
                    Apakah lisensi aman?
                    <svg class="w-6 h-6 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div class="faq-content hidden mt-4 text-gray-600">
                    Ya, setiap produk dilengkapi serial key unik yang bisa diaktivasi ke domain Anda.
                </div>
            </div>
            <div class="bg-white rounded-2xl p-6 shadow-sm reveal fade-up delay-200">
                <button class="faq-toggle flex justify-between w-full text-left text-lg font-semibold text-gray-900 items-center">
                    Bagaimana sistem escrow bekerja?
                    <svg class="w-6 h-6 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                </button>
                <div class="faq-content hidden mt-4 text-gray-600">
                    Dana pembeli ditahan oleh sistem. Penjual menerima dana setelah pembeli konfirmasi atau otomatis 7 hari.
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-gradient-to-r from-indigo-600 to-purple-600 text-white text-center">
    <div class="max-w-3xl mx-auto px-4">
        <h2 class="text-3xl md:text-4xl font-extrabold mb-4">Siap Bergabung?</h2>
        <p class="text-lg text-indigo-100 mb-8">Daftar sekarang dan dapatkan akses ke ribuan produk digital berkualitas.</p>
        <?php if (!Auth::check()): ?>
            <a href="<?= BASE_URL ?>/auth/register" class="inline-block bg-white text-indigo-600 px-8 py-4 rounded-full font-bold text-lg hover:shadow-2xl transition transform hover:-translate-y-1">
                Daftar Gratis Sekarang
            </a>
        <?php endif; ?>
    </div>
</section>

<?php require VIEW_PATH . 'templates/footer.php'; ?>