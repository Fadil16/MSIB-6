<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Nilai Mahasiswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f8f9fa;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        thead {
            background-color: #343a40;
            color: #fff;
        }
        th, td {
            padding: 12px;
            text-align: center;
            border: 1px solid #dee2e6;
        }
        th {
            font-weight: bold;
        }
        tfoot {
            background-color: #f1f3f5;
            font-weight: bold;
        }
        tr:nth-child(even) {
            background-color: #f8f9fa;
        }
        tr:hover {
            background-color: #e9ecef;
        }
    </style>
</head>
<body>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Mahasiswa</th>
            <th>NIM</th>
            <th>Nilai</th>
            <th>Grade</th>
            <th>Keterangan</th>
            <th>Predikat</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $mahasiswa = [
            ["no" => 1, "nama" => "Farhan", "nim" => "123456", "nilai" => 85],
            ["no" => 2, "nama" => "Devan", "nim" => "123457", "nilai" => 90],
            ["no" => 3, "nama" => "Axel", "nim" => "123458", "nilai" => 75],
            ["no" => 4, "nama" => "Jessy", "nim" => "123459", "nilai" => 60],
            ["no" => 5, "nama" => "Rizki", "nim" => "123460", "nilai" => 55],
            ["no" => 6, "nama" => "Ghifari", "nim" => "123461", "nilai" => 70],
            ["no" => 7, "nama" => "Hanna", "nim" => "123462", "nilai" => 65],
            ["no" => 8, "nama" => "Panji", "nim" => "123463", "nilai" => 50],
            ["no" => 9, "nama" => "Selen", "nim" => "123464", "nilai" => 95],
            ["no" => 10, "nama" => "Magda", "nim" => "123465", "nilai" => 45]
        ];

        $totalNilai = 0;

        foreach ($mahasiswa as $data) {
            $nilai = $data["nilai"];
            $keterangan = $nilai >= 65 ? "Lulus" : "Tidak Lulus";

            if ($nilai >= 85) {
                $grade = "A";
                $predikat = "Memuaskan";
            } elseif ($nilai >= 75) {
                $grade = "B";
                $predikat = "Bagus";
            } elseif ($nilai >= 65) {
                $grade = "C";
                $predikat = "Cukup";
            } elseif ($nilai >= 55) {
                $grade = "D";
                $predikat = "Kurang";
            } else {
                $grade = "E";
                $predikat = "Buruk";
            }

            $totalNilai += $nilai;

            echo "<tr>
                    <td>{$data['no']}</td>
                    <td>{$data['nama']}</td>
                    <td>{$data['nim']}</td>
                    <td>{$nilai}</td>
                    <td>{$grade}</td>
                    <td>{$keterangan}</td>
                    <td>{$predikat}</td>
                  </tr>";
        }

        $nilaiTertinggi = max(array_column($mahasiswa, "nilai"));
        $nilaiTerendah = min(array_column($mahasiswa, "nilai"));
        $nilaiRataRata = $totalNilai / count($mahasiswa);
        $jumlahMahasiswa = count($mahasiswa);
        ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="3">Nilai Tertinggi</td>
            <td colspan="4"><?php echo $nilaiTertinggi; ?></td>
        </tr>
        <tr>
            <td colspan="3">Nilai Terendah</td>
            <td colspan="4"><?php echo $nilaiTerendah; ?></td>
        </tr>
        <tr>
            <td colspan="3">Nilai Rata-rata</td>
            <td colspan="4"><?php echo $nilaiRataRata; ?></td>
        </tr>
        <tr>
            <td colspan="3">Jumlah Mahasiswa</td>
            <td colspan="4"><?php echo $jumlahMahasiswa; ?></td>
        </tr>
        <tr>
            <td colspan="3">Jumlah Total Nilai</td>
            <td colspan="4"><?php echo $totalNilai; ?></td>
        </tr>
    </tfoot>
</table>

<div class="copyright">
    &copy; 2024 Adit:16 . All rights reserved.
</div>

</body>
</html>
