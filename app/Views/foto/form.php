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

            <form action="<?= isset($foto) && $foto->id_foto  ? '/foto/form/' . $foto->id_foto : '/foto/form'; ?>" role="form" id="my-form" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="form-group">
                    <label for="judul">Judul <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="judul" name="judul" autocomplete="off" required value="<?= isset($foto) ? $foto->judul : ''; ?>">
                </div>

                <div class="form-group">
                    <label for="imggaleri">Gambar <span class="text-danger">(Max Size 1 mb, Type PNG, JPEG, JPG)</span></label>
                    <div>
                        <input type="file" id="real-file" hidden="hidden" name="imggaleri">
                        <button type="button" class="btn btn-outline-success" id="custom-button">
                            Upload File <i class="fas fa-upload ml-2"></i>
                        </button>
                        <span id="custom-text" class="text-secondary ml-2">Tidak ada file yang diupload</span>
                    </div>
                </div>

                <div class="form-group">
                    <img id="prev" src="/assets/uploads/galeri/<?= isset($foto) && $foto->imggaleri ? $foto->imggaleri : 'no-image.png'; ?>" height="270" class="w-40 rounded">
                </div>

                <input type="hidden" name="imggaleri_lama" value="<?= isset($foto) ? $foto->imggaleri : ''; ?>">

                <a class="mr-2 mt-3 btn btn-danger " href="/foto" role="button">
                    Batal <i class="fa fa-times ml-2"></i>
                </a>
                <button class="mt-3 btn btn-primary" type="submit"><?= isset($foto)  ? 'Ubah' : 'Tambah'; ?> <i class="fas fa-paper-plane ml-2"></i></button>

            </form>

        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<?= $this->endSection(); ?>