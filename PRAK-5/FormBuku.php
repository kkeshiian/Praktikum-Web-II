<?php
require_once('Koneksi.php');

$judul = $penulis = $penerbit = $tahun_terbit = "";
$isEdit = false;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $isEdit = true;

    $stmt = $conn->prepare("SELECT * FROM buku WHERE id_buku = ?");
    $stmt->execute([$id]);
    $data = $stmt->fetch();

    if ($data) {
        $judul = $data['judul_buku'];
        $penulis = $data['penulis'];
        $penerbit = $data['penerbit'];
        $tahun_terbit = $data['tahun_terbit'];
    } else {
        echo "Data buku tidak ditemukan.";
        exit;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];

    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        $stmt = $conn->prepare("UPDATE buku SET judul_buku = ?, penulis = ?, penerbit = ?, tahun_terbit = ? WHERE id_buku = ?");
        if ($stmt->execute([$judul, $penulis, $penerbit, $tahun_terbit, $id])) {
            header("Location: Buku.php");
            exit();
        } else {
            echo "Gagal memperbarui data buku!";
        }
    } else {
        $stmt = $conn->prepare("INSERT INTO buku (judul_buku, penulis, penerbit, tahun_terbit) VALUES (?, ?, ?, ?)");
        if ($stmt->execute([$judul, $penulis, $penerbit, $tahun_terbit])) {
            header("Location: Buku.php");
            exit();
        } else {
            echo "Gagal menambahkan data buku!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $isEdit ? "Edit Buku" : "Tambah Buku" ?></title>
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

    <div class="container mx-auto mt-10">
        <h1 class="text-2xl font-semibold text-center mb-6"><?= $isEdit ? "Edit Buku" : "Tambah Buku" ?></h1>

        <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-lg">
            <form method="POST" action="" class="space-y-4">
                <?php if ($isEdit): ?>
                    <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">
                <?php endif; ?>

                <div class="flex flex-col">
                    <label for="judul" class="text-lg font-medium text-gray-700">Judul Buku</label>
                    <input type="text" name="judul" id="judul" required value="<?= htmlspecialchars($judul) ?>"
                           class="mt-2 p-3 border border-gray-300 rounded-lg">
                </div>

                <div class="flex flex-col">
                    <label for="penulis" class="text-lg font-medium text-gray-700">Penulis</label>
                    <input type="text" name="penulis" id="penulis" required value="<?= htmlspecialchars($penulis) ?>"
                           class="mt-2 p-3 border border-gray-300 rounded-lg">
                </div>

                <div class="flex flex-col">
                    <label for="penerbit" class="text-lg font-medium text-gray-700">Penerbit</label>
                    <input type="text" name="penerbit" id="penerbit" required value="<?= htmlspecialchars($penerbit) ?>"
                           class="mt-2 p-3 border border-gray-300 rounded-lg">
                </div>

                <div class="flex flex-col">
                    <label for="tahun_terbit" class="text-lg font-medium text-gray-700">Tahun Terbit</label>
                    <input type="date" name="tahun_terbit" id="tahun_terbit" required value="<?= htmlspecialchars($tahun_terbit) ?>"
                           class="mt-2 p-3 border border-gray-300 rounded-lg">
                </div>

                <div class="flex justify-center">
                    <button type="submit"
                            class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                        <?= $isEdit ? 'Simpan Perubahan' : 'Tambah Buku' ?>
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
