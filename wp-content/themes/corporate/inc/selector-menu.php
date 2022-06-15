<?php

    function language_selector_menu_view()
    {
        $content = '';
        if (function_exists('icl_get_languages')) {
            $languages = apply_filters('wpml_active_languages', NULL, ['skip_missing=0&orderby=code&order=desc']);

            if (empty($languages) === false) {
                $session = '';
                if (isset($_GET['session'])) {
                    $session = '?session=' . $_GET['session'];
                }
                $list = '<ul class="list-lang">';
                $lang_active_title = '';
                foreach ($languages as $l) {
                    if ($l['active'] !== 0) {
                        $lang_active_title = $l['native_name'];
                    } else {
                        $class = $l['active'] ? 'selected ' : NULL;
                        $languageShown = $l['language_code'] === 'zh-hans' ? '中文' : strtoupper(substr($l['native_name'], 0, 2));
                        $list .=  '
                            <li class="link-lang">
                                <a class="' . $class . 'icl-' . $l['language_code'] . '" href="' . $l['url'] . $session . '">'
                                   . $languageShown
                                . '</a>
                            </li>
                        ';
                    }
                }
                $list .= '</ul>';
                $content .= '<a role="button" class="selected-lang' . (wp_is_mobile() ? ' mobile' : '') . '">';
                $languageSelected = $lang_active_title === '简体中文' ? '中文' : strtoupper(substr($lang_active_title, 0, 2));
                $content .= '
                        <span>' . $languageSelected. '</span>
                        <svg>
                            <use xlink:href="#arrow-down"/>
                        </svg>
                    </a>'
                    . $list;
            }
        }

        return $content;
    }

    function language_selector_menu($items, $args)
    {
        $content = '';
        if ($args->theme_location === 'huttopiac_nav_top_header') {
            $languages = language_selector_menu_view();

            if (empty($languages) === false) {
                $content .=
                    '<li class="entry-menu -select-lang">
                        <div class="wrapper-select-lang">'
                    . $languages .
                    '</div>
                    </li>';
            }
            return $content . $items;
        } else if ($args->theme_location === 'huttopiac_nav_header') {
            $languages = language_selector_menu_view();

            if (empty($languages) === false) {
                $content .=
                    '<div class="wrapper-center-select-lang">
                        <div class="wrapper-select-lang -mobile">'
                    . $languages.
                    '</div>
                    </div>';
            }

            return $items . $content;
        }

        return $items;
    }
    add_filter('wp_nav_menu_items','language_selector_menu', 10, 2);
