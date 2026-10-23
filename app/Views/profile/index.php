<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<style>
  .profile-header {
    background: linear-gradient(135deg, #0073C0, #004467);
    color: #fff;
    padding: 20px;
    border-radius: 10px 10px 0 0;
    display: flex;
    align-items: center;
  }

  .profile-header img {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    border: 3px solid #fff;
    object-fit: cover;
    margin-right: 20px;
  }

  .profile-header h4 {
    margin-bottom: 5px;
    font-weight: 600;
  }

  .profile-header small {
    color: #e0e0e0;
  }

  .data-field {
    background-color: #f8f9fa;
    border-radius: 8px;
    padding: 8px 12px;
    margin-top: 4px;
    font-weight: 500;
  }

  .fw-semibold {
    font-weight: 600;
  }

  .section-title {
    font-weight: 700;
    border-bottom: 2px solid #e0e0e0;
    padding-bottom: 4px;
    margin-bottom: 10px;
    margin-top: 20px;
  }

  .card {
    border: none;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 12px;
  }
</style>

<div class="card">
  <div class="profile-header">
    <img src="<?= base_url('img/profile.png') ?>" alt="Foto Profil">
    <div>
      <h4><?= esc($mahasiswa['nama']) ?></h4>
      <small>NIM: <?= esc($mahasiswa['npm']) ?><br><?= esc($mahasiswa['program_studi']) ?> - Semester 3</small>
    </div>
  </div>

  <div class="card-body bg-white">
    <div class="row">
      <!-- Kolom kiri -->
      <div class="col-md-6">
        <h6 class="section-title">Data Pribadi</h6>
        <div class="mb-3"><label class="fw-semibold">Nama Lengkap</label>
          <div class="data-field"><?= esc($mahasiswa['nama']) ?></div>
        </div>
        <div class="mb-3"><label class="fw-semibold">Tempat, Tanggal Lahir</label>
          <div class="data-field"><?= esc($mahasiswa['tempat_lahir']) ?>, <?= esc($mahasiswa['tanggal_lahir']) ?></div>
        </div>
        <div class="mb-3"><label class="fw-semibold">Jenis Kelamin</label>
          <div class="data-field"><?= esc($mahasiswa['jenis_kelamin']) ?></div>
        </div>
        <div class="mb-3"><label class="fw-semibold">Agama</label>
          <div class="data-field"><?= esc($mahasiswa['agama']) ?></div>
        </div>

        <h6 class="section-title">Informasi Akademik</h6>
        <div class="mb-3"><label class="fw-semibold">Program Studi</label>
          <div class="data-field"><?= esc($mahasiswa['program_studi']) ?></div>
        </div>
        <div class="mb-3"><label class="fw-semibold">Jurusan</label>
          <div class="data-field"><?= esc($mahasiswa['jurusan']) ?></div>
        </div>
        <div class="mb-3"><label class="fw-semibold">Tahun Masuk</label>
          <div class="data-field"><?= esc($mahasiswa['tahun_masuk']) ?></div>
        </div>
        <div class="mb-3"><label class="fw-semibold">Target Lulus</label>
          <div class="data-field"><?= esc($mahasiswa['target_lulus']) ?></div>
        </div>
      </div>

      <!-- Kolom kanan -->
      <div class="col-md-6">
        <h6 class="section-title">Kontak & Alamat</h6>
        <div class="mb-3"><label class="fw-semibold">Email</label>
          <div class="data-field"><?= esc($mahasiswa['email']) ?></div>
        </div>
        <div class="mb-3"><label class="fw-semibold">No. Telepon</label>
          <div class="data-field"><?= esc($mahasiswa['no_telp']) ?></div>
        </div>
        <div class="mb-3"><label class="fw-semibold">Alamat</label>
          <div class="data-field"><?= esc($mahasiswa['alamat']) ?></div>
        </div>

        <a href="<?= site_url('profile/edit/' . $mahasiswa['npm']) ?>" class="btn btn-primary mt-3">
          <i class="bi bi-pencil-square"></i> Edit
        </a>
        
        <h6 class="section-title" style="margin-top:35px;">Dosen Pembimbing</h6>
        <div class="mb-3"><div class="data-field"><?= esc($mahasiswa['dosen_pembimbing']) ?></div></div>

        <div class="mb-3"><label class="fw-semibold">Status Mahasiswa</label>
          <div class="data-field"><?= esc($mahasiswa['status_mahasiswa']) ?></div>
        </div>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection(); ?>
