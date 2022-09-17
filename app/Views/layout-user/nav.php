<?php $db = \Config\Database::connect(); ?>
<?php $config = $db->table('tabel_config')->where(['id_config' => 1])->get()->getRow(); ?>
<!-- ======= Header ======= -->
<header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

        <a href="/beranda" class="logo d-flex align-items-center">
            <img src="/assets/img/<?= $config->logo; ?>" alt="">
            <span>KMJ</span>
        </a>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto" href="/beranda">Beranda</a></li>
                <li class="dropdown"><a href="#"><span>Profil</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="/profil-perusahaan">Profil Perusahaan</a></li>
                        <li><a href="/visi-misi">Visi & Misi</a></li>
                        <li><a href="/struktur-organisasi">Struktur Organisasi</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="#"><span>Informasi</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="/berita-kegiatan">Berita</a></li>
                        <li><a href="/layanan-kami">Layanan</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="#"><span>Galery</span> <i class="bi bi-chevron-down"></i></a>
                    <ul>
                        <li><a href="/galeri-foto">Foto</a></li>
                        <li><a href="/galeri-video">Video</a></li>
                    </ul>
                </li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->