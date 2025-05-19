<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Tambah Buku</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 flex flex-col min-h-screen">
    <nav class="bg-indigo-600 text-white px-6 py-3 flex justify-between items-center shadow-md">
        <div class="text-xl font-semibold tracking-wide select-none">
            <a href="/" class="hover:text-indigo-300 transition-colors">Aplikasi Buku</a>
        </div>
        <ul class="flex space-x-8 text-lg font-medium">
            <li><a href="/buku" class="hover:text-indigo-300 transition-colors">Data Buku</a></li>
            <li><a href="/buku/create" class="hover:text-indigo-300 transition-colors">Tambah Buku</a></li>
            <li><a href="/logout" class="hover:text-indigo-300 transition-colors">Logout</a></li>
        </ul>
    </nav>
    <main class="flex-grow flex items-center justify-center p-4">
        <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
            <h1 class="text-3xl font-semibold mb-6 text-center text-gray-800">Tambah Buku</h1>

            <?php if(\Config\Services::validation()->getErrors()): ?>
                <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                    <?= \Config\Services::validation()->listErrors() ?>
                </div>
            <?php endif; ?>

            <form method="post" action="/buku/store" class="space-y-5">
                <input
                    type="text"
                    name="judul"
                    placeholder="Judul"
                    value="<?= set_value('judul') ?>"
                    class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    required
                />
                <input
                    type="text"
                    name="penulis"
                    placeholder="Penulis"
                    value="<?= set_value('penulis') ?>"
                    class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    required
                />
                <input
                    type="text"
                    name="penerbit"
                    placeholder="Penerbit"
                    value="<?= set_value('penerbit') ?>"
                    class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    required
                />
                <input
                    type="number"
                    name="tahun_terbit"
                    placeholder="Tahun Terbit"
                    value="<?= set_value('tahun_terbit') ?>"
                    min="1901"
                    max="<?= date('Y') ?>"
                    class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    required
                />

                <button
                    type="submit"
                    class="w-full py-3 bg-indigo-600 hover:bg-indigo-700 text-white rounded font-semibold transition"
                >
                    Simpan
                </button>
            </form>
        </div>
    </main>
</body>
</html>
