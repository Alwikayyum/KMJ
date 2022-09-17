<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <?php $db = \Config\Database::connect(); ?>
    <?php $config = $db->table('tabel_config')->getWhere(['id_config' => 1])->getRow(); ?>
    <meta name="description" content="<?= $config->description; ?>">
    <meta name="keywords" content="<?= $config->keywords; ?>">
    <meta name="author" content="Arman ~ <?= $config->author; ?>">
    <link rel="icon" href="<?= base_url('assets/img/' . $config->logo); ?>">

    <title><?= $title; ?></title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/vendor/plugins/fontawesome-free/css/all.min.css') ?>">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url('assets/vendor/dist/css/adminlte.min.css') ?>">
    <!-- datatables -->
    <link rel="stylesheet" href="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.min.css'); ?>">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">
    <!-- my style -->
    <link href="<?= base_url('assets/css/main.css'); ?>" rel="stylesheet">
</head>

<body style="
background: linear-gradient(rgba(0, 0, 0, 0.7),rgba(0, 0, 0, 0.7)),url(<?= base_url('assets/img/' . $config->background); ?>); 
background-repeat: no-repeat;
background-size: cover;
background-position: center;
background-attachment: fixed;
">
    <div class="flash-data" data-flashdata="<?= session()->getFlashdata('success'); ?>"></div>
    <div class="flash-error" data-flashdata="<?= session()->getFlashdata('error'); ?>"></div>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <a href="#">
                        <img style="width: 100%; height: 100%;" src="<?= base_url('assets/img'); ?>/<?= $config->logo; ?>" alt="">
                    </a>
                </div>

                <form class="login100-form validate-form" method="POST" action="<?= base_url('login/process'); ?>">
                    <?= csrf_field(); ?>
                    <span class="login100-form-title text-white">
                        <?= $config->login_title; ?> </span>
                    <div class="wrap-input100">
                        <input class="form-control input100 " type="text" name="username" placeholder="Username" autocomplete="off">
                        <div class="invalid-feedback font-italic mb-2 ml-2 text-warning"></div>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </span>
                    </div>
                    <span style="font-size: 13px; font-weight: bold;"></span>
                    <div class="wrap-input100">
                        <input id="password-field" class="form-control input100 " type="password" name="password" placeholder="Password" autocomplete="off">
                        <div class="invalid-feedback font-italic mb-2 ml-2 text-warning"></div>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>
                    <span style="font-size: 13px; font-weight: bold;"></span>
                    <div class="text-right">
                        <div class="mb-2">
                            <span class="toggle-password text-white font-italic" toggle="#password-field" style="cursor: pointer; font-size: 14px; ">Show Password</span>
                        </div>
                    </div>
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn js-tilt" type="submit" data-tilt>
                            Login
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="<?= base_url('assets/vendor/plugins/jquery/jquery.min.js') ?>"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('assets/vendor/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('assets/vendor/dist/js/adminlte.min.js') ?>"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= base_url('assets/vendor/dist/js/demo.js') ?>"></script>
    <!-- SweetAlert2 -->
    <script src="<?= base_url('assets/vendor/sweet-alert-2/sweetalert2.all.min.js'); ?>"></script>
    <!-- chart js -->
    <script src="<?= base_url('assets/vendor/chartjs/chart.js'); ?>"></script>
    <script src="<?= base_url('assets/vendor/chartjs/utils.js'); ?>"></script>

    <!-- my script -->
    <script src="<?= base_url('assets/vendor/select2/js/select2.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/parsley.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/my-script.js'); ?>"></script>
    <script>
        $(".toggle-password").click(function() {
            var input = $($(this).attr("toggle"));

            console.log(input)

            if (input.attr("type") == "password") {
                input.attr("type", "text");
                $('.toggle-password').html('Hide Password');
            } else {
                input.attr("type", "password");
                $('.toggle-password').html('Show Password');
            }
        });
    </script>

</body>

</html>