<?php

/**
 * Template Name: Favorite
 */


get_header();
$total_products = get_favorite_count();
$wishlist = isset($_COOKIE['wishlist']) ? json_decode(stripslashes($_COOKIE['wishlist']), true) : array();
?>
<!-- Living Room Furniture -->
<div class="custome-container">

    <!-- Breadcrumd -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="text-14 gray-subtext breadcrumb-item"><a class="gray-subtext text-decoration-none"
                    href="<?php echo home_url('/') ?>">HOME</a>
            </li>
            <li class="text-14 gray-subtext breadcrumb-item active" aria-current="page">WISHLIST</li>
        </ol>
    </nav>
    <!-- Breadcrumd -->

    <!-- section title -->
    <h2 class="text-60 fw-bold text-left black-neutral pb-2">
        <?php the_title(); ?>
    </h2>
    <div class="d-flex border-bottom align-items-center gap-1">
        <i class="fa fa-heart-o" style="color: #E91919" aria-hidden="true"></i>
        <p class="text-20 black-neutral"><?php echo $total_products; ?></p>
        <p class="text-20 black-neutral">Products</p>
    </div>
</div>
<!-- Living Room Furniture -->

<!-- Product list -->
<?php
if (empty($wishlist)) {
    echo '<div class="text-center pt-5">Your favorites list is empty.</div>';
    return;
}
?>
<div class="custome-container">
    <div class="row">
        <?php
        $args = array(
            'post_type' => 'product',
            'post__in' => $wishlist,
            'posts_per_page' => -1
        );

        $query = new WP_Query($args);

        if ($query && $query->have_posts()):
            while ($query->have_posts()):
                $query->the_post();
                $product_id = get_the_ID();
                $displayPrice = get_field('display_price');
        ?>
        <div class="col-lg-4 col-6 clearfix">
            <div class="card-product text-start">
                <a href="<?php the_permalink(); ?>" class="text-decoration-none">
                    <div class="img-scale slider-item-img">
                        <?php the_post_thumbnail('full'); ?>
                    </div>
                </a>
                <div class="w-100 position-relative pt-20 pb-2">
                    <a href="<?php the_permalink(); ?>" class="text-decoration-none">
                        <p class="text-20 fw-medium text-black">
                            <?php echo formatCurrency($displayPrice['original_price'], $displayPrice['currency']);  ?>
                        </p>
                    </a>
                    <?php product_wishlist_button(get_the_ID(), '', true); ?>
                </div>
                <a href="<?php the_permalink(); ?>" class="text-decoration-none">
                    <p class="text-20 gray-tertiary pb-2 clamped-text-1"><?php the_title(); ?></p>
                    <p class="text-20 gray-neutral pb-20"><?php echo get_field('more_info')['code']; ?></p>
                    <p class="fw-medium text-20 gray-neutral">
                        <?php echo (get_the_terms($product_id, 'color') && !is_wp_error(get_the_terms($product_id, 'color'))) ? count(get_the_terms($product_id, 'color')) . ' colors' : ''; ?>
                    </p>
                </a>
            </div>
        </div>
        <?php
            endwhile;
            wp_reset_postdata();

        endif;
        ?>

    </div>
</div>

<?php
get_template_part('sections/news-letter-main');
get_footer();
?>