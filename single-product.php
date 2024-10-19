<?php
get_header();
$moreInfo = get_field('more_info');
$displayPrice = get_field('display_price');
$information = get_field('information');
$product_id = get_the_ID();
?>
<div class="custome-container ">

    <!-- Breadcrumd -->
    <nav aria-label="breadcrumb" class="pb-4">
        <ol class="breadcrumb text-uppercase">
            <li class="text-14 gray-subtext breadcrumb-item">
                <a class="gray-subtext text-decoration-none" href="<?php echo home_url(); ?>">Home</a>
            </li>

            <?php
            $terms = get_the_terms(get_the_ID(), 'product-category');

            if ($terms && !is_wp_error($terms)) {
                $term = $terms[0];

                $parent_id = $term->parent;
                if ($parent_id != 0) {
                    $parent_term = get_term($parent_id, 'product-category');
                    $parent_link = get_term_link($parent_term);

                    if ($parent_link) {
                        echo '<li class="text-14 gray-subtext breadcrumb-item">';
                        echo '<a class="gray-subtext text-decoration-none" href="' . esc_url($parent_link) . '">' . esc_html($parent_term->name) . '</a>';
                        echo '</li>';
                    }
                }
            }
            ?>

            <li class="text-14 gray-subtext breadcrumb-item active" aria-current="page">
                <?php the_title();
                ?>
            </li>
        </ol>
    </nav>

    <!-- Breadcrumd -->

    <!-- product detail  -->
    <div class="d-md-flex d-block gap-3 align-items-start justify-content-between">
        <div class="product-picker">
            <div class="d-md-flex d-block image-picker gap-3">
                <div class="d-flex flex-column gap-3 thumbnails">
                    <div class="item-border thumbnail ratio ratio-1x1"
                        onclick="handleChangeImage(<?php echo $displayPrice['original_price']; ?>, <?php echo $displayPrice['original_price_copy']; ?>)">
                        <img loading=“lazy” src="<?php echo get_the_post_thumbnail_url(); ?>"
                            alt="<?php the_title() ?>">
                    </div>
                    <?php $gallery = get_field('gallery');
                    if ($gallery):
                        foreach ($gallery as $key => $image):
                    ?>

                    <div class="thumbnail ratio ratio-1x1">
                        <img loading=“lazy” src="<?php echo $image['url']; ?>" alt="<?php the_title() ?>">
                    </div>
                    <?php endforeach;
                    endif; ?>
                </div>

                <div class="img-scale">
                    <img class="main-image" loading=“lazy” src="<?php echo get_the_post_thumbnail_url(); ?>"
                        alt="<?php the_title() ?>">
                </div>
            </div>
        </div>
        <div class="product-info">
            <div>
                <div class="d-flex justify-content-between align-items-start">
                    <h1 class="text-32 black-neutral"><?php the_title(); ?></h1>
                    <div>
                        <?php if ($moreInfo['favorite']): ?>
                        <i class="fa fa-heart-o" style="color: #E91919" aria-hidden="true"></i>
                        <?php else: ?>
                        <i class="fa fa-heart-o" aria-hidden="true"></i>
                        <?php endif; ?>
                    </div>
                </div>
                <p class="text-20 gray-tertiary"><?php echo $moreInfo['provider']; ?></p>
            </div>
            <div class="d-flex flex-column gap-3 align-items-start">
                <div class="d-flex align-items-end justify-content-start gap-3">
                    <p class="text-20 black-neutral">
                        <?php echo $displayPrice['currency'] . ' '; ?>
                        <span class="original-price"> <?php echo $displayPrice['original_price']; ?></span>
                    </p>
                    <p class="text-32 red-primary ">
                        <?php echo $displayPrice['original_price_copy'] ?  $displayPrice['currency'] . ' ' : ''; ?>
                        <span class="sale-price">
                            <?php echo $displayPrice['original_price_copy'] ? $displayPrice['original_price_copy'] : ''; ?></span>
                    </p>
                </div>
                <div class="text-20 gray-tertiary"><?php the_excerpt(); ?></div>
                <p class="text-16 gray-subtext"><?php echo $moreInfo['code'] ?></p>

                <div class="d-flex align-items-center justify-content-start gap-2">
                    <p class="text-16 gray-subtext">
                        <span>
                            <?php echo (get_the_terms($product_id, 'color') && !is_wp_error(get_the_terms($product_id, 'color'))) ? count(get_the_terms($product_id, 'color')) . ' colors' : ''; ?>
                        </span>
                    </p>
                    <div class="d-flex align-items-center justify-content-center gap-2">
                        <?php
                        if ($information) {
                            foreach ($information as $row) {
                                $term = $row['color'];
                                $color = get_field('color', $term);
                                $price = $row['original_price'];
                                $salePrice = $row['sale_price'];
                                $image = $row['image']['url'];
                        ?>
                        <button type="button" data-color="<?php echo $term->term_id; ?>"
                            onclick="handleChangeColor(<?php echo $price; ?>,<?php echo $salePrice; ?>,<?php echo $term->term_id; ?>, '<?php echo $image; ?>'  )"
                            class="color-tags" style="background-color: <?php echo $color; ?>;"></button>
                        <?php
                            }
                        }
                        ?>

                    </div>
                </div>
            </div>
            <?php $reasons_to_buy = $moreInfo['reasons_to_buy'];
            if ($reasons_to_buy):
            ?>
            <div class="d-flex flex-column gap-2">
                <p class="text-20 black-neutral pb-2">Reasons to buy</p>
                <?php
                    foreach ($reasons_to_buy as $row) {
                        $text = $row['text'];
                        $tooltip = $row['tooltip'];
                    ?>
                <div class="d-flex align-items-center justify-content-start gap-3">

                    <p class="text-20 gray-tertiary"><?php echo $text; ?></p>
                    <?php if ($tooltip) { ?>
                    <div class="tooltip-container">
                        <img loading=“lazy” src="<?php echo THEME_URL . '/images/product-tooltip.svg' ?>" alt="">
                        <div class="tooltip text-20 gray-tertiary"><?php echo $tooltip; ?> </div>
                    </div>
                    <?php } ?>
                </div>
                <?php } ?>
            </div>
            <?php endif; ?>
            <!-- //TODO -->
            <div class="product-info-cta">
                <h3 class="text-32 black-neutral pb-2">
                    Contact with us
                </h3>
                <p class="text-20 gray-subtext">
                    Leave your details, and we’ll reach out to assist with your purchase
                </p>
                <input placeholder="Email Address" class="text-16 p-2" type="text">
                <button class="mx-auto text-20 black-neutral w-fit bottom-line-full">SEND YOUR EMAIL</button>
            </div>
            <!-- //TODO -->
            <div>
                <h2 class="text-32 black-neutral bottom-line-full pb-2">
                    Product Highlights
                </h2>

                <!-- collapse detail -->
                <button
                    class="px-0 bg-transparent w-100 text-20 fw-bold black-neutral d-flex justify-content-between align-items-center gap-1 custome-container-sm"
                    type="button" data-bs-toggle="collapse" data-bs-target="#collapse-detail" aria-expanded="false"
                    aria-controls="collapse-detail">
                    Detail
                    <div>
                        <img class="plus" loading=“lazy” src="<?php echo THEME_URL . '/images/plus.svg' ?>" alt="">
                        <img class="d-none minus" loading=“lazy” src="<?php echo THEME_URL . '/images/minus.svg' ?>"
                            alt="">
                    </div>
                </button>

                <div class="collapse multi-collapse" id="collapse-detail">
                    <div class="d-flex flex-column gap-3 bottom-line-full pb-3">
                        <?php while (have_posts()) : the_post();
                            the_content();
                        endwhile; ?>
                    </div>
                </div>
                <!-- collapse Detail -->

                <!-- collapse size -->
                <button
                    class="px-0 bg-transparent w-100 text-20 fw-bold black-neutral d-flex justify-content-between align-items-center gap-1 custome-container-sm"
                    type=" button" data-bs-toggle="collapse" data-bs-target="#collapse-size" aria-expanded="false"
                    aria-controls="collapse-size">Size
                    <div>
                        <img class="plus" loading=“lazy” src="<?php echo THEME_URL . '/images/plus.svg' ?>" alt="">
                        <img class="d-none minus" loading=“lazy” src="<?php echo THEME_URL . '/images/minus.svg' ?>"
                            alt="">
                    </div>
                </button>
                <div class="collapse multi-collapse" id="collapse-size">
                    <div class="d-flex flex-column gap-3 bottom-line-full pb-3">
                        <?php echo get_field('size') ?>
                    </div>
                </div>
                <!-- collapse size -->


                <!-- collapse Warrant -->
                <button
                    class="px-0 bg-transparent w-100 text-20 fw-bold black-neutral d-flex justify-content-between align-items-center gap-1 custome-container-sm"
                    type=" button" data-bs-toggle="collapse" data-bs-target="#collapse-warrant" aria-expanded="false"
                    aria-controls="collapse-warrant">Warrant
                    <div>
                        <img class="plus" loading=“lazy” src="<?php echo THEME_URL . '/images/plus.svg' ?>" alt="">
                        <img class="d-none minus" loading=“lazy” src="<?php echo THEME_URL . '/images/minus.svg' ?>"
                            alt="">
                    </div>
                </button>
                <div class="collapse multi-collapse" id="collapse-warrant">
                    <div class="d-flex flex-column gap-3 bottom-line-full pb-3">
                        <?php echo get_field('warrant'); ?>
                    </div>
                </div>
                <!-- collapse Warrant -->

                <!-- collapse brand -->
                <button
                    class="px-0 bg-transparent w-100 text-20 fw-bold black-neutral d-flex justify-content-between align-items-center gap-1 custome-container-sm"
                    type=" button" data-bs-toggle="collapse" data-bs-target="#collapse-brand" aria-expanded="false"
                    aria-controls="collapse-brand">Brand
                    <div>
                        <img class="plus" loading=“lazy” src="<?php echo THEME_URL . '/images/plus.svg' ?>" alt="">
                        <img class="d-none minus" loading=“lazy” src="<?php echo THEME_URL . '/images/minus.svg' ?>"
                            alt="">
                    </div>
                </button>
                <div class="collapse multi-collapse" id="collapse-brand">
                    <div class="d-flex flex-column gap-3 bottom-line-full pb-3">
                        <?php echo get_field('brand'); ?>
                    </div>
                </div>
                <!-- collapse brand -->
            </div>

        </div>
    </div>
    <!-- product detail  -->

</div>

<div class="custome-container">
    <!-- section title -->
    <div>
        <h2 class="text-60 fw-normal black-neutral pb-2">
            Discover more
        </h2>
    </div>
    <div class="position-relative w-100 pb-4">
        <?php $discoverMore = get_field('discover_more');
        if ($discoverMore) {
            echo $discoverMore;
        } else { ?>
        <img loading=“lazy” src="<?php echo THEME_URL . '/images/carousel.jpg' ?>" alt="">
        <div class="overlay-30"></div>
        <?php }
        ?>
    </div>
    <?php get_template_part('sections/categories') ?>
</div>

<!-- slider -->
<?php get_template_part('sections/like-post'); ?>
<!-- slider -->

<!-- slider -->
<?php get_template_part('sections/viewed-post'); ?>
<!-- slider -->
<!-- slider -->
<?php get_template_part('sections/discover'); ?>
<!-- slider -->
<?php
get_template_part('sections/news-letter-main');
get_footer(); ?>