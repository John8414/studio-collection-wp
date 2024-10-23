<div class="d-lg-flex align-items-center gap-3">
    <?php
    $args = array(
        'taxonomy' => 'product-category',
        'parent' => 0,
        'hide_empty' => false,
    );

    $categories = get_terms($args);

    if (!empty($categories) && !is_wp_error($categories)) {
        $defaultImage = get_field('image_default', 'option');
        foreach ($categories as $category) {
            $image = get_field('image', $category);
            $avatar = $image['avatar'];
            $parent_link = get_term_link($category);
            ?>
            <div class="custome-container-sm flex-grow-1">
                <div class="img-scale">
                    <img loading=“lazy” src="<?php echo $avatar['url'] ? $avatar['url'] : $defaultImage['url'] ?>"
                        alt="<?php echo $category->name; ?>">
                </div>
                <div class="bottom-line-full w-fit pt-2">
                    <a class="text-32 black-neutral text-decoration-none w-fit" href="<?php echo $parent_link; ?>">
                        <?php echo $category->name; ?>
                    </a>
                </div>
            </div>
            <?php
        }
    }
    ?>
</div>