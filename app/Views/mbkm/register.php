<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="card">
    <div class="card-header">Register New Program</div>
    <div class="card-body">
        <form action="<?= base_url('mbkm/register') ?>" method="post">
            <div class="mb-3">
                <label for="title" class="form-label">Judul Program</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="company" class="form-label">Perusahaan</label>
                <input type="text" name="company" id="company" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="duration" class="form-label">Durasi</label>
                <input type="text" name="duration" id="duration" class="form-control" placeholder="Misal: 3 bulan" required>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="<?= base_url('mbkm') ?>" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>

<?= $this->endSection(); ?>
