<?php

get_header();
$category = get_queried_object();

?>
<div class="custome-container">
    <!-- Breadcrumd -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb text-uppercase">
            <li class="text-14 gray-subtext breadcrumb-item">
                <a class="gray-subtext text-decoration-none" href="<?php echo home_url(); ?>">Home</a>
            </li>

            <?php
            if (is_category()) {


                if ($category->parent != 0) {
                    $parent_categories = get_ancestors($category->term_id, 'category');
                    $parent_categories = array_reverse($parent_categories);

                    foreach ($parent_categories as $parent_id) {
                        $parent = get_category($parent_id);
                        $parent_link = get_category_link($parent_id);

                        echo '<li class="text-14 gray-subtext breadcrumb-item">';
                        echo '<a class="gray-subtext text-decoration-none" href="' . esc_url($parent_link) . '">' . esc_html($parent->name) . '</a>';
                        echo '</li>';
                    }
                }

                echo '<li class="text-14 gray-subtext breadcrumb-item active" aria-current="page">' . esc_html($category->name) . '</li>';
            }
            ?>
        </ol>


    </nav>
    <div class="pb-5">
        <h2 class="text-60 fw-normal text-left black-neutral pb-2">
            <?php echo $category->name; ?>
        </h2>
    </div>
    <div class="gallery">
        <?php
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => -1, // Lấy tất cả các bài viết
            'category__in' => $category->term_id, // Lấy các bài viết thuộc danh mục này
        );

        $query = new WP_Query($args);

        if ($query->have_posts()) {

            while ($query->have_posts()) {
                $query->the_post(); ?>
        <div class="gallery-item d-flex flex-column gap-3">
            <div class="">
                <?php echo get_the_post_thumbnail() ?>
            </div>
            <div>
                <p class="text-32 black-neutral"><?php echo get_the_title(); ?></p>
                <div class="gray-subtext text-20">
                    <?php the_excerpt() ?>
                </div>
            </div>

            <div class="bottom-line-full w-fit">
                <a class="text-20 black-neutral text-decoration-none w-fit" href="<?php the_permalink() ?>">READ
                    DETAIL</a>
            </div>
        </div>
        <?php
            }
        } else {
            echo 'Không có bài viết nào trong danh mục này.';
        }

        wp_reset_postdata(); // Khôi phục dữ liệu gốc

        ?>


    </div>
</div>

<?php
get_template_part('sections/news-letter-main');
get_footer();
?>