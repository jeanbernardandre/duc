<?php include('inc/sprite.svg'); ?>
<footer class="footer">
    <div class="container wrapper-footer">
        <div class="wrapper-reseaux">
            <div class="widget-bottom wrapper-menu <?php echo wp_is_mobile() ? '-mobile' : '' ?>">
                <?php
                    if (wp_is_mobile()) {
                        echo '&copy;' . date('Y') . ' ' . __('- Tous droits réservés', 'huttopiac') . '&nbsp;&nbsp;';
                        $menuParameters = [
                            'theme_location' => 'huttopiac_bottom_nav',
                            'container' => false,
                            'echo' => false,
                            'before' => ' | ',
                            'container_id' => 'main-menu',
                            'menu_class' => 'menu',
                        ];
                        echo strip_tags(wp_nav_menu($menuParameters), '<a>');
                    } else {
                        ?>
                        <div>
                            <?php echo '&copy;' . date('Y') . ' ' . __('- Tous droits réservés', 'huttopiac'); ?>&nbsp;&nbsp;|
                        </div>
                        <?php
                            wp_nav_menu([
                                'theme_location' => 'huttopiac_bottom_nav',
                                'container' => 'ul',
                                'container_class' => 'menu-menu-nouveau-footer-container',
                                'container_id' => 'main-menu',
                                'menu_class' => 'menu',
                            ]);
                        ?>
                <?php
                    }
                ?>
            </div>
            <div id="custom_html-5" class="widget_text widget-bottom widget_custom_html">
                <article class="textwidget custom-html-widget">
                        <?php
                            if (is_active_sidebar('widget-footer-1')) {
                                dynamic_sidebar('widget-footer-1');
                            }
                        ?>
                    <?php
                    if (wp_is_mobile()) {
                        ?>
                        <div class="wrapper-socials-mobile">
                            <?php if (empty(get_option('twitter_url')) === false) { ?>
                                <a class="social" target="_blank" href="<?php echo get_option('twitter_url'); ?>">
                                    <svg><use xlink:href='#twitter'/></svg>
                                </a>
                            <?php } ?>
                            <?php if (empty(get_option('instagram_url')) === false) { ?>
                                <a class="social" target="_blank" href="<?php echo get_option('instagram_url'); ?>">
                                    <svg width="17px" height="17px" viewBox="0 0 17 17" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <g id="HC_01_HP" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" opacity="0.50172061">
                                            <g id="01_HP_D_v3_CPTS" transform="translate(-1218.000000, -1824.000000)" fill="#FFFFFF">
                                                <g id="footer" transform="translate(0.000000, 1785.000000)">
                                                    <path d="M1233.34737,52.7150241 C1233.34737,53.6137489 1232.61579,54.3440943 1231.71579,54.3440943 L1221.28421,54.3440943 C1220.38421,54.3440943 1219.65263,53.6137489 1219.65263,52.7150241 L1219.65263,45.7556952 L1222.19474,45.7556952 C1221.97368,46.2945091 1221.85263,46.8833106 1221.85263,47.5 C1221.85263,50.0630494 1223.93684,52.1483224 1226.5,52.1483224 C1229.06316,52.1483224 1231.14737,50.0630494 1231.14737,47.5 C1231.14737,46.8833106 1231.02632,46.2945091 1230.80526,45.7556952 L1233.34737,45.7556952 L1233.34737,52.7150241 Z M1224.07368,45.7556952 C1224.61579,45.0021976 1225.5,44.5086356 1226.5,44.5086356 C1227.5,44.5086356 1228.38421,45.0021976 1228.92632,45.7556952 C1229.27895,46.2471524 1229.49474,46.8491086 1229.49474,47.5 C1229.49474,49.1490652 1228.14737,50.4913644 1226.5,50.4913644 C1224.84737,50.4913644 1223.50526,49.1490652 1223.50526,47.5 C1223.50526,46.8491086 1223.72105,46.2471524 1224.07368,45.7556952 Z M1232.65789,40.9600409 L1233.03158,40.9579361 L1233.03158,43.8388015 L1230.16316,43.8487991 L1230.15263,40.9679336 L1232.65789,40.9600409 Z M1231.71579,39 L1221.28421,39 C1219.47368,39 1218,40.4733193 1218,42.2849759 L1218,52.7150241 C1218,54.5266807 1219.47368,56 1221.28421,56 L1231.71579,56 C1233.52632,56 1235,54.5266807 1235,52.7150241 L1235,42.2849759 C1235,40.4733193 1233.52632,39 1231.71579,39 L1231.71579,39 Z" id="Fill-201-Copy"></path>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                </a>
                            <?php } ?>
                            <?php if (empty(get_option('facebook_url')) === false) { ?>
                                <a class="social" target="_blank" href="<?php echo get_option('facebook_url'); ?>">
                                    <svg><use xlink:href='#facebook'/></svg>
                                </a>
                            <?php } ?>
                            <?php if (empty(get_option('youtube_url')) === false) { ?>
                                <a class="social" target="_blank" href="<?php echo get_option('youtube_url'); ?>">
                                    <svg><use xlink:href='#youtube'/></svg>
                                </a>
                            <?php } ?>
                            <?php if (empty(get_option('linkedin_url')) === false) { ?>
                                <a class="social" target="_blank" href="<?php echo get_option('linkedin_url'); ?>">
                                    <svg width="18px" height="18px" viewBox="0 0 18 18" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <g id="HC_01_HP" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" opacity="0.50172061">
                                            <g id="01_HP_D_v3_CPTS" transform="translate(-1255.000000, -1822.000000)" fill="#FFFFFF">
                                                <g id="footer" transform="translate(0.000000, 1785.000000)">
                                                    <path d="M1255.22921,55 L1259.08702,55 L1259.08702,42.8546576 L1255.22921,42.8546576 L1255.22921,55 Z M1257.18381,37 C1255.86356,37 1255,37.9062584 1255,39.098019 C1255,40.2638089 1255.83857,41.1975708 1257.13259,41.1975708 L1257.15837,41.1975708 C1258.50419,41.1975708 1259.34117,40.2639841 1259.34117,39.098019 C1259.31581,37.9062584 1258.50419,37 1257.18381,37 L1257.18381,37 Z M1273,48.0357857 L1273,55 L1269.14202,55 L1269.14202,48.5022068 C1269.14202,46.8699082 1268.584,45.7559282 1267.18754,45.7559282 C1266.12152,45.7559282 1265.48713,46.5066691 1265.20804,47.2328845 C1265.10626,47.4925037 1265.08006,47.8538596 1265.08006,48.2172739 L1265.08006,55 L1261.22078,55 C1261.22078,55 1261.27276,43.9948711 1261.22078,42.8546576 L1265.07969,42.8546576 L1265.07969,44.5762113 C1265.07186,44.5890872 1265.06169,44.6029703 1265.05432,44.615452 L1265.07969,44.615452 L1265.07969,44.5762113 C1265.59238,43.7498358 1266.50799,42.5693306 1268.55743,42.5693306 C1271.09654,42.5693306 1273,44.3052053 1273,48.0357857 L1273,48.0357857 Z" id="Fill-1"></path>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                </a>
                            <?php } ?>
                        </div>
                    <?php
                        }
                        if (is_active_sidebar('widget-footer-2')) {
                            dynamic_sidebar('widget-footer-2');
                        }
                    ?>
                </article>
            </div>
        </div>
        <?php
            if (!wp_is_mobile()) {
        ?>
                <div class="wrapper-socials">
                    <?php if (empty(get_option('twitter_url')) === false) { ?>
                        <a class="social" target="_blank" href="<?php echo get_option('twitter_url'); ?>">
                            <svg><use xlink:href='#twitter'/></svg>
                        </a>
                    <?php } ?>
                    <?php if (empty(get_option('instagram_url')) === false) { ?>
                        <a class="social" target="_blank" href="<?php echo get_option('instagram_url'); ?>">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/dist/img/instagram.png" alt="" width="40px;">
                        </a>
                    <?php } ?>
                    <?php if (empty(get_option('facebook_url')) === false) { ?>
                        <a class="social" target="_blank" href="<?php echo get_option('facebook_url'); ?>">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/dist/img/facebook.png" alt="" width="20px;">
                        </a>
                    <?php } ?>
                    <?php if (empty(get_option('youtube_url')) === false) { ?>
                        <a class="social" target="_blank" href="<?php echo get_option('youtube_url'); ?>">
                            <svg><use xlink:href='#youtube'/></svg>
                        </a>
                    <?php } ?>
                    <?php if (empty(get_option('linkedin_url')) === false) { ?>
                        <a class="social" target="_blank" href="<?php echo get_option('linkedin_url'); ?>">
                            <svg width="18px" height="18px" viewBox="0 0 18 18" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <g id="HC_01_HP" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" opacity="0.50172061">
                                    <g id="01_HP_D_v3_CPTS" transform="translate(-1255.000000, -1822.000000)" fill="#FFFFFF">
                                        <g id="footer" transform="translate(0.000000, 1785.000000)">
                                            <path d="M1255.22921,55 L1259.08702,55 L1259.08702,42.8546576 L1255.22921,42.8546576 L1255.22921,55 Z M1257.18381,37 C1255.86356,37 1255,37.9062584 1255,39.098019 C1255,40.2638089 1255.83857,41.1975708 1257.13259,41.1975708 L1257.15837,41.1975708 C1258.50419,41.1975708 1259.34117,40.2639841 1259.34117,39.098019 C1259.31581,37.9062584 1258.50419,37 1257.18381,37 L1257.18381,37 Z M1273,48.0357857 L1273,55 L1269.14202,55 L1269.14202,48.5022068 C1269.14202,46.8699082 1268.584,45.7559282 1267.18754,45.7559282 C1266.12152,45.7559282 1265.48713,46.5066691 1265.20804,47.2328845 C1265.10626,47.4925037 1265.08006,47.8538596 1265.08006,48.2172739 L1265.08006,55 L1261.22078,55 C1261.22078,55 1261.27276,43.9948711 1261.22078,42.8546576 L1265.07969,42.8546576 L1265.07969,44.5762113 C1265.07186,44.5890872 1265.06169,44.6029703 1265.05432,44.615452 L1265.07969,44.615452 L1265.07969,44.5762113 C1265.59238,43.7498358 1266.50799,42.5693306 1268.55743,42.5693306 C1271.09654,42.5693306 1273,44.3052053 1273,48.0357857 L1273,48.0357857 Z" id="Fill-1"></path>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </a>
                    <?php } ?>
                </div>
        <?php } ?>
    </div>
</footer>
</main>
<div id="layer-overflow"></div>
<?php wp_footer() ?>
</body>
</html>
