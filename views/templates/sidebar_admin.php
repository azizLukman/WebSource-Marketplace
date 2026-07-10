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
        <a href="<?= BASE_URL ?>/admin/dashboard" class="flex items-center gap-3 py-3 px-4 rounded-xl <?= $currentPage == 'dashboard' ? 'bg-yellow-400/10 text-yellow-400' : 'text-gray-300 hover:bg-white/10' ?> transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>
            Dashboard
        </a>
        <a href="<?= BASE_URL ?>/admin/products" class="flex items-center gap-3 py-3 px-4 rounded-xl <?= $currentPage == 'products' ? 'bg-yellow-400/10 text-yellow-400' : 'text-gray-300 hover:bg-white/10' ?> transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
            Produk
        </a>
        <a href="<?= BASE_URL ?>/admin/transactions" class="flex items-center gap-3 py-3 px-4 rounded-xl <?= $currentPage == 'transactions' ? 'bg-yellow-400/10 text-yellow-400' : 'text-gray-300 hover:bg-white/10' ?> transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/></svg>
            Transaksi
        </a>
        <a href="<?= BASE_URL ?>/admin/users" class="flex items-center gap-3 py-3 px-4 rounded-xl <?= $currentPage == 'users' ? 'bg-yellow-400/10 text-yellow-400' : 'text-gray-300 hover:bg-white/10' ?> transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"/></svg>
            User
        </a>
        <a href="<?= BASE_URL ?>/admin/tickets" class="flex items-center gap-3 py-3 px-4 rounded-xl <?= $currentPage == 'tickets' ? 'bg-yellow-400/10 text-yellow-400' : 'text-gray-300 hover:bg-white/10' ?> transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/></svg>
            Tiket
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
// Script untuk toggle sidebar
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

// Tutup sidebar saat klik link di mobile (opsional)
document.querySelectorAll('#sidebar a').forEach(link => {
    link.addEventListener('click', () => {
        if (window.innerWidth < 1024) { // lg breakpoint
            closeSidebarFunc();
        }
    });
});
</script>