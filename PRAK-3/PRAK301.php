<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        Jumlah Peserta : <input type="number" name="jumlah_peserta"><br>
        <input type="submit" name="submit" value="Cetak"><br><br>
    </form>

    <?php
if (isset($_POST['submit'])) {
    $jumlah_peserta = $_POST['jumlah_peserta'];
    $i = 1;

    while ($i <= $jumlah_peserta) {
        if ($i % 2 == 0) {
            echo "<h2 style='color: green;'>Peserta ke-$i</h2>";
        } else {
            echo "<h2 style='color: red;'>Peserta ke-$i</h2>";
        }
        $i++;
    }
}
?>
</body>
</html>