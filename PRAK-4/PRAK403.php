<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data KRS Mahasiswa</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 5px;
        }
        th, td {
            text-align: center;
            vertical-align: top;
        }
        .green {
            background-color: green;
            color: white;
        }
        .red {
            background-color: red;
            color: white;
        }
    </style>
</head>
<body>

<?php
$krs = [
    [
        "No" => 1,
        "Nama" => "Ridho",
        "MataKuliah" => [
            ["MataKuliah" => "Pemrograman I", "SKS" => 2],
            ["MataKuliah" => "Praktikum Pemrograman I", "SKS" => 1],
            ["MataKuliah" => "Pengantar Lingkungan Lahan Basah", "SKS" => 2],
            ["MataKuliah" => "Arsitektur Komputer", "SKS" => 3],
        ],
    ],
    [
        "No" => 2,
        "Nama" => "Ratna",
        "MataKuliah" => [
            ["MataKuliah" => "Basis Data I", "SKS" => 2],
            ["MataKuliah" => "Praktikum Basis Data I", "SKS" => 1],
            ["MataKuliah" => "Kalkulus", "SKS" => 3],
        ],
    ],
    [
        "No" => 3,
        "Nama" => "Tono",
        "MataKuliah" => [
            ["MataKuliah" => "Rekayasa Perangkat Lunak", "SKS" => 3],
            ["MataKuliah" => "Analisis dan Perancangan Sistem", "SKS" => 3],
            ["MataKuliah" => "Komputasi Awan", "SKS" => 3],
            ["MataKuliah" => "Kecerdasan Bisnis", "SKS" => 3],
        ],
    ],
];

// Hitung Total SKS dan Keterangan
foreach ($krs as &$mhs) {
    $totalSKS = 0;
    foreach ($mhs["MataKuliah"] as $matkul) {
        $totalSKS += $matkul["SKS"];
    }
    $mhs["TotalSKS"] = $totalSKS;
    $mhs["Keterangan"] = ($totalSKS < 7) ? "Revisi KRS" : "Tidak Revisi";
}
unset($mhs);

// Tampilkan Tabel
echo "<table>";
echo "<tr>
        <th>No</th>
        <th>Nama</th>
        <th>Mata Kuliah Diambil</th>
        <th>SKS</th>
        <th>Total SKS</th>
        <th>Keterangan</th>
      </tr>";

foreach ($krs as $mhs) {
    $rowspan = count($mhs["MataKuliah"]);
    $firstRow = true;

    foreach ($mhs["MataKuliah"] as $matkul) {
        echo "<tr>";

        if ($firstRow) {
            echo "<td rowspan='$rowspan'>{$mhs['No']}</td>";
            echo "<td rowspan='$rowspan'>{$mhs['Nama']}</td>";
        }

        echo "<td>{$matkul['MataKuliah']}</td>";
        echo "<td>{$matkul['SKS']}</td>";

        if ($firstRow) {
            echo "<td rowspan='$rowspan'>{$mhs['TotalSKS']}</td>";
            $warna = ($mhs["Keterangan"] == "Revisi KRS") ? "red" : "green";
            echo "<td rowspan='$rowspan' class='$warna'>{$mhs['Keterangan']}</td>";
            $firstRow = false;
        }

        echo "</tr>";
    }
}

echo "</table>";
?>

</body>
</html>
