<?php

/**
 * Template Name: Furniture
 */

get_header();
?>
<!-- Modern Furniture -->
<div class="custome-container  ">

    <!-- section title -->
    <div class="pb-5">
        <h2 class="text-60 fw-normal text-left black-neutral pb-2">
            <?php echo get_the_title(); ?>
        </h2>
        <p class="text-20 text-left gray-neutral">
            <?php while (have_posts()) : the_post();
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
<!-- Modern Furniture -->

<!-- Categories -->
<div class="custome-container">
    <!-- section title -->
    <div class="pb-5">
        <h2 class="text-60 fw-normal text-left black-neutral pb-2">
            Categories
        </h2>
    </div>
    <div class="d-lg-flex align-items-center justify-content-between gap-3">
        <?php
        $args = array(
            'taxonomy'   => 'product-category', // Danh mục mặc định
            'parent'     => 0,          // Chỉ lấy danh mục cha
            'hide_empty' => false,      // Để hiện cả những danh mục không có bài viết
        );

        $categories = get_terms($args);

        if (!empty($categories) && !is_wp_error($categories)) {
            global $defaultImage;
            foreach ($categories as $category) {
                $image = get_field('image', $category);
                $avatar = $image['avatar'];
        ?>
        <div class="custome-container-sm">
            <div class="img-scale">
                <img loading=“lazy” src="<?php echo $avatar['url'] ? $avatar['url'] : $defaultImage['url']  ?>"
                    alt="<?php echo $category->name; ?>">
            </div>
            <div class="bottom-line-full w-fit pt-2">
                <a class="text-32 black-neutral text-decoration-none w-fit"
                    href="<?php echo get_the_permalink($category); ?>">
                    <?php echo $category->name; ?>
                </a>
            </div>
        </div>
        <?php
            }
        }
        ?>
    </div>
</div>
<!-- Categories -->

<!-- Design Funiture -->
<div class="custome-container">
    <!-- slider -->
    <div class="custome-container-sm">
        <div class="d-flex justify-content-between">
            <h4 class="text-32 fw-bold black-neutral">Design Funiture</h4>
            <div class="custom-nav">
                <button class="prev-btn black-neutral" data-slider-id="slider4">
                    <img loading=“lazy” src="<?php echo THEME_URL . '/images/arr-prev.svg' ?>" alt="">
                </button>
                <button class="next-btn black-neutral" data-slider-id="slider4">
                    <img loading=“lazy” src="<?php echo THEME_URL . '/images/arr-next.svg' ?>" alt="">
                </button>
            </div>
        </div>
    </div>
    <div class="slick-slider custome-container-sm" id="slider4">
        <div class="slider-item text-start">
            <a href="#" class="text-decoration-none">
                <div class="img-scale">
                    <img loading=“lazy” src="<?php echo THEME_URL . '/images/sofa-1.png' ?>" alt="">
                </div>
                <div class="w-100 position-relative pt-20 pb-2">
                    <p class="text-20 fw-medium text-black">$500.00</p>
                    <button class="fav-btn"><img loading=“lazy” src="<?php echo THEME_URL . '/images/heart.svg' ?>"
                            alt=""></button>
                </div>
                <p class="text-20 gray-tertiary pb-2">Scott 2 Seater Sofa</p>
                <p class="text-20 gray-neutral pb-20">N00-102</p>
                <p class="fw-medium text-20 gray-neutral">3 colors</p>
            </a>
        </div>
    </div>
    <!-- slider -->

</div>
<!-- Design Funiture -->

