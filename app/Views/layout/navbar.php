<?php $db = \Config\Database::connect(); ?>
<?php $config = $db->table('tabel_config')->getWhere(['id_config' => 1])->getRow(); ?>
<nav class="main-header navbar navbar-expand <?= $config->navbar; ?>">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

        <!-- Notifications Dropdown navigasi -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fas fa-sliders-h"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right h6">
                <div class="dropdown-divider"></div>
                <a href="/dashboard/profil/" class="dropdown-item">
                    <i class="fas fa-id-card-alt mr-2"></i>
                    My Profile
                </a>
                <div class="dropdown-divider"></div>
                <a href="/dashboard/changeprofil/" class="dropdown-item">
                    <i class="fas fa-user-edit mr-2"></i>
                    Change Profile
                </a>
                <div class="dropdown-divider"></div>
                <a href="/dashboard/changepass/" class="dropdown-item">
                    <i class="fas fa-key mr-2"></i>
                    Change Password
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item text-danger" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-power-off mr-2"></i>
                    Logout
                </a>
            </div>
        </li>

    </ul>
</nav>