<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<style>
  .profile-header {
    background: linear-gradient(135deg, #0073C0, #004467);
    color: #fff;
    padding: 20px;
    border-radius: 12px;
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

  .card {
    border: none;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 12px;
  }

  .card-body {
    background: #fff;
    border-radius: 12px;
  }

  .thin-hr {
    border: 0;
    border-top: 1px solid #6e6e6e;
    margin: 20px -20px 0 -20px;
  }
</style>

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

<div style="height: 20px;"></div>

<div class="card">
  <div class="card-body" style="padding: 20px;">

    <div class="d-flex justify-content-between align-items-center">
      
      <div>
        <b>Jadwal Mingguan</b><br>
        Semester <?= esc($mahasiswa['semester'] ?? '-') ?>
      </div>

      <div class="d-flex gap-2">
        <a href="<?= base_url('jadwal'); ?>"
          class="badge"
          style="
            background: #ffffff;
            color: #01456A;
            padding: 6px 12px;
            border-radius: 10px;
            font-size: 12px;
            border: 1px solid #01456A;
            text-decoration: none;
          ">
          Today
        </a>

        <a href="<?= base_url('jadwal/week'); ?>"
          class="badge"
          style="
            background: #01456A;
            color: white;
            padding: 6px 12px;
            border-radius: 10px;
            font-size: 12px;
            text-decoration: none;
          ">
          Week
        </a>
      </div>

    </div>

    <hr class="thin-hr">
  </div>


  <div class="card-body">

    <?php 
      // Group jadwal berdasarkan hari
      $grouped = [];
      foreach ($jadwal_mingguan as $j) {
          $grouped[$j['hari']][] = $j;
      }

      $hariUrut = [
        'Monday' => 'Senin',
        'Tuesday' => 'Selasa',
        'Wednesday' => 'Rabu',
        'Thursday' => 'Kamis',
        'Friday' => 'Jumat',
        'Saturday' => 'Sabtu',
        'Sunday' => 'Minggu'
      ];
    ?>

    <?php foreach ($hariUrut as $eng => $indo): ?>
      <?php if (!empty($grouped[$eng])): ?>

        <div class="p-4 mb-4 rounded-3"
             style="
               background: #f3f8ff;
               border-left: 4px solid #01456A;
             ">

          <h6 class="mb-3"><b><?= $indo ?></b></h6>

          <div class="d-flex flex-wrap gap-2">

            <?php foreach ($grouped[$eng] as $j): ?>
              <div class="badge"
                style="
                  background: #01456A;
                  color: white;
                  padding: 10px 15px;
                  border-radius: 12px;
                  font-size: 12px;
                ">
                <?= esc($j['mata_kuliah']); ?> | <?= esc($j['sks']); ?> SKS
              </div>
            <?php endforeach; ?>

          </div>

        </div>

      <?php endif; ?>
    <?php endforeach; ?>

  </div>

</div>

<?= $this->endSection(); ?>
