<?php
require_once('Koneksi.php');

function insertMember($nama, $nomor, $alamat, $tgl_daftar, $tgl_bayar) {
    global $conn;
    $sql = "INSERT INTO member (nama_member, nomor_member, alamat, tgl_mendaftar, tgl_terakhir_bayar)
            VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    return $stmt->execute([$nama, $nomor, $alamat, $tgl_daftar, $tgl_bayar]);
}

function getMembers() {
    global $conn;
    $sql = "SELECT * FROM member";
    return $conn->query($sql);
}

function getMemberById($id) {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM member WHERE id_member = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function updateMember($id, $nama, $nomor, $alamat, $tgl_daftar, $tgl_bayar) {
    global $conn;
    $sql = "UPDATE member SET nama_member = ?, nomor_member = ?, alamat = ?, tgl_mendaftar = ?, tgl_terakhir_bayar = ?
            WHERE id_member = ?";
    $stmt = $conn->prepare($sql);
    return $stmt->execute([$nama, $nomor, $alamat, $tgl_daftar, $tgl_bayar, $id]);
}

function deleteMember($id) {
    global $conn;
    $stmt = $conn->prepare("DELETE FROM member WHERE id_member = ?");
    return $stmt->execute([$id]);
}

function insertBuku($judul, $penulis, $penerbit, $tahun) {
    global $conn;
    $sql = "INSERT INTO buku (judul_buku, penulis, penerbit, tahun_terbit)
            VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    return $stmt->execute([$judul, $penulis, $penerbit, $tahun]);
}

function getBuku() {
    global $conn;
    $sql = "SELECT * FROM buku";
    return $conn->query($sql);
}

function getBukuById($id) {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM buku WHERE id_buku = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function updateBuku($id, $judul, $penulis, $penerbit, $tahun) {
    global $conn;
    $sql = "UPDATE buku SET judul_buku = ?, penulis = ?, penerbit = ?, tahun_terbit = ?
            WHERE id_buku = ?";
    $stmt = $conn->prepare($sql);
    return $stmt->execute([$judul, $penulis, $penerbit, $tahun, $id]);
}

function deleteBuku($id) {
    global $conn;
    $stmt = $conn->prepare("DELETE FROM buku WHERE id_buku = ?");
    return $stmt->execute([$id]);
}

function insertPeminjaman($id_member, $id_buku, $tgl_pinjam, $tgl_kembali) {
    global $conn;
    $sql = "INSERT INTO peminjaman (id_member, id_buku, tgl_pinjam, tgl_kembali)
            VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    return $stmt->execute([$id_member, $id_buku, $tgl_pinjam, $tgl_kembali]);
}

function getPeminjaman() {
    global $conn;
    $sql = "SELECT p.id_peminjaman, m.nama_member, b.judul_buku, p.tgl_pinjam, p.tgl_kembali
            FROM peminjaman p
            JOIN member m ON p.id_member = m.id_member
            JOIN buku b ON p.id_buku = b.id_buku";
    return $conn->query($sql);
}

function getPeminjamanById($id) {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM peminjaman WHERE id_peminjaman = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function updatePeminjaman($id, $tgl_pinjam, $tgl_kembali) {
    global $conn;
    $sql = "UPDATE peminjaman SET tgl_pinjam = ?, tgl_kembali = ? WHERE id_peminjaman = ?";
    $stmt = $conn->prepare($sql);
    return $stmt->execute([$tgl_pinjam, $tgl_kembali, $id]);
}

function deletePeminjaman($id) {
    global $conn;
    $stmt = $conn->prepare("DELETE FROM peminjaman WHERE id_peminjaman = ?");
    return $stmt->execute([$id]);
}

function getAll($table) {
    global $conn;
    $allowedTables = ['member', 'buku', 'peminjaman'];
    if (in_array($table, $allowedTables)) {
        $stmt = $conn->query("SELECT * FROM $table");
        return $stmt;
    } else {
        return false;
    }
}
