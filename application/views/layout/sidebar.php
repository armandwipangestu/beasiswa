<div class="main-sidebar sidebar-style-2" style="border-right: 2px solid black !important;">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Beasiswa STMIK Bandung</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">BSB</a>
        </div>
        <ul class="sidebar-menu">
            <?php
            $role_id = $this->session->userdata('role_id');

            $queryMenu = "SELECT `user_menu`.`id`, `menu`
            FROM `user_menu`
            JOIN `user_access_menu` ON `user_menu`.`id` = `user_access_menu`.`menu_id`
            WHERE `user_access_menu`.`role_id` = $role_id
            ORDER BY `user_access_menu`.`menu_id` ASC";

            $menu = $this->db->query($queryMenu)->result_array();
            ?>

            <?php
            foreach ($menu as $m) :
            ?>
                <li class="menu-header">
                    <?= $m['menu']; ?>
                </li>

                <?php
                $menuId = $m['id'];
                $querySubMenu = "SELECT * FROM
                `user_sub_menu` JOIN `user_menu` ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                WHERE `user_sub_menu`.`menu_id` = $menuId";

                $subMenu = $this->db->query($querySubMenu)->result_array();
                ?>

                <?php
                foreach ($subMenu as $sm) :
                ?>
                    <?php if ($title == $sm['title']) : ?>
                        <li class="active">
                        <?php else : ?>
                        <li>
                        <?php endif; ?>
                        <a class="nav-link" href="<?= base_url($sm['url']); ?>">
                            <i class="<?= $sm['icon']; ?>"></i>
                            <span><?= $sm['title']; ?></span>
                        </a>
                        </li>
                    <?php endforeach; ?>
                <?php endforeach; ?>
                <!-- <li class="menu-header">Dashboard</li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="index-0.html">General Dashboard</a></li>
                    <li><a class="nav-link" href="index.html">Ecommerce Dashboard</a></li>
                </ul>
            </li>
              <li><a class="nav-link" href="blank.html"><i class="far fa-square"></i> <span>Blank Page</span></a></li>
            <li class="menu-header">Starter</li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Layout</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="layout-default.html">Default Layout</a></li>
                    <li><a class="nav-link" href="layout-transparent.html">Transparent Sidebar</a></li>
                    <li><a class="nav-link" href="layout-top-navigation.html">Top Navigation</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i> <span>Bootstrap</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="bootstrap-alert.html">Alert</a></li>
                    <li><a class="nav-link" href="bootstrap-badge.html">Badge</a></li>
                    <li><a class="nav-link" href="bootstrap-breadcrumb.html">Breadcrumb</a></li>
                </ul>
            </li> -->
        </ul>
    </aside>
</div>