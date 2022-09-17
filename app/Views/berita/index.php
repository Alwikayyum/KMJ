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

            <a class="mb-3 mr-2 btn btn-outline-primary" href="/berita/form" role="button">
                Tambah <i class="fa fa-plus"></i>
            </a>
            <button type="button" class="btn btn-primary mb-3">Total Data : <?= $total; ?></button>

            <div class="table-responsive">
                <table class="table table-hover table-bordered w-100 text-nowrap text-center" id="myTable">
                    <thead class="bg-primary text-white ">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Penulis</th>
                            <th scope="col">Isi</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col" class="td-aksi">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-black">
                        <?php $i = 1; ?>
                        <?php foreach ($berita as $row) : ?>
                            <tr>
                                <td scope="row"><?= $i++; ?></td>
                                <td><?= $row->judul; ?></td>
                                <td class="text-left"><?= $row->penulis; ?></td>
                                <td><?= substr($row->isi, 0, 30); ?> ... </td>
                                <td><?= tanggalIndo($row->created_at); ?></td>
                                <td class="text-nowarp">
                                    <a href="#" class="getDetail btn btn-outline-info" data-id="<?= $row->id_berita; ?>" data-toggle="modal" data-target="#getDetail">
                                        <i class="fas fa-eye pop" data-toggle="popover" data-placement="bottom" data-content="Detail"> </i>
                                    </a>
                                    <a href="/berita/form/<?= $row->id_berita; ?>" class="btn btn-outline-warning">
                                        <i class="fas fa-edit pop" data-toggle="popover" data-placement="bottom" data-content="Update"></i>
                                    </a>
                                    <a href="/berita/hapus/<?= $row->id_berita; ?>" class="button-delete btn btn-outline-danger">
                                        <i class="fas fa-trash-alt pop" data-toggle="popover" data-placement="bottom" data-content="Delete"></i>
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

<!-- modal detail -->
<div class="modal fade " id="getDetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Berita</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body detail">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal detail -->

<!-- script -->
<script>
    $('#myTable').on('click', '.getDetail', function() {
        const id = $(this).data('id');
        $(".detail").load('/berita/detail/' + id);
    });
</script>
<!-- end script -->

<?= $this->endSection(); ?>