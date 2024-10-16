<?php

function create_custom_post_type()
{
    /*
     * Biến $label để chứa các text liên quan đến tên hiển thị của Post Type trong Admin
     */
    $label = array(
        'name' => 'Sản phẩm', //Tên post type dạng số nhiều
        'singular_name' => 'Sản phẩm', //Tên post type dạng số ít,
        'menu_name' => 'Sản phẩm'

    );

    /*
     * Biến $args là những tham số quan trọng trong Post Type
     */
    $args = array(
        'labels' => $label, //Gọi các label trong biến $label ở trên
        'description' => 'Post type product', //Mô tả của post type
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'thumbnail',
            'revisions',
            'custom-fields'
        ), //Các tính năng được hỗ trợ trong post type
        'hierarchical' => false, //Cho phép phân cấp, nếu là false thì post type này giống như Post, true thì giống như Page
        'public' => true, //Kích hoạt post type
        'show_ui' => true, //Hiển thị khung quản trị như Post/Page
        'show_in_menu' => true, //Hiển thị trên Admin Menu (tay trái)
        'show_in_nav_menus' => true, //Hiển thị trong Appearance -> Menus
        'show_in_admin_bar' => true, //Hiển thị trên thanh Admin bar màu đen.
        'menu_position' => 5, //Thứ tự vị trí hiển thị trong menu (tay trái)
        'menu_icon' => 'dashicons-screenoptions', //Đường dẫn tới icon sẽ hiển thị
        'can_export' => true, //Có thể export nội dung bằng Tools -> Export
        'has_archive' => true, //Cho phép lưu trữ (month, date, year)
        'exclude_from_search' => false, //Loại bỏ khỏi kết quả tìm kiếm
        'publicly_queryable' => true, //Hiển thị các tham số trong query, phải đặt true
        'capability_type' => 'post' //
    );

    register_post_type('san-pham', $args); //Tạo post type với slug tên là sanpham và các tham số trong biến $args ở trên

}

add_action('init', 'create_custom_post_type');

function create_taxonomy() {

    /* Biến $label chứa các tham số thiết lập tên hiển thị của Taxonomy
     */
    $labels = array(
        'name' => 'Các loại sản phẩm',
        'singular' => 'Loại sản phẩm',
        'menu_name' => 'Loại sản phẩm'
    );

    /* Biến $args khai báo các tham số trong custom taxonomy cần tạo
     */
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
    );

    /* Hàm register_taxonomy để khởi tạo taxonomy
     */
    register_taxonomy('loai-san-pham', 'san-pham', $args);

}

// Hook into the 'init' action
add_action( 'init', 'create_taxonomy', 0 );

add_filter('manage_posts_columns', 'posts_columns',  0);
add_action('manage_posts_custom_column', 'posts_custom_columns', 5, 2);

function posts_columns($defaults){
    echo $defaults;
    $defaults['riv_post_thumbs'] = __('Hình ảnh');
    return $defaults;
}

function posts_custom_columns($column_name, $id){
    if($column_name === 'riv_post_thumbs'){
        if (function_exists('the_post_thumbnail')) {

            $permalink = get_edit_post_link();

            $thumb = get_the_post_thumbnail_url(null, 'thumbnail');

            echo '<a href="' . $permalink . '"><img src="' . $thumb . '" style="width:80px; height: 80px; object-fit: cover"></a>';

        } else {
            echo 'Your theme doesn\'t support featured image…';
        }

    }
}