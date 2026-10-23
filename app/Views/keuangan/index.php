<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<style>
    body {
        background: #f7fafc;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .summary-card {
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        padding: 20px;
        background: #fff;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
        height: 100%;
    }

    .summary-title {
        font-size: 14px;
        color: #6b7280;
        font-weight: 500;
        margin-bottom: 8px;
    }

    .summary-amount {
        font-size: 28px;
        font-weight: 700;
        line-height: 1.2;
        margin-bottom: 8px;
    }

    .summary-meta {
        font-size: 13px;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .summary-meta .text-success {
        color: #059669;
    }

    .summary-meta .badge-due {
        background: #FEE2E2;
        color: #991B1B;
        padding: 4px 10px;
        border-radius: 6px;
        font-size: 12px;
        font-weight: 500;
    }

    .ukt-section {
        background: #fff;
        border-radius: 12px;
        border: 1px solid #e5e7eb;
        padding: 24px;
        margin-bottom: 20px;
    }

    .section-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .section-title {
        font-size: 18px;
        font-weight: 700;
        color: #111827;
        margin: 0;
    }

    .ukt-card {
        border: 1px solid #e5e7eb;
        border-radius: 10px;
        padding: 20px;
        background: #fff;
    }

    .ukt-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 16px;
    }

    .ukt-info h4 {
        font-size: 16px;
        font-weight: 600;
        color: #111827;
        margin-bottom: 4px;
    }

    .ukt-info .prodi {
        font-size: 14px;
        color: #6b7280;
        margin-bottom: 8px;
    }

    .ukt-badge {
        display: inline-block;
        background: #fef3c7;
        color: #d97706;
        padding: 4px 10px;
        border-radius: 6px;
        font-size: 12px;
        font-weight: 500;
        margin-bottom: 8px;
    }

    .ukt-id {
        font-size: 13px;
        color: #9ca3af;
    }

    .ukt-amount {
        text-align: right;
    }

    .ukt-amount .amount {
        font-size: 24px;
        font-weight: 700;
        color: #111827;
        margin-bottom: 8px;
    }

    .ukt-status {
        display: flex;
        gap: 8px;
        justify-content: flex-end;
        margin-bottom: 8px;
    }

    .status-badge {
        padding: 4px 10px;
        border-radius: 6px;
        font-size: 12px;
        font-weight: 500;
    }

    .status-unpaid {
        background: #fee2e2;
        color: #dc2626;
    }

    .status-due {
        background: #fef3c7;
        color: #d97706;
    }

    .ukt-actions {
        display: flex;
        justify-content: flex-end;
        gap: 12px;
        margin-top: 16px;
    }

    .btn-outline {
        border: 1px solid #d1d5db;
        background: #fff;
        color: #374151;
        padding: 8px 20px;
        border-radius: 8px;
        font-weight: 500;
        transition: all 0.2s;
    }

    .btn-outline:hover {
        background: #f9fafb;
        border-color: #9ca3af;
    }

    .btn-primary {
        background: #3b82f6;
        color: white;
        border: none;
        padding: 8px 20px;
        border-radius: 8px;
        font-weight: 500;
        transition: all 0.2s;
    }

    .btn-primary:hover {
        background: #2563eb;
    }

    .history-section {
        background: #fff;
        border-radius: 12px;
        border: 1px solid #e5e7eb;
        padding: 24px;
        margin-bottom: 20px;
    }

    .history-item {
        padding: 16px 0;
        border-bottom: 1px solid #f3f4f6;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .history-item:last-child {
        border-bottom: none;
    }

    .history-info h4 {
        font-size: 15px;
        font-weight: 600;
        color: #111827;
        margin-bottom: 4px;
    }

    .history-info .description {
        font-size: 14px;
        color: #6b7280;
        margin-bottom: 4px;
    }

    .history-info .date {
        font-size: 13px;
        color: #9ca3af;
    }

    .history-details {
        text-align: right;
    }

    .history-amount {
        font-size: 16px;
        font-weight: 600;
        color: #111827;
        margin-bottom: 6px;
    }

    .status-completed {
        background: #dcfce7;
        color: #16a34a;
        padding: 4px 10px;
        border-radius: 6px;
        font-size: 12px;
        font-weight: 500;
    }

    .view-all-link {
        display: inline-block;
        color: #3b82f6;
        text-decoration: none;
        font-size: 14px;
        font-weight: 500;
        margin-top: 16px;
    }

    .view-all-link:hover {
        text-decoration: underline;
    }

    .methods-section {
        background: #fff;
        border-radius: 12px;
        border: 1px solid #e5e7eb;
        padding: 24px;
    }

    .methods-title {
        font-size: 18px;
        font-weight: 700;
        color: #111827;
        margin-bottom: 8px;
    }

    .methods-subtitle {
        font-size: 14px;
        color: #6b7280;
        margin-bottom: 20px;
    }

    .method-card {
        border: 1px solid #e5e7eb;
        border-radius: 10px;
        padding: 20px;
        background: #fff;
        height: 100%;
        transition: all 0.2s;
    }

    .method-card:hover {
        border-color: #3b82f6;
        box-shadow: 0 4px 12px rgba(59, 130, 246, 0.08);
    }

    .method-icon {
        font-size: 24px;
        color: #3b82f6;
        margin-bottom: 12px;
    }

    .method-name {
        font-size: 16px;
        font-weight: 600;
        color: #111827;
        margin-bottom: 4px;
    }

    .method-desc {
        font-size: 14px;
        color: #6b7280;
    }

    .progress-container {
        margin-top: 8px;
    }

    .progress {
        height: 6px;
        border-radius: 3px;
        background-color: #e5e7eb;
        overflow: hidden;
        margin-top: 4px;
    }

    .progress-bar {
        height: 100%;
        border-radius: 3px;
        background-color: #10b981;
    }
