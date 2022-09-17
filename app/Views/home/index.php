<?= $this->extend('layout-user/templates') ?>

<?= $this->section('content') ?>
<!-- ======= Hero Section ======= -->
<section id="hero" class="hero d-flex align-items-center">

    <div class="container">
        <div class="row">
            <div class="col-lg-6 d-flex flex-column justify-content-center">
                <h1 data-aos="fade-up">Selamat Datang di Website KMJ</h1>
                <h2 data-aos="fade-up" data-aos-delay="400">PT. Karya Manunggal Jati merupakan perusahaan penyedia pekerja bagi perusahaan di berbagai bidang usaha di Indonesia.</h2>
                <div data-aos="fade-up" data-aos-delay="600">
                    <div class="text-center text-lg-start">
                        <!-- <a href="#about" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                            <span>Get Started</span>
                            <i class="bi bi-arrow-right"></i>
                        </a> -->
                    </div>
                </div>
            </div>
            <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
                <img src="/assets/vendor/user-templates/flexstart/assets/img/hero-img.png" class="img-fluid" alt="">
            </div>
        </div>
    </div>

</section><!-- End Hero -->

<main id="main">

    <!-- ======= Team Section ======= -->
    <section id="team" class="team" style="
        background: url(<?= base_url('assets/img/background-index-2-update.jpg'); ?>); 
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
">

        <div class="container" data-aos="fade-up">

            <header class="section-header mr-5" style="text-align: right !important;">
                <p style="color:#012970 !important;">Sambutan Kepala Cabang</p>
            </header>

            <div class="row gy-4">

                <div class="col-lg-8 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
                    <div class="content">
                        <p>
                            <?= $sambutan->sambutan; ?>
                        </p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
                    <div class="member">
                        <div class="member-img">
                            <img src="/assets/img/<?= $sambutan->foto; ?>" class="img-fluid" alt="">
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                        <div class="member-info">
                            <h4><?= $sambutan->nama; ?></h4>
                            <span class="text-dark"><?= $sambutan->jabatan; ?></span>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </section><!-- End Team Section -->

    <!-- ======= Recent Blog Posts Section ======= -->
    <section id="recent-blog-posts" class="recent-blog-posts" style="background-color: whitesmoke;">

        <div class="container" data-aos="fade-up">

            <header class="section-header">
                <p>Berita</p>
            </header>

            <div class="row">
                <?php foreach ($berita as $row) : ?>
                    <div class="col-lg-4">
                        <div class="post-box">
                            <div class="post-img"><img src="/assets/uploads/images/<?= $row->sampul ? $row->sampul : 'no-image.png'; ?>" class="img-fluid" alt=""></div>
                            <span class="post-date"><i class="far fa-clock"></i> <?= date('d-m-Y', strtotime($row->created_at)); ?> || <strong class="float-right"> <i class="fas fa-user-tag"></i> <?= $row->penulis; ?></strong> </span>
                            <h3 class="post-title"><?= $row->judul; ?></h3>
                            <p style="text-align: justify;"><?= substr($row->isi, 0, 200); ?> ...</p>
                            <a href="/baca-berita-kegiatan/<?= $row->id_berita; ?>" class="readmore stretched-link mt-auto"><span>Lanjut Membaca</span><i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="text-left mt-5">
                <a class="btn btn-outline-primary" href="/berita-kegiatan" role="button"> Semua Berita <i class="bi bi-arrow-right"></i></a>
            </div>
        </div>

    </section><!-- End Recent Blog Posts Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services" style="
        background: url(<?= base_url('assets/img/background-index-7-update.jpg'); ?>); 
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
">

        <div class="container" data-aos="fade-up">

            <header class="section-header">
                <p>Layanan Kami</p>
            </header>

            <div class="row gy-4">
                <?php foreach ($layanan as $row) : ?>
                    <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-box blue">
                            <i class="<?= $row->icon; ?> icon"></i>
                            <h3><?= $row->judul; ?></h3>
                            <p><?= $row->layanan; ?></p>
                            <!-- <a href="#" class="read-more"><span>Read More</span> <i class="bi bi-arrow-right"></i></a> -->
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>

    </section><!-- End Services Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio" style="background-color: whitesmoke;">

        <div class="container" data-aos="fade-up">

            <header class="section-header">
                <p>Dokumentasi</p>
            </header>

            <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">
                <?php foreach ($foto as $row) : ?>
                    <div class="col-lg-4 col-md-6 portfolio-item filter-app ">
                        <div class="portfolio-wrap">
                            <img src="/assets/uploads/galeri/<?= $row->imggaleri; ?>" class="img-fluid w-100" alt="">
                            <div class="portfolio-info ">
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

    </section><!-- End Portfolio Section -->

</main><!-- End #main -->

<?= $this->endSection() ?>