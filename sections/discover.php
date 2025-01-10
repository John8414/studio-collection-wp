<?php $terms = get_terms(array(
    'taxonomy' => 'product-category',
    'hide_empty' => false,
));
$defaultImage = get_field('image_default', 'option'); ?>

<div class="custome-container">
    <!-- section title -->
    <div class="custome-container-sm">
        <div class="d-flex justify-content-between">
            <h2 class="text-60 fw-bold black-neutral">More to Discover</h2>
            <?php if ($terms && count($terms) > 3): ?>
            <div class="custom-nav">
                <button class="prev-btn black-neutral" data-slider-id="ds-slider8">
                    <img loading=“lazy” src="<?php echo THEME_URL . '/images/arr-prev.svg' ?>" alt="">
                </button>
                <button class="next-btn black-neutral" data-slider-id="ds-slider8">
                    <img loading=“lazy” src="<?php echo THEME_URL . '/images/arr-next.svg' ?>" alt="">
                </button>
            </div>
            <?php endif; ?>
        </div>
    </div>
    <?php
    if (!empty($terms) && !is_wp_error($terms)) {
    ?>

    <div class="slider-show-3 custome-container-sm" id="ds-slider8">
        <?php foreach ($terms as $term) {
                $image = get_field('image', $term);
                $avatar = $image['avatar'];
            ?>
        <div class="slider-item custome-container-sm">
            <div class="img-scale slider-item-img">
                <img loading=“lazy” src="<?php echo $avatar['url'] ? $avatar['url'] : $defaultImage['url'] ?>"
                    alt="<?php echo $term->name; ?>">
            </div>
            <div class="bottom-line-full w-fit pt-2">
                <a class="text-32 black-neutral text-decoration-none w-fit"
                    href="<?php echo get_term_link($term) ?>"><?php echo $term->name; ?></a>
            </div>
        </div>
        <?php } ?>
    </div>
    <?php } ?>

</div>