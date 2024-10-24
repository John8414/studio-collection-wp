<div class="filter-collapse custome-container-sm d-flex flex-column">
    <p class="text-32 black-neutral filter-title">Filter</p>
    <?php
    $listColorCat = get_terms(array(
        'post_type' => 'product',
        'taxonomy' => 'color',
        'hide_empty' => false,
    ));
    if (!empty($listColorCat) && !is_wp_error($listColorCat)) { ?>
    <div>
        <button
            class="bg-transparent px-0 w-100 text-20 black-neutral d-flex justify-content-between align-items-center gap-1"
            type="button" data-bs-toggle="collapse" data-bs-target="#collapse-color" aria-expanded="false"
            aria-controls="collapse-color">Color
            <div>
                <img loading=“lazy” src="<?php echo THEME_URL . '/images/plus.svg' ?>" alt="">
            </div>
        </button>
        <div class="collapse multi-collapse" id="collapse-color">
            <div class="d-flex gap-2 flex-wrap">
                <?php
                    foreach ($listColorCat as $term) {
                        $color = get_field('color', $term);
                    ?>
                <div class="form-check text-center w-25 ps-0">
                    <input class="form-check-input visually-hidden" type="radio" name="colorCat"
                        value="<?php echo $term->term_id; ?>" id="check-<?php echo $term->term_id; ?>">
                    <label class="text-20 gray-subtext text-center form-check-label"
                        for="check-<?php echo $term->term_id; ?>">
                        <span class="d-block color-button" style="background-color: <?php echo $color; ?>;"></span>
                        <span class="d-block text-14"><?php echo $term->name; ?></span>
                    </label>
                </div>
                <?php
                    }
                    ?>
            </div>

        </div>
    </div>
    <?php
    }
    ?>
    <div>
        <button
            class="bg-transparent px-0 w-100 text-20 black-neutral d-flex justify-content-between align-items-center gap-1"
            type="button" data-bs-toggle="collapse" data-bs-target="#collapse-price" aria-expanded="false"
            aria-controls="collapse-price">Price
            <div>
                <img loading=“lazy” src="<?php echo THEME_URL . '/images/plus.svg' ?>" alt="">
            </div>
        </button>
        <div class="collapse multi-collapse" id="collapse-price">

            <div class="filter-slide-wrap">
                <div class="filter-slide price-filter-slide d-flex gap-2">
                    <div class="price-filter-min">
                        <input class="form-control" type="number" name="price_min" id="min-price">
                        <label class="form-label" for="min-price">Min</label>
                    </div>

                    <span class="price-filter-to pt-2">to</span>

                    <div class="price-filter-max">
                        <input class="form-control" type="number" name="price_max" id="max-price">
                        <label class="form-label" for="max-price">Max</label>
                    </div>

                </div>
                <div class="text-center">
                    <input type="button" value="Apply filter"
                        class="price-filter-submit border-0 bg-transparent text-decoration-underline text-20 gray-subtext">
                </div>

            </div>
        </div>
    </div>
    <?php $listBrandCat = get_terms(array(
        'post_type' => 'product',
        'taxonomy' => 'brand',
        'hide_empty' => false,
    ));
    if (!empty($listBrandCat) && !is_wp_error($listBrandCat)) { ?>
    <div>
        <button
            class="bg-transparent px-0 w-100 text-20 black-neutral d-flex justify-content-between align-items-center gap-1"
            type="button" data-bs-toggle="collapse" data-bs-target="#collapse-brand" aria-expanded="false"
            aria-controls="collapse-brand">Brand
            <div>
                <img loading=“lazy” src="<?php echo THEME_URL . '/images/plus.svg' ?>" alt="">
            </div>
        </button>

        <div class="collapse multi-collapse" id="collapse-brand">
            <?php

                foreach ($listBrandCat as $term) {
                ?>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="<?php echo $term->term_id; ?>"
                    id="check-<?php echo $term->term_id; ?>">
                <label class="text-20 gray-subtext form-check-label" for="check-<?php echo $term->term_id; ?>">
                    <?php echo $term->name; ?>
                </label>
            </div>
            <?php
                }
                ?>
        </div>
    </div>
    <?php
    }
    ?>
    <?php
    $term = get_queried_object();
    $listCategoryCat = get_terms(array(
        'post_type' => 'product',
        'taxonomy' => 'product-category',
        'hide_empty' => false,
        'parent' => $term->term_id
    ));
    if (!empty($listCategoryCat) && !is_wp_error($listCategoryCat)) { ?>
    <div>
        <button
            class="bg-transparent px-0 w-100 text-20 black-neutral d-flex justify-content-between align-items-center gap-1"
            type="button" data-bs-toggle="collapse" data-bs-target="#collapse-category" aria-expanded="false"
            aria-controls="collapse-category">Category
            <div>
                <img loading=“lazy” src="<?php echo THEME_URL . '/images/plus.svg' ?>" alt="">
            </div>
        </button>
        <div class="collapse multi-collapse" id="collapse-category">
            <?php
                foreach ($listCategoryCat as $term) {
                ?>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="<?php echo $term->term_id; ?>"
                    id="check-<?php echo $term->term_id; ?>">
                <label class="text-20 gray-subtext form-check-label" for="check-<?php echo $term->term_id; ?>">
                    <?php echo $term->name; ?>
                </label>
            </div>
            <?php
                }
                ?>
        </div>
    </div>
    <?php } ?>
    <?php $listSpecCat = get_terms(array(
        'post_type' => 'product',
        'taxonomy' => 'special_offers',
        'hide_empty' => false,
    ));
    if (!empty($listSpecCat) && !is_wp_error($listSpecCat)) { ?>
    <div>
        <button
            class="bg-transparent px-0 w-100 text-20 black-neutral d-flex justify-content-between align-items-center gap-1"
            type="button" data-bs-toggle="collapse" data-bs-target="#collapse-special" aria-expanded="false"
            aria-controls="collapse-special">Special Offers
            <div>
                <img loading=“lazy” src="<?php echo THEME_URL . '/images/plus.svg' ?>" alt="">
            </div>
        </button>
        <div class="collapse multi-collapse" id="collapse-special">
            <?php
                foreach ($listSpecCat as $term) {
                ?>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="check-<?php echo $term->term_id; ?>">
                <label class="text-20 gray-subtext form-check-label" for="check-<?php echo $term->term_id; ?>">
                    <?php echo $term->name; ?>
                </label>
            </div>
            <?php } ?>
        </div>
    </div>
    <?php } ?>
</div>