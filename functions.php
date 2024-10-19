<?php
/*
 *  GLOBAL VARIABLES
 */

define('THEME_DIR', get_stylesheet_directory());
define('THEME_URL', get_stylesheet_directory_uri());

/*
 *  INCLUDED FILES
 */

add_editor_style('css/button-web.css');

$file_includes = [
    'inc/theme-assets.php',
    'inc/theme-setup.php',
    'inc/acf-options.php',
    'inc/theme-shortcode.php',
    'inc/button-editer.php',
    'inc/theme-config.php',
    'inc/custom-post-type.php'

];

foreach ($file_includes as $file) {
    if (!$filePath = locate_template($file)) {
        trigger_error(sprintf(__('Missing included file'), $file), E_USER_ERROR);
    }

    require_once $filePath;
}

unset($file, $filePath);

function admin_custom_css()
{
    echo '<style>
        body #wpcontent #wpbody #wpbody-content a[href*="www.gravityforms.com/pricing"] {
		    position: fixed;
    opacity: 0;
    bottom: 0;
    height: 0;
    min-width: 0 !important;
    width: 0;
    overflow: hidden;
		}
    </style>';
}
add_action('admin_head', 'admin_custom_css');

function custom_taxonomy_breadcrumb()
{
    // Bắt đầu breadcrumb
    echo '<nav aria-label="breadcrumb">';
    echo '<ol class="breadcrumb pb-4">';

    // Thêm link trang chủ
    echo '<li class="text-14 text-uppercase gray-subtext breadcrumb-item"><a class="gray-subtext text-decoration-none" href="' . home_url() . '">Home</a></li>';

    // Kiểm tra nếu đang trong trang taxonomy
    if (is_tax()) {
        $term = get_queried_object(); // Lấy object của taxonomy hiện tại
        $taxonomy = $term->taxonomy;  // Lấy tên taxonomy hiện tại

        // Lấy chuỗi phân cấp của taxonomy (nếu có)
        if ($term->parent != 0) {
            $parents = get_ancestors($term->term_id, $taxonomy); // Lấy danh sách các taxonomy cha

            // Vòng lặp qua các taxonomy cha
            foreach (array_reverse($parents) as $parent_id) {
                $parent_term = get_term($parent_id, $taxonomy); // Lấy object của taxonomy cha
                $parent_link = get_term_link($parent_term); // Lấy link của taxonomy cha
                echo '<li class="text-14 text-uppercase gray-subtext breadcrumb-item"><a class="gray-subtext text-decoration-none" href="' . esc_url($parent_link) . '">' . esc_html($parent_term->name) . '</a></li>';
            }
        }

        // Thêm link của taxonomy hiện tại
        echo '<li class="text-14 gray-subtext text-uppercase breadcrumb-item active" aria-current="page">' . esc_html($term->name) . '</li>';
    }

    // Kết thúc breadcrumb
    echo '</ol>';
    echo '</nav>';
}

function track_viewed_posts()
{
    if (is_single()) {
        $post_id = get_the_ID(); // Lấy ID bài viết hiện tại
        $viewed_posts = isset($_COOKIE['viewed_posts']) ? json_decode(stripslashes($_COOKIE['viewed_posts']), true) : array();

        if (!in_array($post_id, $viewed_posts)) {
            $viewed_posts[] = $post_id;
        }

        // Lưu lại cookie với thời hạn 30 ngày
        setcookie('viewed_posts', json_encode($viewed_posts), time() + (30 * DAY_IN_SECONDS), COOKIEPATH, COOKIE_DOMAIN);
    }
}
add_action('wp', 'track_viewed_posts');

function enqueue_favorite_scripts()
{
    wp_enqueue_script('favorite-js', get_template_directory_uri() . '/js/favorite.js', array('jquery'), null, true);
    wp_localize_script('favorite-js', 'favorite_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce'    => wp_create_nonce('favorite_nonce'),
    ));
}
add_action('wp_enqueue_scripts', 'enqueue_favorite_scripts');

function get_favorite_count()
{
    $args = array(
        'post_type'  => 'product',
        'posts_per_page' => -1,
        'meta_query' => array(
            array(
                'key'   => '_is_favorite',
                'value' => '1',
            )
        ),
        'fields' => 'ids',
    );

    $query = new WP_Query($args);
    return $query->found_posts;
}


function toggle_favorite()
{
    // Check nonce for security
    if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'favorite_nonce')) {
        wp_send_json_error('Invalid nonce');
    }

    $product_id = intval($_POST['product_id']);

    // Get current favorite status
    $is_favorite = get_post_meta($product_id, '_is_favorite', true);

    // Toggle favorite status
    if ($is_favorite == '1') {
        // Remove from favorites
        update_post_meta($product_id, '_is_favorite', '0');
        $new_favorite_status = false;
    } else {
        // Add to favorites
        update_post_meta($product_id, '_is_favorite', '1');
        $new_favorite_status = true;
    }

    // Get the updated favorite count
    $favorite_count = get_favorite_count();

    // Return success response with the favorite status and count
    wp_send_json_success(array(
        'favorite' => $new_favorite_status,
        'favorite_count' => $favorite_count,
    ));
}

add_action('wp_ajax_toggle_favorite', 'toggle_favorite');
add_action('wp_ajax_nopriv_toggle_favorite', 'toggle_favorite');