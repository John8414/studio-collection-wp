<header>
    <div class="sticky-header">
        <!-- Start info header -->
        <div class="info-header py-1">
            <div class="d-flex align-items-center justify-content-center custome-container py-2">
                <p class="text-14 text-white">Earn 10% 20% back in Reward Dollars* <span><a class="info-header-link"
                            href="#"> Learn How</a></span></p>
            </div>
        </div>
        <!-- End info header -->

        <!-- Start search and logo header -->
        <div class="custome-container py-0">
            <div class="header">
                <div class="search-header col-lg-4">
                    <div><img loading=“lazy” src="<?php echo THEME_URL . '/images/search.svg' ?> " alt=""></div>
                    <p class="search-text text-14">Search</p>
                    <input type="text" class="search-input" placeholder="Type to search..." />
                    <!-- <?php echo get_search_form() ?> -->
                </div>

                <div class="w-fit col-lg-4">
                    <a href="<?php echo get_home_url('/') ?>" class="w-fit">
                        <img loading=“lazy” src="<?php echo THEME_URL . '/images/logo-header.png' ?>" alt="Logo">
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

        <!-- Start Menu -->
        <?php get_template_part('sections/menu-main'); ?>

    </div>
    <!-- End Menu -->
</header>