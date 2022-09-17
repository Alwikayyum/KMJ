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

            <form action="/config" role="form" id="my-form" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="navbar">Navbar Variants <span class="text-danger">*</span></label>
                            <select id="change-navbar" class="form-control select2bs4" name="navbar" required>
                                <optgroup label="Navbar Dark">
                                    <option value="navbar-dark navbar-primary" <?= $config->navbar == 'navbar-dark navbar-primary' ? 'selected' : ''; ?>>Navbar Primary </option>
                                    <option value="navbar-dark navbar-secondary" <?= $config->navbar == 'navbar-dark navbar-secondary' ? 'selected' : ''; ?>>Navbar Secondary </option>
                                    <option value="navbar-dark navbar-info" <?= $config->navbar == 'navbar-dark navbar-info' ? 'selected' : ''; ?>>Navbar Info </option>
                                    <option value="navbar-dark navbar-danger" <?= $config->navbar == 'navbar-dark navbar-danger' ? 'selected' : ''; ?>>Navbar Danger </option>
                                    <option value="navbar-dark navbar-indigo" <?= $config->navbar == 'navbar-dark navbar-indigo' ? 'selected' : ''; ?>>Navbar Indigo </option>
                                    <option value="navbar-dark navbar-purple" <?= $config->navbar == 'navbar-dark navbar-purple' ? 'selected' : ''; ?>>Navbar Purple </option>
                                    <option value="navbar-dark navbar-pink" <?= $config->navbar == 'navbar-dark navbar-pink' ? 'selected' : ''; ?>>Navbar Pink </option>
                                    <option value="navbar-dark navbar-navy" <?= $config->navbar == 'navbar-dark navbar-navy' ? 'selected' : ''; ?>>Navbar Navy </option>
                                    <option value="navbar-dark navbar-lightblue" <?= $config->navbar == 'navbar-dark navbar-lightblue' ? 'selected' : ''; ?>>Navbar Lightblue </option>
                                    <option value="navbar-dark navbar-teal" <?= $config->navbar == 'navbar-dark navbar-teal' ? 'selected' : ''; ?>>Navbar Teal </option>
                                    <option value="navbar-dark navbar-cyan" <?= $config->navbar == 'navbar-dark navbar-cyan' ? 'selected' : ''; ?>>Navbar Cyan </option>
                                    <option value="navbar-dark" <?= $config->navbar == 'navbar-dark' ? 'selected' : ''; ?>>Navbar Dark </option>
                                    <option value="navbar-dark navbar-gray-dark" <?= $config->navbar == 'navbar-dark navbar-gray-dark' ? 'selected' : ''; ?>>Navbar Gray Dark </option>
                                    <option value="navbar-dark navbar-gray" <?= $config->navbar == 'navbar-dark navbar-gray' ? 'selected' : ''; ?>>Navbar Gray </option>
                                </optgroup>
                                <optgroup label="Navbar Light">
                                    <option value="navbar-light" <?= $config->navbar == 'navbar-light' ? 'selected' : ''; ?>>Navbar Light </option>
                                    <option value="navbar-light navbar-warning" <?= $config->navbar == 'navbar-light navbar-warning' ? 'selected' : ''; ?>>Navbar Warning </option>
                                    <option value="navbar-light navbar-white" <?= $config->navbar == 'navbar-light navbar-white' ? 'selected' : ''; ?>>Navbar White </option>
                                    <option value="navbar-light navbar-orange" <?= $config->navbar == 'navbar-light navbar-orange' ? 'selected' : ''; ?>>Navbar Orange </option>
                                </optgroup>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="brandlogo">Brand Logo Variants <span class="text-danger">*</span></label>
                            <select id="change-brandlogo" class="form-control select2bs4" name="brandlogo" required>
                                <option value="navbar-primary" <?= $config->brandlogo == 'navbar-primary' ? 'selected' : ''; ?>> Primary </option>
                                <option value="navbar-secondary" <?= $config->brandlogo == 'navbar-secondary' ? 'selected' : ''; ?>> Secondary </option>
                                <option value="navbar-info" <?= $config->brandlogo == 'navbar-info' ? 'selected' : ''; ?>> Info </option>
                                <option value="navbar-success" <?= $config->brandlogo == 'navbar-success' ? 'selected' : ''; ?>> Success </option>
                                <option value="navbar-danger" <?= $config->brandlogo == 'navbar-danger' ? 'selected' : ''; ?>> Danger </option>
                                <option value="navbar-indigo" <?= $config->brandlogo == 'navbar-indigo' ? 'selected' : ''; ?>> Indigo </option>
                                <option value="navbar-purple" <?= $config->brandlogo == 'navbar-purple' ? 'selected' : ''; ?>> Purple </option>
                                <option value="navbar-pink" <?= $config->brandlogo == 'navbar-pink' ? 'selected' : ''; ?>> Pink </option>
                                <option value="navbar-navy" <?= $config->brandlogo == 'navbar-navy' ? 'selected' : ''; ?>> Navy </option>
                                <option value="navbar-lightblue" <?= $config->brandlogo == 'navbar-lightblue' ? 'selected' : ''; ?>> Lightblue </option>
                                <option value="navbar-teal" <?= $config->brandlogo == 'navbar-teal' ? 'selected' : ''; ?>> Teal </option>
                                <option value="navbar-cyan" <?= $config->brandlogo == 'navbar-cyan' ? 'selected' : ''; ?>> Cyan </option>
                                <option value="navbar-dark" <?= $config->brandlogo == 'navbar-dark' ? 'selected' : ''; ?>> Dark </option>
                                <option value="navbar-gray-dark" <?= $config->brandlogo == 'navbar-gray-dark' ? 'selected' : ''; ?>> Gray Dark </option>
                                <option value="navbar-gray" <?= $config->brandlogo == 'navbar-gray' ? 'selected' : ''; ?>> Gray </option>
                                <option value="navbar-light" <?= $config->brandlogo == 'navbar-light' ? 'selected' : ''; ?>> Light </option>
                                <option value="navbar-warning" <?= $config->brandlogo == 'navbar-warning' ? 'selected' : ''; ?>> Warning </option>
                                <option value="navbar-white" <?= $config->brandlogo == 'navbar-white' ? 'selected' : ''; ?>> White </option>
                                <option value="navbar-orange" <?= $config->brandlogo == 'navbar-orange' ? 'selected' : ''; ?>> Orange </option>
                                <option value="" <?= $config->brandlogo == null ? 'selected' : ''; ?>> Clear </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="brandcolor">Brand Text Color <span class="text-danger">*</span></label>
                            <select id="change-brandcolor" class="form-control select2bs4" name="brandcolor" required>
                                <option value="text-primary" <?= $config->brandcolor == 'text-primary' ? 'selected' : ''; ?>>Primary </option>
                                <option value="text-secondary" <?= $config->brandcolor == 'text-secondary' ? 'selected' : ''; ?>>Secondary </option>
                                <option value="text-success" <?= $config->brandcolor == 'text-success' ? 'selected' : ''; ?>>Success </option>
                                <option value="text-danger" <?= $config->brandcolor == 'text-danger' ? 'selected' : ''; ?>>Danger </option>
                                <option value="text-warning" <?= $config->brandcolor == 'text-warning' ? 'selected' : ''; ?>>Warning </option>
                                <option value="text-info" <?= $config->brandcolor == 'text-info' ? 'selected' : ''; ?>>Info </option>
                                <option value="text-light" <?= $config->brandcolor == 'text-light' ? 'selected' : ''; ?>>Light </option>
                                <option value="text-dark" <?= $config->brandcolor == 'text-dark' ? 'selected' : ''; ?>>Dark </option>
                                <option value="text-white" <?= $config->brandcolor == 'text-white' ? 'selected' : ''; ?>>White </option>
                                <option value="text-black" <?= $config->brandcolor == 'text-black' ? 'selected' : ''; ?>>black </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="sidebar">Sidebar Variants <span class="text-danger">*</span></label>
                            <select id="change-sidebar" class="form-control select2bs4" name="sidebar" required>
                                <optgroup label="Dark Sidebar">
                                    <option value="sidebar-dark-primary" <?= $config->sidebar == 'sidebar-dark-primary' ? 'selected' : ''; ?>>Sidebar Dark Primary </option>
                                    <option value="sidebar-dark-warning" <?= $config->sidebar == 'sidebar-dark-warning' ? 'selected' : ''; ?>>Sidebar Dark Warning </option>
                                    <option value="sidebar-dark-info" <?= $config->sidebar == 'sidebar-dark-info' ? 'selected' : ''; ?>>Sidebar Dark Info </option>
                                    <option value="sidebar-dark-danger" <?= $config->sidebar == 'sidebar-dark-danger' ? 'selected' : ''; ?>>Sidebar Dark Danger </option>
                                    <option value="sidebar-dark-success" <?= $config->sidebar == 'sidebar-dark-success' ? 'selected' : ''; ?>>Sidebar Dark success </option>
                                    <option value="sidebar-dark-indigo" <?= $config->sidebar == 'sidebar-dark-indigo' ? 'selected' : ''; ?>>Sidebar Dark Indigo </option>
                                    <option value="sidebar-dark-lightblue" <?= $config->sidebar == 'sidebar-dark-lightblue' ? 'selected' : ''; ?>>Sidebar Dark Lightblue </option>
                                    <option value="sidebar-dark-navy" <?= $config->sidebar == 'sidebar-dark-navy' ? 'selected' : ''; ?>>Sidebar Dark Navy </option>
                                    <option value="sidebar-dark-purple" <?= $config->sidebar == 'sidebar-dark-purple' ? 'selected' : ''; ?>>Sidebar Dark Purple </option>
                                    <option value="sidebar-dark-fuchsia" <?= $config->sidebar == 'sidebar-dark-fuchsia' ? 'selected' : ''; ?>>Sidebar Dark Fuchsia </option>
                                    <option value="sidebar-dark-pink" <?= $config->sidebar == 'sidebar-dark-pink' ? 'selected' : ''; ?>>Sidebar Dark Pink </option>
                                    <option value="sidebar-dark-maroon" <?= $config->sidebar == 'sidebar-dark-maroon' ? 'selected' : ''; ?>>Sidebar Dark Maroon </option>
                                    <option value="sidebar-dark-orange" <?= $config->sidebar == 'sidebar-dark-orange' ? 'selected' : ''; ?>>Sidebar Dark Orange </option>
                                    <option value="sidebar-dark-lime" <?= $config->sidebar == 'sidebar-dark-lime' ? 'selected' : ''; ?>>Sidebar Dark Lime </option>
                                    <option value="sidebar-dark-teal" <?= $config->sidebar == 'sidebar-dark-teal' ? 'selected' : ''; ?>>Sidebar Dark Teal </option>
                                    <option value="sidebar-dark-olive" <?= $config->sidebar == 'sidebar-dark-olive' ? 'selected' : ''; ?>>Sidebar Dark live </option>
                                </optgroup>
                                <optgroup label="Light Sidebar">
                                    <option value="sidebar-light-primary" <?= $config->sidebar == 'sidebar-light-primary' ? 'selected' : ''; ?>>Sidebar Light Primary </option>
                                    <option value="sidebar-light-warning" <?= $config->sidebar == 'sidebar-light-warning' ? 'selected' : ''; ?>>Sidebar Light Warning </option>
                                    <option value="sidebar-light-info" <?= $config->sidebar == 'sidebar-light-info' ? 'selected' : ''; ?>>Sidebar Light Info </option>
                                    <option value="sidebar-light-danger" <?= $config->sidebar == 'sidebar-light-danger' ? 'selected' : ''; ?>>Sidebar Light Danger </option>
                                    <option value="sidebar-light-success" <?= $config->sidebar == 'sidebar-light-success' ? 'selected' : ''; ?>>Sidebar Light success </option>
                                    <option value="sidebar-light-indigo" <?= $config->sidebar == 'sidebar-light-indigo' ? 'selected' : ''; ?>>Sidebar Light Indigo </option>
                                    <option value="sidebar-light-lightblue" <?= $config->sidebar == 'sidebar-light-lightblue' ? 'selected' : ''; ?>>Sidebar Light Lightblue </option>
                                    <option value="sidebar-light-navy" <?= $config->sidebar == 'sidebar-light-navy' ? 'selected' : ''; ?>>Sidebar Light Navy </option>
                                    <option value="sidebar-light-purple" <?= $config->sidebar == 'sidebar-light-purple' ? 'selected' : ''; ?>>Sidebar Light Purple </option>
                                    <option value="sidebar-light-fuchsia" <?= $config->sidebar == 'sidebar-light-fuchsia' ? 'selected' : ''; ?>>Sidebar Light Fuchsia </option>
                                    <option value="sidebar-light-pink" <?= $config->sidebar == 'sidebar-light-pink' ? 'selected' : ''; ?>>Sidebar Light Pink </option>
                                    <option value="sidebar-light-maroon" <?= $config->sidebar == 'sidebar-light-maroon' ? 'selected' : ''; ?>>Sidebar Light Maroon </option>
                                    <option value="sidebar-light-orange" <?= $config->sidebar == 'sidebar-light-orange' ? 'selected' : ''; ?>>Sidebar Light Orange </option>
                                    <option value="sidebar-light-lime" <?= $config->sidebar == 'sidebar-light-lime' ? 'selected' : ''; ?>>Sidebar Light Lime </option>
                                    <option value="sidebar-light-teal" <?= $config->sidebar == 'sidebar-light-teal' ? 'selected' : ''; ?>>Sidebar Light Teal </option>
                                    <option value="sidebar-light-olive" <?= $config->sidebar == 'sidebar-light-olive' ? 'selected' : ''; ?>>Sidebar Light live </option>
                                </optgroup>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="brand">Brand <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="brand" name="brand" autocomplete="off" value="<?= $config->brand; ?>" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="login_title">Login Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="login_title" name="login_title" autocomplete="off" value="<?= $config->login_title; ?>" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="copyright">Copyright <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="copyright" name="copyright" autocomplete="off" value="<?= $config->copyright; ?>" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="author">Author <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="author" name="author" autocomplete="off" value="<?= $config->author; ?>" required>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="keywords">Keywords <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="keywords" name="keywords" autocomplete="off" value="<?= $config->keywords; ?>" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="description">Description <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="description" name="description" autocomplete="off" value="<?= $config->description; ?>" required>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="logo">Logo <span class="text-danger">(Max Size 500kb)</span></label>
                            <div>
                                <input type="file" id="real-file" hidden="hidden" name="logo">
                                <button type="button" class="btn btn-outline-success" id="custom-button">
                                    Upload File <i class="fas fa-upload ml-2"></i>
                                </button>
                                <span id="custom-text" class="text-secondary ml-2">Tidak ada file yang diupload</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <img id="prev" src="/assets/img/<?= !empty($config->logo) ? $config->logo : 'noprofil.png'; ?>" height="270" class="rounded">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="background">Background <span class="text-danger">(Max Size 500kb)</span></label>
                            <div>
                                <input type="file" id="real-file2" hidden="hidden" name="background">
                                <button type="button" class="btn btn-outline-success" id="custom-button2">
                                    Upload File <i class="fas fa-upload ml-2"></i>
                                </button>
                                <span id="custom-text2" class="text-secondary ml-2">Tidak ada file yang diupload</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <img id="prev2" src="/assets/img/<?= !empty($config->background) ? $config->background : 'no-image.png'; ?>" height="270" width="100%">
                        </div>
                    </div>
                </div>

                <input type="hidden" name="logo_lama" value="<?= $config->logo; ?>">
                <input type="hidden" name="background_lama" value="<?= $config->background; ?>">
                <button class="mt-3 btn btn-primary" type="submit">Ubah <i class="fas fa-paper-plane ml-2"></i></button>

            </form>

        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<?= $this->endSection(); ?>