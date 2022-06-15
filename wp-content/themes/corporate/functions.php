<?php

    add_theme_support('post-formats', []);
    add_theme_support('post-thumbnails');
    add_theme_support('menus');
    add_theme_support('title-tag');
    add_image_size('slider_size', 2200, 500);
    add_image_size('corpo_main_image', 1440, 720, false);

    function huttopiac_front_add_script()
    {
        wp_deregister_script('jquery');
        wp_register_style('huttopia-maincss', get_template_directory_uri() . '/assets/dist/css/main.css', [], uniqid(), 'all');
        wp_enqueue_style('huttopia-maincss');
        wp_register_script('huttopia-slide', get_template_directory_uri() . '/js/huttopia-slide.js', [], uniqid(), true);
        wp_enqueue_script('huttopia-slide');
        wp_register_script('huttopia-video-autostart', get_template_directory_uri() . '/js/video-autostart.js', [], uniqid(), true);
        wp_enqueue_script('huttopia-video-autostart');

        wp_register_script('huttopia-leaflet', get_template_directory_uri() . '/js/leaflet.js', [], uniqid(), true);
        wp_enqueue_script('huttopia-leaflet');
        wp_register_script('huttopia-markerclusterer', get_template_directory_uri() . '/js/markerclusterer.js', [], uniqid(), true);
        wp_enqueue_script('huttopia-markerclusterer');

        wp_register_script('huttopia-markercluster', get_template_directory_uri() . '/js/markercluster.js', [], uniqid(), true);
        wp_enqueue_script('huttopia-markercluster');


        wp_register_script('huttopia-openstreetmaps', get_template_directory_uri() . '/js/openstreetmaps.js', [], uniqid(), true);
        wp_enqueue_script('huttopia-openstreetmaps');
        wp_register_script('huttopia-mainjs', get_template_directory_uri() . '/assets/dist/js/main.js', [], uniqid(), true);
        wp_enqueue_script('huttopia-mainjs');
    }
    add_action('wp_enqueue_scripts', 'huttopiac_front_add_script');

    function huttopia_template($template)
    {
        if (is_category([75, 76 ,77])) {
            $template = locate_template(['archive_news.php']);
        } else {
            $template = locate_template(['archive.php']);
        }

        return $template;
    }
    add_filter('category_template', 'huttopia_template');

    function huttopiaCustomExcerptLength($length)
    {
        return 20;
    }
    add_filter('excerpt_length', 'huttopiaCustomExcerptLength', 999);

    function load_wp_media_files()
    {
        wp_enqueue_media();
    }
    add_action('admin_enqueue_scripts', 'load_wp_media_files');

    function timelineClean($title)
    {
        $titleDisplay = '';
        if (strlen($title) > 4) {
            $titleWords = explode(' ', $title);
            foreach ($titleWords as $titleWord) {
                if (is_numeric($titleWord) && strlen($titleWord) === 4) {
                    $titleDisplay .= $titleWord . ' ';
                } else if (strlen($titleWord) !== 4) {
                    $titleDisplay .= '<span class="small">' . $titleWord . ' </span>';
                } else {
                    $titleDisplay .= $titleWord;
                }
            }
        } else {
            $titleDisplay = $title;
        }

        return $titleDisplay;
    }

    add_filter('single_template', function ($single_template) {
        $categories = get_categories( 'child_of=12');
        $cat_names = wp_list_pluck($categories, 'name');
        if (has_category($cat_names)) {
            $single_template = dirname( __FILE__ ) . '/category-single-metiers.php';
        }

        return $single_template;
    }, PHP_INT_MAX, 2);

    if (function_exists('acf_add_options_page')) {
        acf_add_options_page();
    }

    require_once('inc/menus.php');
    require_once('inc/widgets.php');
    require_once('inc/wp-walkermenu.php');
    require_once('inc/selector-menu.php');
    require_once('inc/options-page.php');
    require_once('inc/custom-editor.php');
    require_once('inc/camping.php');
    require_once('inc/breadcrumb-helper.php');
