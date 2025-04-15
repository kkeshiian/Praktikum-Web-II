<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        Nama: 1 <input type="text" name="nama1"><br>
        Nama: 2 <input type="text" name="nama2"><br>
        Nama: 3 <input type="text" name="nama3"><br>
        <button name="urut">Urutkan</button>
    </form>
    
    <?php
    if(isset($_POST['urut'])){
        $nama1 = ($_POST['nama1']);
        $nama2 = ($_POST['nama2']);
        $nama3 = ($_POST['nama3']);
        $arr = array($nama1, $nama2, $nama3);
        sort($arr);

        foreach ($arr as $hasil) {
            echo "$hasil <br>";
        }
    }
    ?>
</body>
</html>