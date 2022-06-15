<?php
    function hekipiaNavMenuItem($items, $args)
    {
        if ($args->theme_location == 'hekipia_nav_top_header') {
            if (is_user_logged_in()) {
                $extraLinks = '
                <li id="menu-item-logged-in-user" class="menu-item">
                    <a href="' . get_home_url() . '/wp-login.php?action=logout">
                        ' . __('Déconnectez-vous') . '
                    </a>
                </li>
                ';
                $items = $items . $extraLinks;
            }
        }

        return $items;
    }
    add_filter( 'wp_nav_menu_items', 'hekipiaNavMenuItem', 10 ,2);