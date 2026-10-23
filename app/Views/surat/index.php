<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<style>
    .card-feature {
        padding: 20px;
        border-radius: 14px;
        background: white;
        border: 1px solid #e0e0e0;
        box-shadow: 0 2px 6px rgba(0,0,0,0.05);
        transition: 0.2s;
        cursor: pointer;
        height: 200px;
    }
    .card-feature:hover {
        transform: translateY(-3px);
    }
    .icon-box {
        width: 40px;
        height: 40px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        margin-bottom: 10px;
        color: white;
    }
    .request-item {
        padding: 15px 10px;
        border-bottom: 1px solid #eee;
    }
    .status-badge {
        padding: 5px 12px;
        border-radius: 6px;
        font-size: 12px;
        font-weight: 600;
    }
</style>

<div class="container-fluid">

    <div class="d-flex justify-content-between mb-3">
        <h5 class="fw-bold">Surat & Pengajuan Akademik</h5>
        <a href="#" class="btn btn-primary btn-sm">
            <i class="bi bi-plus-circle"></i> New Request
        </a>
    </div>

    <div class="row">

        <div class="col-md-3 mb-3">
            <div class="card-feature">
                <div class="icon-box bg-primary">
                    <i class="bi bi-pause-circle"></i>
                </div>
                <h6 class="fw-bold">Pengajuan Cuti</h6>
                <small class="text-muted">Pengajuan cuti selama beberapa semester</small>
                <div class="mt-2 text-success fw-bold">Available</div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card-feature">
                <div class="icon-box bg-success">
                    <i class="bi bi-file-earmark-text"></i>
                </div>
                <h6 class="fw-bold">Pengajuan Transkrip</h6>
                <small class="text-muted">Official academic transcript</small>
                <div class="mt-2 text-success fw-bold">Available</div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card-feature">
                <div class="icon-box bg-purple" style="background:#a66bff;">
                    <i class="bi bi-journal-check"></i>
                </div>
                <h6 class="fw-bold">Surat Keterangan Aktif</h6>
                <small class="text-muted">Proof of active enrollment</small>
                <div class="mt-2 text-success fw-bold">Available</div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card-feature">
                <div class="icon-box bg-warning text-dark">
                    <i class="bi bi-award"></i>
                </div>
                <h6 class="fw-bold">Pendaftaran Wisuda</h6>
                <small class="text-muted">Pendaftaran untuk upacara wisuda</small>
                <div class="mt-2 text-warning fw-bold">Requirements Check</div>
            </div>
        </div>

    </div>


    <h5 class="fw-bold mt-4 mb-3">Recent Requests</h5>
    <div class="card p-3 shadow-sm">

        <?php if (!empty($requests)) : ?>
            <?php foreach ($requests as $req) : ?>
                <div class="request-item d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center gap-3">

                        <?php if ($req['jenis_surat'] == 'transkrip'): ?>
                            <i class="bi bi-file-earmark-text fs-4 text-success"></i>
                        <?php elseif ($req['jenis_surat'] == 'aktif'): ?>
                            <i class="bi bi-journal-check fs-4 text-primary"></i>
                        <?php elseif ($req['jenis_surat'] == 'cuti'): ?>
                            <i class="bi bi-pause-circle fs-4 text-purple" style="color:#a66bff;"></i>
                        <?php else: ?>
                            <i class="bi bi-file-earmark fs-4"></i>
                        <?php endif; ?>

                        <div>
                            <strong><?= esc(ucfirst($req['jenis_surat'])) ?></strong><br>
                            <small class="text-muted">Requested on <?= date('M d, Y', strtotime($req['tanggal_pengajuan'])) ?></small>
                        </div>
                    </div>

                    <?php 
                        $statusColor = [
                            'Approved' => 'bg-success text-white',
                            'Processing' => 'bg-warning text-dark',
                            'Rejected' => 'bg-danger text-white'
                        ];
                    ?>

                    <span class="status-badge <?= $statusColor[$req['status']] ?? 'bg-secondary' ?>">
                        <?= esc($req['status']); ?>
                    </span>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p class="text-center text-muted">Belum ada pengajuan.</p>
        <?php endif; ?>

    </div>


<div class="row mt-4">

    <!-- QUICK ACTIONS -->
    <div class="col-md-6 mb-3">
        <div class="card p-3 shadow-sm">
            <h6 class="fw-bold mb-3">Quick Actions</h6>

            <div class="list-group">

                <a href="jadwal" class="list-group-item list-group-item-action d-flex align-items-center gap-3">
                    <div class="icon-box bg-primary text-white" style="width:40px;height:40px;border-radius:10px;">
                        <i class="bi bi-calendar2-week fs-5"></i>
                    </div>
                    <span class="fw-semibold">View Schedule</span>
                </a>

                <a href="transcript" class="list-group-item list-group-item-action d-flex align-items-center gap-3">
                    <div class="icon-box bg-success text-white" style="width:40px;height:40px;border-radius:10px;">
                        <i class="bi bi-bar-chart-line fs-5"></i>
                    </div>
                    <span class="fw-semibold">Check Grades</span>
                </a>

                <a href="keuangan" class="list-group-item list-group-item-action d-flex align-items-center gap-3">
                    <div class="icon-box bg-warning text-dark" style="width:40px;height:40px;border-radius:10px;">
                        <i class="bi bi-wallet2 fs-5"></i>
                    </div>
                    <span class="fw-semibold">Payment Status</span>
                </a>

            </div>
        </div>
    </div>

    <!-- NOTIFICATIONS -->
    <div class="col-md-6 mb-3">
        <div class="card p-3 shadow-sm">
            <h6 class="fw-bold mb-3">Notifications</h6>

            <?php if (!empty($notifications)): ?>
                <?php foreach ($notifications as $note): ?>
                    <div class="alert alert-light border d-flex align-items-start gap-3 mt-2">
                        <i class="bi bi-bell-fill text-primary fs-5"></i>
                        <div>
                            <strong><?= esc($note['pesan']); ?></strong><br>
                            <small class="text-muted"><?= esc($note['keterangan']); ?></small>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="text-center text-muted py-3">
                    <i class="bi bi-bell-slash fs-3 d-block mb-2"></i>
                    Tidak ada notifikasi.
                </div>
            <?php endif; ?>
        </div>
    </div>

</div>

</div>

<?= $this->endSection(); ?>
