<?php
    $namaError = "";
    $nimError = "";
    $jenisKelaminError = "";
    $nama = "";
    $nim = "";
    $jenisKelamin = "";
    
    if(isset($_POST['submit'])){
        if(empty($_POST['nama'])){
            $namaError =  "nama tidak boleh kosong";
        } else{
            $nama = ($_POST['nama']);
        }
        if(empty($_POST['nim'])){
            $nimError =  "nim tidak boleh kosong";
        } else{
            $nim = ($_POST['nim']);
        }
        if(empty($_POST['jenisKelamin'])){
            $jenisKelaminError =  "jenis kelamin tidak boleh kosong";
        } else{
            $jenisKelamin = ($_POST['jenisKelamin']);
        }
    }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        Nama: <input type="text" name="nama"><span class="error" style="color: red">* <?php echo $namaError; ?></span> 
        <br>
        Nim: <input type="text" name="nim"><span class="error" style="color: red">* <?php echo $nimError; ?></span> 
        <br>
        Jenis Kelamin:<span class="error" style="color: red">* <?php echo $jenisKelaminError; ?></span>  <br> 
        <input type="radio" name="jenisKelamin" value="Laki-laki"> Laki-laki 
        <br>
        <input type="radio" name="jenisKelamin" value="Perempuan"> Perempuan 
        <br>
        <button name="submit">Submit</button>
    </form>

    <?php
     echo "<h2>Output:</h2>
     $nama <br>
     $nim <br>
     $jenisKelamin";
    ?>
</body>
</html>