<div id="main">
    <nav class="navbar navbar-header navbar-expand navbar-light">
        <a class="sidebar-toggler" href="#"><span class="navbar-toggler-icon"></span></a>
        <button class="btn navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav d-flex align-items-center navbar-light ms-auto">

                <li class="dropdown">
                    <a href="#" data-bs-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                        <div class="avatar me-1">
                            <img src="<?= base_url('assets/assets/images/profile/') . $user['image']; ?>" alt="" srcset="">
                        </div>
                        <div class="d-none d-md-block d-lg-inline-block"><?= $user['nama']; ?></div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <?php if ($user['role_id'] == 1) : ?>
                            <a class="dropdown-item" href="<?= base_url('admin/my_profile') ?>"><i data-feather="user"></i> Profile</a>
                        <?php else : ?>
                            <a class="dropdown-item" href="<?= base_url('user/my_profile') ?>"><i data-feather="user"></i> Profile</a>
                        <?php endif; ?>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?= base_url('auth/logout') ?>"><i data-feather="log-out"></i> Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>