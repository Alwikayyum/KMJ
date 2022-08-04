<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="mt-2">Artikel</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro est odit obcaecati magnam. Repellendus, architecto voluptates amet minima itaque quia placeat sed. Quam possimus magni, reiciendis facere illo sit voluptate!</p>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <?php foreach ($artikel as $dataArtikel) : ?>
                    <div class="col">
                        <div class="card h-100">
                            <img src="/img/<?= $dataArtikel['gambar']; ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?= $dataArtikel['judul']; ?></h5>
                                <p class="card-text"><?= $dataArtikel['artikel']; ?></p>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">On Proggres</small>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>