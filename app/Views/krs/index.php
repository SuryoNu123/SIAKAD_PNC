<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<style>
    .card-figma {
        border-radius: 16px !important;
        border: 1px solid #e5e7eb !important;
        box-shadow: 0px 2px 8px rgba(0,0,0,0.06) !important;
    }

    .matkul-card {
    background: #ffffff !important;   
    border-radius: 14px !important;
    border: 1px solid #e5e7eb !important;
    padding: 20px !important;
}


    .badge-soft {
        padding: 4px 10px;
        border-radius: 12px;
        font-size: 12px;
    }

    .badge-green { background: #d1fadf; color: #006c4e; }
    .badge-yellow { background: #fef3c7; color: #92400e; }
    .badge-grey { background: #e5e7eb; color: #111827; }
    .badge-orange { background: #ffe2c6; color: #b45309; }
    .badge-blue { background: #a6cefdff; color: blue ; }

    .btn-primary-figma {
        background: #003c5f !important;
        color: white !important;
        border-radius: 10px !important;
        border: none !important;
        padding: 10px 22px !important;
    }

    .btn-outline-figma {
    color: #003c5f !important;  
    background-color: transparent;
}


    .catatan-card {
    background: rgba(191, 219, 254, 0.6) !important; 
    border-radius: 14px !important;
    border: 1px solid #93c5fd !important;
}

.catatan-card h5,
.catatan-card li,
.catatan-card i {
    color: #1E40AF !important; 
}

</style>

<div class="row g-4">
    <div class="col-md-8">

        <div class="card card-figma mb-3">
            <div class="card-body d-flex justify-content-between align-items-center">
                <h4 class="fw-semibold mb-0">Pilih Mata Kuliah</h4>

                <div class="d-flex gap-2">
                    <select class="form-select form-select-sm" style="border-radius:10px;">
                        <option>Kurikulum 2021</option>
                    </select>

                    <select class="form-select form-select-sm" style="border-radius:10px;">
                        <option>Semester 6</option>
                    </select>
                </div>
            </div>
        </div>
         <form action="/krs/save" method="post">

            <?php foreach ($jadwal as $row): ?>

            <div class="matkul-card mb-3 d-flex gap-3">

                <div class="form-check mt-1">
                    <input class="form-check-input"
                        type="checkbox"
                        name="matkul[]"
                        value="<?= $row['id_jadwal']; ?>">
                </div>

                <div class="flex-grow-1">
                    <h5 class="mb-1 fw-semibold"><?= $row['mata_kuliah']; ?></h5>

                    <div class="text-muted small">
                        <?= $row['sks']; ?> SKS • Wajib
                    </div>

                    <div class="mt-2 d-flex gap-2">
                        <span class="badge-soft badge-green">Kapasitas: 40/50</span>
                        <span class="badge-soft badge-blue">Kelas A</span>
                        <span class="badge-soft badge-grey">Kelas B</span>
                    </div>

                    <div class="mt-2 text-muted small"><?= $row['dosen']; ?></div>
                </div>

                <div class="text-end">
                    <strong class="small"><?= $row['hari']; ?></strong><br>
                    <span class="text-muted small">
                        <?= substr($row['jam_mulai'], 0, 5); ?> - <?= substr($row['jam_selesai'], 0, 5); ?>
                    </span>
                </div>

            </div>

            <?php endforeach; ?>

            <div class="mt-3 d-flex justify-content-between align-items-center">

                <button type="button" class="btn btn-outline-figma d-flex gap-1 align-items-center">
                    <span>+</span>
                    <span>Tambah Mata Kuliah Lain</span>
                </button>

                <button type="submit" class="btn btn-primary-figma">
                    Simpan Pilihan
                </button>
            </div>

        </form>
    </div>


    <div class="col-md-4">

        <div class="card card-figma mb-4">
            <div class="card-body">

                <h5 class="fw-semibold mb-3">Ringkasan KRS</h5>

                <div class="d-flex justify-content-between mb-2">
                    <span>Total SKS Dipilih:</span><strong>20 SKS</strong>
                </div>

                <div class="d-flex justify-content-between mb-2">
                    <span>Mata Kuliah Wajib:</span><strong>6</strong>
                </div>

                <div class="d-flex justify-content-between mb-3">
                    <span>Mata Kuliah Pilihan:</span><strong>4</strong>
                </div>

                <div class="d-flex align-items-center gap-2 mt-3">
                    <strong>Status Limit SKS:</strong>
                    <span class="text-success">● Valid</span>
                </div>

            </div>
        </div>

        <div class="card card-figma mb-4">
            <div class="card-body">

                <h5 class="fw-semibold mb-3">Persetujuan Dosen PA</h5>

                <div class="d-flex align-items-center">
                    <img src="<?= base_url('img/Profile1.png') ?>" width="50" height="50" class="rounded-circle me-3">
                    <div>
                        <strong>Nur Wahyu Rahadi, S.Kom., M.Eng.</strong><br>
                        <span class="text-muted small">Dosen Pembimbing Akademik</span>
                    </div>
                </div>

                <div class="alert alert-warning mt-3">
                    <strong>Menunggu Persetujuan</strong><br>
                    KRS Anda dikirim pada 15 Jan 2024, 14:30
                </div>

                <button class="btn w-100 btn-light" disabled>
                    Terkirim untuk Persetujuan
                </button>

            </div>
        </div>

        <div class="card shadow-sm catatan-card">
    <div class="card-header fw-semibold" style="background: transparent; border-bottom: none;">
        <i class="bi bi-info-circle-fill me-2"></i> Catatan Penting
    </div>
    <div class="card-body">
        <ul class="mb-0">
            <li>Batas pengajuan KRS: 31 Januari 2026</li>
            <li>Maksimal 20 SKS per semester</li>
            <li>Periksa prasyarat mata kuliah</li>
            <li>Konsultasi dengan Dosen PA jika diperlukan</li>
        </ul>
    </div>

    </div>
</div>

<?= $this->endSection(); ?>
