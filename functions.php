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

function product_wishlist_button($product_id, $className = '', $isReload = false)
{
    $wishlist = isset($_COOKIE['wishlist']) ? json_decode(stripslashes($_COOKIE['wishlist']), true) : array();
    $is_favorite = in_array($product_id, $wishlist);

    ?>
    <button class="wishlist-btn fav-btn fs-5 <?php echo $className; ?>"
        onclick="toggleFavorite(event, <?php echo $isReload; ?>)" data-product-id="<?php echo esc_attr($product_id); ?>">
        <?php echo $is_favorite ? '<i class="fa fa-heart-o" style="color: #E91919" aria-hidden="true"></i>' : '<i class="fa fa-heart-o black-neutral" aria-hidden="true"></i>'; ?>
    </button>
    <?php
}



function enqueue_favorite_scripts()
{
    wp_enqueue_script('favorite-js', get_template_directory_uri() . '/js/favorite.js', array('jquery'), null, true);
    wp_localize_script('favorite-js', 'favorite_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('favorite_nonce'),
    ));
}
add_action('wp_enqueue_scripts', 'enqueue_favorite_scripts');

function get_favorite_count()
{
    $wishlist = isset($_COOKIE['wishlist']) ? json_decode(stripslashes($_COOKIE['wishlist']), true) : array();
    return count($wishlist);
}


function ajax_toggle_wishlist()
{
    $product_id = intval($_POST['product_id']);
    $wishlist = isset($_COOKIE['wishlist']) ? json_decode(stripslashes($_COOKIE['wishlist']), true) : array();

    if (in_array($product_id, $wishlist)) {
        $wishlist = array_diff($wishlist, array($product_id));
        $status = false;
    } else {
        $wishlist[] = $product_id;
        $status = true;
    }

    setcookie('wishlist', json_encode($wishlist), time() + (86400 * 30), "/"); // lưu cookie trong 30 ngày

    wp_send_json_success(array('status' => $status, 'count' => count($wishlist)));
}

add_action('wp_ajax_nopriv_toggle_wishlist', 'ajax_toggle_wishlist');
add_action('wp_ajax_toggle_wishlist', 'ajax_toggle_wishlist');

function formatCurrency($amount, $currencySymbol, $decimals = 2)
{
    return ($currencySymbol ? $currencySymbol : '$') . number_format($amount, $decimals);
}
