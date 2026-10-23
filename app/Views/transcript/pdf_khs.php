<!DOCTYPE html>
<html>
<head>
    <title>Kartu Hasil Studi (KHS)</title>
    <style>
        body {
            font-family: Arial;
            font-size: 11px;
            margin: 30px;
        }
        .header {
            text-align: center;
            font-weight: bold;
            margin-bottom: 15px;
        }
        .header h3 {
            margin: 0;
            text-transform: uppercase;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        .info td {
            padding: 3px;
            border: none;
        }
        .main-table th, 
        .main-table td {
            border: 1px solid #000;
            padding: 5px;
            font-size: 11px;
        }
        .main-table th {
            text-align: center;
        }
        .center {
            text-align: center;
        }
        .bold {
            font-weight: bold;
        }
        .footer-box td {
            border: 1px solid #000;
            padding: 6px;
            vertical-align: top;
        }
        .ttd {
            margin-top: 40px;
        }
    </style>
</head>
<body>

<!-- header -->
<div class="header">
    <h3>KARTU HASIL STUDI (KHS)</h3>
</div>

<!-- identitas -->
<table class="info">
    <tr>
        <td width="16%">Nama Mahasiswa</td>
        <td width="2%">:</td>
        <td width="32%"><?= $mahasiswa['nama'] ?? '-' ?></td>

        <td width="16%">Tahun Pelajaran</td>
        <td width="2%">:</td>
        <td width="32%"><?= $tahun ?? '2024/2025' ?></td>
    </tr>
    <tr>
        <td>NPM</td><td>:</td><td><?= $mahasiswa['npm'] ?? '-' ?></td>
        <td>Semester</td><td>:</td><td><?= $semester ?></td>
    </tr>
    <tr>
        <td>Kelas</td><td>:</td><td><?= $kelas ?? '(1 Satu) C' ?></td>
        <td>Jenjang</td><td>:</td><td><?= $jenjang ?? 'D3' ?></td>
    </tr>
    <tr>
        <td>Jurusan</td><td>:</td><td><?= $mahasiswa['jurusan'] ?? '-' ?></td>
        <td>Program Studi</td><td>:</td><td><?= $mahasiswa['program_studi'] ?? '-' ?></td>
    </tr>
</table>

<br>

<!-- tabel nilai -->
<table class="main-table">
    <thead>
        <tr>
            <th width="4%">No</th>
            <th width="12%">Kode MK</th>
            <th>Mata Kuliah</th>
            <th width="6%">SKS</th>
            <th width="10%">Nilai Huruf</th>
            <th width="10%">Nilai Mutu</th>
            <th width="14%">Keterangan</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $no = 1; 
        $total_sks = 0;
        $total_mutu = 0;
        foreach ($nilai as $n): 
            $total_sks += $n['sks'];
        
        ?>
        <tr>
            <td class="center"><?= $no++ ?></td>
            <td class="center"><?= $n['kode_mk'] ?></td>
            <td><?= $n['nama_mk'] ?></td>
            <td class="center"><?= $n['sks'] ?></td>
            <td class="center"><?= $n['nilai'] ?></td>
            <td class="center"><?= $n['skor'] ?></td>
            <td></td>
        </tr>
        <?php endforeach; ?>

        <!-- jumlah -->
        <tr class="bold">
            <td colspan="3" class="center">Jumlah</td>
            <td class="center"><?= $total_sks ?></td>
            <td></td>
            <td class="center"><?= $total_mutu ?></td>
            <td></td>
        </tr>
    </tbody>
</table>

<br>

<!-- ip dan status -->
<table>
    <tr>
        <td width="50%">
            <table class="info">
                <tr><td>INDEKS PRESTASI</td><td>:</td><td><?= $ip ?? '3.75' ?></td></tr>
                <tr><td>INDEKS PRESTASI KUMULATIF</td><td>:</td><td><?= $ipk ?? '3.55' ?></td></tr>
                <tr><td>STATUS KELULUSAN</td><td>:</td><td><?= $status ?? 'LULUS' ?></td></tr>
            </table>
        </td>
        <td width="50%">
            <table class="info">
                <tr><td>Hadir</td><td>:</td><td> - jam</td></tr>
                <tr><td>Ijin</td><td>:</td><td> - jam</td></tr>
                <tr><td>Sakit</td><td>:</td><td> - jam</td></tr>
                <tr><td>Alpa</td><td>:</td><td> - jam</td></tr>
            </table>
        </td>
    </tr>
</table>

<br>


<table class="footer-box">
    <tr>
        <td width="50%">
            <b>Ketidakhadiran :</b><br><br>
            Hadir : - jam<br>
            Ijin : - jam<br>
            Sakit : - jam<br>
            Alpa : - jam
        </td>
        <td width="50%">
            <b>Catatan :</b><br>
            ...............................................<br>
            ...............................................<br>
            ........................
