<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <?php foreach ($detailArtikel as $artikel) : ?>
                <h1><?= $artikel['judul']; ?></h1>
            <?php endforeach ?>
            <h1></h1>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>