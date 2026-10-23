<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?? 'SIAKAD PNC'; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="<?= base_url('css/style.css') ?>" rel="stylesheet">
    <style>
        body {
            display: flex;
            min-height: 100vh;
            font-family: 'Segoe UI', sans-serif;
            background-color: #f8f9fa;
        }

        .topbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: 70px;
            background: white;
            border-bottom: 1px solid #e0e0e0;
            padding: 0 20px;
            z-index: 1000;
        }

        .topbar h5 {
            color: #000;
        }

        .profile-details {
            position: relative;
        }

        .profile-details summary {
            list-style: none;
            cursor: pointer;
        }

        .profile-details summary::-webkit-details-marker {
            display: none;
        }

        .dropdown-menu-custom {
            position: absolute;
            top: 60px;
            right: 0;
            background: white;
            padding: 10px 15px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            min-width: 150px;
            display: none;
        }

        .profile-details[open] .dropdown-menu-custom {
            display: block;
        }

        .sidebar {
            width: 250px;
            background: #ffffff;
            padding: 20px 15px;
            box-shadow: 2px 0 10px rgba(0,0,0,0.05);
            position: fixed;
            top: 70px;
            bottom: 0;
            overflow-y: auto;
        }

        .sidebar .nav-link {
            color: #333;
            font-weight: 500;
            margin-bottom: 6px;
            border-radius: 10px;
            padding: 10px 15px;
            transition: 0.2s;
        }

        .sidebar .nav-link:hover {
            background-color: #0073C0;
            color: white;
        }

        .sidebar .nav-link.active {
            background-color: #0073C0;
            color: white;
        }

        .main-content {
            margin-left: 270px;
            margin-top: 90px;
            padding: 20px;
            width: calc(100% - 270px);
        }

        @media (max-width: 768px) {
            .sidebar {
                display: none;
            }
            .main-content {
                margin-left: 0;
                width: 100%;
            }
        }
    </style>
</head>

<body>

    <!-- HEADER / TOPBAR -->
    <div class="topbar d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
            <img src="<?= base_url('img/logo pnc.png') ?>" alt="Logo" height="40" class="me-2">
            <h5 class="mb-0 fw-bold text-black">SIAKAD <span class="text-warning">PNC</span></h5>
        </div>
        <div class="d-flex align-items-center">
            <details class="position-relative me-3">
                <summary class="d-flex align-items-center" style="cursor:pointer;">
                    <i class="bi bi-bell fs-5 text-black"></i>
                </summary>

                <div class="dropdown-menu-custom" style="right:0; width:260px;">
                    <strong class="mb-2 d-block">Notifikasi</strong>

                    <?php if (!empty($pengumuman)): ?>
                        <?php foreach ($pengumuman as $p): ?>
                            <div class="alert alert-<?= esc($p['jenis']); ?> mb-2 p-2">
                                <strong><?= esc($p['judul']); ?></strong><br>
                                <small><?= esc($p['isi']); ?></small>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p class="text-muted small mb-0">Belum ada notifikasi.</p>
                    <?php endif; ?>
                </div>
            </details>

            <details class="d-flex align-items-center profile-details">
                <summary class="d-flex align-items-center" style="cursor:pointer;">
                    <img src="<?= base_url('img/profile.png') ?>" width="40" height="40"
                        class="rounded-circle me-2 border border-light">

                    <div class="text-black text-start">
                        <strong><?= esc($mahasiswa['nama'] ?? 'Mahasiswa'); ?></strong><br>
                        <small><?= esc($mahasiswa['npm'] ?? ''); ?></small>
                    </div>

                    <i class="bi bi-caret-down-fill fs-6 text-black ms-2"></i>
                </summary>

                <div class="dropdown-menu-custom">
                    <a href="<?= base_url('/'); ?>">
                        <i class="bi bi-box-arrow-right me-2"></i> Logout
                    </a>
                </div>
            </details>
        </div>
    </div>

    <!-- SIDEBAR -->
    <div class="sidebar shadow-sm">
        <div class="profile">
            <div class="d-flex align-items-center mb-4">
                <img src="<?= base_url('img/profile.png') ?>" class="rounded-circle me-2" width="50" height="50">
                <div>
                    <h6 class="mb-0"><?= esc($mahasiswa['nama'] ?? 'Mahasiswa'); ?></h6>
                    <small><?= esc($mahasiswa['npm'] ?? ''); ?></small><br>
                    <small><?= esc($mahasiswa['program_studi'] ?? ''); ?></small>
                </div>
            </div>        
        </div>
        
        <?php 
            $uri = service('uri')->getSegment(1); // deteksi halaman aktif
        ?>

        <ul class="nav flex-column mt-3">
            <li><a href="<?= base_url('dashboard'); ?>" class="nav-link <?= $uri == 'dashboard' ? 'active' : '' ?>"><i class="bi bi-house-door-fill me-2"></i>Dashboard</a></li>
            <li><a href="<?= base_url('profile'); ?>" class="nav-link <?= $uri == 'profile' ? 'active' : '' ?>"><i class="bi bi-person-fill me-2"></i>Profile</a></li>
            <li><a href="<?= base_url('krs'); ?>" class="nav-link <?= $uri == 'krs' ? 'active' : '' ?>"><i class="bi bi-file-earmark-text-fill me-2"></i>KRS Online</a></li>
            <li><a href="<?= base_url('jadwal'); ?>" class="nav-link <?= $uri == 'jadwal' ? 'active' : '' ?>"><i class="bi bi-calendar2-week-fill me-2"></i>Jadwal Kuliah</a></li>
            <li><a href="<?= base_url('presensi'); ?>" class="nav-link <?= $uri == 'presensi' ? 'active' : '' ?>"><i class="bi bi-check-circle-fill me-2"></i>Presensi</a></li>            
            <li><a href="<?= base_url('transcript/' . ($mahasiswa['npm'] ?? '')); ?>" class="nav-link <?= ($uri == 'transcript' ? 'active' : '') ?>"><i class="bi bi-file-earmark-bar-graph-fill me-2"></i>Nilai & Transkrip</a></li>
            <li><a href="<?= base_url('keuangan'); ?>" class="nav-link <?= $uri == 'keuangan' ? 'active' : '' ?>"><i class="bi bi-wallet2 me-2"></i>Keuangan</a></li>
            <li><a href="<?= base_url('surat'); ?>" class="nav-link <?= $uri == 'surat' ? 'active' : '' ?>"><i class="bi bi-book-fill me-2"></i>Persuratan</a></li>
            <li><a href="<?= base_url('tugasakhir'); ?>" class="nav-link <?= $uri == 'tugasakhir' ? 'active' : '' ?>"><i class="bi bi-journal-text me-2"></i>Tugas Akhir</a></li>
            <li><a href="<?= base_url('mbkm'); ?>" class="nav-link <?= $uri == 'mbkm' ? 'active' : '' ?>"><i class="bi bi-mortarboard-fill me-2"></i>MBKM</a></li>
        </ul>
    </div>

    <!-- KONTEN UTAMA -->
    <div class="main-content">
        <?= $this->renderSection('content') ?>
    </div>

</body>
</html>
