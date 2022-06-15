<?php
/**
 * WP Bootstrap Navwalker
 *
 * @package WP-Bootstrap-Navwalker
 */
/**
 * Class Name: WP_Huttopia_Main_Nav
 * Version: 3.1.1
 * Author URI: https://github.com/wp-bootstrap
 * GitHub Plugin URI: https://github.com/wp-bootstrap/wp-bootstrap-navwalker
 * GitHub Branch: master
 * License: GPL-3.0+
 * License URI: https://www.gnu.org/licenses/gpl-3.0.txt
 */

if (class_exists( 'WP_Hekipia_Main_Nav', false) === false) {
    /**
     * WP_Hekipia_Main_Nav class.
     *
     * @extends Walker_Nav_Menu
     */
    class WP_Huttopiac_Main_Nav extends Walker_Nav_Menu
    {
        public $has_list = true;
        public function start_lvl(&$output, $depth = 0, $args = [])
        {
            $indent = str_repeat("\t", $depth);
            $depth++;
            $output .= "\n$indent<ul class=\"menu-level-".$depth."\" >\n";
        }
        /**
         * Start El.
         *
         * @see Walker::start_el()
         * @since 3.0.0
         *
         * @access public
         * @param mixed $output Passed by reference. Used to append additional content.
         * @param mixed $item Menu item data object.
         * @param int   $depth (default: 0) Depth of menu item. Used for padding.
         * @param array $args (default: array()) Arguments.
         * @param int   $id (default: 0) Menu item ID.
         * @return void
         */

        public function start_el(&$output, $item, $depth = 0, $args = [], $id = 0)
        {
            $indent = $depth ? str_repeat("\t", $depth) : '';
            /**
             * Dividers, Headers or Disabled
             * =============================
             * Determine whether the item is a Divider, Header, Disabled or regular
             * menu item. To prevent errors we use the strcasecmp() function to so a
             * comparison that is not case sensitive. The strcasecmp() function returns
             * a 0 if the strings are equal.
             */
            if (0 === strcasecmp($item->attr_title, 'divider') && 1 === $depth) {
                $output .= $indent . '<li role="presentation" class="divider">';
            } elseif (0 === strcasecmp($item->title, 'divider') && 1 === $depth) {
                $output .= $indent . '<li role="presentation" class="divider">';
            } elseif (0 === strcasecmp($item->attr_title, 'dropdown-header' ) && 1 === $depth) {
                $output .= $indent . '<li role="presentation" class="dropdown-header">' . esc_attr($item->title);
            } elseif (0 === strcasecmp( $item->attr_title, 'disabled')) {
                $output .= $indent . '<li role="presentation" class="disabled"><a href="#">' . esc_attr($item->title) . '</a>';
            } else {
                $value = '';
                $classes = empty($item->classes) ? [] : (array) $item->classes;
                $classes[] = 'menu-item-' . $item->ID;
                $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args, $depth));
                $class_names .= ' entry entry-level-' . $depth;

                if (empty($args->has_children) === false && $args->has_children) {
                    $class_names .= ' -menu';
                }
                if (in_array('current-menu-item', $classes, true)) {
                    $class_names .= ' active';
                }
                $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
                $output .= $indent . '<li' . $value . $class_names . '>';
                $atts   = array();
                if (empty($item->attr_title)) {
                    $atts['title'] = empty($item->title) === false ? strip_tags($item->title) : '';
                } else {
                    $atts['title'] = $item->attr_title;
                }
                $atts['target'] = empty($item->target) === false ? $item->target : '';
                $atts['rel'] = empty($item->xfn) === false ? $item->xfn : '';
                $atts['class'] = 'menuelement';
                global $post;
                $itemURL = explode('=', $item->object_id);
                $itemURL = intval($itemURL[0]);
                $trueParent = wp_get_post_parent_id($itemURL) === 0 ? $itemURL : '';
                $currentParentPageId = wp_get_post_parent_id($post->ID);
                if (empty($args->has_children) === false && $args->has_children && 0 === $depth) {
                    if ($trueParent === $currentParentPageId) {
                        $atts['class'] = 'menuelement carret currentPage';
                    } else {
                        $atts['class'] = 'menuelement carret';
                    }
                    $atts['href'] = '#';
                } else {
                    if ($itemURL === $post->ID) {
                        $atts['class'] = 'menuelement currentPage';
                    } else {
                        $atts['class'] = 'menuelement';
                    }
                    $atts['href'] = empty($item->url) === false ? $item->url : '';
                }
                $atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args, $depth);
                $icon_attributes = '';
                $attributes = '';
                foreach ($atts as $attr => $value) {
                    $value = 'href' === $attr ? esc_url($value) : esc_attr($value);
                    $attributes .= ' ' . $attr . '="' . $value . '"';
                    // if item has icon, we want all except title attributes because we
                    // want to avoid link title to be icon class.
                    if ('title' !== $attr) {
                        $icon_attributes .= ' ' . $attr . '="' . $value . '"';
                    }
                }
                $item_output = empty($args->before) === false ? $args->before : '';
                $item_output .= '<a' . $attributes . '>';
                $item_output .= empty($args->link_before) === false ? $args->link_before : '';
                $item_output .= apply_filters('the_title', $item->title, $item->ID) . '';
                $item_output .= empty($args->link_after) === false ? $args->link_after : '';
                $item_output .= '</a>';
                $item_output .= empty($args->after) === false ? $args->after : '';
                $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
            }
        }
        /**
         * Traverse elements to create list from elements.
         *
         * Display one element if the element doesn't have any children otherwise,
         * display the element and its children. Will only traverse up to the max
         * depth and no ignore elements under that depth.
         *
         * This method shouldn't be called directly, use the walk() method instead.
         *
         * @see Walker::start_el()
         * @since 2.5.0
         *
         * @access public
         * @param mixed $element Data object.
         * @param mixed $children_elements List of elements to continue traversing.
         * @param mixed $max_depth Max depth to traverse.
         * @param mixed $depth Depth of current element.
         * @param mixed $args Arguments.
         * @param mixed $output Passed by reference. Used to append additional content.
         * @return null Null on failure with no changes to parameters.
         */
        public function display_element($element, &$children_elements, $max_depth, $depth, $args, &$output)
        {
            if (empty($element)) {
                return;
            }
            $id_field = $this->db_fields['id'];
            if (is_object($args[0])) {
                $args[0]->has_children = empty($children_elements[$element->$id_field]) === false;
            }
            parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
        }
        /**
         * Menu Fallback
         * =============
         * If this function is assigned to the wp_nav_menu's fallback_cb variable
         * and a menu has not been assigned to the theme location in the WordPress
         * menu manager the function with display nothing to a non-logged in user,
         * and will add a link to the WordPress menu manager if logged in as an admin.
         *
         * @param array $args passed from the wp_nav_menu function.
         */
        public static function fallback($args)
        {
            if (current_user_can('edit_theme_options')) {
                $container = $args['container'];
                $container_id = $args['container_id'];
                $container_class = $args['container_class'];
                $menu_class = $args['menu_class'];
                $menu_id = $args['menu_id'];
                if ($container) {
                    echo '<' . esc_attr($container);
                    if ($container_id) {
                        echo ' id="' . esc_attr($container_id) . '"';
                    }
                    if ($container_class) {
                        echo ' class="' . esc_attr($container_class) . '"';
                    }
                    echo '>';
                }
                echo '<ul';
                if ($menu_id) {
                    echo ' id="' . esc_attr($menu_id) . '"';
                }
                if ($menu_class) {
                    echo ' class="' . esc_attr($menu_class) . '"';
                }
                echo '>';
                echo '<li><a href="' . esc_url(admin_url('nav-menus.php')) . '">' . esc_attr('Add a menu', '') . '</a></li>';
                echo '</ul>';
                if ($container) {
                    echo '</' . esc_attr($container) . '>';
                }
            }
        }
    }
}
