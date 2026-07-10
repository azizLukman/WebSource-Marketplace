<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola User - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="<?= BASE_URL ?>/assets/css/style.css">
    <script>const BASE_URL = '<?= BASE_URL ?>';</script>
</head>
<body class="bg-gray-900 text-white font-sans antialiased">

<div class="flex min-h-screen">
    <?php $currentPage = 'users'; ?>
    <?php require VIEW_PATH . 'templates/sidebar_admin.php'; ?>

    <main class="flex-1 p-6 lg:p-10 pt-20 lg:pt-10 transition-all duration-300">
        <div class="max-w-7xl mx-auto">
            <div class="mb-8 animate-fade-in-up">
                <h1 class="text-3xl font-bold bg-gradient-to-r from-yellow-400 to-pink-500 bg-clip-text text-transparent">Kelola User</h1>
                <p class="text-gray-400 mt-1">Aktifkan atau nonaktifkan akun pengguna.</p>
            </div>

            <div class="bg-white/5 backdrop-blur-lg border border-white/10 rounded-2xl overflow-hidden animate-fade-in-up delay-100">
                <?php if (!empty($users)): ?>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead class="bg-white/5">
                            <tr class="text-left text-gray-400">
                                <th class="p-4">Username</th>
                                <th class="p-4">Email</th>
                                <th class="p-4">Role</th>
                                <th class="p-4">Status</th>
                                <th class="p-4">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($users as $u): ?>
                            <tr class="border-t border-white/5">
                                <td class="p-4 font-medium"><?= htmlspecialchars($u['username']) ?></td>
                                <td class="p-4"><?= htmlspecialchars($u['email']) ?></td>
                                <td class="p-4">
                                    <span class="px-2 py-1 rounded-full text-xs <?= $u['role'] == 'admin' ? 'bg-purple-400/20 text-purple-400' : 'bg-blue-400/20 text-blue-400' ?>"><?= $u['role'] ?></span>
                                </td>
                                <td class="p-4">
                                    <span class="px-2 py-1 rounded-full text-xs <?= $u['is_active'] ? 'bg-green-400/20 text-green-400' : 'bg-red-400/20 text-red-400' ?>">
                                        <?= $u['is_active'] ? 'Aktif' : 'Nonaktif' ?>
                                    </span>
                                </td>
                                <td class="p-4">
                                    <a href="<?= BASE_URL ?>/admin/toggleUser/<?= $u['id'] ?>" class="text-yellow-400 hover:underline">
                                        <?= $u['is_active'] ? 'Nonaktifkan' : 'Aktifkan' ?>
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <?php else: ?>
                <div class="p-12 text-center text-gray-400">
                    <p>Tidak ada user.</p>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </main>
</div>
</body>
</html>