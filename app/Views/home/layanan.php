<?= $this->extend('layout-user/templates') ?>

<?= $this->section('content') ?>
<!-- ======= Breadcrumbs ======= -->
<div class="breadcrumbs d-flex align-items-center" style="background: url(<?= base_url('assets/img/backgroudArtikel.jpg'); ?>);
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        ">
    <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">
        <h2 class="mb-5"><?= $title; ?></h2>
    </div>
</div><!-- End Breadcrumbs -->

<main id="main">

    <!-- ======= Services Section ======= -->
    <section id="page" class="page">

        <div class="container" data-aos="fade-up">

            <div class="row gy-4">
                <?php foreach ($layanan as $row) : ?>
                    <div class="col-lg-12 col-md-12" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-box blue">
                            <i class="<?= $row->icon; ?> icon"></i>
                            <h3><?= $row->judul; ?></h3>
                            <p><?= $row->layanan; ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>

    </section><!-- End Services Section -->

</main><!-- End #main -->

<?= $this->endSection() ?>