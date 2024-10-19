<?php
$query = get_query_var('product_query');
if ($query && $query->have_posts()) :
    while ($query->have_posts()) :
        $query->the_post();
        $product_id = get_the_ID();
?>
<div class="slider-item text-start">
    <a href="<?php the_permalink(); ?>" class="text-decoration-none">
        <div class="img-scale">
            <?php the_post_thumbnail('full'); ?>
        </div>
        <div class="w-100 position-relative pt-20 pb-2">
            <p class="text-20 fw-medium text-black"><?php echo get_field('currency') . get_field('original_price'); ?>
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