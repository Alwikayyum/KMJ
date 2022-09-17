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
                <?php foreach ($video as $row) : ?>
                    <div class="col-lg-12 col-md-12" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-box blue">
                            <iframe height="350" width="100%" src="https://www.youtube.com/embed/<?= $row->video; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            <h5 class="mt-4"><?= $row->judul; ?></h5>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>

    </section><!-- End Services Section -->

</main><!-- End #main -->

<?= $this->endSection() ?>