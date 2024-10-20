<?php
get_header();
$term = get_queried_object();
$id = get_queried_object_id();

$total_products = count(get_posts(array(
    'post_type'      => 'product',
    'posts_per_page' => -1,
    'tax_query'      => array(
        array(
            'taxonomy' => 'product-category',
            'field'    => 'term_id',
            'terms'    => $id,
        ),
    ),
    'fields' => 'ids' // Chỉ lấy ID để giảm tải truy vấn
)));
?>
<!-- Living Room Furniture -->
<div class="custome-container">

    <!-- Breadcrumd -->
    <?php custom_taxonomy_breadcrumb(); ?>
    <!-- Breadcrumd -->

    <!-- section title -->
    <div class="pb-5">
        <h2 class="text-60 fw-normal text-left black-neutral pb-2">
            <?php echo $term->name; ?>
        </h2>
    </div>
    <?php get_template_part('sections/categories'); ?>
</div>
<!-- Living Room Furniture -->

<!-- Product list -->
<div class="custome-container">
    <!-- Filter bar  -->
    <div class="d-flex flex-wrap align-items-center justify-content-between pb-4">
        <div class="d-flex flex-wrap align-items-center gap-2">
            <button class="text-20 black-neutral d-flex justify-content-center align-items-center gap-1">
                <div>
                    <img loading=“lazy” src="<?php echo THEME_URL . '/images/filter.svg' ?>" alt="">
                </div>
                Filter
            </button>
            <button id="reset-button" class="bottom-line-full text-20 gray-subtext">Clear filter</button>
            <div class="d-flex flex-wrap align-items-center justify-content-center gap-2">
                <button class="tag clicked text-20 gray-subtext">View All </button>
                <button class="tag text-20 gray-subtext">In Stock</button>
            </div>
        </div>
        <div class="d-flex flex-wrap align-items-center gap-2">
            <div class="d-flex justify-content-center align-items-center gap-1">
                <p class="text-20 black-neutral"><?php echo $total_products; ?></p>
                <p class="text-20 black-neutral">Item</p>
            </div>

            <div class="dropdown">
                <button
                    class="bg-transparent px-0 text-20 black-neutral d-flex justify-content-center align-items-center gap-1"
                    id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                    Most Relevant
                    <div>
                        <img loading=“lazy” src="<?php echo THEME_URL . '/images/arr-down-thin.svg' ?>" alt="">
                    </div>
                </button>
                <div class="dropdown-menu px-2 w-fit" aria-labelledby="dropdownMenuLink">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="option" id="option1">
                        <label class="text-20 gray-subtext form-check-label text-20 gray-subtext" for="option1">
                            Price, low to high
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="option" id="option2">
                        <label class="text-20 gray-subtext form-check-label text-20 gray-subtext" for="option2">
                            Price, high to low
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="option" id="option3">
                        <label class="text-20 gray-subtext form-check-label text-20 gray-subtext" for="option3">
                            Product name A-Z
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="option" id="option4">
                        <label class="text-20 gray-subtext form-check-label text-20 gray-subtext" for="option4">
                            Product name Z-A
                        </label>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Filter bar  -->

    <div class="d-flex gap-4">
        <!-- filter collapse -->
        <div class="">
            <?php get_template_part('sidebar'); ?>
        </div>
        <!-- filter collapse -->

        <!-- list -->
        <div class="w-75 d-flex flex-wrap align-items-center justify-content-start product-list custome-container-sm">
            <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $query = new WP_Query([
                'post_type' => 'product',
                'posts_per_page' => 18,
                'paged' => $paged,
                'tax_query' => array(
                    'relation' => 'AND',
                    array(
                        'taxonomy' => 'product-category',
                        'field' => 'term_id',
                        'terms' => $id,
                    )
                ),
            ]);

            if ($query && $query->have_posts()) :
                while ($query->have_posts()) :
                    $query->the_post();
                    $product_id = get_the_ID();
            ?>
            <div class="card-product text-start">
                <a href="<?php the_permalink(); ?>" class="text-decoration-none">
                    <div class="img-scale img-card-product">
                        <?php the_post_thumbnail('full'); ?>
                    </div>
                    <div class="w-100 position-relative pt-20 pb-2">
                        <p class="text-20 fw-medium text-black">
                            <?php echo get_field('currency') . get_field('original_price'); ?>
                        </p>
                        <button class="fav-btn">
                            <?php if (get_field('more_info')['favorite']): ?>
                            <i class="fa fa-heart-o" style="color: #E91919" aria-hidden="true"></i>
                            <?php else: ?>
                            <i class="fa fa-heart-o" aria-hidden="true"></i>
                            <?php endif; ?>
                        </button>
                    </div>
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
                <?php if (function_exists('devvn_wp_corenavi')) devvn_wp_corenavi($query); ?>
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