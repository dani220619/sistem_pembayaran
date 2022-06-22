<div id="sidebar" class='active'>
    <div class="sidebar-wrapper active">
        <div class="mt-4">
            <img src="<?= base_url('assets/assets/images/logo/logo.png') ?>" width="150" height="150" class='mx-auto d-block'>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">

                <?php
                $role_id = $this->session->userdata('role_id');
                $queryMenu = "SELECT user_menu.id, menu
                            FROM user_menu JOIN user_access_menu
                            ON user_menu.id = user_access_menu.menu_id
                            WHERE user_access_menu.role_id = $role_id
                            ORDER BY user_access_menu.menu_id ASC";

                $menu = $this->db->query($queryMenu)->result_array();

                ?>
                <?php foreach ($menu as $m) : ?>
                    <li class='sidebar-title'><?= $m['menu']; ?></li>


                    <?php
                    $menuId = $m['id'];
                    $querySubMenu = "SELECT *
                                        FROM user_sub_menu JOIN user_menu
                                        ON user_sub_menu.menu_id = user_menu.id
                                        WHERE user_sub_menu.menu_id = $menuId
                                        AND user_sub_menu.is_active = 1
                                        ";
                    $subMenu = $this->db->query($querySubMenu)->result_array();
                    ?>
                    <?php foreach ($subMenu as $sm) : ?>
                        <?php if ($title == $sm['title']) : ?>
                            <li class="sidebar-item active">
                            <?php else : ?>
                            <li class="sidebar-item">
                            <?php endif; ?>

                            <a href="<?= base_url($sm['url']) ?>" class='sidebar-link'>
                                <i data-feather="<?= $sm['icon'] ?>" width="20"></i>
                                <span><?= $sm['title'] ?></span>
                            </a>
                            </li>
                        <?php endforeach ?>

                    <?php endforeach; ?>



                    <li class='sidebar-title'>Setting</li>
                     <?php if ($user['role_id'] == 1) : ?>
                    <li class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i data-feather="user" width="20"></i>
                            <span>Laporan</span>
                        </a>

                        <ul class="submenu ">
                            <?php if ($user['role_id'] == 1) : ?>
                                <li>
                                    <a href="<?= base_url('laporan/laporan_spp') ?>">Laporan Spp</a>
                                </li>
                            <?php endif; ?>
                            <?php if ($user['role_id'] == 1) : ?>
                                <li>
                                    <a href="<?= base_url('laporan/laporan_buku') ?>">Laporan Buku</a>
                                </li>
                            <?php endif; ?>



                        </ul>

                    </li>
                    <?php endif; ?>
                    <li class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i data-feather="user" width="20"></i>
                            <span>Main Menu</span>
                        </a>

                        <ul class="submenu ">
                            <?php if ($user['role_id'] == 1) : ?>
                                <li>
                                    <a href="<?= base_url('admin/tahun_ajaran') ?>">Tahun Ajaran</a>
                                </li>
                            <?php endif; ?>
                            <?php if ($user['role_id'] == 1) : ?>
                                <li>
                                    <a href="<?= base_url('tagihan_buku') ?>">Tagihan buku</a>
                                </li>
                            <?php endif; ?>
                            <?php if ($user['role_id'] == 1) : ?>
                                <li>
                                    <a href="<?= base_url('jenis_pembayaran') ?>">Jenis Pembayaran</a>
                                </li>
                            <?php endif; ?>
                            <?php if ($user['role_id'] == 1) : ?>
                                <li>
                                    <a href="<?= base_url('pembayaran/index_bulanan') ?>">Pembayaran Spp</a>
                                </li>
                            <?php endif; ?>
                            <li>
                                <?php if ($user['role_id'] == '1') : ?>
                                    <a href="<?= base_url('admin/my_profile') ?>">Profile</a>
                                <?php else : ?>
                                    <a href="<?= base_url('user/my_profile') ?>">Profile</a>
                                <?php endif; ?>
                            </li>

                            <li>
                                <?php if ($user['role_id'] == 1) : ?>
                                    <a href="<?= base_url('admin/change_password') ?>">Change Password</a>
                                <?php else : ?>
                                    <a href="<?= base_url('user/change_password') ?>">Change Password</a>
                                <?php endif; ?>
                            </li>

                            <li>
                                <a href="<?= base_url('auth/logout') ?>">Logout</a>
                            </li>

                        </ul>

                    </li>

            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>