<?php

add_filter('manage_posts_columns', 'posts_columns',  0);
add_action('manage_posts_custom_column', 'posts_custom_columns', 5, 2);

function posts_columns($defaults)
{
    echo $defaults;
    $defaults['riv_post_thumbs'] = __('Hình ảnh');
    return $defaults;
}

function posts_custom_columns($column_name, $id)
{
    if ($column_name === 'riv_post_thumbs') {
        if (function_exists('the_post_thumbnail')) {

            $permalink = get_edit_post_link();

            $thumb = get_the_post_thumbnail_url(null, 'thumbnail');

            echo '<a href="' . $permalink . '"><img src="' . $thumb . '" style="width:80px; height: 80px; object-fit: cover"></a>';
        } else {
            echo 'Your theme doesn\'t support featured image…';
        }
    }
}
function custom_product_taxonomies()
{
    // Tạo taxonomy "product-category"
    $labels_product_category = array(
        'name'              => _x('Categories', 'taxonomy general name'),
        'singular_name'     => _x('Category', 'taxonomy singular name'),
        'search_items'      => __('Search Categories'),
        'all_items'         => __('All Categories'),
        'parent_item'       => __('Parent Category'),
        'parent_item_colon' => __('Parent Category:'),
        'edit_item'         => __('Edit Category'),
        'update_item'       => __('Update Category'),
        'add_new_item'      => __('Add New Category'),
        'new_item_name'     => __('New Category Name'),
        'menu_name'         => __('Category'),
    );

    register_taxonomy('product-category', 'product', array(
        'hierarchical' => true,
        'labels'       => $labels_product_category,
        'show_ui'      => true,
        'show_in_menu' => true,
        'query_var'    => true,
        'rewrite'      => array('slug' => 'product-category'),
    ));
    // Tạo taxonomy "Color"
    $labels_color = array(
        'name'              => _x('Colors', 'taxonomy general name'),
        'singular_name'     => _x('Color', 'taxonomy singular name'),
        'search_items'      => __('Search Colors'),
        'all_items'         => __('All Colors'),
        'parent_item'       => __('Parent Color'),
        'parent_item_colon' => __('Parent Color:'),
        'edit_item'         => __('Edit Color'),
        'update_item'       => __('Update Color'),
        'add_new_item'      => __('Add New Color'),
        'new_item_name'     => __('New Color Name'),
        'menu_name'         => __('Color'),
    );

    register_taxonomy('color', 'product', array(
        'hierarchical' => true,
        'labels'       => $labels_color,
        'show_ui'      => true,
        'show_in_menu' => true,
        'query_var'    => true,
        'rewrite'      => array('slug' => 'color'),
    ));



    // Tạo taxonomy "Brand"
    $labels_brand = array(
        'name'              => _x('Brands', 'taxonomy general name'),
        'singular_name'     => _x('Brand', 'taxonomy singular name'),
        'search_items'      => __('Search Brands'),
        'all_items'         => __('All Brands'),
        'parent_item'       => __('Parent Brand'),
        'parent_item_colon' => __('Parent Brand:'),
        'edit_item'         => __('Edit Brand'),
        'update_item'       => __('Update Brand'),
        'add_new_item'      => __('Add New Brand'),
        'new_item_name'     => __('New Brand Name'),
        'menu_name'         => __('Brand'),
    );

    register_taxonomy('brand', 'product', array(
        'hierarchical' => true,
        'labels'       => $labels_brand,
        'show_ui'      => true,
        'show_in_menu' => true,
        'query_var'    => true,
        'rewrite'      => array('slug' => 'brand'),
    ));

    // Tạo taxonomy "Special Offers"
    $labels_special_offers = array(
        'name'              => _x('Special Offers', 'taxonomy general name'),
        'singular_name'     => _x('Special Offer', 'taxonomy singular name'),
        'search_items'      => __('Search Special Offers'),
        'all_items'         => __('All Special Offers'),
        'parent_item'       => __('Parent Special Offer'),
        'parent_item_colon' => __('Parent Special Offer:'),
        'edit_item'         => __('Edit Special Offer'),
        'update_item'       => __('Update Special Offer'),
        'add_new_item'      => __('Add New Special Offer'),
        'new_item_name'     => __('New Special Offer Name'),
        'menu_name'         => __('Special Offers'),
    );

    register_taxonomy('special_offers', 'product', array(
        'hierarchical' => false,
        'labels'       => $labels_special_offers,
        'show_ui'      => true,
        'show_in_menu' => true,
        'query_var'    => true,
        'rewrite'      => array('slug' => 'special-offers'),
    ));
}

add_action('init', 'custom_product_taxonomies', 0);


