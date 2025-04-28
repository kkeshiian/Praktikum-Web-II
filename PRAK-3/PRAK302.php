<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Segitiga Gambar Terbalik</title>
</head>
<body>
    <form action="" method="post">
        <label>Tinggi:</label>
        <input type="number" name="tinggi"><br>

        <label>Alamat Gambar:</label>
        <input type="text" name="alamat"><br>

        <input type="submit" name="submit" value="Cetak"><br>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        // Ambil nilai hanya setelah form dikirim
        $tinggi = $_POST['tinggi'];
        $alamat = $_POST['alamat'];

        if ($tinggi > 0 && !empty($alamat)) {
            echo "<br>";

            $i = $tinggi;
            while ($i >= 1) {
                $spasi = 0;
                while ($spasi < $tinggi - $i) {
                    echo "<span style='display: inline-block; width: 30px;'></span>";
                    $spasi++;
                }

                $j = 1;
                while ($j <= $i) {
                    echo "<img src='$alamat' width='30' height='30'>";
                    $j++;
                }

                echo "<br>";
                $i--;
            }
        } else {
            echo "Tinggi harus lebih dari 0 dan alamat gambar tidak boleh kosong.";
        }
    }
    ?>
</body>
</html>
