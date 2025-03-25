<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    th {
        border: 2px solid black;
    }
    td {
        border: 2px solid black;
    }
</style>
<body>
    <?php
        $list_hp = array("Samsung Galaxy S22", "Samsung Galaxy S22+", "Samsung Galaxy A03", "Samsung Galaxy Xcover5");
    ?>

    <table style="border: 2px solid black;">
        <tr>
            <th>Daftar Smartphone Samsung</th>
        </tr>
        <?php
        foreach ($list_hp as $hp) {
            echo "<tr><td>$hp</td></tr>";
        }
        ?>
    </table>

</body>
</html>