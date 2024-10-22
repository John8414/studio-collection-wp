<section class="custome-container">
    <!-- section title -->
    <div class="w-title">
        <h2 class="text-60 text-center black-neutral pb-2">
            <?php echo get_field('is_title', get_the_ID()); ?>
        </h2>
        <p class="text-20 text-center gray-neutral">
            <?php echo get_field('is_description', get_the_ID()); ?>
        </p>
    </div>
    <?php
    $is_categories = get_field('is_categories', get_the_ID());
    if ($is_categories): ?>
        <div class="d-flex flex-wrap justify-content-center gap-40 pt-5">
            <?php foreach ($is_categories as $term):
                $image = get_field('image', $term);
                $icon = $image['icon'];
                ?>
                <a href="<?php echo esc_url(get_term_link($term)); ?>"
                    class="d-inline-flex flex-column align-items-center text-decoration-none black-neutral">
                    <div class="img-icon-large">
                        <img class="h-100 w-100" src="<?php echo $icon['url'] ?> " alt="<?php echo $icon['alt'] ?>">

                    </div>
                    <p class="pt-2"><?php echo esc_html($term->name); ?></p>
                </a>
            <?php endforeach;
            wp_reset_query(); ?>
        </div>
    <?php endif; ?>
</section>