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

            <form action="/strukturorganisasi" role="form" id="my-form" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>

                <div class="form-group">
                    <label for="judul">Description <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="judul" name="judul" autocomplete="off" value="<?= $strukturorganisasi->judul; ?>" required>
                </div>

                <div class="form-group">
                    <label for="gambar">Struktur Organisasi <span class="text-danger">(Max Size 1 mb)</span></label>
                    <div>
                        <input type="file" id="real-file" hidden="hidden" name="gambar">
                        <button type="button" class="btn btn-outline-success" id="custom-button">
                            Upload File <i class="fas fa-upload ml-2"></i>
                        </button>
                        <span id="custom-text" class="text-secondary ml-2">Tidak ada file yang diupload</span>
                    </div>
                </div>

                <div class="form-group">
                    <img id="prev" src="/assets/img/<?= !empty($strukturorganisasi->gambar) ? $strukturorganisasi->gambar : 'no-image.png'; ?>" height="270" class="rounded">
                </div>

                <input type="hidden" name="gambar_lama" value="<?= $strukturorganisasi->gambar; ?>">
                <button class="mt-3 btn btn-primary" type="submit">Ubah <i class="fas fa-paper-plane ml-2"></i></button>

            </form>

        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<?= $this->endSection(); ?>