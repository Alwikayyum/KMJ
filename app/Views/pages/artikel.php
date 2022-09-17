<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="mt-2">Artikel</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro est odit obcaecati magnam. Repellendus, architecto voluptates amet minima itaque quia placeat sed. Quam possimus magni, reiciendis facere illo sit voluptate!</p>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <?php foreach ($dataArtikel as $artikel) : ?>
                    <div class="col">
                        <div class="card h-100">
                            <img src="/img/<?= $artikel['gambar']; ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?= $artikel['judul']; ?></h5>                    
                                <p class="card-text"><?= $artikel['artikel']; ?></p>
                            </div>
                            <a href="/artikel/<?= $artikel['slug']; ?>" class="btn btn-primary">Baca Selengkapnya</a>
                            <div class="card-footer">
                                <small class="text-muted"><?= $artikel['penulis']; ?> - at (waktu dibuatnya) </small>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>