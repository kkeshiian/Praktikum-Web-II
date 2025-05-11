<?php
require_once('Koneksi.php');
require_once('Model.php');

$id_peminjaman = $_GET['id'] ?? null;
$isEdit = $id_peminjaman !== null;

if ($isEdit) {
    $stmt = $conn->prepare("SELECT * FROM peminjaman WHERE id_peminjaman = ?");
    $stmt->execute([$id_peminjaman]);
    $peminjaman = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$peminjaman) {
        echo "Data peminjaman tidak ditemukan untuk ID: $id_peminjaman";
        exit;
    }
} else {
    $peminjaman = [
        'id_member' => '',
        'id_buku' => '',
        'tgl_pinjam' => '',
        'tgl_kembali' => ''
    ];
}

$members = getMembers();
$books = getBuku();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_member = $_POST['id_member'];
    $id_buku = $_POST['id_buku'];
    $tgl_pinjam = $_POST['tgl_pinjam'];
    $tgl_kembali = $_POST['tgl_kembali'];

    if ($isEdit) {
        $stmt = $conn->prepare("UPDATE peminjaman SET id_member = ?, id_buku = ?, tgl_pinjam = ?, tgl_kembali = ? WHERE id_peminjaman = ?");
        $success = $stmt->execute([$id_member, $id_buku, $tgl_pinjam, $tgl_kembali, $id_peminjaman]);
    } else {
        $stmt = $conn->prepare("INSERT INTO peminjaman (id_member, id_buku, tgl_pinjam, tgl_kembali) VALUES (?, ?, ?, ?)");
        $success = $stmt->execute([$id_member, $id_buku, $tgl_pinjam, $tgl_kembali]);
    }

    if ($success) {
        header("Location: peminjaman.php");
        exit();
    } else {
        echo "Gagal menyimpan data peminjaman.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $isEdit ? 'Edit' : 'Tambah' ?> Peminjaman</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
<div class="container mx-auto mt-10">
    <h1 class="text-2xl font-bold text-center mb-6"><?= $isEdit ? 'Edit' : 'Tambah' ?> Peminjaman</h1>

    <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-lg">
        <form method="POST" class="space-y-4">

            <div class="flex flex-col">
                <label for="id_member" class="text-lg font-medium text-gray-700">Pilih Member</label>
                <select name="id_member" id="id_member" required
                        class="mt-2 p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500">
                    <?php while ($member = $members->fetch(PDO::FETCH_ASSOC)) : ?>
                        <option value="<?= $member['id_member']; ?>"
                            <?= ($member['id_member'] == $peminjaman['id_member']) ? 'selected' : '' ?>>
                            <?= $member['nama_member']; ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>

            <div class="flex flex-col">
                <label for="id_buku" class="text-lg font-medium text-gray-700">Pilih Buku</label>
                <select name="id_buku" id="id_buku" required
                        class="mt-2 p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500">
                    <?php while ($book = $books->fetch(PDO::FETCH_ASSOC)) : ?>
                        <option value="<?= $book['id_buku']; ?>"
                            <?= ($book['id_buku'] == $peminjaman['id_buku']) ? 'selected' : '' ?>>
                            <?= $book['judul_buku']; ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>

            <div class="flex flex-col">
                <label for="tgl_pinjam" class="text-lg font-medium text-gray-700">Tanggal Pinjam</label>
                <input type="date" name="tgl_pinjam" id="tgl_pinjam" value="<?= $peminjaman['tgl_pinjam']; ?>" required
                       class="mt-2 p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500">
            </div>

            <div class="flex flex-col">
                <label for="tgl_kembali" class="text-lg font-medium text-gray-700">Tanggal Kembali</label>
                <input type="date" name="tgl_kembali" id="tgl_kembali" value="<?= $peminjaman['tgl_kembali']; ?>" required
                       class="mt-2 p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500">
            </div>

            <div class="flex justify-center">
                <button type="submit" class="px-6 py-3 bg-green-600 text-white rounded-lg hover:bg-green-700">
                    <?= $isEdit ? 'Simpan Perubahan' : 'Tambah Peminjaman' ?>
                </button>
            </div>
        </form>
    </div>
</div>
</body>
</html>