<?php
require_once('Koneksi.php');
require_once('Model.php');

$members = getMembers(); // Mengambil semua data member
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member List</title>
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
        <!-- Heading -->
        <div class="text-center mb-6">
            <h1 class="text-3xl font-semibold text-gray-800">Data Member</h1>
        </div>

        <!-- Tombol Tambah Member -->
        <div class="mb-6 text-center">
            <a href="formmember.php" class="bg-blue-600 text-white py-2 px-6 rounded-lg shadow-lg hover:bg-blue-700 transition duration-300">Tambah Member</a>
        </div>

        <!-- Tabel Member -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-lg">
                <thead class="bg-blue-600 text-white">
                    <tr>
                        <th class="py-3 px-6 text-center text-sm font-semibold">ID Member</th>
                        <th class="py-3 px-6 text-center text-sm font-semibold">Nama Member</th>
                        <th class="py-3 px-6 text-center text-sm font-semibold">Nomor Member</th>
                        <th class="py-3 px-6 text-center text-sm font-semibold">Alamat</th>
                        <th class="py-3 px-6 text-center text-sm font-semibold">Tanggal Mendaftar</th>
                        <th class="py-3 px-6 text-center text-sm font-semibold">Tanggal Terakhir Bayar</th>
                        <th class="py-3 px-6 text-center text-sm font-semibold">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($member = $members->fetch(PDO::FETCH_ASSOC)) : ?>
                        <tr class="border-t hover:bg-gray-100">
                            <td class="py-3 px-6 text-center text-sm"><?= $member['id_member']; ?></td>
                            <td class="py-3 px-6 text-center text-sm"><?= $member['nama_member']; ?></td>
                            <td class="py-3 px-6 text-center text-sm"><?= $member['nomor_member']; ?></td>
                            <td class="py-3 px-6 text-center text-sm"><?= $member['alamat']; ?></td>
                            <td class="py-3 px-6 text-center text-sm"><?= $member['tgl_mendaftar']; ?></td>
                            <td class="py-3 px-6 text-center text-sm"><?= $member['tgl_terakhir_bayar']; ?></td>
                            <td class="py-3 px-6 text-center text-sm">
                                <!-- Tombol Edit dan Delete -->
                                <a href="formmember.php?id=<?= $member['id_member']; ?>" class="bg-yellow-500 text-white py-2 px-4 rounded-lg hover:bg-yellow-600 transition duration-300">Edit</a>
                                <a href="Delete.php?id=<?= $member['id_member']; ?>&type=member" class="bg-red-500 text-white py-2 px-4 rounded-lg hover:bg-red-600 transition duration-300">Delete</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>