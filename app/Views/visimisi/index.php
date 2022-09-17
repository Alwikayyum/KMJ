<?= $this->extend('layout/templates'); ?>

<?= $this->section('content'); ?>
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content p-3">

        <!-- Default box -->
        <div class="rounded mt-4 p-4 bg-white shadow-lg">
            <h1 class="h3 text-black"><?= $title; ?></h1>
        </div>

        <div class="rounded mt-4 p-4 bg-white shadow-lg mb-5">

            <form action="/visimisi" role="form" id="my-form" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="form-group">
                    <label for="visi">Visi<span class="text-danger">* </span></label>
                    <textarea class="form-control ckeditor" id="visi" rows="3" name="visi"><?= !empty($visimisi->visi) ? $visimisi->visi : ''; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="misi">Misi<span class="text-danger">* </span></label>
                    <textarea class="form-control ckeditor" id="misi" rows="3" name="misi"><?= !empty($visimisi->misi) ? $visimisi->misi : ''; ?></textarea>
                </div>

                <button class="mt-3 btn btn-primary" type="submit">Ubah <i class="fas fa-paper-plane ml-2"></i></button>

            </form>

        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<?= $this->endSection(); ?>