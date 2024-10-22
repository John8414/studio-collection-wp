<!-- Start Featured Collection -->
<section class="custome-container" id="featureCollection">
    <!-- section title -->
    <div class="pb-40">
        <h2 class="text-60 text-center black-neutral pb-2">
            <?php echo get_field('fc_title', get_the_ID()); ?>
        </h2>
        <p class="text-20 text-center gray-neutral">
            <?php echo get_field('fc_description', get_the_ID()); ?>
        </p>
    </div>

    <?php
    $fc_categories = get_field('fc_categories', get_the_ID());
    if ($fc_categories):
        $defaultImage = get_field('image_default', 'option');
        global $defaultIcon;
        global $defaultBanner;
        ?>
        <?php foreach ($fc_categories as $key => $term):

            $name = $term->name;
            $link = get_term_link($term);
            $excerpt = term_description($term);
            $title = get_field('title', $term);
            $image = get_field('image', $term);
            $banner = $image['banner'];
            $icon = $image['icon'];
            $gallery = get_field('gallery', $term);

            set_query_var('slide_product', $term);
            set_query_var('slide_title', 'Design Your Dream Home');

            ?>
            <div>

                <!-- Item preview -->
                <div class="d-block d-md-flex gap-25 image-picker">
                    <div class="product-inview img-scale">
                        <img class="main-image" loading=“lazy”
                            src="<?php echo isset($gallery) ? $gallery[0]['url'] : $defaultImage['url']; ?> "
                            alt="<?php echo isset($gallery) ? $gallery[0]['alt'] : $defaultImage['alt']; ?> ">
                    </div>

                    <div class="w-790 d-flex flex-column justify-content-between">
                        <div>
                            <div class="bottom-line-full d-flex align-items-center gap-2 w-fit pb-1">
                                <img class="img-icon" src="<?php echo isset($icon) ? $icon['url'] : $defaultIcon ?> "
                                    alt="icon">
                                <p class="text-16 black-neutral"><?php echo esc_html($term->name); ?></p>
                            </div>
                            <h4 class="text-32 fw-bold black-neutral pb-2"><?php echo $title; ?></h4>
                            <p class="text-20 pb-20"><?php echo $excerpt; ?></p>
                            <a class="text-20 fw-bold green-dark d-block pb-40" href="<?php echo $link; ?>">Read More</a>
                        </div>

                        <div class="d-flex gap-2 flex-wrap thumbnails">
                            <?php foreach ($gallery as $index => $value): ?>
                                <div class="<?php echo $index == 0 ? 'item-border' : ''; ?> thumbnail ratio ratio-1x1">
                                    <img loading=“lazy” src="<?php echo isset($value) ? $value['url'] : $defaultImage['url']; ?> "
                                        alt="<?php echo isset($value) ? $value['alt'] : $defaultImage['alt']; ?> ">
                                </div>
                            <?php endforeach; ?>
                        </div>

                    </div>

                    <!-- Item preview -->

                    <!-- View price -->
                </div>

                <?php get_template_part('sections/slide-product'); ?>

                <!-- View price -->
                <div class="position-relative carousel-height w-100">
                    <img loading=“lazy” src="<?php echo isset($banner['image']) ? $banner['image']['url'] : $defaultBanner; ?> "
                        alt="banner">
                    <div class="overlay-30"></div>
                    <div class="z-3 position-absolute bottom-0 p-20">
                        <h2 class="text-60 fw-bold text-white"><?php echo $banner['title']; ?></h2>
                        <p class="text-20 white-regular"><?php echo $banner['description']; ?></p>
                    </div>
                </div>
                <!-- End Featured Collection -->
            </div>


        <?php endforeach;
        wp_reset_query();
    endif; ?>


</section>