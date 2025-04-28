<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PRAK402</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 5px;
        }
        th, td {
            text-align: center;
        }
    </style>
</head>
<body>

<?php
// Data mahasiswa
$mahasiswa = [
    ["Nama" => "Andi", "NIM" => "2101001", "Nilai UTS" => 87, "Nilai UAS" => 65],
    ["Nama" => "Budi", "NIM" => "2101002", "Nilai UTS" => 76, "Nilai UAS" => 79],
    ["Nama" => "Tono", "NIM" => "2101003", "Nilai UTS" => 50, "Nilai UAS" => 41],
    ["Nama" => "Jessica", "NIM" => "2101004", "Nilai UTS" => 60, "Nilai UAS" => 75],
];

// Fungsi hitung nilai akhir
function hitungNilaiAkhir($uts, $uas) {
    $nilaiAkhir = ($uts * 0.4) + ($uas * 0.6);
    return $nilaiAkhir;
}

// Fungsi untuk menentukan huruf nilai
function nilaiHuruf($nilaiAkhir) {
    if ($nilaiAkhir >= 80) {
        return "A";
    } elseif ($nilaiAkhir >= 70) {
        return "B";
    } elseif ($nilaiAkhir >= 60) {
        return "C";
    } elseif ($nilaiAkhir >= 50) {
        return "D";
    } else {
        return "E";
    }
}

// Tampilkan tabel
echo "<table>";
echo "<tr>
        <th>Nama</th>
        <th>NIM</th>
        <th>Nilai UTS</th>
        <th>Nilai UAS</th>
        <th>Nilai Akhir</th>
        <th>Huruf</th>
      </tr>";

foreach ($mahasiswa as $mhs) {
    $nilaiAkhir = hitungNilaiAkhir($mhs["Nilai UTS"], $mhs["Nilai UAS"]);
    $huruf = nilaiHuruf($nilaiAkhir);
    
    // Format nilai akhir
    $nilaiAkhirFormat = number_format($nilaiAkhir, 1);
    
    echo "<tr>";
    echo "<td>{$mhs['Nama']}</td>";
    echo "<td>{$mhs['NIM']}</td>";
    echo "<td>{$mhs['Nilai UTS']}</td>";
    echo "<td>{$mhs['Nilai UAS']}</td>";
    echo "<td>{$nilaiAkhirFormat}</td>";
    echo "<td>{$huruf}</td>";
    echo "</tr>";
}

echo "</table>";
?>

</body>
</html>
