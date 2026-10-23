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

<?php
  $hari = [
    'Sunday' => 'Minggu',
    'Monday' => 'Senin',
    'Tuesday' => 'Selasa',
    'Wednesday' => 'Rabu',
    'Thursday' => 'Kamis',
    'Friday' => 'Jumat',
    'Saturday' => 'Sabtu'
  ];

  $bulan = [
    'January' => 'Januari',
    'February' => 'Februari',
    'March' => 'Maret',
    'April' => 'April',
    'May' => 'Mei',
    'June' => 'Juni',
    'July' => 'Juli',
    'August' => 'Agustus',
    'September' => 'September',
    'October' => 'Oktober',
    'November' => 'November',
    'December' => 'Desember'
  ];
?>

<div class="card">
  <div class="card-body" style="padding: 20px;">

    <div class="d-flex justify-content-between align-items-center">
      
      <div>
        <b>Jadwal Harian</b><br>
        <?= $hari[date('l')] . ', ' . date('d') . ' ' . $bulan[date('F')] . ' ' . date('Y'); ?>
      </div>

      <div class="d-flex gap-2">
        <a href="<?= base_url('jadwal'); ?>"
          class="badge"
          style="
            background: #01456A;
            color: white;
            padding: 6px 12px;
            border-radius: 10px;
            font-size: 12px;
            text-decoration: none;
          ">
          Today
        </a>

        <a href="<?= base_url('jadwal/week'); ?>"
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
          Week
        </a>
      </div>

    </div>

    <hr class="thin-hr">
</div>


  <div class="card-body">
    <?php if ($jadwal): ?>
      <?php foreach ($jadwal as $index => $j): ?>
        <?php
          $colors = ['#e3f2fd', '#e8f5e9', '#fce4ec'];
          $borders = ['#0d6efd', '#198754', '#9333ea']; 
          $color = $colors[$index % 3];
          $border = $borders[$index % 3];

          $now = strtotime(date('H:i'));
          $mulai = strtotime($j['jam_mulai']);
          $selesai = strtotime($j['jam_selesai']);

          if ($now < $mulai) {
            $status = 'Upcoming';
          } elseif ($now >= $mulai && $now <= $selesai) {
            $status = 'Ongoing';
          } else {
            $status = 'Done';
          }        
          ?>
        
        <div class="p-3 mb-3 rounded-3"
             style="background-color: <?= $color ?>; border-left: 4px solid <?= $border ?>;">
          <div class="d-flex justify-content-between align-items-start">
            
            <div class="flex-grow-1">
              <strong class="fs-6"><?= esc($j['mata_kuliah']); ?></strong><br>
              <small><?= esc($j['ruangan']); ?> • <?= esc($j['dosen']); ?></small>
            </div>

            <div class="text-end">
              <div class="d-flex flex-column text-start">
                <small><b><?= date('H:i', strtotime($j['jam_mulai'])); ?>
                  - <?= date('H:i', strtotime($j['jam_selesai'])); ?></b>
                </small>
              </div>
              
              <span class="badge"
                style="
                  background: #ffffff;
                  color: <?= ($status == 'Ongoing' || $status == 'Done') ? '#0d6efd' : '#6c757d' ?>;
                  border-radius: 12px;
                  padding: 6px 10px;
                  font-size: 11px;
                ">
                <?= $status ?>
              </span>
            </div>

          </div>
        </div>
      <?php endforeach; ?>

    <?php else: ?>
      <p class="text-muted">Tidak ada jadwal hari ini.</p>
    <?php endif; ?>
  </div>
</div>

<?= $this->endSection(); ?>
