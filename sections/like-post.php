<?php
$args = array(
    'post_type'      => 'product',
    'posts_per_page' => 10,
    'orderby'        => 'rand',
);

$query = new WP_Query($args);
$term_id = '123';


?>
<?php if ($query->have_posts()) : ?>
<div class="custome-container">
    <div class="custome-container-sm">
        <div class="d-flex justify-content-between">
            <h4 class="text-32 fw-bold black-neutral">You may also like</h4>
            <div class="custom-nav">
                <button class="prev-btn black-neutral" data-slider-id="slider<?php echo $term_id; ?>">
                    <img loading=“lazy” src="<?php echo THEME_URL . '/images/arr-prev.svg' ?> " alt="">
                </button>
                <button class="next-btn black-neutral" data-slider-id="slider<?php echo $term_id; ?>">
                    <img loading=“lazy” src="<?php echo THEME_URL . '/images/arr-next.svg' ?> " alt="">
                </button>
            </div>

        </div>
    </div>
    <div class="slick-slider custome-container-sm" id="slider<?php echo $term_id; ?>">
        <?php
            if ($query->have_posts()) :
                $group = get_field('more_info');
                $product_id = get_the_ID();
                $displayPrice = get_field('display_price');
            ?>
        <div class="slider-item text-start">
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
            endif;
            wp_reset_postdata();
            ?>

    </div>
</div>
<?php endif; ?>