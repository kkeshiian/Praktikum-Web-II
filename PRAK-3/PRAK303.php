<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        Batas Bawah: <input type="number" name="batas_bawah"><br>
        Batas Atas: <input type="number" name="batas_atas"><br>
        <input type="submit" name="submit" value="Cetak"><br><br>
    </form>

    <?php
if (isset($_POST['submit'])) {
        $batas_bawah = $_POST['batas_bawah'];
        $batas_atas = $_POST['batas_atas'];

        $i = $batas_bawah;
        echo "Hasil Deret <br>";

        do {
            if((($i + 7)%5) == 0){
                echo "<img src='https://www.freepnglogos.com/uploads/star-png/file-featured-article-star-svg-wikimedia-commons-8.png' width='24' height='24'>";
        } else{
            echo "$i ";
        }
        $i++;
        } while ($i <= $batas_atas);
    }
    ?>
</body>
</html>