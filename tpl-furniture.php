<?php

/**
 * Template Name: Furniture
 */

get_header();
?>
<div class="custome-container  ">

    <div class="pb-5">
        <h2 class="text-60 fw-normal text-left black-neutral pb-2">
            <?php echo get_the_title(); ?>
        </h2>
        <p class="text-20 text-left gray-neutral">
            <?php while (have_posts()):
                the_post();
                the_content();
            endwhile;
            wp_reset_query(); ?>
        </p>
    </div>
    <div class="position-relative carousel-height w-100">
        <img loading=“lazy” src="<?php echo get_the_post_thumbnail_url() ?>" alt=" <?php echo get_the_title(); ?>">
        <div class="overlay-30"></div>
    </div>
</div>
<div class="custome-container">
    <div class="pb-5">
        <h2 class="text-60 fw-normal text-left black-neutral pb-2">
            Categories
        </h2>
    </div>
    <?php get_template_part('sections/categories'); ?>
</div>


<?php $page_category = get_field('category_page', get_the_ID());
$child_terms = get_terms(array(
    'taxonomy' => 'product-category',
    'parent' => $page_category->term_id,
    'hide_empty' => false,
));

if (!empty($child_terms) && !is_wp_error($child_terms)) {
    foreach ($child_terms as $child_term) {
        set_query_var('slide_product', $child_term);
        set_query_var('slide_title', $child_term->name);
        get_template_part('sections/slide-product');
    }
}

get_template_part('sections/news-letter-main');
get_footer();
?>