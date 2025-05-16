<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Portfolio - <?= $mahasiswa['nama'] ?? 'Profil' ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white text-gray-800 font-sans">

    <nav class="bg-white border border-1">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <a href="<?= base_url('/') ?>" class="text-xl font-bold text-blue-600">MyPortfolio</a>
            <div class="space-x-6">
                <a href="<?= base_url('/') ?>" class="text-gray-600 hover:text-blue-600">Beranda</a>
                <a href="<?= base_url('/profil') ?>" class="text-gray-600 hover:text-blue-600">Profil</a>
            </div>
        </div>
    </nav>
    <main class="container mx-auto py-8 bg-white">
        <?= $content ?>
    </main>
</body>
</html>
