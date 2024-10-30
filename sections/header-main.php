<?php $favorites = get_favorite_count(); ?>

<?php get_template_part('sections/menu-mobile'); ?>
<header class="scroll-header">
    <!-- start mobile  -->
    <div class="d-lg-none">
        <div class="info-header d-block ">
            <div class="d-flex align-items-center justify-content-center custome-container py-2 text-white">
                <?php the_field('promotion', 'option'); ?>
            </div>
        </div>
        <div class="mobile px-1">
            <div class="menu-toggle py-1 justify-content-between align-items-center d-flex">
                <div class="d-flex justify-content-start align-items-center gap-2">

                    <div class="img-icon-sm" id="mobileMenuToggle">
                        <i class="fa fa-bars text-24" aria-hidden="true"></i>
                    </div>
                    <div class="img-icon-sm search-header">
                        <img loading=“lazy” src="<?php echo THEME_URL . '/images/search.svg' ?> " alt="">
                    </div>

                </div>
                <div class="w-fit col-lg-4">
                    <a href="<?php echo get_home_url('/') ?>" class="w-100 h-100 d-block">
                        <?php
                        $logo = get_field('logo', 'option');
                        if ($logo) {
                            echo wp_get_attachment_image($logo['id'], 'full');
                        }
                        ?>
                    </a>
                </div>

                <div class="img-icon-sm">

                    <a class="icon-item black-neutral text-decoration-none" href="/wishlist">
                        <div data-id="favorite-count-number" class="position-relative">
                            <img loading=“lazy” src="<?php echo THEME_URL . '/images/heart.svg' ?> " alt="">
                            <span
                                class="position-absolute top-0 mt-2 start-100 <?php echo $favorites <= 0 ? ' d-none' : ''; ?> translate-middle p-1 bg-danger border border-light rounded-circle">
                            </span>
                        </div>
                    </a>
                </div>
            </div>



        </div>
    </div>
    <!-- end mobile  -->
    <div class="sticky-header d-none d-lg-block">
        <div class="info-header">
            <div class="d-flex align-items-center justify-content-between custome-container py-2 text-white">
                <?php the_field('promotion', 'option'); ?>
                <div class="d-flex align-items-center justify-content-center gap-2">
                    <?php
                    $rows = get_field('menu_header', 'option');
                    if (have_rows('menu_header', 'option')):
                        $i = 1;
                        while (have_rows('menu_header', 'option')):
                            the_row();
                            $title = get_sub_field('title');
                            $link = get_sub_field('link'); ?>
                            <a class="text-14 text-uppercase" href="<?php echo $link ?>"><?php echo $title; ?></a>
                            <?php if ($i < count($rows)): ?>
                                <p class="text-14 text-white">•</p>
                    <?php
                            endif;
                            $i++;
                        endwhile;
                        wp_reset_query();
                    endif; ?>
                </div>
            </div>
        </div>

        <!-- Start search and logo header -->
        <div class="header-content">
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
                        <a class="icon-item black-neutral text-decoration-none" href="/wishlist">
                            <div data-id="favorite-count-number" class="position-relative">
                                <img loading=“lazy” src="<?php echo THEME_URL . '/images/heart.svg' ?> " alt="">
                                <span
                                    class="position-absolute top-0 mt-2 start-100 <?php echo $favorites <= 0 ? ' d-none' : ''; ?> translate-middle p-1 bg-danger border border-light rounded-circle">
                                </span>
                            </div>
                            <p class="black-neutral text-14">Favorite</p>
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
        </div>
        <!-- End search and logo header -->
        <!-- Start Menu -->
        <div class="menu-outer d-block">
            <?php get_template_part('sections/menu-main'); ?>
        </div>

    </div>
    <!-- End Menu -->
    <!-- Search enable -->
    <div class="custome-container py-0">

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
                        <li class="d-flex">
                            <a href="<?php echo esc_url(get_term_link($term)); ?>"
                                class="black-neutral d-flex flex-column align-items-center justify-content-center text-decoration-none">
                                <p class="text-center text-uppercase"><?php echo esc_html($term->name); ?></p>
                                <div class="icon-search-enable">
                                    <img class="h-100 w-100" src="<?php echo $avatar['url'] ?> "
                                        alt="<?php echo $avatar['alt'] ?> ">
                                </div>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
    </div>

    <!-- Search enable -->
</header>