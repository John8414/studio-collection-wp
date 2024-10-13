<header class="position-sticky top-0">
    <div class="sticky-header">
        <div class="info-header py-1">
            <div class="d-flex align-items-center justify-content-center custome-container py-2 text-white">
                <?php the_field('promotion', 'option'); ?>
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
                        <img class="h-100 w-100" src="<?php echo $avatar['url'] ?> "
                            alt="<?php echo $avatar['alt'] ?> ">
                    </div>
                    <!-- </a> -->
                </li>
                <?php endforeach; ?>
            </ul>
            <?php endif; ?>
        </div>
        <!-- Search enable -->

        <!-- Start Menu -->
        <div class="menu-outer d-block">
            <?php get_template_part('sections/menu-main'); ?>
        </div>

    </div>
    <!-- End Menu -->
</header>