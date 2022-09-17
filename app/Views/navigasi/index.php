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
                <table class="table table-hover table-bordered text-nowrap text-center" id="myTable">
                    <thead class="bg-primary text-white ">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Navigasi</th>
                            <th scope="col">Heading</th>
                            <th scope="col">Url</th>
                            <th scope="col">Icon</th>
                            <th scope="col">navigasi Utama</th>
                            <th scope="col">Urutan</th>
                            <th scope="col">Aktif</th>
                            <th scope="col" class="td-aksi">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-black">
                        <?php $i = 1; ?>
                        <?php foreach ($navigasi as $row) : ?>
                            <tr>
                                <td scope="row"><?= $i++; ?></td>
                                <td class="text-left"><?= $row->navigasi; ?></td>
                                <td class="text-left"><?= $row->heading; ?></td>
                                <td><?= $row->url; ?></td>
                                <td><i class="<?= $row->icon; ?> text-info fa-2x"></i></td>
                                <?php $db = \Config\Database::connect(); ?>
                                <?php $data = $db->table('tabel_navigasi')->getWhere(['id_navigasi' => $row->dropdown])->getRow(); ?>
                                <td><?= $row->dropdown == 0 ? 'Root' : $data->navigasi; ?></td>
                                <td><?= $row->urutan; ?></td>
                                <td><?= $row->aktif; ?></td>
                                <td class="text-nowarp">
                                    <a href="#" class="update-form btn btn-outline-warning" data-id_navigasi="<?= $row->id_navigasi; ?>" data-navigasi="<?= $row->navigasi; ?>" data-heading="<?= $row->heading; ?>" data-url="<?= $row->url; ?>" data-icon="<?= $row->icon; ?>" data-dropdown="<?= $row->dropdown; ?>" data-urutan="<?= $row->urutan; ?>" data-aktif="<?= $row->aktif; ?>" data-toggle="modal" data-target="#exampleModal">
                                        <i class="fas fa-edit pop" data-toggle="popover" data-placement="bottom" data-content="Update"></i>
                                    </a>
                                    <a href="/navigasi/hapus/<?= $row->id_navigasi; ?>" class="button-delete btn btn-outline-danger">
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
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Navigasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="/navigasi" role="form" id="my-form" method="post">
                    <?= csrf_field(); ?>
                    <div class="form-group">
                        <label for="navigasi">Navigasi <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="navigasi" name="navigasi" autocomplete="off" required>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="heading">Heading </label>
                                <input type="text" class="form-control" id="heading" name="heading" Heading="off" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="url">Url <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="url" name="url" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="dropdown">Dropdown <span class="text-danger">*</span></label>
                                <select id="dropdown" class="select2bs4-modal form-control" name="dropdown" required>
                                    <option value="0">No</option>
                                    <?php $data = $db->table('tabel_navigasi', 'id_navigasi')->get()->getResult() ?>
                                    <?php foreach ($data as $row) : ?>
                                        <?php if ($row->dropdown == 0) : ?>
                                            <option value="<?= $row->id_navigasi; ?>"><?= $row->navigasi; ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <label for="icon">Icon </label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend" data-toggle="modal" data-target="#exampleModalicon">
                                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                                </div>
                                <input type="text" class="form-control" id="icon" name="icon" autocomplete="off" placeholder="Klik icon seacrh untuk pilih icon atau input manual icon">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="urutan">Urutan <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="urutan" name="urutan" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="aktif">Aktif <span class="text-danger">*</span></label>
                                <select id="aktif" class="select2bs4-modal form-control" name="aktif" required>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <span class="text-danger py-2">* (Tidak Boleh Kosong)</span>
                    <input type="hidden" name="id_navigasi" id="id_navigasi">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-cancel" data-dismiss="modal">Batal <i class="fa fa-times ml-2"></i></button>
                <button type="submit" class="btn btn-primary btn-send"></button>
                </form>
            </div>
            <!-- end form -->
        </div>
    </div>
</div>
<!-- end modal -->

<!-- modal icon -->
<div class="modal fade modal-action" id="exampleModalicon" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Seacrh Icon</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="table-responsive">
                    <table class="table table-hover table-bordered text-center" id="tableShow5">
                        <thead class="bg-primary text-white ">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Class</th>
                                <th scope="col">Icon</th>
                                <th scope="col" class="td-aksi">Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-black">
                            <?php $i = 1; ?>
                            <?php foreach ($icon as $k) : ?>
                                <tr>
                                    <td scope="row"><?= $i++; ?></td>
                                    <td class="text-left"><?= $k->icon; ?></td>
                                    <td><i class="<?= $k->icon; ?> text-info fa-2x"></i></td>
                                    <td class="text-nowarp">
                                        <button class="btn btn-outline-primary get-icon" data-icon="<?= $k->icon; ?>" data-dismiss="modal">Pilih</button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-cancel" data-dismiss="modal">Batal <i class="fa fa-times ml-2"></i></button>
            </div>
        </div>
    </div>
</div>
<!-- end modal icon -->

<!-- script -->
<script>
    $('.add-form').on('click', function() {
        $('.btn-send').html('Tambah <i class="fas fa-paper-plane ml-2"></i>');
        $('#id_navigasi').val('');
        $('#my-form')[0].reset();
    });

    $('.btn-cancel').on('click', function() {
        $(".is-valid").removeClass('is-valid');
        $(".text-red").removeClass('text-red');
        $(".is-invalid").removeClass('is-invalid');
    });

    $('#myTable').on('click', '.update-form', function() {
        $('.btn-send').html('Ubah <i class="fas fa-paper-plane ml-2"></i>');
        $('#id_navigasi').val($(this).data('id_navigasi'));
        $('#navigasi').val($(this).data('navigasi'));
        $('#heading').val($(this).data('heading'));
        $('#url').val($(this).data('url'));
        $('#icon').val($(this).data('icon'));
        $('#dropdown').val($(this).data('dropdown'));
        $('#urutan').val($(this).data('urutan'));
        $('#aktif').val($(this).data('aktif'));
    });

    $('#tableShow5').on('click', '.get-icon', function() {
        $('#icon').val($(this).data('icon'));
    });
</script>
<!-- end script -->

<?= $this->endSection(); ?>