<?php
get_header();

global $_GET;
$term = get_queried_object();
$id = get_queried_object_id();
$sort = isset($_GET['sort']) ? $_GET['sort'] : '';
$view = isset($_GET['view']) ? $_GET['view'] : '';
$inStock = isset($_GET['stock']) ? $_GET['stock'] : '';
$selected_color = isset($_GET['color']) ? sanitize_text_field($_GET['color']) : '';
$color_ids = explode(',', $selected_color);

$selected_brand = isset($_GET['brand']) ? sanitize_text_field($_GET['brand']) : '';
$brand_ids = explode(',', $selected_brand);

$selected_cat = isset($_GET['product_cat']) ? sanitize_text_field($_GET['product_cat']) : '';
$cat_ids = explode(',', $selected_cat);

$selected_spec = isset($_GET['spec']) ? sanitize_text_field($_GET['spec']) : '';
$spec_ids = explode(',', $selected_spec);

$minPrice = isset($_GET['min']) ? sanitize_text_field($_GET['min']) : '';
$maxPrice = isset($_GET['max']) ? sanitize_text_field($_GET['max']) : '';

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = [
    'post_type' => 'product',
    'posts_per_page' => $view == 'all' ? -1 : 18,
    'paged' => $paged,
    'tax_query' => array(
        'relation' => 'AND',
        array(
            'taxonomy' => 'product-category',
            'field' => 'term_id',
            'terms' => !empty($selected_cat) ? $cat_ids : $id
        ),
    ),
];

if (!empty($selected_color)) {
    $args['tax_query'][] = array(
        'taxonomy' => 'color',
        'field' => 'term_id',
        'terms' => $color_ids,
        'operator' => 'IN'
    );
}
if (!empty($selected_brand)) {
    $args['tax_query'][] = array(
        'taxonomy' => 'brand',
        'field' => 'term_id',
        'terms' => $brand_ids,
    );
}
if (!empty($selected_spec)) {
    $args['tax_query'][] = array(
        'taxonomy' => 'special_offers',
        'field' => 'term_id',
        'terms' => $spec_ids,
    );
}

switch ($sort) {
    case 'price_low_to_high':
        $args['meta_key'] = 'display_price_original_price';
        $args['orderby'] = 'meta_value_num';
        $args['order'] = 'ASC';
        break;
    case 'price_high_to_low':
        $args['meta_key'] = 'display_price_original_price';
        $args['orderby'] = 'meta_value_num';
        $args['order'] = 'DESC';
        break;
    case 'name_az':
        $args['orderby'] = 'title';
        $args['order'] = 'ASC';
        break;
    case 'name_za':
        $args['orderby'] = 'title';
        $args['order'] = 'DESC';
        break;
}
if ($inStock == 'in') {
    $args['meta_query'] = [
        [
            'key' => 'more_info_favorite',
            'value' => '1',
            'compare' => '==',
        ],
    ];
}
if (!empty($minPrice)) {
    $args['meta_query'] = [
        [
            'key' => 'display_price_original_price',
            'value' => $minPrice,
            'compare' => '>=',
        ],
    ];
}
if (!empty($maxPrice)) {
    $args['meta_query'] = [
        [
            'key' => 'display_price_original_price',
            'value' => $maxPrice,
            'compare' => '<=',
        ],
    ];
}



$total_products = count(get_posts($args));
?>
<!-- Living Room Furniture -->
<div class="custome-container">

    <!-- Breadcrumd -->
    <?php custom_taxonomy_breadcrumb(); ?>
    <!-- Breadcrumd -->

    <!-- section title -->
    <div class="pb-5">
        <h2 class="text-60 fw-bold text-left black-neutral pb-2">
            <?php echo $term->name; ?>
        </h2>
    </div>
    <?php get_template_part('sections/categories'); ?>
</div>
<!-- Living Room Furniture -->