<!-- Outlet Funiture -->
<div class="custome-container">
    <!-- slider -->
    <div class="custome-container-sm">
        <div class="d-flex justify-content-between">
            <h4 class="text-32 fw-bold black-neutral">Outlet Funiture</h4>
            <div class="custom-nav">
                <button class="prev-btn black-neutral" data-slider-id="slider5">
                    <img loading=“lazy” src="<?php echo THEME_URL . '/images/arr-prev.svg' ?>" alt="">
                </button>
                <button class="next-btn black-neutral" data-slider-id="slider5">
                    <img loading=“lazy” src="<?php echo THEME_URL . '/images/arr-next.svg' ?>" alt="">
                </button>
            </div>
        </div>
    </div>
    <div class="slick-slider custome-container-sm" id="slider5">
        <div class="slider-item text-start">
            <a href="#" class="text-decoration-none">
                <div class="img-scale">
                    <img loading=“lazy” src="<?php echo THEME_URL . '/images/sofa-1.png' ?>" alt="">
                </div>
                <div class="w-100 position-relative pt-20 pb-2">
                    <p class="text-20 fw-medium text-black">$500.00</p>
                    <button class="fav-btn"><img loading=“lazy” src="<?php echo THEME_URL . '/images/heart.svg' ?>"
                            alt=""></button>
                </div>
                <p class="text-20 gray-tertiary pb-2">Scott 2 Seater Sofa</p>
                <p class="text-20 gray-neutral pb-20">N00-102</p>
                <p class="fw-medium text-20 gray-neutral">3 colors</p>
            </a>
        </div>
    </div>
    <!-- slider -->

</div>
<!-- Outlet Funiture -->
<!-- Outdoor Funiture -->
<div class="custome-container">
    <!-- slider -->
    <div class="custome-container-sm">
        <div class="d-flex justify-content-between">
            <h4 class="text-32 fw-bold black-neutral">Outdoor Funiture</h4>
            <div class="custom-nav">
                <button class="prev-btn black-neutral" data-slider-id="slider6">
                    <img loading=“lazy” src="<?php echo THEME_URL . '/images/arr-prev.svg' ?>" alt="">
                </button>
                <button class="next-btn black-neutral" data-slider-id="slider6">
                    <img loading=“lazy” src="<?php echo THEME_URL . '/images/arr-next.svg' ?>" alt="">
                </button>
            </div>
        </div>
    </div>
    <div class="slick-slider custome-container-sm" id="slider6">
        <div class="slider-item text-start">
            <a href="#" class="text-decoration-none">
                <div class="img-scale">
                    <img loading=“lazy” src="<?php echo THEME_URL . '/images/sofa-1.png' ?>" alt="">
                </div>
                <div class="w-100 position-relative pt-20 pb-2">
                    <p class="text-20 fw-medium text-black">$500.00</p>
                    <button class="fav-btn"><img loading=“lazy” src="<?php echo THEME_URL . '/images/heart.svg' ?>"
                            alt=""></button>
                </div>
                <p class="text-20 gray-tertiary pb-2">Scott 2 Seater Sofa</p>
                <p class="text-20 gray-neutral pb-20">N00-102</p>
                <p class="fw-medium text-20 gray-neutral">3 colors</p>
            </a>
        </div>
    </div>
    <!-- slider -->

</div>
<!-- Outdoor Funiture -->
<!-- Project Funiture -->
<div class="custome-container">
    <!-- slider -->
    <div class="custome-container-sm">
        <div class="d-flex justify-content-between">
            <h4 class="text-32 fw-bold black-neutral">Project Funiture</h4>
            <div class="custom-nav">
                <button class="prev-btn black-neutral" data-slider-id="slider7">
                    <img loading=“lazy” src="<?php echo THEME_URL . '/images/arr-prev.svg' ?>" alt="">
                </button>
                <button class="next-btn black-neutral" data-slider-id="slider7">
                    <img loading=“lazy” src="<?php echo THEME_URL . '/images/arr-next.svg' ?>" alt="">
                </button>
            </div>
        </div>
    </div>
    <div class="slick-slider custome-container-sm" id="slider7">
        <div class="slider-item text-start">
            <a href="#" class="text-decoration-none">
                <div class="img-scale">
                    <img loading=“lazy” src="<?php echo THEME_URL . '/images/sofa-1.png' ?>" alt="">
                </div>
                <div class="w-100 position-relative pt-20 pb-2">
                    <p class="text-20 fw-medium text-black">$500.00</p>
                    <button class="fav-btn"><img loading=“lazy” src="<?php echo THEME_URL . '/images/heart.svg' ?>"
                            alt=""></button>
                </div>
                <p class="text-20 gray-tertiary pb-2">Scott 2 Seater Sofa</p>
                <p class="text-20 gray-neutral pb-20">N00-102</p>
                <p class="fw-medium text-20 gray-neutral">3 colors</p>
            </a>
        </div>
    </div>
    <!-- slider -->

</div>
<!-- Project Funiture -->

<?php
get_template_part('sections/news-letter-main');
get_footer();
?>