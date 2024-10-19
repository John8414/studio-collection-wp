<!-- Start TRANSFORM YOUR SPACE EASILY -->
<section class="custome-container">
    <!-- section title -->
    <div>
        <h2 class="text-60 fw-normal text-center black-neutral pb-2">
            <?php echo get_field('trans_title', get_the_ID()); ?>
        </h2>
        <p class="text-20 text-center gray-neutral">
            <?php echo get_field('trans_description', get_the_ID()); ?>
        </p>
    </div>
    <div class="d-flex justify-content-center align-items-center flex-wrap custome-container-sm">
        <?php

        if (have_rows('trans_image_list')):

            while (have_rows('trans_image_list')) : the_row();
                global $defaultImage;
                $title = get_sub_field('title');
                $description = get_sub_field('description');
                $link = get_sub_field('link');
                $image = get_sub_field('image');
        ?>
        <div class="card-container ratio ratio-1x1">
            <a href="<?php echo $link; ?>">
                <img loading=“lazy” src="<?php echo $image ? $image['url'] : $defaultImage['url'];  ?> "
                    alt="<?php echo $image ? $image['alt'] : $defaultImage['alt'];  ?>">
                <div class="overlay">
                    <h2 class="text-60 fw-bold text-white"><?php echo $title; ?></h2>
                    <p class="text-20 white-regular"><?php echo $description; ?></p>
                </div>
            </a>
        </div>
        <?php
            endwhile;
        endif;
        wp_reset_query(); ?>

    </div>
</section>
<!-- End TRANSFORM YOUR SPACE EASILY -->