<!-- Product list -->
<div class="custome-container" id="productList">
    <!-- Filter bar  -->
    <div class="d-block d-lg-flex align-items-center justify-content-between pb-4">
        <div class="d-flex flex-wrap align-items-center gap-24">
            <button type="button" id="toggleFilter"
                class="bg-transparent transtext-20 black-neutral d-flex justify-content-center align-items-center gap-1">
                <div>
                    <img loading=“lazy” src="<?php echo THEME_URL . '/images/filter.svg' ?>" alt="">
                </div>
                Filter
            </button>
            <button type="button" id="reset-button" class="bg-transparent bottom-line-full text-20 gray-subtext">Clear
                filter</button>
            <div class="d-flex flex-wrap align-items-center justify-content-center gap-24">
                <button type="button" id="viewAll" onclick="handleUpdateSearchParams({ view: 'all' }, true)"
                    class="tag <?php echo $view == 'all' ? 'clicked' : ''; ?> text-20 gray-subtext">View All </button>
                <button type="button" onclick="handleUpdateSearchParams({ stock: 'in' }, true)"
                    class="tag <?php echo $inStock == 'in' ? 'clicked' : ''; ?> text-20 gray-subtext">In
                    Stock</button>
            </div>
        </div>
        <div class="d-flex flex-wrap align-items-center gap-24 justify-content-center">
            <div class="d-flex justify-content-center align-items-center gap-1">
                <p class="text-20 black-neutral"><?php echo $total_products; ?></p>
                <p class="text-20 black-neutral">Products</p>
            </div>

            <div class="dropdown">
                <button
                    class="bg-transparent px-0 text-20 black-neutral d-flex justify-content-center align-items-center gap-1"
                    id="dropdownMenuLink" data-bs-toggle="dropdown" type="button" aria-expanded="false">
                    Most Relevant
                    <div>
                        <img loading=“lazy” src="<?php echo THEME_URL . '/images/arr-down-thin.svg' ?>" alt="">
                    </div>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <div class=" p-3 w-fit d-flex flex-column gap-3">
                        <?php
                        $options = [
                            'price_low_to_high' => 'Price, low to high',
                            'price_high_to_low' => 'Price, high to low',
                            'name_az' => 'Product name A-Z',
                            'name_za' => 'Product name Z-A'
                        ];
                        foreach ($options as $key => $label) {
                            ?>
                            <div class="form-check" onclick="handleUpdateSearchParams({ sort: '<?php echo $key; ?>' })">
                                <input <?php echo $sort == $key ? "checked" : "" ?> class="form-check-input" type="radio"
                                    name="option" id="<?php echo $key; ?>">
                                <label class="text-20 gray-subtext form-check-label"
                                    for="<?php echo $key; ?>"><?php echo $label; ?></label>
                            </div>
                        <?php }
                        ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Filter bar  -->

    <div class="row">
        <div class="col-12 col-lg-3">
            <!-- filter collapse -->
            <div class="filter-collapse pb-5">
                <?php get_template_part('sidebar'); ?>
            </div>
            <!-- filter collapse -->
        </div>

        <div class="col-12 col-lg-9">
            <!-- list -->
            <div class="product-list row">
                <?php


                $query = new WP_Query($args);
                $index = 0;

                if ($query && $query->have_posts()):
                    while ($query->have_posts()):
                        $query->the_post();
                        $product_id = get_the_ID();
                        $displayPrice = get_field('display_price');
                        ?>
                        <div class="col-lg-4 col-6 clearfix">
                            <div class="card-product text-start flex-grow-1">
                                <a href="<?php the_permalink(); ?>" class="text-decoration-none">
                                    <div class="img-scale ratio ratio-1x1">
                                        <?php the_post_thumbnail('full'); ?>
                                    </div>
                                </a>
                                <div class="w-100 position-relative pt-20 pb-2">
                                    <a href="<?php the_permalink(); ?>" class="text-decoration-none">
                                        <p class="text-20 fw-medium text-black">
                                            <?php echo formatCurrency($displayPrice['original_price'], $displayPrice['currency']); ?>
                                        </p>
                                    </a>
                                    <button class="fav-btn fs-5 " data-product-id="<?php the_ID(); ?>"
                                        onclick="toggleFavorite(event)">
                                        <?php
                                        $is_favorite = get_post_meta(get_the_ID(), '_is_favorite', true);
                                        if ($is_favorite == '1'): ?>
                                            <i class="fa fa-heart" style="color: #E91919" aria-hidden="true"></i>
                                        <?php else: ?>
                                            <i class="fa fa-heart-o" aria-hidden="true"></i>
                                        <?php endif; ?>
                                    </button>
                                </div>
                                <a href="<?php the_permalink(); ?>" class="text-decoration-none">
                                    <p class="text-20 gray-tertiary pb-2"><?php the_title(); ?></p>
                                    <p class="text-20 gray-neutral pb-20"><?php echo get_field('more_info')['code']; ?></p>
                                    <p class="fw-medium text-20 gray-neutral">
                                        <?php echo (get_the_terms($product_id, 'color') && !is_wp_error(get_the_terms($product_id, 'color'))) ? count(get_the_terms($product_id, 'color')) . ' colors' : ''; ?>
                                    </p>
                                </a>
                            </div>
                        </div>
                        <?php if ($index == 2 || $index == 9 || ($index > 12 && $index % 12 == 0)): ?>
                            <div class="col-lg-4 col-6 clearfix">
                                <?php get_template_part('sections/ads-card'); ?>
                            </div>
                            <?php
                        endif;
                        $index++;
                    endwhile;
                    wp_reset_postdata();
                else:
                    echo '<div class="text-center pt-5">No products.</div>';

                endif;
                ?>
                <?php if ($total_products > 0 && $total_products < 3): ?>
                    <div class="col-lg-4 col-6 clearfix">
                        <?php get_template_part('sections/ads-card'); ?>
                    </div>
                    <?php
                endif;
                if (function_exists('devvn_wp_corenavi'))
                    devvn_wp_corenavi($query); ?>
            </div>
            <!-- list -->
        </div>
    </div>
</div>
<!-- Product list -->


<?php
get_template_part('sections/discover');
get_template_part('sections/news-letter-main');
get_footer();
?>