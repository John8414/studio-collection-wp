<header class="scroll-header">
    <!-- start mobile  -->
    <div class="mobile px-1 d-xl-block">
        <div class="menu-toggle py-1 d-flex d-xl-none">
            <div class="img-icon-sm" id="mobileMenuToggle">
                <i class="fa fa-bars" aria-hidden="true"></i>
            </div>

            <div class="d-flex justify-content-start align-items-center">
                <div class="w-fit col-lg-4">
                    <a href="<?php echo get_home_url('/') ?>" class="w-fit">
                        <?php
                        $logo = get_field('logo', 'option');
                        if ($logo) {
                            echo wp_get_attachment_image($logo['id'], 'full');
                        }
                        ; ?>
                    </a>
                </div>
            </div>
            <div class="d-flex justify-content-start align-items-center search-header">
                <div class="img-icon-sm">
                    <img loading=“lazy” src="<?php echo THEME_URL . '/images/search.svg' ?> " alt="">
                </div>
                <p class="search-text text-14">Search</p>
            </div>
        </div>

        <div class="text-60 black-neutral mobile-nav" id="mobileNav">
            <div class="custome-container py-0">
                <div class="d-flex justify-content-center align-items-center gap-3 py-3">
                    <div class="d-flex justify-content-start align-items-center">
                        <div class="img-icon-sm"><img loading=“lazy”
                                src="<?php echo THEME_URL . '/images/heart.svg' ?> " alt=""></div>
                        <p class="black-neutral text-14">Favorite</p>
                    </div>
                    <div class="d-flex justify-content-start align-items-center">
                        <div class="img-icon-sm"><img loading=“lazy” src="<?php echo THEME_URL . '/images/user.svg' ?> "
                                alt=""></div>
                        <p class="black-neutral text-14">Account</p>
                    </div>
                    <div class="d-flex justify-content-start align-items-center">
                        <div class="img-icon-sm"><img loading=“lazy” src="<?php echo THEME_URL . '/images/cart.svg' ?> "
                                alt=""></div>
                        <p class="black-neutral text-14">Cart</p>
                    </div>
                </div>
            </div>
            <div>
                <?php get_template_part('sections/menu-main'); ?>
            </div>
        </div>

    </div>
    <!-- end mobile  -->

    <div class="sticky-header d-none d-xl-block">
        <div class="info-header">
            <div class="d-flex align-items-center justify-content-between custome-container py-2 text-white">
                <?php the_field('promotion', 'option'); ?>
                <div class="d-flex align-items-center justify-content-center gap-2">
                    <a class="text-14" href="#">DESIGN.DEFINED</a>
                    <p class="text-14 text-white">•</p>
                    <a class="text-14" href="#">CONTACT</a>
                    <p class="text-14 text-white">•</p>
                    <a class="text-14" href="#">LOCATION</a>
                </div>
            </div>
        </div>

        <!-- Start search and logo header -->
        <div class="custome-container py-0">
            <div class="header">
                <div class="search-header col-lg-4">
                    <div>
                        <img loading=“lazy” src="<?php echo THEME_URL . '/images/search.svg' ?> " alt="">
                    </div>
                    <p class="search-text text-14">Search</p>
                </div>

                <div class="w-fit col-lg-4">
                    <a href="<?php echo get_home_url('/') ?>" class="w-fit">

                        <?php
                        $logo = get_field('logo', 'option');
                        if ($logo) {
                            echo wp_get_attachment_image($logo['id'], 'full');
                        }
                        ; ?>
                    </a>

                </div>

                <div class="icons-header col-lg-4">
                    <?php
                    $favorites = get_favorite_count();
                    ?>
                    <a class="icon-item black-neutral text-decoration-none" href="/wishlist">
                        <div id="favorite-count-number">
                            <?php
                            if ($favorites > 0): ?>
                                <i class="fa fa-heart" style="color: #E91919" aria-hidden="true"></i>
                            <?php else: ?>
                                <i class="fa fa-heart-o" aria-hidden="true"></i>
                            <?php endif; ?>
                        </div>
                        <p>Favorite</p>
                    </a>
                    <div class="icon-item">
                        <div><img loading=“lazy” src="<?php echo THEME_URL . '/images/user.svg' ?> " alt=""></div>
                        <p class="black-neutral text-14">Account</p>
                    </div>
                    <div class="icon-item">
                        <div><img loading=“lazy” src="<?php echo THEME_URL . '/images/cart.svg' ?> " alt=""></div>
                        <p class="black-neutral text-14">Cart</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- End search and logo header -->



        <!-- Start Menu -->
        <div class="menu-outer d-block">
            <?php get_template_part('sections/menu-main'); ?>
        </div>

    </div>
    <!-- End Menu -->
    <!-- Search enable -->
    <div class="search-enable d-none flex-column justify-content-center">
        <p class="text-20 black-neutral w-fit mx-auto pb-20">What are you looking for?</p>
        <form action="<?php echo home_url() ?>" method="get" _lpchecked="1" class="search-form">
            <div class="form-group">
                <input id="searchInput" type="text" name="s" id="s" value="" placeholder="Start typing to search"
                    class="text-40 w-fit mx-auto" autofocus>
            </div>
        </form>
        <?php
        $terms = get_field('search_categories', 'option');
        if ($terms): ?>
            <ul class="search-icon-list pt-40 ps-0">
                <?php foreach ($terms as $term):
                    $hero = get_field('image', $term);
                    $avatar = $hero['icon'];
                    ?>
                    <li class="d-flex flex-column align-items-center justify-content-center">
                        <!-- <a href="<?php echo esc_url(get_term_link($term)); ?>"> -->
                        <p class="text-center text-uppercase"><?php echo esc_html($term->name); ?></p>
                        <div class="icon-search-enable">
                            <img class="h-100 w-100" src="<?php echo $avatar['url'] ?> " alt="<?php echo $avatar['alt'] ?> ">
                        </div>
                        <!-- </a> -->
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
    <!-- Search enable -->
</header>