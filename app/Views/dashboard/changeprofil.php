<?= $this->extend('layout/templates'); ?>

<?= $this->section('content'); ?>
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content p-3">

        <!-- Default box -->
        <div class="rounded mt-4 p-4 bg-white shadow-lg ">
            <h1 class="h3 text-black"><?= $title; ?></h1>
        </div>

        <div class="rounded mt-4 p-4 bg-white shadow-lg mb-5">

            <form action="<?= base_url('dashboard/changeprofil'); ?>" role="form" id="my-form" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" autocomplete="off" value="<?= $user->username; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="nama_user">Nama Lengkap <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="nama_user" name="nama_user" autocomplete="off" value="<?= $user->nama_user; ?>" required>
                </div>
                <div class="form-group">
                    <label for="telpon">Telpon</label>
                    <input type="text" class="form-control" id="telpon" name="telpon" autocomplete="off" value="<?= $user->telpon; ?>" required>
                </div>

                <div class="col-md-8">
                    <div class="form-group">
                        <label for="foto">Foto User <span class="text-danger">(Max Size 500kb)</span></label>
                        <div>
                            <input type="file" id="real-file" hidden="hidden" name="foto">
                            <button type="button" class="btn btn-outline-success" id="custom-button">
                                Upload File <i class="fas fa-upload ml-2"></i>
                            </button>
                            <span id="custom-text" class="text-secondary ml-2">Tidak ada file yang diupload</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <img id="prev" src="<?= base_url('assets/img'); ?>/<?= !empty($user->foto) ? $user->foto : 'noprofil.png'; ?>" height="270" class="rounded">
                    </div>

                    <input type="hidden" name="foto_lama" value="<?= $user->foto; ?>">
                </div>


                <a class="mr-2 mt-3 btn btn-danger " href="<?= base_url('dashboard'); ?>" role="button">Batal <i class="fa fa-times ml-2"></i></a>
                <button class="mt-3 btn btn-primary" type="submit">Ubah <i class="fas fa-paper-plane ml-2"></i></button>

            </form>

        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<?= $this->endSection(); ?>