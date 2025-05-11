<?php
require_once('Koneksi.php');

$edit = false;
$member = [
    'nama_member' => '',
    'nomor_member' => '',
    'alamat' => '',
    'tgl_mendaftar' => date("Y-m-d H:i:s"),
    'tgl_terakhir_bayar' => date("Y-m-d")
];

if (isset($_GET['id'])) {
    $edit = true;
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM member WHERE id_member = ?");
    $stmt->execute([$id]);
    $member = $stmt->fetch(PDO::FETCH_ASSOC);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $nomor = $_POST['nomor'];
    $alamat = $_POST['alamat'];
    $tgl_daftar = $_POST['tgl_mendaftar'];
    $tgl_bayar = $_POST['tgl_terakhir_bayar'];

    if ($edit) {
        $stmt = $conn->prepare("UPDATE member SET nama_member=?, nomor_member=?, alamat=?, tgl_mendaftar=?, tgl_terakhir_bayar=? WHERE id_member=?");
        $success = $stmt->execute([$nama, $nomor, $alamat, $tgl_daftar, $tgl_bayar, $id]);
    } else {
        $stmt = $conn->prepare("INSERT INTO member (nama_member, nomor_member, alamat, tgl_mendaftar, tgl_terakhir_bayar) VALUES (?, ?, ?, ?, ?)");
        $success = $stmt->execute([$nama, $nomor, $alamat, $tgl_daftar, $tgl_bayar]);
    }

    if ($success) {
        header("Location: Member.php");
        exit();
    } else {
        echo "<script>alert('Gagal menyimpan data!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $edit ? 'Edit Member' : 'Tambah Member' ?></title>
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
        </nav>
    </div>
</header>

<div class="container mx-auto mt-10">
    <h1 class="text-2xl font-semibold text-center mb-6"><?= $edit ? 'Edit Member' : 'Tambah Member' ?></h1>

    <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-lg">
        <form method="POST" class="space-y-4">
            <div class="flex flex-col">
                <label for="nama" class="text-lg font-medium text-gray-700">Nama</label>
                <input type="text" name="nama" id="nama" required
                       value="<?= htmlspecialchars($member['nama_member']) ?>"
                       class="mt-2 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
            </div>

            <div class="flex flex-col">
                <label for="nomor" class="text-lg font-medium text-gray-700">Nomor</label>
                <input type="text" name="nomor" id="nomor" required
                       value="<?= htmlspecialchars($member['nomor_member']) ?>"
                       class="mt-2 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
            </div>

            <div class="flex flex-col">
                <label for="alamat" class="text-lg font-medium text-gray-700">Alamat</label>
                <textarea name="alamat" id="alamat" required
                          class="mt-2 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent"><?= htmlspecialchars($member['alamat']) ?></textarea>
            </div>

            <div class="flex flex-col">
                <label for="tgl_mendaftar" class="text-lg font-medium text-gray-700">Tanggal Mendaftar</label>
                <input type="text" name="tgl_mendaftar" id="tgl_mendaftar" value="<?= $member['tgl_mendaftar'] ?>" readonly
                       class="mt-2 p-3 border border-gray-300 rounded-lg bg-gray-100">
            </div>

            <div class="flex flex-col">
                <label for="tgl_terakhir_bayar" class="text-lg font-medium text-gray-700">Tanggal Terakhir Bayar</label>
                <input type="text" name="tgl_terakhir_bayar" id="tgl_terakhir_bayar" value="<?= $member['tgl_terakhir_bayar'] ?>" readonly
                       class="mt-2 p-3 border border-gray-300 rounded-lg bg-gray-100">
            </div>

            <div class="flex justify-between">
                <a href="Member.php" class="px-6 py-3 bg-gray-500 text-white rounded-lg hover:bg-gray-600">Kembali</a>
                <button type="submit" class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                    <?= $edit ? 'Simpan Perubahan' : 'Tambah Member' ?>
                </button>
            </div>
        </form>
    </div>
</div>
</body>
</html>
