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

            <button type="button" class="btn btn-outline-success mb-3 add-form mr-2" data-toggle="modal" data-target="#exampleModal">
                Tambah <i class="fas fa-plus"></i>
            </button>
            <button type="button" class="btn btn-primary mb-3">Total Data : <?= $total; ?></button>

            <div class="table-responsive">
                <table class="table table-hover table-bordered text-center" id="myTable">
                    <thead class="bg-primary text-white ">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Judul Video</th>
                            <th scope="col" class="td-aksi">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-black">
                        <?php $i = 1; ?>
                        <?php foreach ($video as $row) : ?>
                            <tr>
                                <td scope="row"><?= $i++; ?></td>
                                <td class="text-left"><?= $row->judul; ?></td>
                                <td class="text-nowarp">
                                    <a href="#" class="update-form btn btn-outline-warning" data-id_video="<?= $row->id_video; ?>" data-video="<?= $row->video; ?>" data-judul="<?= $row->judul; ?>" data-toggle="modal" data-target="#exampleModal">
                                        <i class="fas fa-edit pop" data-toggle="popover" data-placement="bottom" data-content="Update"></i>
                                    </a>
                                    <a href="/video/hapus/<?= $row->id_video; ?>" class="button-delete btn btn-outline-danger">
                                        <i class="fas fa-trash-alt pop" ata-toggle="popover" data-placement="bottom" data-content="Delete"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>

<!-- modal -->
<div class="modal fade modal-action" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Video</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="/video" role="form" id="my-form" method="post">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <label for="judul">Judul <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="judul" name="judul" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="video">Video <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="video" name="video" autocomplete="off" required>
                    </div>

                    <span class="text-danger py-2">* (Tidak Boleh Kosong)</span>
                    <input type="hidden" name="id_video" id="id_video">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-cancel" data-dismiss="modal">Batal <i class="fa fa-times ml-2"></i></button>
                <button type="submit" class="btn btn-primary btn-send"></button>

                </form>
                <!-- end form -->

            </div>
        </div>
    </div>
</div>
<!-- end modal -->

<!-- script -->
<script>
    $('.add-form').on('click', function() {
        $('.btn-send').html('Tambah <i class="fas fa-paper-plane ml-2"></i>');
        $('#id_video').val('');
        $('#my-form')[0].reset();
    });

    $('.btn-cancel').on('click', function() {
        $(".is-valid").removeClass('is-valid');
        $(".text-red").removeClass('text-red');
        $(".is-invalid").removeClass('is-invalid');
    });

    $('#myTable').on('click', '.update-form', function() {
        $('.btn-send').html('Ubah <i class="fas fa-paper-plane ml-2"></i>');
        $('#id_video').val($(this).data('id_video'));
        $('#video').val($(this).data('video'));
        $('#judul').val($(this).data('judul'));
    });
</script>
<!-- end script -->

<?= $this->endSection(); ?>