<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan Digital</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-800 font-sans">
    <header class="bg-white shadow-md">
        <div class="container mx-auto px-4 py-6 flex items-center justify-between">
            <h1 class="text-2xl font-bold text-indigo-600">Perpustakaan Digital</h1>
            <nav class="space-x-4">
                <a href="index.php" class="text-gray-600 hover:text-indigo-600 font-medium">Beranda</a>
                <a href="Member.php" class="text-gray-600 hover:text-indigo-600 font-medium">Data Member</a>
                <a href="FormMember.php" class="text-gray-600 hover:text-indigo-600 font-medium">Tambah Member</a>
                <a href="Buku.php" class="text-gray-600 hover:text-indigo-600 font-medium">Data Buku</a>
                <a href="FormBuku.php" class="text-gray-600 hover:text-indigo-600 font-medium">Tambah Buku</a>
                <a href="Peminjaman.php" class="text-gray-600 hover:text-indigo-600 font-medium">Data Peminjaman</a>
                <a href="FormPeminjaman.php" class="text-gray-600 hover:text-indigo-600 font-medium">Tambah Peminjaman</a>
            </nav>
        </div>
    </header>

    <main class="container mx-auto px-4 py-10">
        <div class="text-center">
            <h2 class="text-3xl font-bold text-indigo-700 mb-4">Selamat Datang di Sistem Informasi Perpustakaan</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-24">
                <a href="member.php" class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition hover:bg-indigo-50">
                    <h3 class="text-xl font-semibold text-indigo-700 mb-2">Data Member</h3>
                    <p class="text-gray-600">Lihat dan kelola data member perpustakaan.</p>
                </a>
                <a href="buku.php" class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition hover:bg-indigo-50">
                    <h3 class="text-xl font-semibold text-indigo-700 mb-2">Data Buku</h3>
                    <p class="text-gray-600">Kelola informasi buku yang tersedia.</p>
                </a>
                <a href="peminjaman.php" class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition hover:bg-indigo-50">
                    <h3 class="text-xl font-semibold text-indigo-700 mb-2">Data Peminjaman</h3>
                    <p class="text-gray-600">Pantau aktivitas peminjaman buku.</p>
                </a>
            </div>
        </div>
    </main>
</body>
</html>
