<?php
    function campings() {
        $labels = [
            'name' => _x('Camping', 'Post Type General Name', 'huttopia'),
            'singular_name' => _x('Camping', 'Post Type Singular Name', 'huttopia'),
            'menu_name' => __('Campings', 'huttopia'),
            'name_admin_bar' => __('Campings', 'huttopia'),
        ];
        $rewrite = [
            'slug' => _x('Camping', 'Camping', 'huttopia'),
            'with_front' => true,
            'pages' => true,
            'feeds' => false
        ];
        $args = [
            'label' => __('Camping', 'huttopia'),
            'description' => __('Campings', 'huttopia'),
            'labels' => $labels,
            'supports' => ['title', 'editor', 'thumbnail', 'comments', 'revisions', 'custom-fields'],
            'taxonomies' => ['camping_type'],
            'hierarchical' => false,
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'menu_position' => 5,
            'menu_icon' => 'dashicons-admin-home',
            'show_in_admin_bar' => true,
            'show_in_nav_menus' => true,
            'can_export' => true,
            'has_archive' => false,
            'exclude_from_search' => false,
            'publicly_queryable' => true,
            'query_var' => 'property',
            'rewrite' => $rewrite,
            'capability_type' => 'page'
        ];
        register_post_type('camping', $args);
    }

    add_action('init', 'campings', 10);