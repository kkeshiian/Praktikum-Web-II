<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    th {
        font-size: 24px;
        border: 2px solid black;
        background-color: red;
        height: 70px;
    }
    td {
        border: 2px solid black;
    }
</style>
<body>
    <?php
    $list_hp = array("samsung1" => "Samsung Galaxy S22", "samsung2" => "Samsung Galaxy S22+", "samsung3" => "Samsung Galaxy A03", "samsung4" => "Samsung Galaxy Xcover5");
    ?>

    <table style="border: 2px solid black;">
        <tr>
            <th>Daftar Smartphone Samsung</th>
        </tr>
        <tr>
            <td><?php echo $list_hp["samsung1"];?></td>
        </tr>
        <tr>
            <td><?php echo $list_hp["samsung2"];?></td>
        </tr>
        <tr>
            <td><?php echo $list_hp["samsung3"];?></td>
        </tr>
        <tr>
            <td><?php echo $list_hp["samsung4"];?></td>
        </tr>
    </table>
</body>
</html>