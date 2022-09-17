<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>KMJ</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <?php $db = \Config\Database::connect(); ?>
  <?php $config = $db->table('tabel_config')->where(['id_config' => 1])->get()->getRow(); ?>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/assets/vendor/plugins/fontawesome-free/css/all.min.css">
  <!-- Favicons -->
  <link href="/assets/img/<?= $config->logo; ?>" rel="icon">
  <link href="/assets/img/<?= $config->logo; ?>" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/assets/vendor/user-templates/flexstart/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="/assets/vendor/user-templates/flexstart/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/assets/vendor/user-templates/flexstart/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/assets/vendor/user-templates/flexstart/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="/assets/vendor/user-templates/flexstart/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="/assets/vendor/user-templates/flexstart/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="/assets/vendor/user-templates/flexstart/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: FlexStart - v1.10.1
  * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <?= $this->include('layout-user/nav'); ?>
  <!-- End Header -->

  <?= $this->renderSection('content'); ?>
  <!-- ======= Contact Section ======= -->
  <section id="services-contact" class="services-contact" style="
        background: url(<?= base_url('assets/img/footer-bg.png'); ?>); 
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
">

    <div class="container" data-aos="fade-up">

      <header class="section-header">
        <p>Kontak Kami</p>
      </header>

      <div class="row">
        <div class="col-lg-6 col-md-6">
          <div class="icon-box">
            <div class="icon"><i class="fas fa-map-marked-alt" style="color: #ff689b;"></i></div>
            <h4 class="title"><a href="https://www.google.com/maps/place/PT.+Karya+Manunggal+Jati+dan+PT.+Sabda+Alam+Cab.+Makassar%2FGowa/@-5.2575227,119.5280428,16.32z/data=!4m5!3m4!1s0x2dbee708c0ee4cf1:0x8ce1ae7e0b1ff229!8m2!3d-5.2572859!4d119.5303072">Alamat</a></h4>
            <p class="description">Sulawesi Selatan, Kab. Gowa, Kec. Bontomarannu, Desa Pakkatto </p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="icon-box">
            <div class="icon"><i class="fas fa-envelope" style="color: #e9bf06;"></i></div>
            <h4 class="title"><a href="">Email</a></h4>
            <p class="description">web-profile@gmail.com</p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6" data-wow-delay="0.1s">
          <div class="icon-box">
            <div class="icon"><i class="fas fa-phone" style="color: #3fcdc7;"></i></div>
            <h4 class="title"><a href="">Telpon</a></h4>
            <p class="description">0852-4045-5297</p>
          </div>
        </div>
      </div>
    </div>

    <div class="copyright" style="text-align: center; color: #012970; font-family:'Kaushan Script', cursive;">
      &copy; Copyright <strong><span>KMJ</span></strong> - <?= date('Y'); ?>
    </div>

  </section><!-- End Contact Section -->

  <!-- ======= Footer ======= -->
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="/assets/vendor/user-templates/flexstart/assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="/assets/vendor/user-templates/flexstart/assets/vendor/aos/aos.js"></script>
  <script src="/assets/vendor/user-templates/flexstart/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/assets/vendor/user-templates/flexstart/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="/assets/vendor/user-templates/flexstart/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="/assets/vendor/user-templates/flexstart/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="/assets/vendor/user-templates/flexstart/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="/assets/vendor/user-templates/flexstart/assets/js/main.js"></script>

</body>

</html>