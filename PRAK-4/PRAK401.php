<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        <label for="panjang">Panjang: </label>
        <input type="text" id="panjang" name="panjang" required><br>
        <label for="lebar">Lebar: </label>
        <input type="text" id="lebar" name="lebar" required><br>
        <label for="nilai">Nilai: </label>
        <input type="text" id="nilai" name="nilai" required><br>
        <button type="submit">Cetak</button>
        <br>
        <br>
    </form>

    <?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil panjang dan lebar
    $panjang = (int)$_POST['panjang'];
    $lebar = (int)$_POST['lebar'];
    
    // Ambil nilai dan pecah berdasarkan spasi
    $nilai_input = trim($_POST['nilai']);
    $nilai_array = explode(" ", $nilai_input);
    
    // Hitung jumlah yang diharapkan
    $jumlah_seharusnya = $panjang * $lebar;
    
    if (count($nilai_array) != $jumlah_seharusnya) {
        echo "<p>Jumlah nilai yang dimasukkan tidak sesuai dengan ukuran matriks</p>";
    } else {
        echo "<table border='1' cellpadding='5' cellspacing='0'>";
        
        $index = 0;
        for ($i = 0; $i < $panjang; $i++) {
            echo "<tr>";
            for ($j = 0; $j < $lebar; $j++) {
                echo "<td>" . htmlspecialchars($nilai_array[$index]) . "</td>";
                $index++;
            }
            echo "</tr>";
        }
        
        echo "</table>";
    }
}
?>
</body>
</html>