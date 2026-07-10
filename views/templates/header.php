<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marketplace - Jual Beli Website & Source Code</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/style.css">
    <script>const BASE_URL = '<?= BASE_URL ?>';</script>
</head>
<body class="bg-gray-50 text-gray-900 antialiased">
<nav class="bg-white shadow-md sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <a href="<?= BASE_URL ?>" class="text-2xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-purple-600">JenggerSCRD</a>
            </div>
            <div class="flex items-center space-x-4">
                <?php if (Auth::check()): ?>
                    <?php if (Auth::isAdmin()): ?>
                        <a href="<?= BASE_URL ?>/admin/dashboard" class="text-gray-700 hover:text-indigo-600 font-medium">Admin Panel</a>
                    <?php else: ?>
                        <a href="<?= BASE_URL ?>/user/dashboard" class="text-gray-700 hover:text-indigo-600 font-medium">Dashboard</a>
                        <a href="<?= BASE_URL ?>/user/wishlist" class="text-gray-700 hover:text-indigo-600 font-medium">Wishlist</a>
                        <a href="<?= BASE_URL ?>/user/orders" class="text-gray-700 hover:text-indigo-600 font-medium">Pembelian</a>
                        <a href="<?= BASE_URL ?>/user/sales" class="text-gray-700 hover:text-indigo-600 font-medium">Penjualan</a>
                    <?php endif; ?>
                    <span class="text-gray-500">|</span>
                    <span class="text-gray-700"><?= Auth::user()['username'] ?></span>
                    <a href="<?= BASE_URL ?>/auth/logout" class="text-red-500 hover:text-red-700 font-medium">Logout</a>
                <?php else: ?>
                    <a href="<?= BASE_URL ?>/auth/login" class="text-gray-700 hover:text-indigo-600 font-medium">Login</a>
                    <a href="<?= BASE_URL ?>/auth/register" class="bg-indigo-600 text-white px-4 py-2 rounded-full hover:bg-indigo-700 transition font-medium">Daftar</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>
<div class="min-h-screen">