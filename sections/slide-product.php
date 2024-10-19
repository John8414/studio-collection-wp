<?php
$term = get_query_var('slide_product');
$term_id = $term->term_id;
$args = array(
    'post_type' => 'product',
    'tax_query' => array(
        array(
            'taxonomy' => $term->taxonomy,
            'field' => 'term_id',
            'terms' => $term_id,
        ),
    ),
    'posts_per_page' => -1,
);

$query = new WP_Query($args);
set_query_var('product_query', $query);
?>

<div class="custome-container">
    <div class="custome-container-sm">
        <div class="d-flex justify-content-between">
            <h4 class="text-32 fw-bold black-neutral">Design Your Dream Home</h4>
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
            get_template_part('sections/product-item');
        endif;
        wp_reset_postdata();
        ?>

    </div>
</div>