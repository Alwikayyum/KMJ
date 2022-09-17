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

            <form action="<?= isset($user) && $user->id_user  ? '/user/form/' . $user->id_user : '/user/form'; ?>" role="form" id="my-form" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="form-group">
                    <label for="username">Username <span class="text-danger">*</span></label>
                    <input type="text" class="form-control " id="username" name="username" autocomplete="off" required value="<?= isset($user) ? $user->username : ''; ?>">
                </div>

                <?php if (!isset($user)) : ?>
                    <div class="form-group">
                        <label for="password">Password <span class="text-danger">* (Min Length 8 Character)</span></label>
                        <input type="password" class="form-control " id="password" name="password" autocomplete="off" required minlength="8">
                    </div>
                    <div class="form-group">
                        <label for="passconfirm">Konfimasi Password <span class="text-danger">* (Min Length 8 Character)</span></label>
                        <input type="password" class="form-control " id="passconfirm" name="passconfirm" autocomplete="off" required minlength="8" data-parsley-equalto="#password">
                    </div>
                <?php endif ?>

                <div class="form-group">
                    <label for="nama_user">Nama Lengkap <span class="text-danger">*</span></label>
                    <input type="text" class="form-control " id="nama_user" name="nama_user" autocomplete="off" required value="<?= isset($user) ? $user->nama_user : ''; ?>">
                </div>

                <div class="form-group">
                    <label for="telpon">Telpon</label>
                    <input type="text" class="form-control " id="telpon" name="telpon" autocomplete="off" value="<?= isset($user) ? $user->telpon : ''; ?>">
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="id_profil">Profil <span class="text-danger">*</span></label>
                            <select id="id_profil" class="select2bs4 form-control " name="id_profil" required>
                                <option value="">-- Pilih Profil --</option>
                                <?php foreach ($profil as $row) : ?>
                                    <option value="<?= $row->id_profil; ?>" <?= isset($user) && $user->id_profil == $row->id_profil ? 'selected' : ''; ?>><?= $row->profil; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="aktif">Aktif <span class="text-danger">*</span></label>
                            <select id="aktif" class="form-control " name="aktif" required>
                                <option value="Yes" <?= isset($user) && $user->aktif == 'Yes' ? 'selected' : ''; ?>>Yes</option>
                                <option value="No" <?= isset($user) && $user->aktif == 'No' ? 'selected' : ''; ?>>No</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="form-group">
                        <label for="foto">Foto User <span class="text-danger">(Max Size 500kb, Type PNG, JPEG, JPG)</span></label>
                        <div>
                            <input type="file" id="real-file" hidden="hidden" name="foto">
                            <button type="button" class="btn btn-outline-success" id="custom-button">
                                Upload File <i class="fas fa-upload ml-2"></i>
                            </button>
                            <span id="custom-text" class="text-secondary ml-2">Tidak ada file yang diupload</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <img id="prev" src="/assets/img/<?= isset($user) && $user->foto  ? $user->foto : 'noprofil.png'; ?>" height="270" class="w-40 rounded">
                    </div>
                </div>

                <input type="hidden" name="foto_lama" value="<?= isset($user) ? $user->foto : ''; ?>">

                <a class="mr-2 mt-3 btn btn-danger " href="/user" role="button">
                    Batal <i class="fa fa-times ml-2"></i>
                </a>
                <button class="mt-3 btn btn-primary" type="submit"><?= isset($user)  ? 'Ubah' : 'Tambah'; ?> <i class="fas fa-paper-plane ml-2"></i></button>

            </form>

        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<?= $this->endSection(); ?>