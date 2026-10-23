<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<style>

:root{
  --bg:#F7FAFC;
  --card:#FFFFFF;
  --muted:#6B7280;
  --accent:#0EA5A3; 
  --green:#22C55E;
  --yellow:#FACC15;
  --red:#EF4444;
  --soft-border:#E6EEF3;
}


.container-dashboard{
  background: var(--bg);
  padding: 28px 24px;
  min-height: 70vh;
}


.stat-row { display:flex; gap:18px; margin-bottom:18px; flex-wrap:wrap; }
.stat-card {
  background: var(--card);
  border-radius: 12px;
  padding:14px 18px;
  box-shadow: 0 6px 18px rgba(15,23,42,0.04);
  min-width: 170px;
  flex:1;
  display:flex;
  align-items:center;
  justify-content:space-between;
}
.stat-card .left { font-size:13px; color:var(--muted); }
.stat-card .value { font-size:20px; font-weight:700; color:#0F172A; }

.card-surface {
  background: var(--card);
  border-radius: 14px;
  padding: 18px;
  box-shadow: 0 10px 30px rgba(2,6,23,0.04);
  margin-bottom: 18px;
}

.quick-top {
  display:flex;
  justify-content:space-between;
  align-items:center;
  margin-bottom:12px;
}
.scan-btn {
  background: #01456A;
  color: #fff;
  padding:8px 12px;
  border-radius:8px;
  font-weight:600;
  border:none;
}

/* attendance item */
.attendance-list { display:flex; flex-direction:column; gap:12px; }
.att-item {
  display:flex;
  align-items:center;
  justify-content:space-between;
  background:#F8FAFC;
  border:1px solid var(--soft-border);
  padding:12px 14px;
  border-radius:10px;
}
.att-left { display:flex; gap:12px; align-items:center; }
.att-icon {
  width:48px; height:48px; border-radius:10px; display:flex; align-items:center; justify-content:center;
  background:#E6F6FF; color:#0369A1; font-size:20px;
  flex-shrink:0;
}
.att-meta .title { font-weight:700; color:#06283D; }
.att-meta .sub { color:var(--muted); font-size:13px; margin-top:3px; }

.btn-mark {
  background:#0b6b4b; color:#fff; border:none; padding:8px 12px; border-radius:8px; font-weight:600;
}

.badge-status {
  padding:6px 10px; border-radius:999px; font-weight:700; font-size:13px;
}
.badge-present { background: #DFF7E8; color: #0B6B3D; }
.badge-upcoming { background: #FFFBEB; color: #92400E; }
.badge-later { background:#E6F2FF; color:#083344; }

.present-list { display:flex; flex-direction:column; gap:12px; }
.present-row { display:flex; align-items:center; justify-content:space-between; gap:8px; }
.present-name { font-weight:700; color:#0F172A; }
.progress-track {
  width:100%; height:10px; background:#F1F5F9; border-radius:8px; overflow:hidden; margin-top:6px;
}
.progress-fill { height:100%; }

.recent .item { display:flex; gap:10px; align-items:flex-start; padding:12px 0; border-bottom:1px solid #F1F5F9; }
.recent .item:last-child { border-bottom: none; }
.recent .dot { width:34px; height:34px; border-radius:8px; display:flex; align-items:center; justify-content:center; background:#ECFDF5; color:#059669; }

.schedule-item {
  display:flex; justify-content:space-between; gap:12px; align-items:center;
  background:#F8FAFC; border-radius:12px; padding:12px; border:1px solid var(--soft-border);
}

@media (max-width: 991px){
  .stat-row { flex-direction:column; }
  .quick-top { flex-direction:column; align-items:flex-start; gap:8px; }
}
</style>

<div class="container-dashboard">

  <div class="stat-row">
    <div class="stat-card">
      <div>
        <div class="left">Mata kuliah</div>
        <div class="value" style="color: black;"><?= esc($jumlahMatkul ?? '5') ?></div>
      </div>
      <div><i class="bi bi-journal-bookmark" style="font-size:22px;color:#0EA5A3"></i></div>
    </div>

    <div class="stat-card">
      <div>
        <div class="left">Presentase Kehadiran</div>
        <div class="value" style="color:#10B981;"><?= esc($persentaseHadir ?? '100') ?>%</div>
      </div>
      <div><i class="bi bi-calendar-check" style="font-size:22px;color:#10B981"></i></div>
    </div>

    <div class="stat-card">
      <div>
        <div class="left">IPK Sementara</div>
        <div class="value" style="color: #38BDF8;"><?= esc($ipk ?? '3.45') ?></div>
      </div>
      <div><i class="bi bi-graph-up" style="font-size:22px;color:#38BDF8"></i></div>
    </div>

    <div class="stat-card">
      <div>
        <div class="left">SKS</div>
        <div class="value" style="color: #F59E0B;"><?= esc($sks ?? '20') ?></div>
      </div>
      <div><i class="bi bi-mortarboard" style="font-size:22px;color:#F59E0B"></i></div>
    </div>
  </div>

  <div class="row g-3">

    <div class="col-lg-8">

        <div class="card-surface">

            <div class="quick-top">
              <h5 class="fw-bold mb-0">Quick Attendance</h5>
              <button class="scan-btn"><i class="bi bi-qr-code-scan"></i> Scan QR</button>
            </div>

            <div class="attendance-list">
              <?php if (!empty($presensiHariIni)): ?>
                <?php foreach ($presensiHariIni as $p): ?>
                  <div class="att-item">
                    <div class="att-left">
                      <div class="att-icon"><i class="bi bi-collection"></i></div>
                      <div class="att-meta">
                        <div class="title"><?= esc($p['nama_matkul']) ?></div>
                        <div class="sub"><?= esc($p['kode'] ?? '') ?> • <?= esc($p['ruangan']) ?> • <?= date('H:i', strtotime($p['jam_mulai'])) ?></div>
                      </div>
                    </div>

                    <div>
                      <?php if ($p['status'] == 'present'): ?>
                        <span class="badge-status badge-present">Present</span>
                      <?php else: ?>
                        <form action="<?= base_url('presensi/absen') ?>" method="post" style="display:inline-block;">
                            <input type="hidden" name="id_jadwal" value="<?= esc($p['id_jadwal']) ?>">
                            <input type="hidden" name="pertemuan_ke" value="<?= esc($p['pertemuan_ke'] ?? 1) ?>">
                            <button type="submit" class="btn-mark">Mark Present</button>
                        </form>
                      <?php endif; ?>
                    </div>
                  </div>
                <?php endforeach; ?>
              <?php else: ?>
                <div class="text-muted">Tidak ada presensi hari ini.</div>
              <?php endif; ?>
            </div>
        </div>

        <div class="card-surface mt-3">
          <h6 class="fw-bold">Recent Activity</h6>

          <div class="recent mt-2">

            <div class="item">
              <div class="dot"><i class="bi bi-check-circle"></i></div>
              <div>
                <div style="font-weight:700">Attendance marked for K3</div>
                <div class="text-muted" style="font-size:13px">2 hours ago</div>
              </div>
            </div>

            <div class="item">
              <div class="dot" style="background:#EEF2FF;color:#3730A3"><i class="bi bi-file-earmark-text"></i></div>
              <div>
                <div style="font-weight:700">Assignment submitted for Desain Interaktif Pengguna</div>
                <div class="text-muted" style="font-size:13px">1 day ago</div>
              </div>
            </div>

            <div class="item">
              <div class="dot" style="background:#FFF7ED;color:#C2410C"><i class="bi bi-exclamation-circle"></i></div>
              <div>
                <div style="font-weight:700">Reminder: Quiz tomorrow</div>
                <div class="text-muted" style="font-size:13px">2 days ago</div>
              </div>
            </div>

          </div>
        </div>

    </div>

    <div class="col-lg-4">
      <div class="card-surface">
        <h6 class="fw-bold">Presentasi Per MK</h6>

        <div class="present-list mt-3">
          <?php if (!empty($presentasi)): ?>
            <?php foreach ($presentasi as $p): 
              $warna = $green = '#22C55E';
              if ($p['persentase'] < 80) $warna = '#FACC15';
              if ($p['persentase'] < 60) $warna = '#EF4444';
            ?>
              <div>
                <div class="present-row">
                  <div class="present-name"><?= esc($p['nama_matkul']) ?></div>
                  <div class="fw-bold"><?= esc($p['persentase']) ?>%</div>
                </div>
                <div class="progress-track" aria-hidden="true">
                  <div class="progress-fill" style="width:<?= (int)$p['persentase'] ?>%; background: <?= $warna ?>;"></div>
                </div>
              </div>
            <?php endforeach; ?>
          <?php else: ?>
            <div class="text-muted">Belum ada data presensi.</div>
          <?php endif; ?>
        </div>

        <div style="margin-top:14px" class="text-muted small">* Attendance Requirement: 75%</div>
      </div>

      <div class="card-surface mt-3">
        <h6 class="fw-bold">Today's Schedule</h6>
        <div style="margin-top:12px; display:flex; flex-direction:column; gap:10px;">
          <?php if (!empty($jadwalHariIni)): ?>
            <?php foreach ($jadwalHariIni as $j): ?>
              <div class="schedule-item">
              <div>
                  <div style="font-size:13px;color:var(--muted)">
                      <?= date("H:i", strtotime($j['jam_mulai'])) ?>
                  </div>

                  <div style="font-weight:700"><?= esc($j['mata_kuliah']) ?></div>

                  <div style="color:var(--muted);font-size:13px">
                      <?= esc($j['ruangan']) ?> • <?= esc($j['dosen']) ?>
                  </div>
              </div>

              <div>
                  <?php
                      $now = strtotime(date('H:i'));
                      $mulai = strtotime($j['jam_mulai']);
                      $selesai = strtotime($j['jam_selesai']);

                      if ($now < $mulai) {
                          $statusClass = 'badge-upcoming';
                          $statusText = 'Upcoming';
                      } elseif ($now >= $mulai && $now <= $selesai) {
                          $statusClass = 'badge-present';
                          $statusText = 'Ongoing';
                      } else {
                          $statusClass = 'badge-later';
                          $statusText = 'Done';
                      }
                  ?>
                  <span class="badge-status <?= $statusClass ?>"><?= $statusText ?></span>
              </div>
          </div>

            <?php endforeach; ?>
          <?php else: ?>
            <div class="text-muted">Tidak ada jadwal hari ini.</div>
          <?php endif; ?>
        </div>
      </div>
    </div>

  </div>
</div>

<?= $this->endSection(); ?>
