<section class="custome-carousel">
    <?php if (have_rows('bn_slider', get_the_ID())): ?>
    <div class="carousel-banner" id="bannerMain">
        <?php while (have_rows('bn_slider', get_the_ID())): the_row();
                $image = get_sub_field('image');
                $title = get_sub_field('title');
                $des = get_sub_field('description');
                $link = get_sub_field('link');
            ?>
        <div class="carousel-item">
            <div class="overlay-60"></div>
            <a href="<?php echo $link; ?>">
                <img loading=“lazy” src="<?php echo esc_url($image['url']); ?>"
                    alt="<?php echo esc_attr($image['alt']); ?>" class="d-block w-100 h-100 object-fit-cover">
                <div class="caption">
                    <div class="caption-inner">
                        <h1 class="text-80 fw-bold"><?php echo $title; ?></h1>
                        <p class="text-32 white-regular"><?php echo $des; ?></p>
                    </div>

                </div>
            </a>

        </div>
        <?php endwhile;
            wp_reset_query(); ?>
    </div>
    <?php endif; ?>
    <div class="overlay-scrolldown">
        <a class="text-20 fw-bold hover-yellow" href="#featureCollection">
            EXPLORE MORE
            <button class="arr-button pt-3">
                <div class="icon">
                    <img loading=“lazy” src="<?php echo THEME_URL . '/images/arr-down.svg' ?>" alt="arrow">
                </div>
            </button>
        </a>

    </div>
</section>