<div class="main-sidebar sidebar-style-2" style="border-right: 2px solid black !important;">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Beasiswa STMIK Bandung</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">BSB</a>
        </div>

        <!-- Divider -->
        <hr class="sidebar-divider neu-brutalism-divider">

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
                    <hr class="sidebar-divider neu-brutalism-divider">
                <?php endforeach; ?>
        </ul>
    </aside>
</div>