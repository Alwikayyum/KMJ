<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $db = \Config\Database::connect(); ?>
    <?php $config = $db->table('tabel_config', ['id_config' => 1])->get()->getRow(); ?>
    <meta name="description" content="<?= $config->description; ?>">
    <meta name="keywords" content="<?= $config->keywords; ?>">
    <meta name="author" content="<?= $config->author; ?>">
    <link rel="icon" href="/assets/img/<?= $config->logo; ?>">

    <title><?= $title; ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="/assets/vendor/plugins/fontawesome-free/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="/assets/vendor/dist/css/adminlte.min.css">
    <!-- datatables -->
    <link rel="stylesheet" href="/assets/vendor/datatables/dataTables.bootstrap4.min.css">
    <!-- select2 -->
    <link rel="stylesheet" href="/assets/vendor/select2/css/select2.min.css">
    <link rel="stylesheet" href="/assets/vendor/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- my style -->
    <link href="/assets/css/my-style.css" rel="stylesheet">

</head>

<!-- jQuery -->
<script src="/assets/vendor/plugins/jquery/jquery.min.js"></script>

<body class="hold-transition sidebar-mini layout-fixed ">

    <div class="flash-data" data-flashdata="<?= session()->getFlashdata('success'); ?>"></div>
    <div class="flash-error" data-flashdata="<?= session()->getFlashdata('error'); ?>"></div>

    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <?= $this->include('layout/navbar'); ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?= $this->include('layout/sidebar'); ?>

        <!-- Content Wrapper. Contains page content -->
        <?= $this->renderSection('content') ?>
        <!-- /.content-wrapper -->

        <footer class="main-footer p-4">
            <h6 class=" text-center font-weight-bold text-black">Copyright &copy; <?= $config->copyright; ?> <?= date('Y'); ?></h6>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Anda yakin ingin logout?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Batal <i class="fa fa-times ml-2"></i></button>
                    <a class="btn btn-primary" href="/login/logout">Logout <i class="fas fa-sign-out-alt ml-2"></i></a>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="/assets/vendor/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/assets/vendor/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/assets/vendor/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="/assets/vendor/dist/js/demo.js"></script>
    <!-- SweetAlert2 -->
    <script src="/assets/vendor/sweet-alert-2/sweetalert2.all.min.js"></script>
    <!-- chart js -->
    <script src="/assets/vendor/chartjs/chart.js"></script>
    <script src="/assets/vendor/chartjs/utils.js"></script>

    <!-- ck editor -->
    <script src="/assets/vendor/ckeditor/ckeditor.js"></script>

    <!-- datatables -->
    <script src="/assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="/assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="/assets/vendor/datatables/plugin/dataTables.buttons.min.js"></script>
    <script src="/assets/vendor/datatables/plugin/buttons.flash.min.js"></script>
    <script src="/assets/vendor/datatables/plugin/jszip.min.js"></script>
    <script src="/assets/vendor/datatables/plugin/pdfmake.min.js"></script>
    <script src="/assets/vendor/datatables/plugin/vfs_fonts.js"></script>
    <script src="/assets/vendor/datatables/plugin/buttons.html5.min.js"></script>
    <script src="/assets/vendor/datatables/plugin/buttons.print.min.js"></script>

    <!-- my script -->
    <script src="/assets/vendor/select2/js/select2.min.js"></script>
    <script src="/assets/js/parsley.min.js"></script>
    <script src="/assets/js/my-script.js"></script>

    <script>
        const base_url = '';
        $('.select2bs4-modal').select2({
            theme: 'bootstrap4',
            width: '100%',
            dropdownParent: $("#exampleModal")
        });
        $('.select2bs4-modal2').select2({
            theme: 'bootstrap4',
            width: '100%',
            dropdownParent: $("#exampleModal")
        });
    </script>

    <?= $this->renderSection('script') ?>

</body>

</html>