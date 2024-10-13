<?php
if (function_exists('acf_add_options_page')) {

    acf_add_options_page(
        array(
            'page_title' => 'Theme Options',
            'menu_title' => 'Theme Options',
            'menu_slug' => 'theme_options',
            'capability' => 'edit_posts',
            'parent_slug' => '',
            'position' => false,
            'icon_url' => false,
        )
    );
    acf_add_options_sub_page(
        array(
            'page_title' => 'Header',
            'menu_title' => 'Header',
            'menu_slug' => 'header',
            'capability' => 'edit_posts',
            'parent_slug' => 'theme_options',
            'position' => false,
            'icon_url' => false,
        )
    );
    acf_add_options_sub_page(
        array(
            'page_title' => 'Content',
            'menu_title' => 'Content',
            'menu_slug' => 'content',
            'capability' => 'edit_posts',
            'parent_slug' => 'theme_options',
            'position' => false,
            'icon_url' => false,
        )
    );
    acf_add_options_sub_page(
        array(
            'page_title' => 'Footer',
            'menu_title' => 'Footer',
            'menu_slug' => 'footer',
            'parent_slug' => 'theme_options',
            'capability' => 'edit_posts',
            'position' => false,
            'icon_url' => false,
        )
    );
}

function htmlMenu($cat, $item)
{
    $item_output = '<div>';
    $listCat = get_terms(array(
        'taxonomy' => 'loai-san-pham',
        'parent' => $cat->term_id,
        'hide_empty' => false,
    ));

    $classes = empty($item->classes) ? array() : (array) $item->classes;
    $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item));
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
    $host = $_SERVER['HTTP_HOST'];
    $uri = $_SERVER['REQUEST_URI'];
    $currentURL = $protocol . $host . $uri;



    if (!empty($listCat) && !is_wp_error($listCat)) {
        $item_output .= ' <ul class="list-none ps-0">';

        foreach ($listCat as $term) {
            $item_output .= '     <li class="'  . ($currentURL === get_term_link($term) ? 'active ' : '') . $class_names . '">';
            $item_output .= '        <a href="' . get_term_link($term) . '" class="text-dark py-2 d-inline-flex a-red-hover">' . $term->name . '</a>';
            $item_output .= '    </li>';
        }

        $item_output .= '  </ul>';
    }
    $item_output .= '</div>';
    return $item_output;
}

class Mega_Menu_Walker extends Walker_Nav_Menu
{
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {
        $megaMenu = get_field('mega_menu', $item);

        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        $classes = empty($item->classes) ? array() : (array) $item->classes;

        $megaClass = $megaMenu ?  'has-mega-menu ' : '';

        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item));
        $class_names = $class_names ? ' class="' . $megaClass . esc_attr($class_names) . '"' : '';

        $output .= $indent . '<li id="menu-item-' . $item->ID . '"' . $class_names . '>';

        $atts = array();
        $atts['title'] = !empty($item->title) ? $item->title : '';
        $atts['target'] = !empty($item->target) ? $item->target : '';
        $atts['rel'] = !empty($item->xfn) ? $item->xfn : '';
        $atts['href'] = !empty($item->url) ? $item->url : '';

        $attributes = '';
        foreach ($atts as $attr => $value) {
            if (!empty($value)) {
                $value = ('href' === $attr) ? esc_url($value) : esc_attr($value);
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        $item_output = $args->before;
        $item_output .= '<a' . $attributes . '>' . $atts['title'] . '</a>';

        // // Add custom ACF fields here

        if ($megaMenu) {
            $category = get_field('categories', $item);
            $layout = get_field('layout', $item);
            $images = get_field('outlet_images', $item);
            $des = get_field('description', $item);

            $item_output .= '<div class="mega-menu py-3 bg-white position-absolute top-100 ' . ($layout ? 'inline' : 'vertical')  . ' ">';
            $item_output .= '<div class="container">';
            $item_output .= ' <div class="row">';
            if (!$layout) {
                $item_output .= '<div class="col-3 px-2 border-end">';
                $item_output .= '<p>View All:</p>';
                $item_output .= htmlMenu($category, $item);
                $item_output .= '</div>';

                if ($des) {
                    $item_output .= '<div class="col-3 px-2">';
                    $item_output .= '<div>' . $des . '</div>';
                    $item_output .= '</div>';
                }

                foreach ($images as $key => $term) {
                    $hero = get_field('image', $term);
                    $avatar = $hero['icon'];
                    $item_output .= '<div class="col-3 px-2">';
                    $item_output .= '<a class="item d-block" href="' . get_term_link($term) . '">';
                    $item_output .= '<img class="h-100 w-100" src="' . $avatar['url'] . '"alt="' . $avatar['alt'] . ' ">';
                    $item_output .= '<p class="post-name d-block">' . $term->name . '</p>';
                    $item_output .= '</a>';
                    $item_output .= '</div>';
                }
            } else {

                $item_output .= '<div class="col-6 px-2 border-end">';
                $item_output .= '<p>View All:</p>';
                $item_output .= htmlMenu($category, $item);
                $item_output .= '</div>';

                if ($des) {
                    $item_output .= '<div class="col-3 px-2">';
                    $item_output .= '<div>' . $des . '</div>';
                    $item_output .= '</div>';
                }

                $item_output .= '<div class="col-3 px-2">';
                foreach ($images as $key => $term) {
                    $hero = get_field('image', $term);
                    $avatar = $hero['icon'];

                    $item_output .= '<a class="item d-block" href="' . get_term_link($term) . '">';
                    $item_output .= '<img class="h-100 w-100" src="' . $avatar['url'] . '"alt="' . $avatar['alt'] . ' ">';
                    $item_output .= '<p class="post-name d-block">' . $term->name . '</p>';
                    $item_output .= '</a>';
                }
                $item_output .= '</div>';
            }

            $item_output .= '</div>';
            $item_output .= '</div>';
            $item_output .= '</div>';
        }


        $item_output .= $args->after;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}
add_filter('wp_nav_menu_args', 'my_mega_menu_walker');
function my_mega_menu_walker($args)
{
    $args['walker'] = new Mega_Menu_Walker();
    return $args;
}