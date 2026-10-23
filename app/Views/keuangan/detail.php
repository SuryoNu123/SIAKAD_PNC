<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container mt-4">

    <h2 class="mb-4">Detail Pembayaran UKT</h2>

    <div class="card p-4 shadow-sm">

        <h4><?= $tagihan['semester']; ?> - <?= $tagihan['prodi']; ?></h4>

        <p><strong>Nomor Tagihan:</strong> <?= $tagihan['nomor_tagihan']; ?></p>

        <p><strong>Status Tagihan:</strong>
            <?php if ($tagihan['status_tagihan'] === 'Paid'): ?>
                <span class="badge bg-success">Paid</span>
            <?php else: ?>
                <span class="badge bg-danger">Unpaid</span>
            <?php endif; ?>
        </p>

        <p><strong>Jumlah Tagihan:</strong>
            Rp <?= number_format($tagihan['jumlah_tagihan'], 0, ',', '.'); ?>
        </p>

        <p><strong>Tanggal Bayar:</strong>
            <?= $tagihan['tanggal_bayar'] ? date('d F Y', strtotime($tagihan['tanggal_bayar'])) : '-' ?>
        </p>

        <p><strong>Keterangan Pembayaran:</strong>
            <?= $tagihan['keterangan_pembayaran'] ?: '-' ?>
        </p>

        <hr>

        <h5>Bukti Pembayaran</h5>

        <?php if ($tagihan['deskripsi_metode']): ?>
            <?php 
                $file = '/uploads/bukti/' . $tagihan['deskripsi_metode']; 
                $ext = pathinfo($file, PATHINFO_EXTENSION);
            ?>

            <?php if (in_array($ext, ['jpg', 'jpeg', 'png'])): ?>
                <img src="<?= $file ?>" class="img-fluid rounded" style="max-width: 350px;">
            <?php elseif ($ext == 'pdf'): ?>
                <p><i class="bi bi-file-earmark-pdf-fill"></i> 
                    <a href="<?= $file ?>" target="_blank">Lihat Bukti Pembayaran (PDF)</a>
                </p>
            <?php else: ?>
                <p>Tidak ada bukti pembayaran yang bisa ditampilkan.</p>
            <?php endif; ?>

        <?php else: ?>
            <p class="text-danger">Belum mengupload bukti pembayaran</p>
        <?php endif; ?>

    </div>

</div>

<?= $this->endSection(); ?>
