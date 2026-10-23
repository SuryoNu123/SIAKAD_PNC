<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<style>
:root { --bg:#F7FAFC; --card:#FFFFFF; --muted:#6B7280; --accent:#0EA5A3; --green:#22C55E; --yellow:#FACC15; --red:#EF4444; --soft:#E6EEF3; --blue:#3B82F6; }
:root { --light-blue:#60A5FA; --teal:#14B8A6; --orange:#F97316; --purple:#8B5CF6; }
:root {
  --dark-blue: #1E3A8A;
}

.ta-wrap { background:var(--bg); padding:24px; }
.stat-row { display:flex; gap:16px; margin-bottom:20px; flex-wrap:wrap; }
.stat { background:var(--card); border:1px solid var(--soft); border-radius:14px; padding:16px 18px; box-shadow:0 6px 18px rgba(15,23,42,.04); display:flex; justify-content:space-between; align-items:center; min-width:210px; flex:1; }
.stat .label { font-size:13px; color:var(--muted); }
.stat .value { font-size:24px; font-weight:700; color:#0F172A; }

.grid { display:grid; grid-template-columns: 2fr 1fr; gap:24px; }
.card { background:var(--card); border:1px solid var(--soft); border-radius:14px; box-shadow:0 6px 18px rgba(15,23,42,.04); }
.card-header { display:flex; justify-content:space-between; align-items:center; padding:16px 18px; border-bottom:1px solid var(--soft); }
.card-title { font-weight:700; font-size:20px; color:#0F172A; }
.card-body { padding:18px; }

.subcard { background:#F3F4F6; border-radius:12px; padding:14px 16px; border:1px solid #e9edf0; }
.meta { display:flex; gap:18px; color:var(--muted); font-size:14px; margin-top:6px; }

.timeline { margin-top:18px; }
.step { display:flex; align-items:flex-start; gap:14px; padding:12px 10px; border-radius:12px; border:1px solid var(--soft); background:#fff; margin-bottom:10px; }

.circle { width:28px; height:28px; border-radius:50%; display:flex; align-items:center; justify-content:center; font-weight:700; }
.circle.green { background:rgba(34,197,94,.12); color:var(--green); }
.circle.blue { background:rgba(14,165,163,.12); color:var(--accent); }
.circle.gray { background:#F3F4F6; color:#94A3B8; }

.step .title { font-weight:600; color:#0F172A; }
.step .desc { font-size:14px; color:var(--muted); }

.notes-title { font-weight:700; font-size:18px; margin-top:10px; }
.note { background:#eef6ff; border-left:5px solid #1d4ed8; border-radius:10px; padding:12px 14px; margin-top:10px; }

.notif .pill { background:#ef4444; color:#fff; font-weight:700; border-radius:20px; padding:4px 10px; font-size:12px; }
.notif-item { display:flex; gap:10px; padding:12px 14px; border-radius:12px; border:1px solid var(--soft); margin-bottom:10px; }

.dot { width:10px; height:10px; border-radius:50%; margin-top:8px; }
.dot.red { background:#ef4444; }
.dot.yellow { background:#f59e0b; }
.dot.blue { background:#2563eb; }

.notif-item.red { background:#fee2e2; }
.notif-item.yellow { background:#fef3c7; }
.notif-item.blue { background:#dbeafe; }

.link { display:block; text-align:center; padding:12px; border:1px solid var(--soft); border-radius:10px; color:#0EA5A3; font-weight:600; text-decoration:none; }

.meet { display:flex; align-items:center; gap:10px; }
.meet .icon { width:34px; height:34px; background:rgba(16,185,129,.12); color:#10B981; border-radius:8px; display:flex; align-items:center; justify-content:center; }

@media(max-width:991px){
  .grid { grid-template-columns:1fr; }
}

.stat-sm {
  flex: 0 0 auto;
  width: auto;
  min-width: unset;
  max-width: 160px;
}

.container-dashboard {
  padding: 24px;
  background-color: #F7FAFC;
}

.stat-row {
  display: flex;
  gap: 12px;
  flex-wrap: wrap;
}

.stat-card {
  background: #FFFFFF;
  border: 1px solid #E6EEF3;
  border-radius: 14px;
  padding: 12px 16px;
  box-shadow: 0 6px 18px rgba(15,23,42,.04);
  display: flex;
  justify-content:space-between;
  align-items:center;
  flex: 1 1 180px;
  max-width: 220px;
}

.stat-card .left {
  font-size: 13px;
  color: #6B7280;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}

.stat-card .value {
  font-size: 24px;
  font-weight: 700;
}

</style>
<div class="container-dashboard">
  <div class="stat-row">

    <div class="stat-card">
      <div>
        <div class="left">IPK Sementara</div>
        <div class="value">3.85</div>
      </div>
      <div><i class="bi bi-trophy-fill" style="color: #10B981;"></i></div>
    </div>

    <div class="stat-card">
      <div>
        <div class="left">Total SKS</div>
        <div class="value">124/144</div>
      </div>
      <div><i class="bi bi-journal" style="color: #0056D2;"></i></div>
    </div>

    <div class="stat-card">
      <div>
        <div class="left">Semester</div>
        <div class="value">7th</div>
      </div>
      <div><i class="bi bi-calendar-date" style="color: #F59E0B;"></i></div>
    </div>

    <div class="stat-card">
      <div>
        <div class="left">Progres TA</div>
        <div class="value">65%</div>
      </div>
      <div><i class="bi bi-clipboard-check" style="color: #1E40AF;"></i></div>
    </div>

  </div>
</div>


<div class="grid">
  <div class="card">
    <div class="card-header" style="background: white;">
      <div class="card-title">Progres Tugas Akhir</div>
      <a class="btn btn-sm btn-primary" href="#" style="background:#0056D2; border-color:#0056D2;">Update Progress</a>
    </div>

    <div class="card-body">
      <div class="subcard">
        <div style="font-weight:600">Machine Learning Application for Student Performance Prediction</div>
        <div class="meta">
          <div><i class="bi bi-person-circle me-1"></i>Fajar Mahardika, S.Kom., M.Kom.</div>
          <div><i class="bi bi-calendar2 me-1"></i>Started: Sep 2024</div>
        </div>
      </div>

      <div class="timeline">
        <div class="step">
          <div class="circle green"><i class="bi bi-check2"></i></div>
          <div>
            <div class="title">Pengujian Judul</div>
            <div class="desc">Completed on August 23, 2024</div>
          </div>
        </div>

        <div class="step">
          <div class="circle green"><i class="bi bi-check2"></i></div>
          <div>
            <div class="title">Advisor Assignment</div>
            <div class="desc">Fajar Mahardika, S.Kom., M.Kom.</div>
          </div>
        </div>

        <div class="step">
          <div class="circle blue"><i class="bi bi-dot"></i></div>
          <div>
            <div class="title">Riset dan Penulisan</div>
            <div class="desc">In progress - 65% complete</div>
          </div>
        </div>

        <div class="step">
          <div class="circle gray">4</div>
          <div>
            <div class="title">Seminar Proposal</div>
            <div class="desc">Scheduled for Dec 2024</div>
          </div>
        </div>

        <div class="step">
          <div class="circle gray">5</div>
          <div>
            <div class="title">Sidang Tugas Akhir</div>
            <div class="desc">Pending completion</div>
          </div>
        </div>
      </div>

      <hr class="mt-3 mb-3">

      <div class="notes-title">Catatan Online Dari Dosen Pembimbing</div>

      <div class="note">
        <div><b>5 Oktober 2025 - Literature Review Progress</b></div>
        <div class="desc">Lebih diperbaiki dari tata bahasa pada BAB 2, masih terdapat kalimat yang tidak memenuhi EYD</div>
      </div>

      <div class="note">
        <div><b>24 September 2025 - Perbaikan Metodologi Penelitian</b></div>
        <div class="desc">Metodologi yang anda tidak masuk akal, gunakan metodologi yang sekiranya dapat anda implementasikan</div>
      </div>

    </div>
  </div>

  <div>
    <div class="card notif">
      <div class="card-header" style="background: white;">
        <div class="card-title">Notifications</div>
        <div class="pill">5 new</div>
      </div>

      <div class="card-body">
        <div class="notif-item red">
          <div class="dot red"></div>
          <div>
            <div class="title">Pengunduran Jadwal Bimbingan</div>
            <div class="desc">Diundur menjadi tanggal 20 Okt 2025</div>
            <div class="desc">2 hours ago</div>
          </div>
        </div>

        <div class="notif-item yellow">
          <div class="dot yellow"></div>
          <div>
            <div class="title">Revisi Tugas Akhir</div>
            <div class="desc">Periksa kembali dokumen terbaru</div>
            <div class="desc">3 days ago</div>
          </div>
        </div>

        <div class="notif-item blue">
          <div class="dot blue"></div>
          <div>
            <div class="title">Thesis Meeting</div>
            <div class="desc">Scheduled for Oct 22, 10:00 AM</div>
            <div class="desc">2 days ago</div>
          </div>
        </div>

        <a href="#" class="link">View all notifications</a>
      </div>
    </div>

    <div class="card" style="margin-top:24px">
      <div class="card-header" style="background: white;">
        <div class="card-title">Jadwal Petemuan</div>
      </div>
      <div class="card-body">
        <div class="meet">
          <div class="icon"><i class="bi bi-calendar-event"></i></div>
          <a href="#" class="link" style="flex:1">Lihat Jadwal Pertemuan</a>
        </div>
      </div>
    </div>

  </div>
</div>

<?= $this->endSection(); ?>
