<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<style>
    .main-wrapper {
        display: grid;
        grid-template-columns: 1fr 300px;
        gap: 24px;
        padding: 24px;
        background: #f9fafb;
        font-family: Inter, Arial, sans-serif;
    }

    .card-figma {
        border-radius: 16px !important;
        border: 1px solid #e5e7eb !important;
        box-shadow: 0px 2px 8px rgba(0,0,0,0.06) !important;
        background: white;
    }

    .header-card {
        padding: 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .header-title {
        font-size: 18px;
        font-weight: 700;
        color: #1f2937;
    }

    .controls {
        display: flex;
        gap: 12px;
    }

    .controls select {
        padding: 8px 12px;
        border-radius: 8px;
        border: 1px solid #d1d5db;
        font-size: 14px;
    }

    .matkul-card {
        padding: 24px;
        border-radius: 16px;
        border: 1px solid #e5e7eb;
        background: white;
    }

    .message-box {
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        height: 240px;
        background: white;
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        font-size: 22px;
        font-weight: 800;
        color: #1f2937;
        padding: 20px;
    }


    .catatan-card {
        background: rgba(191, 219, 254, 0.6) !important;
        border-radius: 14px !important;
        border: 1px solid #93c5fd !important;
        padding: 20px;
    }

    .catatan-card h5,
    .catatan-card li {
        color: #1E40AF !important;
    }
</style>

<div class="main-wrapper">


    <div>
        <div class="card-figma header-card">
            <div class="header-title">Pilih Mata Kuliah</div>

            <div class="controls">
                <select>
                    <option>Kurikulum 2021</option>
                </select>

                <select>
                    <option>Semester 6</option>
                </select>
            </div>
        </div>

        <div class="matkul-card card-figma" style="margin-top:20px;">
            <div class="message-box">
                ANDA SUDAH MENGAJUKAN KRS UNTUK<br>
                SEMESTER INI DAN PENGAJUAN ANDA<br>
                SUDAH DITERIMA
            </div>
        </div>
    </div>

    <div>
        <div class="catatan-card card-figma">
            <h5>Catatan Penting</h5>
            <ul style="margin-top:10px; padding-left:20px">
                <li>Batas pengajuan KRS: 31 Januari</li>
                <li>Maksimal 20 SKS per semester</li>
                <li>Periksa prasyarat mata kuliah</li>
                <li>Konsultasi dengan Dosen PA jika diperlukan</li>
            </ul>
        </div>
    </div>

</div>

<?= $this->endSection() ?>
