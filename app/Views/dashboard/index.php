<?= $this->extend('layout/templates'); ?>

<?= $this->section('content'); ?>
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content p-3">

        <!-- Default box -->
        <div class="rounded mt-4 p-4 bg-white shadow-lg">
            <h1 class="h3 text-black"><?= $title; ?></h1>
        </div>

        <?php $db = \Config\Database::connect(); ?>
        <?php $config = $db->table('tabel_config')->getWhere(['id_config' => 1])->getRow(); ?>
        <?php $data = $db->table('tabel_user')->where('id_user', session('id_user'))->get()->getRow(); ?>
        <?php $color = explode("-", $config->brandlogo) ?>

        <div class="row mt-3 justify-content-center">
            <div class="col-md-3 col-6">
                <div class="small-box bg-<?= $color[1] ?>">
                    <div class="inner">
                        <h3 class="text-black"><?= $icon; ?></h3>
                        <p class="text-uppercase">Icon</p>
                    </div>
                    <div class="icon text-white">
                        <i class="fas fa-icons"></i>
                    </div>
                    <a href="/icon" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="small-box bg-<?= $color[1] ?>">
                    <div class="inner">
                        <h3 class="text-black"><?= $navigasi; ?></h3>
                        <p class="text-uppercase">Navigasi</p>
                    </div>
                    <div class="icon text-white">
                        <i class="fas fa-list"></i>
                    </div>
                    <a href="/navigasi" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="small-box bg-<?= $color[1] ?>">
                    <div class="inner">
                        <h3 class="text-black"><?= $profil; ?></h3>
                        <p class="text-uppercase">Profil</p>
                    </div>
                    <div class="icon text-white">
                        <i class="fas fa-user"></i>
                    </div>
                    <a href="/profil" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="small-box bg-<?= $color[1] ?>">
                    <div class="inner">
                        <h3 class="text-black"><?= $user; ?></h3>
                        <p class="text-uppercase">User</p>
                    </div>
                    <div class="icon text-white">
                        <i class="fas fa-users"></i>
                    </div>

                    <a href="/user" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>

<?= $this->endSection(); ?>