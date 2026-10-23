<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="card">
    <div class="card-header">
        <h4 class="mb-0"><?= esc($program['title']); ?></h4>
    </div>
    <div class="card-body">
        <p><strong>Perusahaan:</strong> <?= esc($program['company']); ?></p>
        <p><strong>Durasi:</strong> <?= esc($program['duration']); ?></p>
        <p><strong>Status:</strong> <?= esc($program['status']); ?></p>

        <div class="mt-3">
            <h6>Evaluasi</h6>
            <?php if (!empty($evaluations)): ?>
                <?php foreach ($evaluations as $ev): ?>
                    <div class="mb-2">
                        <strong><?= esc($ev['evaluator_name']); ?></strong> - <?= esc($ev['rating']); ?> ★
                        <p class="mb-0 text-muted"><?= esc($ev['note']); ?></p>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="text-muted">Belum ada evaluasi.</p>
            <?php endif; ?>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
