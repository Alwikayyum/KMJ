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

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">

            <div class="row">

                <div class="col-lg-8 entries">
                    <?php foreach ($berita as $row) : ?>
                        <article class="entry blue">

                            <div class="entry-img">
                                <img src="/assets/uploads/images/<?= $row->sampul ? $row->sampul : 'no-image.png'; ?>" alt="" class="img-fluid w-100">
                            </div>

                            <h2 class="entry-title">
                                <a href="/baca-berita-kegiatan/<?= $row->id_berita; ?>"><?= $row->judul; ?></a>
                            </h2>

                            <div class="entry-meta">
                                <ul>
                                    <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-single.html"><?= $row->penulis; ?></a></li>
                                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-single.html"><time datetime="2020-01-01"><?= date('d-m-Y', strtotime($row->created_at)); ?></time></a></li>
                                    <!-- <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="blog-single.html">12 Comments</a></li> -->
                                </ul>
                            </div>

                            <div class="entry-content">
                                <p><?= substr($row->isi, 0, 300); ?> ...</p>
                                <div class="read-more">
                                    <a href="/baca-berita-kegiatan/<?= $row->id_berita; ?>">Lanjut Membaca</a>
                                </div>
                            </div>

                        </article><!-- End blog entry -->
                    <?php endforeach; ?>
                    <?= $pager->links('tabel_berita', 'berita_pagination'); ?>

                </div><!-- End blog entries list -->
                <div class="col-lg-4">

                    <div class="sidebar blue">

                        <h3 class="sidebar-title">Search</h3>
                        <div class="sidebar-item search-form">
                            <form action="">
                                <input type="text">
                                <button type="submit"><i class="bi bi-search"></i></button>
                            </form>
                        </div><!-- End sidebar search formn-->
                    </div> <!-- End sidebar search form -->

                    <!-- <h3 class="sidebar-title">Categories</h3>
                        <div class="sidebar-item categories">
                            <ul>
                                <li><a href="#">General <span>(25)</span></a></li>
                                <li><a href="#">Lifestyle <span>(12)</span></a></li>
                                <li><a href="#">Travel <span>(5)</span></a></li>
                                <li><a href="#">Design <span>(22)</span></a></li>
                                <li><a href="#">Creative <span>(8)</span></a></li>
                                <li><a href="#">Educaion <span>(14)</span></a></li>
                            </ul>
                        </div> -->
                    <!-- End sidebar categories-->

                    <!-- </div> -->
                    <!-- </div> -->

                </div>
            </div>
    </section>
</main><!-- End #main -->

<?= $this->endSection() ?>