</style>

<div class="container mt-4">
    <div class="row mb-4">
        <div class="col-md-4 mb-3">
            <div class="summary-card">
                <div class="d-flex align-items-center mb-2">
                    <div class="summary-title">Total Balance</div>
                </div>
                <div class="summary-amount text-primary">
                    Rp <?= number_format($summary['total_balance'], 0, ',', '.'); ?>
                    <i class="bi bi-wallet-fill"></i>
                </div>
                <div class="summary-meta">
                    <span class="text-success">+<?= $summary['percent_change']; ?>% from last semester</span>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="summary-card">
                <div class="d-flex align-items-center mb-2">
                    <div class="summary-title">Outstanding</div>
                </div>
                <div class="summary-amount text-danger">
                    Rp <?= number_format($summary['outstanding'], 0, ',', '.'); ?>
                    <i class="bi bi-exclamation-triangle-fill"></i>
                </div>
                <div class="summary-meta">
                    <span class="badge-due" style="color: #991B1B;">Due in 15 days</span>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="summary-card">
                <div class="d-flex align-items-center mb-2">
                    <div class="summary-title">Paid This Semester</div>
                </div>
                <div class="summary-amount text-success">
                    Rp <?= number_format($summary['paid_this_semester'], 0, ',', '.'); ?>
                    <i class="bi bi-check-circle-fill"></i>
                </div>
                <div class="summary-meta">
                    <span class="text-success"><?= $summary['percent_completed']; ?>% completed</span>
                </div>
            </div>
        </div>
    </div>

    <div class="ukt-section">
        <div class="section-header">
            <h2 class="section-title">UKT / SPP</h2>

            <?php if (count($tagihan) > 0): ?>
                <button class="btn-primary" onclick="openUploadModal(<?= $summary['outstanding'] ?>)">
                    Pay All
                </button>
            <?php endif; ?>
        </div>
        <?php if (count($tagihan) > 0): ?>

            <?php foreach ($tagihan as $t): ?>
                <div class="ukt-card">
                    <div class="ukt-header">

                        <div class="ukt-info">
                            <div class="dot me-3" style="color:#EA580C;font-size:22px;">
                                <i class="bi bi-file-earmark-text-fill"></i>
                            </div>

                            <h4><?= $t['semester']; ?></h4>
                            <div class="prodi">UKT – <?= $t['prodi']; ?></div>

                            <div class="ukt-status">
                                <span class="status-badge status-unpaid">Unpaid</span>
                                <span>Bill #<?= $t['nomor_tagihan']; ?></span>
                            </div>
                        </div>

                        <div class="ukt-amount">
                            <div class="amount">
                                Rp <?= number_format($t['jumlah_tagihan'], 0, ',', '.'); ?>
                            </div>
                            <div class="ukt-status">
                                <span class="status-badge status-due">
                                    Due: <?= date('F d, Y', strtotime($t['due_date'])); ?>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="ukt-actions">
                        <a href="/keuangan/detail/<?= $t['id']; ?>"
                            class="btn-outline" style="text-decoration:none;">
                            View Details
                        </a>

                        <button class="btn-primary"
                            onclick="openUploadModal(<?= $t['jumlah_tagihan']; ?>)">
                            Pay
                        </button>
                    </div>
                </div>
            <?php endforeach; ?>

        <?php else: ?>

            <div class="ukt-card text-center py-4">
                <h4 class="text-muted">Tidak Ada Tagihan UKT / SPP</h4>
                <p class="text-secondary">Semua pembayaran sudah lunas</p>
            </div>
        <?php endif; ?>
    </div>

    <div class="history-section">
        <div class="section-header">
            <h2 class="section-title">Payment History</h2>
            <a href="#" class="view-all-link">View All</a>
        </div>

        <?php foreach ($riwayat as $r): ?>
            <div class="history-item d-flex">
                <div class="dot me-3" style="color: #059669; font-size: 22px;">
                    <i class="bi bi-check-circle-fill"></i>
                </div>

                <div class="history-info flex-grow-1">
                    <h4><?= $r['semester']; ?></h4>
                    <div class="description"><?= $r['keterangan_pembayaran']; ?></div>
                    <div class="date">Paid on <?= date('F d, Y', strtotime($r['tanggal_bayar'])); ?></div>
                </div>

                <div class="history-details text-end">
                    <div class="history-amount">Rp <?= number_format($r['jumlah_pembayaran'], 0, ',', '.'); ?></div>
                    <span class="status-completed">Completed</span>
                </div>

            </div>
        <?php endforeach; ?>
    </div>

    <div class="methods-section">
        <h2 class="methods-title">Payment Methods</h2>
        <p class="methods-subtitle">Choose your preferred payment method</p>

        <div class="row">
            <div class="col-md-4 mb-3">
                <div class="method-card">
                    <div class="method-icon">
                        <i class="bi bi-bank"></i>
                    </div>
                    <h3 class="method-name">Bank Transfer</h3>
                    <p class="method-desc">BCA, BNI, Mandiri</p>
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="method-card">
                    <div class="method-icon" style="color: #16A34A;">
                        <i class="bi bi-phone"></i>
                    </div>
                    <h3 class="method-name">Virtual Account</h3>
                    <p class="method-desc">Auto-generated VA</p>
                </div>
            </div>

            <div class="col-md-4 mb-3">
                <div class="method-card">
                    <div class="method-icon" style="color: #9333EA;">
                        <i class="bi bi-wallet"></i>
                    </div>
                    <h3 class="method-name">E-Wallet</h3>
                    <p class="method-desc">OVO, GoPay, DANA</p>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Modal Upload Bukti -->
