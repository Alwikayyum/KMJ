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
    <section id="portfolio" class="portfolio">

        <div class="container" data-aos="fade-up">

            <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">
                <?php foreach ($foto as $row) : ?>
                    <div class="col-lg-4 col-md-6 portfolio-item filter-app ">
                        <div class="portfolio-wrap">
                            <img src="/assets/uploads/galeri/<?= $row->imggaleri; ?>" class="img-fluid w-100" alt="">
                            <div class="portfolio-info">
                                <h4><?= $row->judul; ?></h4>
                                <div class="portfolio-links">
                                    <a href="/assets/uploads/galeri/<?= $row->imggaleri; ?>" data-gallery="portfolioGallery" class="portfokio-lightbox" title="<?= $row->judul; ?>"><i class="far fa-image rounded"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>

    </section><!-- End Services Section -->

</main><!-- End #main -->

<?= $this->endSection() ?>