<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<style>
.transcript-card {
    background: #fff;
    border-radius: 16px;
    padding: 24px;
    box-shadow: 0 4px 16px rgba(0,0,0,0.08);
}

/* Table style */
.table {
    border-collapse: separate;
    border-spacing: 0 10px;
}

.table thead th {
    border: none !important;
    font-weight: 600;
    color: #444;
}

.table tbody tr {
    background: #fff;
    box-shadow: 0 2px 6px rgba(0,0,0,0.05);
    border-radius: 12px;
}

.table tbody td {
    vertical-align: middle;
    padding: 14px 16px !important;
    border: none !important;
}

/* Badge status */
.status-complete {
    background:#E8F1FF;
    color:#0062CC;
    padding:6px 12px;
    border-radius:10px;
    font-size:12px;
    font-weight:600;
}

.status-progress {
    background:#FFF3CD;
    color:#A07400;
    padding:6px 12px;
    border-radius:10px;
    font-size:12px;
    font-weight:600;
}

/* Skor badge seperti status */
.score-complete {
    background:#E8F1FF;
    color:#0062CC;
    padding:6px 12px;
    border-radius:10px;
    font-size:12px;
    font-weight:600;
}

.score-progress {
    background:#FFF3CD;
    color:#A07400;
    padding:6px 12px;
    border-radius:10px;
    font-size:12px;
    font-weight:600;
}

.score-low {
    background:#F8D7DA;
    color:#842029;
    padding:6px 12px;
    border-radius:10px;
    font-size:12px;
    font-weight:600;
}

/* Search box */
.search-box {
    border:1px solid #ddd;
    padding:6px 12px;
    border-radius:8px;
    width:70px;
}

/* Download boxes */
.download-card {
    background: #fff;
    border-radius: 16px;
    padding: 26px;
    box-shadow: 0 4px 16px rgba(0,0,0,0.07);
    text-align: center;
    transition: .2s;
}

.download-card:hover {
    background: #f6f7f9;
    cursor: pointer;
}

.download-title {
    font-size: 15px;
    font-weight: 600;
    color: #0056D2;
}

.download-sub {
    margin-top: 4px;
    font-size: 13px;
    color: #6c757d;
}

</style>

<!-- CARD Nilai -->
<div class="transcript-card mb-4">
    <div class="d-flex justify-content-between align-items-center">
        <h5 class="fw-bold">Nilai Mata Kuliah Semester <?= esc($semester) ?></h5>
            <form action="<?= site_url('transcript/' . $npm) ?>" method="get" class="d-flex">

            <input type="number" name="semester" class="search-box"
                   min="1" max="8" value="<?= esc($semester) ?>">
            <button class="btn btn-primary ms-2 px-3 d-flex align-items-center">
                <i class="bi bi-search"></i>
            </button>
        </form>
    </div>

    <table class="table mt-4 w-100">
        <thead>
            <tr>
                <th>Kode MK</th>
                <th>Mata Kuliah</th>
                <th>SKS</th>
                <th>Skor</th>
                <th>Nilai</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>
        <?php if (!empty($nilai)): ?>
            <?php foreach ($nilai as $n): ?>
                <tr>
                    <td><?= esc($n['kode_mk']) ?></td>
                    <td><?= esc($n['nama_mk']) ?></td>
                    <td><?= esc($n['sks']) ?></td>

                    <!-- Skor Badge -->
                    <?php
                        $skor = $n['skor'];
                        if ($skor >= 80) $kelas = "score-complete";
                        elseif ($skor >= 60) $kelas = "score-progress";
                        else $kelas = "score-low";
                    ?>
                    <td><span class="<?= $kelas ?>"><?= esc($skor) ?></span></td>

                    <td><?= esc($n['nilai']) ?></td>
                    <td>
                        <?php if ($n['status'] == 'Complete'): ?>
                            <span class="status-complete">Complete</span>
                        <?php else: ?>
                            <span class="status-progress">Ongoing</span>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr><td colspan="6" class="text-center">Tidak ada data.</td></tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>

<!-- CARD Download -->
<div class="transcript-card mt-3">
    <div class="row text-center">
        <div class="col-md-4 mb-3">
            <a href="<?= site_url('transcript/download/khs?id=' . $npm . '&semester=' . $semester) ?>" class="text-decoration-none">

                <div class="download-card">
                    <div class="download-title">Current Semester (KHS)</div>
                    <div class="download-sub">Download semester transcript</div>
                </div>
            </a>
        </div>

        <div class="col-md-4 mb-3">
            <a href="<?= site_url('transcript/download/full?id=' . $npm) ?>" class="text-decoration-none">
                <div class="download-card">
                    <div class="download-title">Official Transcript</div>
                    <div class="download-sub">Complete academic record</div>
                </div>
            </a>
        </div>

        <div class="col-md-4 mb-3">
            <a href="<?= site_url('transcript/download/grade?id=' . $npm) ?>" class="text-decoration-none">
                <div class="download-card">
                    <div class="download-title">Grade Report</div>
                    <div class="download-sub">Detailed grade analysis</div>
                </div>
            </a>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
