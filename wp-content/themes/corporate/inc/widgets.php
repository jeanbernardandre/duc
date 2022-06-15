<?php
    if (function_exists('register_sidebar')) {
        register_sidebar([
            'id' => 'widget-footer-1',
            'name' => __('Bloc de texte du footer', 'huttopiac'),
            'description' => __('Widget du footer', 'huttopiac'),
            'before_widget' => '<div id="%1$s" class="%2$s">',
            'after_widget' => '</div>',
        ]);
        register_sidebar([
            'id' => 'widget-footer-2',
            'name' => __('Bloc de texte du footer bas', 'huttopiac'),
            'description' => __('Widget du footer)', 'huttopiac'),
            'before_widget' => '<div id="%1$s" class="%2$s">',
            'after_widget' => '</div>',
        ]);
    }

