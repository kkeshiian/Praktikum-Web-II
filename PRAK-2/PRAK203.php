<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <p>Output yang diinginkan</p>
        Nilai: <input type="text" name="nilai"><br>
        Dari: <br>
        <input type="radio" name="asal" value="Celcius"> Celcius <br>
        <input type="radio" name="asal" value="Fahrenheit"> Fahrenheit <br>
        <input type="radio" name="asal" value="Reamur"> Reamur <br>
        <input type="radio" name="asal" value="Kelvin"> Kelvin <br>
        Ke: <br>
        <input type="radio" name="tujuan" value="°C"> Celcius <br>
        <input type="radio" name="tujuan" value="°F"> Fahrenheit <br>
        <input type="radio" name="tujuan" value="°R"> Reamur <br>
        <input type="radio" name="tujuan" value="°K"> Kelvin <br>

        <button name="konversi">Konversi</button>
    </form>

    <?php
    if(isset($_POST['konversi'])){
        $nilai = ($_POST['nilai']);
        $asal = ($_POST['asal']);
        $tujuan = ($_POST['tujuan']);
        if($asal == "Celcius"){
            if($tujuan == "°F"){
                $hasil = ($nilai * 9/5) + 32;
            } elseif($tujuan == "°R"){
                $hasil = $nilai * 4/5;
            } elseif($tujuan == "°K"){
                $hasil = $nilai + 273.15;
            } else{
                $hasil = $nilai;
            }
        } elseif($asal == "°F"){
            if($tujuan == "°C"){
                $hasil = ($nilai - 32) * 5/9;
            } elseif($tujuan == "°R"){
                $hasil = ($nilai - 32) * 4/9;
            } elseif($tujuan == "°K"){
                $hasil = ($nilai - 32) * 5/9 + 273.15;
            } else{
                $hasil = $nilai;
            }
        } elseif($asal == "°R"){
            if($tujuan == "°C"){
                $hasil = $nilai * 5/4;
            } elseif($tujuan == "°F"){
                $hasil = ($nilai * 9/4) + 32;
            } elseif($tujuan == "Kelvin"){
                $hasil = ($nilai * 5/4) + 273.15;
            } else{
                $hasil = $nilai;
            }
        } elseif($asal == "Kelvin"){
            if($tujuan == "°C"){
                $hasil = $nilai - 273.15;
            } elseif($tujuan == "°F"){
                $hasil = ($nilai - 273.15) * 9/5 + 32;
            } elseif($tujuan == "°R"){
                $hasil = ($nilai - 273.15) * 4/5;
            } else{
                $hasil = $nilai;
            }
        }

        echo "<h2>Hasil Konversi: $hasil $tujuan</h2>";
    }
    ?>
</body>
</html>