<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<style>
    .card {
        border: none;
        border-radius: 12px;
        box-shadow: 0 2px 6px rgba(0,0,0,0.05);
    }

    .card-header {
        background: transparent;
        padding: 12px 16px;
        border-bottom: 1px solid #eee;
        font-weight: 600;
        font-size: 15px;
    }

    .program-box {
        background: #fff;
        border-radius: 12px;
        padding: 12px 14px;
        border: 1px solid #efefef;
        transition: 0.15s;
    }

    .program-box:hover {
        box-shadow: 0 2px 8px rgba(0,0,0,0.06);
        transform: translateY(-1px);
    }

    .progress {
        height: 7px;
        border-radius: 10px;
    }

    .progress-bar {
        border-radius: 10px;
        font-size: 10px;
    }

    .badge {
        font-size: 11px;
        padding: 15px 5px;
        
        border-radius: 8px;
    }

    .quick-btn {
        border-radius: 10px !important;
        padding: 8px !important;
        font-size: 13px;
        font-weight: 500;
    }

    .report-item {
        border-radius: 10px;
        padding: 10px 12px;
        border: 1px solid #f0f0f0;
    }

    .evaluation-item {
        padding: 8px 0;
        font-size: 14px;
    }
</style>

<div class="row g-4">

    <!-- Left Column -->
    <div class="col-lg-7">

        <!-- Program MBKM Sekarang -->
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>Program Magang Saat Ini</span>
                <a href="<?= base_url('mbkm/register') ?>" class="btn btn-primary btn-sm" style="border-radius:12px;">+ Register New</a>
            </div>

            <div class="card-body">
                <?php if (!empty($programs)): ?>
                    <?php foreach ($programs as $p): ?>
                        <div class="program-box mb-3">

                            <div class="d-flex justify-content-between">
                                <div>
                                    <h6 class="fw-bold mb-1"><?= esc($p['title']); ?></h6>
                                    <small class="text-muted"><?= esc($p['company']); ?> • <?= esc($p['duration']); ?></small>
                                </div>
                                <span class="badge 
                                    <?= $p['status'] === 'Completed' ? 'bg-success' : '' ?>
                                    <?= $p['status'] === 'In Progress' ? 'bg-warning text-dark' : '' ?>
                                    <?= $p['status'] === 'Active' ? 'bg-primary' : '' ?>">
                                    <?= esc($p['status']); ?>
                                </span>
                            </div>

                            <div class="progress mt-3">
                                <div class="progress-bar" style="width: <?= $p['progress']; ?>%;"><?= $p['progress']; ?>%</div>
                            </div>

                            <div class="mt-3 d-flex gap-2 align-items-center">
                                <a href="<?= base_url('mbkm/program/' . $p['id']) ?>"
                                   class="btn btn-outline-primary btn-sm" style="border-radius:10px;">View Details</a>

                                <!-- Upload Report -->
                                <form action="<?= base_url('mbkm/uploadReport') ?>" method="post" enctype="multipart/form-data" class="d-flex align-items-center gap-2">
                                    <input type="hidden" name="program_id" value="<?= $p['id'] ?>">

                                    <!-- input file disembunyikan -->
                                    <input type="file" name="report_file" id="report-file-<?= $p['id'] ?>" style="display:none;" required>

                                    <!-- label sebagai tombol -->
                                    <label for="report-file-<?= $p['id'] ?>" class="btn btn-secondary btn-sm" style="border-radius:10px;">
                                        Upload Report
                                    </label>

                                    <!-- tombol submit -->
                                    <button type="submit" class="btn btn-primary btn-sm" style="border-radius:10px;">
                                        Submit
                                    </button>
                                </form>
                            </div>

                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="text-muted">Belum ada program MBKM.</p>
                <?php endif; ?>
            </div>
        </div>

        <!-- Recent Reports -->
        <div class="card mb-4">
            <div class="card-header">Recent Reports</div>

            <div class="card-body">
                <?php if (!empty($reports)): ?>
                    <?php foreach ($reports as $r): ?>
                        <div class="report-item mb-3 d-flex justify-content-between">
                            <div>
                                <div class="fw-semibold"><?= esc($r['title']); ?></div>
                                <small class="text-muted"><?= esc($r['created_at']); ?></small>
                            </div>

                            <span class="badge 
                                <?= $r['status'] === 'Approved' ? 'bg-success' : '' ?>
                                <?= $r['status'] === 'Under Review' ? 'bg-warning text-dark' : '' ?>
                                <?= $r['status'] === 'Rejected' ? 'bg-danger' : '' ?>
                                <?= $r['status'] === 'Submitted' ? 'bg-secondary' : '' ?>">
                                <?= esc($r['status']); ?>
                            </span>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="text-muted">Belum ada laporan.</p>
                <?php endif; ?>
            </div>
        </div>

    </div>

    <!-- Right Column -->
    <div class="col-lg-5">

        <!-- Evaluations -->
        <div class="card mb-4">
            <div class="card-header">Evaluasi</div>
            <div class="card-body">
                <?php if (!empty($evaluations)): ?>
                    <?php foreach ($evaluations as $ev): ?>
                        <div class="evaluation-item border-bottom">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <div class="fw-semibold"><?= esc($ev['evaluator_name']); ?></div>
                                    <small class="text-muted"><?= esc($ev['role']); ?></small>
                                </div>
                                <div class="fw-bold"><?= esc($ev['rating']); ?> ★</div>
                            </div>
                            <small class="text-muted"><?= esc($ev['note']); ?></small>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="text-muted">Belum ada evaluasi.</p>
                <?php endif; ?>
            </div>
        </div>

        <!-- Deadlines -->
        <div class="card mb-4">
            <div class="card-header">Deadline</div>
            <div class="card-body">
                <?php if (!empty($deadlines)): ?>
                    <?php foreach ($deadlines as $d): ?>
                        <div class="mb-3">
                            <span class="badge 
                                <?= $d['type'] === 'urgent' ? 'bg-danger' : '' ?>
                                <?= $d['type'] === 'warning' ? 'bg-warning text-dark' : '' ?>
                                <?= $d['type'] === 'info' ? 'bg-info text-dark' : '' ?>
                            ">
                                <?= esc($d['title']); ?>
                            </span>
                            <small class="text-muted">Due: <?= esc($d['due_date']); ?></small>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="text-muted">Tidak ada deadline.</p>
                <?php endif; ?>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="card">
            <div class="card-header">Quick Actions</div>
            <div class="card-body">
                <a href="<?= base_url('mbkm/register') ?>" class="btn btn-primary w-100 quick-btn mb-2">+ Register New Program</a>
                <a href="<?= base_url('mbkm/upload') ?>" class="btn btn-outline-secondary w-100 quick-btn mb-2">Upload Report</a>                <a href="<?= base_url('mbkm/meeting') ?>" class="btn btn-outline-secondary w-100 quick-btn mb-2">Schedule Meeting</a>
                <?php if(!empty($certificates)): ?>
                    <?php foreach ($certificates as $c): ?>
                        <a href="<?= base_url($c['file_path']) ?>" class="btn btn-outline-secondary w-100 quick-btn mb-2">
                            Download Certificate (Program <?= $c['program_id']; ?>)
                        </a>
                    <?php endforeach; ?>
                <?php else: ?>
                    <a class="btn btn-outline-secondary w-100 quick-btn mb-2 disabled">No Certificate Available</a>
                <?php endif; ?>
            </div>
        </div>

    </div>

</div>

<?= $this->endSection() ?>
