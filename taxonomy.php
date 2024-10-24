<?php
get_header();

global $_GET;
$term = get_queried_object();
$id = get_queried_object_id();
$sort = isset($_GET['sort']) ? $_GET['sort'] : '';
$total_products = count(get_posts(array(
    'post_type' => 'product',
    'posts_per_page' => -1,
    'tax_query' => array(
        array(
            'taxonomy' => 'product-category',
            'field' => 'term_id',
            'terms' => $id,
        ),
    ),
    'fields' => 'ids',

)));
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
            <button class="text-20 black-neutral d-flex justify-content-center align-items-center gap-1">
                <div>
                    <img loading=“lazy” src="<?php echo THEME_URL . '/images/filter.svg' ?>" alt="">
                </div>
                Filter
            </button>
            <button id="reset-button" class="bottom-line-full text-20 gray-subtext">Clear filter</button>
            <div class="d-flex flex-wrap align-items-center justify-content-center gap-24">
                <button class="tag clicked text-20 gray-subtext">View All </button>
                <button class="tag text-20 gray-subtext">In Stock</button>
            </div>
        </div>
        <div class="d-flex flex-wrap align-items-center gap-24 justify-content-center">
            <div class="d-flex justify-content-center align-items-center gap-1">
                <p class="text-20 black-neutral"><?php echo $total_products; ?></p>
                <p class="text-20 black-neutral">Item</p>
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
                            echo '
                                <div class="form-check">
                                    <input ' . ($sort == $key ? "checked" : "") . ' class="form-check-input" type="radio" name="option" id="' . $key . '">
                                    <label class="text-20 gray-subtext form-check-label" for="' . $key . '">' . $label . '</label>
                                </div>';
                        }
                        ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Filter bar  -->

    <div class="d-flex gap-40">
        <!-- filter collapse -->
        <div class="">
            <?php get_template_part('sidebar'); ?>
        </div>
        <!-- filter collapse -->

        <!-- list -->
        <div class="w-75 d-flex flex-wrap align-items-center justify-content-start product-list custome-container-sm">
            <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $args = [
                'post_type' => 'product',
                'posts_per_page' => 18,
                'paged' => $paged,
                'tax_query' => array(
                    'relation' => 'AND',
                    array(
                        'taxonomy' => 'product-category',
                        'field' => 'term_id',
                        'terms' => $id,
                    ),
                ),
            ];

            // Modify the query based on the sorting option
            switch ($sort) {
                case 'price_low_to_high':
                    $args['meta_key'] = 'display_price_original_price'; // ACF field key
                    $args['orderby'] = 'meta_value_num'; // Sort by numeric value
                    $args['order'] = 'ASC'; // Ascending order
                    break;
                case 'price_high_to_low':
                    $args['meta_key'] = 'display_price_original_price';
                    $args['orderby'] = 'meta_value_num';
                    $args['order'] = 'DESC'; // Descending order
                    break;
                case 'name_az':
                    $args['orderby'] = 'title'; // Sort by title (product name)
                    $args['order'] = 'ASC';
                    break;
                case 'name_za':
                    $args['orderby'] = 'title';
                    $args['order'] = 'DESC';
                    break;
            }

            // Create new WP_Query with the modified arguments
            $query = new WP_Query($args);


            if ($query && $query->have_posts()):
                while ($query->have_posts()):
                    $query->the_post();
                    $product_id = get_the_ID();
                    $displayPrice = get_field('display_price');
            ?>
                    <div class="card-product text-start">
                        <a href="<?php the_permalink(); ?>" class="text-decoration-none">
                            <div class="img-scale">
                                <?php the_post_thumbnail('full'); ?>
                            </div>
                        </a>
                        <div class="w-100 position-relative pt-20 pb-2">
                            <a href="<?php the_permalink(); ?>" class="text-decoration-none">
                                <p class="text-20 fw-medium text-black">
                                    <?php echo $displayPrice['currency'] . $displayPrice['original_price']; ?>
                                </p>
                            </a>
                            <button class="fav-btn fs-5 " data-product-id="<?php the_ID(); ?>" onclick="toggleFavorite(event)">
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
            <?php
                endwhile;
                wp_reset_postdata();

            endif;
            ?>
            <div class="pagenavi">
                <?php if (function_exists('devvn_wp_corenavi'))
                    devvn_wp_corenavi($query); ?>
            </div>
        </div>
        <!-- list -->
    </div>
</div>
<!-- Product list -->


<?php
get_template_part('sections/discover');
get_template_part('sections/news-letter-main');
get_footer();
?>