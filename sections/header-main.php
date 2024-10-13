<header>
    <div class="sticky-header">
        <!-- Start info header -->
        <div class="info-header py-1">
            <div class="d-flex align-items-center justify-content-center custome-container py-2 text-white">
                <?php the_field('promotion', 'option'); ?>
            </div>
        </div>
        <!-- End info header -->

        <!-- Start search and logo header -->
        <div class="custome-container py-0">
            <div class="header">
                <div class="search-header col-lg-4">
                    <div>
                        <img loading=“lazy” src="<?php echo THEME_URL . '/images/search.svg' ?> " alt="">
                    </div>
                    <p class="search-text text-14">Search</p>
                    <input type="text" class="search-input" placeholder="Type to search..." />
                    <!-- <?php echo get_search_form() ?> -->
                </div>

                <div class="w-fit col-lg-4">
                    <a href="<?php echo get_home_url('/') ?>" class="w-fit">

                        <?php
                        $logo = get_field('logo', 'option');
                        if ($logo) {
                            echo wp_get_attachment_image($logo['id'], 'full');
                        }; ?>
                    </a>

                </div>

                <div class="icons-header col-lg-4">
                    <div class="icon-item">
                        <div><img loading=“lazy” src="<?php echo THEME_URL . '/images/heart.svg' ?> " alt=""></div>
                        <p>Favorite</p>
                    </div>
                    <div class="icon-item">
                        <div><img loading=“lazy” src="<?php echo THEME_URL . '/images/user.svg' ?> " alt=""></div>
                        <p>Account</p>
                    </div>
                    <div class="icon-item">
                        <div><img loading=“lazy” src="<?php echo THEME_URL . '/images/cart.svg' ?> " alt=""></div>
                        <p>Cart</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- End search and logo header -->

        <!-- Search enable -->
        <!-- <div class="search-enable d-flex flex-column justify-content-center">
            <p class="text-20 black-neutral w-fit mx-auto pb-20">What are you looking for?</p>
            <form action="<?php echo home_url() ?>" method="get" class="search-form">
                <div class="form-group">
                    <input class="text-40 w-fit mx-auto" type="text" placeholder="Start typing to search">
                </div>
            </form>

            <div class="d-flex flex-wrap justify-content-center gap-40">
                <div class="d-flex flex-column align-items-center justify-content-center">
                    <p class="pt-2 text-center fw-bold">Furniture outlet</p>
                    <div class="icon-search-enable">
                        <img class="h-100 w-100" src="<?php echo THEME_URL . '/images/furniture.svg' ?> " alt="">
                    </div>
                </div>
                <div class="d-flex flex-column align-items-center justify-content-center">
                    <p class="pt-2 text-center fw-bold">Wood floor</p>
                    <div class="icon-search-enable">
                        <img class="h-100 w-100" src="<?php echo THEME_URL . '/images/furniture.svg' ?> " alt="">
                    </div>
                </div>
                <div class="d-flex flex-column align-items-center justify-content-center">
                    <p class="pt-2 text-center fw-bold">Fabric and leather</p>
                    <div class="icon-search-enable">
                        <img class="h-100 w-100" src="<?php echo THEME_URL . '/images/furniture.svg' ?> " alt="">
                    </div>
                </div>
                <div class="d-flex flex-column align-items-center justify-content-center">
                    <p class="pt-2 text-center fw-bold">WALL COVERING</p>
                    <div class="icon-search-enable">
                        <img class="h-100 w-100" src="<?php echo THEME_URL . '/images/furniture.svg' ?> " alt="">
                    </div>
                </div>
            </div>
        </div> -->
        <!-- Search enable -->

        <!-- Start Menu -->
        <?php get_template_part('sections/menu-main'); ?>

    </div>
    <!-- End Menu -->
</header>