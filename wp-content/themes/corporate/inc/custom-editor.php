<?php

    function huttopiac_mce_buttons_2($buttons)
    {
        array_unshift($buttons, 'styleselect');
        return $buttons;
    }
    add_filter('mce_buttons_2', 'huttopiac_mce_buttons_2');

    function huttopiac_mce_before_init_insert_formats($init_array)
    {
        $style_formats = [
            [
                'title' => 'Texte en marron',
                'block' => 'span',
                'classes' => 'brown',
                'wrapper' => true,
            ], [
                'title' => 'Texte en noir',
                'block' => 'span',
                'classes' => 'black',
                'wrapper' => true,
            ], [
                'title' => 'Texte taille réduite',
                'block' => 'span',
                'classes' => 'small',
                'wrapper' => true,
            ], [
                'title' => 'Texte taille très réduite',
                'block' => 'span',
                'classes' => 'xsmall',
                'wrapper' => true,
            ], [
                'title' => 'Sous titre centré (sous le h1)',
                'block' => 'div',
                'classes' => 'stitrecentre',
                'wrapper' => true,
            ]
        ];
        $init_array['style_formats'] = json_encode($style_formats);

        return $init_array;
    }
    add_filter('tiny_mce_before_init', 'huttopiac_mce_before_init_insert_formats');