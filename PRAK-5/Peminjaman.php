<?php
require_once('Koneksi.php');
require_once('Model.php');

$peminjamans = getPeminjaman();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Peminjaman</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
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

    <div class="container mx-auto p-6">
        <div class="text-center mb-6">
            <h1 class="text-3xl font-semibold text-gray-800">Data Peminjaman</h1>
        </div>

        <div class="mb-6 text-center">
            <a href="FormPeminjaman.php" class="bg-blue-600 text-white py-2 px-6 rounded-lg shadow-lg hover:bg-blue-700 transition duration-300">Tambah Peminjam</a>
        </div>
    
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-lg">
                <thead class="bg-blue-600 text-white">
                    <tr>
                        <th class="py-3 px-6 text-center text-sm font-semibold">ID Peminjaman</th>
                        <th class="py-3 px-6 text-center text-sm font-semibold">Nama Member</th>
                        <th class="py-3 px-6 text-center text-sm font-semibold">Judul Buku</th>
                        <th class="py-3 px-6 text-center text-sm font-semibold">Tanggal Pinjam</th>
                        <th class="py-3 px-6 text-center text-sm font-semibold">Tanggal Kembali</th>
                        <th class="py-3 px-6 text-center text-sm font-semibold">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php while ($peminjaman = $peminjamans->fetch(PDO::FETCH_ASSOC)) : ?>
                    <tr class="border-t hover:bg-gray-100">
                        <td class="py-3 px-6 text-center text-sm"><?= $peminjaman['id_peminjaman']; ?></td>
                        <td class="py-3 px-6 text-center text-sm"><?= $peminjaman['nama_member']; ?></td>
                        <td class="py-3 px-6 text-center text-sm"><?= $peminjaman['judul_buku']; ?></td>
                        <td class="py-3 px-6 text-center text-sm"><?= $peminjaman['tgl_pinjam']; ?></td>
                        <td class="py-3 px-6 text-center text-sm"><?= $peminjaman['tgl_kembali']; ?></td>
                        <td class="py-3 px-6 text-center text-sm">
                            <a href="FormPeminjaman.php?id=<?= $peminjaman['id_peminjaman']; ?>" class="bg-yellow-500 text-white py-2 px-4 rounded-lg hover:bg-yellow-600 transition duration-300">Edit</a>
                            <a href="Delete.php?id=<?= $peminjaman['id_peminjaman']; ?>&type=peminjaman" class="bg-red-500 text-white py-2 px-4 rounded-lg hover:bg-red-600 transition duration-300">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
