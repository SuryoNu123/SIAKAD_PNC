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

  .section-title {
    font-weight: 700;
    border-bottom: 2px solid #e0e0e0;
    padding-bottom: 4px;
    margin-bottom: 15px;
    font-size: 16px;
  }

  .readonly-box {
    background: #f8f9fa;
    padding: 10px 14px;
    border-radius: 8px;
    margin-bottom: 12px;
    border: 1px solid #e4e4e4;
  }

  .btn-save-center {
    display: flex;
    justify-content: flex-end;    
    padding-left: 20px;             
    margin-top: 10px;
  }

  .card {
    border: none;
    border-radius: 12px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.08);
  }
</style>

<div class="card mb-3">
  <div class="profile-header">
    <img src="<?= base_url('img/profile.png') ?>" alt="Foto Profil">
    <div>
      <h4><?= esc($mahasiswa['nama']) ?></h4>
      <small>
        NIM: <?= esc($mahasiswa['npm']) ?><br>
        <?= esc($mahasiswa['program_studi']) ?> - Semester 3
      </small>
    </div>
  </div>
</div>

<div class="container">
  <form action="<?= site_url('profile/update/' . $mahasiswa['npm']) ?>" method="post">

    <div class="card p-4 mb-4">

      <div class="row">
        <!-- LEFT SIDE -->
        <div class="col-md-6">
          <div class="section-title">Data Pribadi</div>

          <label>Nama Lengkap</label>
          <div class="readonly-box"><?= esc($mahasiswa['nama']) ?></div>

          <label>Tempat, Tanggal Lahir</label>
          <div class="readonly-box">
            <?= esc($mahasiswa['tempat_lahir']) ?>, <?= esc($mahasiswa['tanggal_lahir']) ?>
          </div>

          <label>Jenis Kelamin</label>
          <div class="readonly-box"><?= esc($mahasiswa['jenis_kelamin']) ?></div>

          <label>Agama</label>
          <div class="readonly-box"><?= esc($mahasiswa['agama']) ?></div>
        </div>

        <!-- RIGHT SIDE -->
        <div class="col-md-6">
          <div class="section-title">Kontak & Alamat</div>

          <label>Email</label>
          <input type="email" name="email" class="form-control mb-3"
                 value="<?= esc($mahasiswa['email']) ?>">

          <label>No. Telepon</label>
          <input type="text" name="no_telp" class="form-control mb-3"
                 value="<?= esc($mahasiswa['no_telp']) ?>">

          <label>Alamat</label>
          <textarea name="alamat" class="form-control mb-3" rows="3"><?= esc($mahasiswa['alamat']) ?></textarea>
        </div>

         <!-- TOMBOL SAVE DI POSISI TENGAH (SESUAI GAMBAR) -->
      <div class="btn-save-center">
        <button type="submit" class="btn btn-primary me-2">
          <i class="bi bi-save"></i> Save
        </button>
        <a href="<?= site_url('profile/' . $mahasiswa['npm']) ?>" class="btn btn-secondary">Batal</a>
      </div>
      </div>

      <!-- BAGIAN INFORMASI AKADEMIK (GABUNG — SESUAI GAMBAR) -->
      <div class="section-title mt-4">Informasi Akademik</div>

      <div class="row">
        <div class="col-md-6">
          <label>Program Studi</label>
          <div class="readonly-box"><?= esc($mahasiswa['program_studi']) ?></div>

          <label>Jurusan</label>
          <div class="readonly-box"><?= esc($mahasiswa['jurusan']) ?></div>

          <label>Tahun Masuk</label>
          <div class="readonly-box"><?= esc($mahasiswa['tahun_masuk']) ?></div>
        </div>

        <div class="col-md-6">
          <label>Dosen Pembimbing</label>
          <div class="readonly-box"><?= esc($mahasiswa['dosen_pembimbing']) ?></div>

          <label>Status Mahasiswa</label>
          <div class="readonly-box"><?= esc($mahasiswa['status_mahasiswa']) ?></div>

          <label>Target Lulus</label>
          <div class="readonly-box"><?= esc($mahasiswa['target_lulus']) ?></div>
        </div>
      </div>
    </div>

  </form>
</div>

<?= $this->endSection(); ?>
