<!DOCTYPE html>
<html>
<head>
    <title>Official Transcript</title>
    <style>
        body {
            font-family: Arial;
            font-size: 12px;
            margin: 30px;
        }
        h3 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            border: 1px solid #000;
            padding: 6px;
        }
        th {
            text-align: center;
        }
        .info td {
            border: none;
            padding: 3px;
        }
        .ttd {
            margin-top: 40px;
            text-align: right;
        }
    </style>
</head>
<body>

<h3>OFFICIAL TRANSCRIPT</h3>

<table class="info">
    <tr>
        <td width="120">Nama</td>
        <td width="10">:</td>
        <td><?= $mahasiswa['nama'] ?? '-' ?></td>
    </tr>
    <tr>
        <td>NPM</td>
        <td>:</td>
        <td><?= $mahasiswa['npm'] ?? '-' ?></td>
    </tr>
    <tr>
        <td>Program Studi</td>
        <td>:</td>
        <td><?= $mahasiswa['program_studi'] ?? '-' ?></td>
    </tr>
</table>

<table>
    <thead>
        <tr>
            <th>Semester</th>
            <th>Kode MK</th>
            <th>Mata Kuliah</th>
            <th>SKS</th>
            <th>Nilai</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($nilai)): ?>
            <?php foreach ($nilai as $n): ?>
            <tr>
                <td align="center"><?= $n['semester'] ?></td>
                <td align="center"><?= $n['kode_mk'] ?></td>
                <td><?= $n['nama_mk'] ?></td>
                <td align="center"><?= $n['sks'] ?></td>
                <td align="center"><?= $n['nilai'] ?></td>
                <td align="center"><?= $n['status'] ?></td>
            </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="6" align="center">Data tidak tersedia</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<div class="ttd">
    <p>Bagian Akademik</p>
    <br><br><br>
    <strong>( ___________________ )</strong>
</div>

</body>
</html>
