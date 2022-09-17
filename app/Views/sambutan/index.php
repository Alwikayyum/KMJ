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

            <form action="/sambutan" role="form" id="my-form" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="form-group">
                    <label for="nama">Nama Lengkap <span class="text-danger">*</span></label>
                    <input type="text" class="form-control " id="nama" name="nama" autocomplete="off" required value="<?= isset($sambutan) ? $sambutan->nama : ''; ?>">
                </div>
                <div class="form-group">
                    <label for="jabatan">Jabatan <span class="text-danger">*</span></label>
                    <input type="text" class="form-control " id="jabatan" name="jabatan" autocomplete="off" required value="<?= isset($sambutan) ? $sambutan->jabatan : ''; ?>">
                </div>
                <div class="form-group">
                    <label for="sambutan">Sambutan <span class="text-danger">* </span></label>
                    <textarea class="form-control ckeditor" id="sambutan" rows="3" name="sambutan"><?= !empty($sambutan->sambutan) ? $sambutan->sambutan : ''; ?></textarea>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="foto">Foto <span class="text-danger">(Max Size 1 mb)</span></label>
                            <div>
                                <input type="file" id="real-file" hidden="hidden" name="foto">
                                <button type="button" class="btn btn-outline-success" id="custom-button">
                                    Upload File <i class="fas fa-upload ml-2"></i>
                                </button>
                                <span id="custom-text" class="text-secondary ml-2">Tidak ada file yang diupload</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <img id="prev" src="/assets/img/<?= !empty($sambutan->foto) ? $sambutan->foto : 'noprofil.png'; ?>" height="270" class="rounded">
                        </div>
                    </div>
                </div>

                <input type="hidden" name="foto_lama" value="<?= $sambutan->foto; ?>">
                <button class="mt-3 btn btn-primary" type="submit">Ubah <i class="fas fa-paper-plane ml-2"></i></button>

            </form>

        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<?= $this->endSection(); ?>