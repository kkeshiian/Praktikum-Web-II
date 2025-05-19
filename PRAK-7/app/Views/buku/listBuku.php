<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Daftar Buku</title>
    <script src="https://cdn.tailwindcss.com"></script> <!-- Tailwind CSS CDN -->
</head>
<body class="bg-gray-100 p-8">
    <!-- Navbar -->
    <nav   nav class="bg-indigo-600 text-white px-6 py-3 flex justify-between items-center shadow-md">
    <div class="text-xl font-semibold tracking-wide select-none">
        <a href="/" class="hover:text-indigo-300 transition-colors">Aplikasi Buku</a>
    </div>
    <ul class="flex space-x-8 text-lg font-medium">
        <li>
        <a href="/buku" class="hover:text-indigo-300 transition-colors">Data Buku</a>
        </li>
        <li>
        <a href="/buku/create" class="hover:text-indigo-300 transition-colors">Tambah Buku</a>
        </li>
        <li>
        <a href="/logout" class="hover:text-indigo-300 transition-colors">Logout</a>
        </li>
    </ul>
    </nav>

    <h1 class="text-3xl font-bold mb-6">Daftar Buku</h1>

    <table class="min-w-full bg-white shadow-md rounded">
        <thead>
            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                <th class="py-3 px-6 text-left">ID</th>
                <th class="py-3 px-6 text-left">Judul</th>
                <th class="py-3 px-6 text-left">Penulis</th>
                <th class="py-3 px-6 text-left">Penerbit</th>
                <th class="py-3 px-6 text-left">Tahun Terbit</th>
            </tr>
        </thead>
        <tbody class="text-gray-600 text-sm font-light">
            <?php if(!empty($buku) && is_array($buku)): ?>
                <?php foreach ($buku as $item): ?>
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-left"><?= esc($item['id']) ?></td>
                        <td class="py-3 px-6 text-left"><?= esc($item['judul']) ?></td>
                        <td class="py-3 px-6 text-left"><?= esc($item['penulis']) ?></td>
                        <td class="py-3 px-6 text-left"><?= esc($item['penerbit']) ?></td>
                        <td class="py-3 px-6 text-left"><?= esc($item['tahun_terbit']) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="5" class="text-center p-4">Tidak ada data buku.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>

</body>
</html>