<div id="uploadModal"
    style="display:none;position:fixed;top:0;left:0;width:100%;height:100%;
           background:rgba(0,0,0,0.5);justify-content:center;align-items:center;z-index:9999;">
    <div style="background:white;padding:25px;width:360px;border-radius:12px;box-shadow:0 4px 20px rgba(0,0,0,0.1);">

        <h4 style="margin-bottom:15px;font-weight:600;">Upload Bukti Pembayaran</h4>

        <form action="/keuangan/upload-bukti" method="POST" enctype="multipart/form-data">

            <input type="hidden" name="jumlah_tagihan" id="jumlahTagihan">

            <label style="font-size:14px;color:#374151;">Bukti Pembayaran</label>
            <input type="file" name="bukti" id="buktiInput" class="form-control mb-3" required onchange="previewBukti()">


            <div id="previewContainer" style="display:none; margin-bottom:15px;">
                <p style="font-size:14px; font-weight:600; color:#374151;">Preview:</p>


                <img id="previewImage" src=""
                    style="max-width:100%; border-radius:8px; display:none;">


                <div id="previewPDF"
                    style="display:none; padding:10px; border-radius:8px; background:#f3f4f6; align-items:center; gap:10px;">
                    <i class="bi bi-file-earmark-pdf-fill" style="font-size:32px; color:#dc2626;"></i>
                    <span id="pdfFileName" style="font-size:14px;"></span>
                </div>
            </div>


            <div class="d-flex justify-content-end" style="gap:10px;">
                <button type="button" onclick="closeUploadModal()"
                    class="btn btn-secondary">Cancel</button>

                <button type="submit" class="btn btn-success">Upload</button>
            </div>

        </form>
    </div>
</div>

<script>
    function openUploadModal(jumlah) {
        document.getElementById('jumlahTagihan').value = jumlah;
        document.getElementById('uploadModal').style.display = "flex";
    }

    function closeUploadModal() {
        document.getElementById('uploadModal').style.display = "none";
    }
</script>

<?= $this->endSection(); ?>