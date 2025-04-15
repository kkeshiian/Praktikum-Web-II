<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <p style="font-size: 20px;">Output yang diinginkan</p>
        Nilai: <input type="text" name="nilai"><br>
        <button name="konversi">konversi</button>
    </form>

    <?php
    if(isset($_POST['konversi'])){
        $nilai = ($_POST['nilai']);

        if($nilai > 0 && $nilai < 10){
            $hasil = "Satuan";
        } elseif($nilai >= 10 && $nilai < 20){
            $hasil = "Belasan";
        } elseif($nilai >= 20 && $nilai < 100){
            $hasil = "Puluhan";
        } elseif($nilai >= 100 && $nilai < 1000){
            $hasil = "Ratusan";
        } elseif($nilai == 0){
            $hasil = "Nol";
        } else{
            $hasil = "Anda Menginput Melebihi Limit Bilangan";
        }
        echo "<h2>Hasil: $hasil</h2>";
    }
    ?>
</body>
</html>