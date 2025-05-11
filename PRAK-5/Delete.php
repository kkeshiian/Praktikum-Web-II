<?php
require_once('Koneksi.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if (isset($_GET['type'])) {
        $type = $_GET['type'];

        if ($type === 'buku') {
            $stmt = $conn->prepare("DELETE FROM peminjaman WHERE id_buku = ?");
            $stmt->execute([$id]);

            $stmt = $conn->prepare("DELETE FROM buku WHERE id_buku = ?");
            $stmt->execute([$id]);

            header("Location: buku.php");
            exit();

        } elseif ($type === 'member') {
            $stmt = $conn->prepare("DELETE FROM peminjaman WHERE id_member = ?");
            $stmt->execute([$id]);

            $stmt = $conn->prepare("DELETE FROM member WHERE id_member = ?");
            $stmt->execute([$id]);

            header("Location: member.php");
            exit();

        } elseif ($type === 'peminjaman') {
            $stmt = $conn->prepare("DELETE FROM peminjaman WHERE id_peminjaman = ?");
            $stmt->execute([$id]);

            header("Location: peminjaman.php");
            exit();
        }
    }
}

header("Location: index.php");
exit();
?>
