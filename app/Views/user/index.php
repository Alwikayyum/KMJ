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

            <a class="mb-3 mr-2 btn btn-outline-primary" href="/user/form" role="button">
                Tambah <i class="fa fa-plus"></i>
            </a>
            <button type="button" class="btn btn-primary mb-3">Total Data : <?= $total; ?></button>

            <div class="table-responsive">
                <table class="table table-hover table-bordered w-100 text-nowrap text-center" id="myTable">
                    <thead class="bg-primary text-white ">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Username</th>
                            <th scope="col">Level</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Telpon</th>
                            <th scope="col">Aktif</th>
                            <th scope="col" class="td-aksi">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-black">
                        <?php $i = 1; ?>
                        <?php foreach ($user as $row) : ?>
                            <tr>
                                <td scope="row"><?= $i++; ?></td>
                                <td><?= $row->username; ?></td>
                                <td><?= $row->profil; ?></td>
                                <td class="texl-left"><?= $row->nama_user; ?></td>
                                <td><?= $row->telpon; ?></td>
                                <td><?= $row->aktif; ?></td>
                                <td class="text-nowarp">
                                    <a href="#" class="getDetail btn btn-outline-info" data-id="<?= $row->id_user; ?>" data-toggle="modal" data-target="#getDetail">
                                        <i class="fas fa-eye pop" data-toggle="popover" data-placement="bottom" data-content="Detail"> </i>
                                    </a>
                                    <a href="/user/form/ <?= $row->id_user; ?>" class="btn btn-outline-warning">
                                        <i class="fas fa-edit pop" data-toggle="popover" data-placement="bottom" data-content="Update"></i>
                                    </a>
                                    <a href="#" class="change-pass btn btn-outline-success" data-id="<?= $row->id_user; ?>" data-username="<?= $row->username; ?>" data-toggle="modal" data-target="#change-pass">
                                        <i class="fas fa-key pop" data-toggle="popover" data-placement="bottom" data-content="Change Password"> </i>
                                    </a>
                                    <a href="/user/hapus/ <?= $row->id_user; ?>" class="button-delete btn btn-outline-danger">
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
                <h5 class="modal-title" id="exampleModalLabel">Detail User</h5>
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

<!-- form change password -->
<div class="modal fade " id="change-pass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="/user" role="form" id="my-form" method="post">
                    <?= csrf_field(); ?>
                    <button type="button" class="btn btn-success mb-3">Username : <span id="username"></span></button>

                    <div class="form-group">
                        <label for="password">Password Baru <span class="text-danger">* (Min Length 8 Character)</span></label>
                        <input type="password" class="form-control" id="password" name="password" autocomplete="off" required minlength="8">
                    </div>

                    <div class="form-group">
                        <label for="passconfirm">Konfimasi Password <span class="text-danger">* (Min Length 8 Character)</span></label>
                        <input type="password" class="form-control" id="passconfirm" name="passconfirm" autocomplete="off" required minlength="8" data-parsley-equalto="#password">
                    </div>

                    <span class="text-danger py-2">* (Tidak Boleh Kosong)</span>
                    <input type="hidden" name="id_user" id="id_user">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-cancel" data-dismiss="modal">Close <i class="fa fa-times ml-2"></i></button>
                <button type="submit" class="btn btn-primary btn-send">Ubah <i class="fas fa-paper-plane"></i></button>

                </form>
                <!-- end form -->
            </div>
        </div>
    </div>
</div>
<!-- end form change password -->

<!-- script -->
<script>
    $('#myTable').on('click', '.getDetail', function() {
        const id = $(this).data('id');
        $(".detail").load('/user/detail/' + id);
    });

    $('#myTable').on('click', '.change-pass', function() {
        $('#username').html($(this).data('username'));
        $('#id_user').val($(this).data('id'));
    });
</script>
<!-- end script -->

<?= $this->endSection(); ?>