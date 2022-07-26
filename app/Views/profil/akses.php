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

            <a class="mb-4 mt-2 btn btn-outline-warning" href="/profil" role="button">
                <i class="fa fa-arrow-left"></i> Kembali
            </a>
            <button type="button" class="btn btn-primary mb-3">Profil : <?= $profil->profil; ?></button>

            <div class="table-responsive">
                <table class="table table-hover table-bordered text-center">
                    <thead class="bg-primary text-white ">
                        <tr>
                            <th scope="col" width="20px" colspan="2">#</th>
                            <th scope="col">Navigasi</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody class=" text-black">
                        <?php $i = 1; ?>
                        <?php $db = \Config\Database::connect(); ?>
                        <?php $navigasi = $db->table('tabel_navigasi')->getWhere(['dropdown' => 0])->getResult(); ?>
                        <?php foreach ($navigasi as $n) : ?>
                            <tr class="<?= $n->dropdown == 0 ? 'bg-gray-200' : ''; ?>">
                                <td colspan="2"><?= $i; ?></td>
                                <td class="text-left"><?= $n->navigasi; ?></td>

                                <td>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" <?= check_access($profil->id_profil, $n->id_navigasi); ?> data-profil="<?= $profil->id_profil; ?>" data-navigasi="<?= $n->id_navigasi; ?>">
                                    </div>
                                </td>
                            </tr>

                            <?php $data = $db->table('tabel_navigasi')->getWhere(['dropdown' => $n->id_navigasi])->getResult(); ?>
                            <?php $x = 'a'; ?>
                            <?php foreach ($data as $d) : ?>
                                <tr>
                                    <td width="20px"></td>
                                    <td width="20px"><?= $x; ?></td>
                                    <td class="text-left"><?= $d->navigasi; ?></td>

                                    <td>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" <?= check_access($profil->id_profil, $d->id_navigasi); ?> data-profil="<?= $profil->id_profil; ?>" data-navigasi="<?= $d->id_navigasi; ?>">
                                        </div>
                                    </td>
                                </tr>
                                <?php $x++; ?>
                            <?php endforeach ?>

                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>

<!-- script -->
<script>
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });

    $('.form-check-input').on('click', function() {
        const id_profil = $(this).data('profil');
        const id_navigasi = $(this).data('navigasi');

        $.ajax({
            url: '/profil/changeaccess',
            type: 'post',
            data: {
                id_profil: id_profil,
                id_navigasi: id_navigasi
            },

            success: function() {
                document.location.href = '/profil/akses/' + id_profil;
            }
        });
    });
</script>
<!-- script -->
<?= $this->endSection(); ?>