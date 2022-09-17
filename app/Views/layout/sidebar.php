<?php $db = \Config\Database::connect(); ?>
<?php $config = $db->table('tabel_config')->where(['id_config' => 1])->get()->getRow(); ?>
<aside class="main-sidebar <?= $config->sidebar; ?> elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link <?= $config->brandlogo; ?>">
        <img src="/assets/img/<?= !empty($config->logo) ? $config->logo : 'logo.png'; ?>" alt="AdminLTE Logo" class="brand-image" style="opacity: .8">
        <span class="brand-text <?= $config->brandcolor; ?>"><?= $config->brand; ?></span>
    </a>

    <?php $routes = \Config\Services::routes(); ?>
    <?php session('id_user'); ?>
    <?php $data = $db->table('tabel_user')->where(['id_user' => session('id_user')])->get()->getRow(); ?>
    <?php $id_profil = $data->id_profil; ?>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/assets/img/<?= !empty($data->foto) ? $data->foto : 'noprofil.png'; ?>" class="img-profil " alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= substr($data->nama_user, 0, 25); ?></a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="navigasi" data-accordion="false">

                <!-- get navigasi -->
                <?php
                $navigasi = $db->query("SELECT * FROM tabel_navigasi 
                        JOIN tabel_akses ON tabel_akses.id_navigasi = tabel_navigasi.id_navigasi
                        WHERE tabel_akses.id_profil = $id_profil
                        ORDER BY urutan ASC")->getResult();
                ?>
                <!-- end get navigasi -->

                <?php $request = \Config\Services::request(); ?>
                <?php $request->uri->getSegment(1); ?>

                <!-- get url -->
                <?php $url = $request->uri->getSegment(1); ?>
                <!-- end get url -->

                <?php $i = 1; ?>
                <?php foreach ($navigasi as $n) : ?>

                    <?php if ($n->aktif == 'Yes') : ?>

                        <?php if ($n->dropdown == 0) : ?>

                            <?php $row = $db->query("SELECT * FROM tabel_navigasi WHERE dropdown = $n->id_navigasi")->getNumRows(); ?>

                            <?php if ($row == 0) : ?>

                                <?php if ($n->heading) : ?>
                                    <li class="nav-header pt-2 text-danger"><?= $n->heading; ?></li>
                                <?php endif ?>

                                <li class="nav-item">
                                    <a href="/<?= $n->url; ?>" class="nav-link <?= $url == $n->url ? 'active' : ''; ?>">
                                        <i class="<?= $n->icon; ?>"></i>
                                        <p><?= $n->navigasi; ?></p>
                                    </a>
                                </li>

                            <?php else : ?>

                                <!-- get submenu -->
                                <?php
                                $down = $db->query("SELECT * FROM tabel_navigasi 
                                                JOIN tabel_akses ON tabel_akses.id_navigasi = tabel_navigasi.id_navigasi
                                                WHERE tabel_akses.id_profil = $id_profil
                                                AND dropdown = $n->id_navigasi
                                                ORDER BY urutan ASC")->getResult();
                                ?>
                                <!-- end get submenu -->

                                <?php $cariUrl = $request->uri->getSegment(1); ?>
                                <?php $num = $db->table('tabel_navigasi')->where(['dropdown' => $n->id_navigasi, 'url' => $cariUrl])->get()->getNumRows(); ?>

                                <?php if ($n->heading) : ?>
                                    <li class="nav-header pt-2 text-danger"><?= $n->heading; ?></li>
                                <?php endif ?>

                                <li class="nav-item has-treeview">
                                    <a href="#" class="nav-link <?= $num > 0 ? 'active' : ''; ?>">
                                        <i class="nav-icon <?= $n->icon; ?>"></i>
                                        <p><?= $n->navigasi; ?><i class="fas fa-angle-left right"></i></p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <?php foreach ($down as $s) : ?>
                                            <?php if ($s->aktif == 'Yes') : ?>
                                                <li class="nav-item">
                                                    <a href="/<?= $s->url; ?>" class="nav-link <?= $url == $s->url ? 'active' : ''; ?>">
                                                        <i class="nav-icon <?= $s->icon; ?>"></i>
                                                        <p><?= $s->navigasi; ?></p>
                                                    </a>
                                                </li>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </ul>
                                </li>

                            <?php endif; ?>

                        <?php endif; ?>

                    <?php endif; ?>

                    <?php $i++; ?>

                <?php endforeach; ?>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>