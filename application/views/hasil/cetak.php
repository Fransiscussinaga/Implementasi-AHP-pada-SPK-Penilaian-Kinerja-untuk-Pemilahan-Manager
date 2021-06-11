<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Cetak Hasil Penilaian</title>

    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            font-size: 14px;
        }

        th {
            height: 30px;
            text-align: center;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 3px;
        }

        thead {
            background: lightgray;
        }

        .center {
            text-align: center;
        }
    </style>
</head>

<body>
    <h2 class="center">LAPORAN HASIL PENILAIAN <?= strtoupper($periode->periode_penilaian) ?></h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>NIK</th>
                <th>Nama Karyawan</th>
                <th>Nilai AHP</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 0; ?>
            <?php foreach ($hasil as $row) : ?>
                <tr>
                    <td class="center"><?= ++$no ?></td>
                    <td class="center"><?= $row->nik ?></td>
                    <td><?= $row->nama_karyawan ?></td>
                    <td class="center"><?= $row->nilai_hasil ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>