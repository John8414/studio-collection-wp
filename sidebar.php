<?php
$selected_color = isset($_GET['color']) ? sanitize_text_field($_GET['color']) : '';
$color_ids = explode(',', $selected_color);

$selected_brand = isset($_GET['brand']) ? sanitize_text_field($_GET['brand']) : '';
$brand_ids = explode(',', $selected_brand);

$selected_cat = isset($_GET['product_cat']) ? sanitize_text_field($_GET['product_cat']) : '';
$cat_ids = explode(',', $selected_cat);

$minPrice = isset($_GET['min']) ? sanitize_text_field($_GET['min']) : '';
$maxPrice = isset($_GET['max']) ? sanitize_text_field($_GET['max']) : '';

$selected_spec = isset($_GET['spec']) ? sanitize_text_field($_GET['spec']) : '';
$spec_ids = explode(',', $selected_spec);

?>

<div class="filter-collapse custome-container-sm d-none d-lg-flex flex-column">
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
                type="button" data-bs-toggle="collapse" data-bs-target="#collapse-color" aria-expanded="true"
                aria-controls="collapse-color">Color
            </button>
            <div class="collapse show multi-collapse" id="collapse-color">
                <div class="d-flex gap-2 flex-wrap pt-2">
                    <?php
                    foreach ($listColorCat as $term) {
                        $color = get_field('color', $term);
                    ?>
                        <div class="form-check text-center w-25 ps-0">
                            <input class="form-check-input visually-hidden" type="checkbox" name="colorCat"
                                <?php echo in_array($term->term_id, $color_ids) ? 'checked' : '' ?>
                                value="<?php echo $term->term_id; ?>" id="check-<?php echo $term->term_id; ?>">
                            <label class="text-20 gray-subtext text-center form-check-label color-filter"
                                for="check-<?php echo $term->term_id; ?>"
                                onclick="handleUpdateSearchParams({ color: <?php echo $term->term_id; ?> }, false, true)">
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
            type="button" data-bs-toggle="collapse" data-bs-target="#collapse-price" aria-expanded="true"
            aria-controls="collapse-price">Price
        </button>
        <div class="collapse show multi-collapse" id="collapse-price">

            <div class="filter-slide-wrap pt-2">
                <div class="filter-slide price-filter-slide d-flex gap-2">
                    <div class="price-filter-min">
                        <input class="form-control" value="<?php echo $minPrice; ?>" type="number" name="price_min"
                            id="minPrice">
                        <label class="form-label" for="min-price">Min</label>
                    </div>

                    <span class="price-filter-to pt-2">to</span>

                    <div class="price-filter-max">
                        <input class="form-control" value="<?php echo $maxPrice; ?>" type="number" name="price_max"
                            id="maxPrice">
                        <label class="form-label" for="max-price">Max</label>
                    </div>

                </div>
                <div class="text-center">
                    <input type="button" value="Apply filter" id="priceFilter"
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
                type="button" data-bs-toggle="collapse" data-bs-target="#collapse-brand" aria-expanded="true"
                aria-controls="collapse-brand">Brand
            </button>

            <div class="collapse show multi-collapse" id="collapse-brand">
                <div class="pt-2">
                    <?php
                    foreach ($listBrandCat as $term) {
                    ?>
                        <div class="form-check">
                            <input <?php echo in_array($term->term_id, $brand_ids) ? 'checked' : '' ?> class="form-check-input"
                                type="checkbox" value="<?php echo $term->term_id; ?>" id="check-<?php echo $term->term_id; ?>">
                            <label class="text-20 gray-subtext form-check-label" for="check-<?php echo $term->term_id; ?>"
                                onclick="handleUpdateSearchParams({ brand: <?php echo $term->term_id; ?> }, false, true)">
                                <?php echo $term->name; ?>
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
                type="button" data-bs-toggle="collapse" data-bs-target="#collapse-category" aria-expanded="true"
                aria-controls="collapse-category">Category
            </button>
            <div class="collapse show multi-collapse" id="collapse-category">
                <div class="pt-2">
                    <?php
                    foreach ($listCategoryCat as $term) {
                    ?>
                        <div class="form-check">
                            <input <?php echo in_array($term->term_id, $cat_ids) ? 'checked' : '' ?> class="form-check-input"
                                type="checkbox" value="<?php echo $term->term_id; ?>" id="check-<?php echo $term->term_id; ?>">
                            <label class="text-20 gray-subtext form-check-label" for="check-<?php echo $term->term_id; ?>"
                                onclick="handleUpdateSearchParams({ product_cat: <?php echo $term->term_id; ?> }, false, true)">
                                <?php echo $term->name; ?>
                            </label>
                        </div>
                    <?php
                    }
                    ?>
                </div>
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
                type="button" data-bs-toggle="collapse" data-bs-target="#collapse-special" aria-expanded="true"
                aria-controls="collapse-special">Special Offers
            </button>
            <div class="collapse show multi-collapse" id="collapse-special">
                <div class="pt-2">
                    <?php
                    foreach ($listSpecCat as $term) {
                    ?>
                        <div class="form-check">
                            <input <?php echo in_array($term->term_id, $spec_ids) ? 'checked' : '' ?> class="form-check-input"
                                type="checkbox" value="" id="check-<?php echo $term->term_id; ?>">
                            <label class="text-20 gray-subtext form-check-label" for="check-<?php echo $term->term_id; ?>"
                                onclick="handleUpdateSearchParams({ spec: <?php echo $term->term_id; ?> }, false, true)">
                                <?php echo $term->name; ?>
                            </label>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    <?php } ?>
</div>