function custom_post_type_product()
{

    $labels = array(
        'name'                  => _x('Products', 'Post Type General Name'),
        'singular_name'         => _x('Product', 'Post Type Singular Name'),
        'menu_name'             => __('Products'),
        'name_admin_bar'        => __('Product'),
        'archives'              => __('Product Archives'),
        'attributes'            => __('Product Attributes'),
        'parent_item_colon'     => __('Parent Product:'),
        'all_items'             => __('All Products'),
        'add_new_item'          => __('Add New Product'),
        'add_new'               => __('Add New'),
        'new_item'              => __('New Product'),
        'edit_item'             => __('Edit Product'),
        'update_item'           => __('Update Product'),
        'view_item'             => __('View Product'),
        'view_items'            => __('View Products'),
        'search_items'          => __('Search Product'),
        'not_found'             => __('Not found'),
        'not_found_in_trash'    => __('Not found in Trash'),
        'featured_image'        => __('Featured Image'),
        'set_featured_image'    => __('Set featured image'),
        'remove_featured_image' => __('Remove featured image'),
        'use_featured_image'    => __('Use as featured image'),
        'insert_into_item'      => __('Insert into product'),
        'uploaded_to_this_item' => __('Uploaded to this product'),
        'items_list'            => __('Products list'),
        'items_list_navigation' => __('Products list navigation'),
        'filter_items_list'     => __('Filter products list'),
    );

    $args = array(
        'label'                 => __('Product'),
        'description'           => __('Product custom post type'),
        'labels'                => $labels,
        'supports'              => array('title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'custom-fields'),
        'taxonomies'            => false, // Liên kết với categories và tags
        'hierarchical'          => false, // False sẽ tương tự như posts, true sẽ giống như pages
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true, // Sẽ có trang lưu trữ các sản phẩm
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
    );

    register_post_type('product', $args);
}

add_action('init', 'custom_post_type_product', 0);

function add_taxonomy_image_column($columns)
{
    $columns['taxonomy_image'] = __('Hình ảnh'); // Thêm cột tên "Image"
    return $columns;
}
add_filter('manage_edit-product-category_columns', 'add_taxonomy_image_column'); // Thay 'category' bằng taxonomy của bạn
add_filter('manage_edit-brand_columns', 'add_taxonomy_image_column');

function show_taxonomy_image_column($content, $column_name, $term_id)
{
    if ($column_name === 'taxonomy_image') {
        // Lấy URL hình ảnh từ ACF
        $imageGroup = get_field('image', 'product-category_' . $term_id);
        $image = $imageGroup['avatar']; // Thay 'category' bằng taxonomy của bạn

        if ($image) {
            // Hiển thị hình ảnh với kích thước nhỏ
            $content = '<img src="' . esc_url($image['url']) . '" alt="' . esc_attr($image['alt']) . '" style="width:50px;height:auto;" />';
        } else {
            $content = __('No image');
        }
    }

    return $content;
}
add_filter('manage_product-category_custom_column', 'show_taxonomy_image_column', 10, 3); // Thay 'category' bằng taxonomy của bạn

function show_taxonomy_image_column_brand($content, $column_name, $term_id)
{
    if ($column_name === 'taxonomy_image') {
        $imageGroup = get_field('image', 'brand_' . $term_id);
        $image = $imageGroup['avatar'];

        if ($image) {
            $content = '<img src="' . esc_url($image['url']) . '" alt="' . esc_attr($image['alt']) . '" style="width:50px;height:auto;" />';
        } else {
            $content = __('No image');
        }
    }

    return $content;
}
add_filter('manage_brand_custom_column', 'show_taxonomy_image_column_brand', 10, 3);

function add_custom_taxonomies_to_product()
{
    // Thêm taxonomy "brand" cho post type "product"
    register_taxonomy_for_object_type('brand', 'product');

    // Thêm taxonomy "color" cho post type "product"
    register_taxonomy_for_object_type('color', 'product');

    // Thêm taxonomy "product-category" cho post type "product"
    register_taxonomy_for_object_type('product-category', 'product');
}
add_action('init', 'add_custom_taxonomies_to_product');

function add_taxonomy_color_column($columns)
{
    $columns['taxonomy_color'] = __('Color');
    return $columns;
}
add_filter('manage_edit-color_columns', 'add_taxonomy_color_column');
function show_taxonomy_color_column($content, $column_name, $term_id)
{
    if ($column_name === 'taxonomy_color') {
        $color = get_field('color', 'color_' . $term_id);

        if ($color) {
            $content = '<div style="background-color:' . $color . '; width: 40px; height: 40px"></div>';
        } else {
            $content = __('No color');
        }
    }

    return $content;
}
add_filter('manage_color_custom_column', 'show_taxonomy_color_column', 10, 3);