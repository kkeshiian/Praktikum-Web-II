<?php
$star = NULL;
$pict = "https://www.freepnglogos.com/uploads/star-png/file-featured-article-star-svg-wikimedia-commons-8.png";

if (isset($_POST['star'])) {
    $star = (int) $_POST['star'];
}
if (isset($_POST['tambah'])) {
    $star++;
}
if (isset($_POST['kurang'])) {
    $star = max(0, $star - 1);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Jumlah Bintang</title>
</head>
<body>

<?php
for ($i = 0; $i < $star; $i++) {
    echo '<img src="' . $pict . '" width="80" height="80">';
}
?>

<?php if ($star === NULL || $star == 0): ?>
    <form action="" method="POST">
        <label>Jumlah bintang</label>
        <input type="number" name="star" required min="1"><br>
        <button type="submit">Submit</button><br>
    </form>
<?php else: ?>
    <form action="" method="POST">
        <input type="hidden" name="star" value="<?= $star; ?>">
        <button name="tambah">Tambah</button>
        <button name="kurang">Kurang</button>
    </form>
<?php endif; ?>

</body>
</html>
