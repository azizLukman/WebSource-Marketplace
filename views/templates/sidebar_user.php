<!-- Tombol Hamburger (hanya muncul di mobile) -->
<button id="sidebarToggle" class="lg:hidden fixed top-4 left-4 z-50 p-2 rounded-xl bg-white/10 backdrop-blur-lg border border-white/20 text-white">
    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
    </svg>
</button>

<!-- Overlay (mobile) -->
<div id="sidebarOverlay" class="fixed inset-0 bg-black/50 z-40 hidden lg:hidden"></div>

<!-- Sidebar -->
<aside id="sidebar" class="fixed lg:static inset-y-0 left-0 z-50 w-64 bg-white/5 backdrop-blur-xl border-r border-white/10 flex flex-col transform -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out">
    <div class="p-6 flex items-center justify-between">
        <a href="<?= BASE_URL ?>" class="text-2xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 to-pink-500">KodeMarket</a>
        <button id="closeSidebar" class="lg:hidden text-gray-400 hover:text-white">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
    </div>
    <nav class="flex-1 px-4 space-y-1 overflow-y-auto">
        <!-- Dashboard -->
        <a href="<?= BASE_URL ?>/user/dashboard" class="flex items-center gap-3 py-3 px-4 rounded-xl <?= $currentPage == 'dashboard' ? 'bg-yellow-400/10 text-yellow-400' : 'text-gray-300 hover:bg-white/10' ?> transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>
            Dashboard
        </a>
        <!-- Produk Saya (baru) -->
        <a href="<?= BASE_URL ?>/user/myproducts" class="flex items-center gap-3 py-3 px-4 rounded-xl <?= $currentPage == 'products' ? 'bg-yellow-400/10 text-yellow-400' : 'text-gray-300 hover:bg-white/10' ?> transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
            Produk Saya
        </a>
        <!-- Pembelian -->
        <a href="<?= BASE_URL ?>/user/orders" class="flex items-center gap-3 py-3 px-4 rounded-xl <?= $currentPage == 'orders' ? 'bg-yellow-400/10 text-yellow-400' : 'text-gray-300 hover:bg-white/10' ?> transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
            Pembelian
        </a>
        <!-- Penjualan -->
        <a href="<?= BASE_URL ?>/user/sales" class="flex items-center gap-3 py-3 px-4 rounded-xl <?= $currentPage == 'sales' ? 'bg-yellow-400/10 text-yellow-400' : 'text-gray-300 hover:bg-white/10' ?> transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>
            Penjualan
        </a>
        <!-- Upload Produk -->
        <a href="<?= BASE_URL ?>/product/upload" class="flex items-center gap-3 py-3 px-4 rounded-xl <?= $currentPage == 'upload' ? 'bg-yellow-400/10 text-yellow-400' : 'text-gray-300 hover:bg-white/10' ?> transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/></svg>
            Upload Produk
        </a>
        <!-- Wishlist -->
        <a href="<?= BASE_URL ?>/user/wishlist" class="flex items-center gap-3 py-3 px-4 rounded-xl <?= $currentPage == 'wishlist' ? 'bg-yellow-400/10 text-yellow-400' : 'text-gray-300 hover:bg-white/10' ?> transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
            Wishlist
        </a>
        <!-- Tiket -->
        <a href="<?= BASE_URL ?>/tickets" class="flex items-center gap-3 py-3 px-4 rounded-xl <?= $currentPage == 'tickets' ? 'bg-yellow-400/10 text-yellow-400' : 'text-gray-300 hover:bg-white/10' ?> transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/></svg>
            Tiket
        </a>
        <!-- Withdraw -->
        <a href="<?= BASE_URL ?>/user/withdraw" class="flex items-center gap-3 py-3 px-4 rounded-xl <?= $currentPage == 'withdraw' ? 'bg-yellow-400/10 text-yellow-400' : 'text-gray-300 hover:bg-white/10' ?> transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            Withdraw
        </a>
    </nav>
    <div class="p-4 border-t border-white/10">
        <a href="<?= BASE_URL ?>/auth/logout" class="flex items-center gap-2 text-gray-400 hover:text-red-400 transition py-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
            Logout
        </a>
    </div>
</aside>

<script>
// Toggle sidebar di mobile
const sidebarToggle = document.getElementById('sidebarToggle');
const closeSidebar = document.getElementById('closeSidebar');
const sidebar = document.getElementById('sidebar');
const overlay = document.getElementById('sidebarOverlay');

function openSidebar() {
    sidebar.classList.remove('-translate-x-full');
    overlay.classList.remove('hidden');
}
function closeSidebarFunc() {
    sidebar.classList.add('-translate-x-full');
    overlay.classList.add('hidden');
}

sidebarToggle?.addEventListener('click', openSidebar);
closeSidebar?.addEventListener('click', closeSidebarFunc);
overlay?.addEventListener('click', closeSidebarFunc);

// Tutup sidebar saat klik link (opsional)
document.querySelectorAll('#sidebar a').forEach(link => {
    link.addEventListener('click', () => {
        if (window.innerWidth < 1024) closeSidebarFunc();
    });
});
</script>