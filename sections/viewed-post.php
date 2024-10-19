<?php
if (isset($_COOKIE['viewed_posts'])) {
    $viewed_posts = json_decode(stripslashes($_COOKIE['viewed_posts']), true);

    if (!empty($viewed_posts)) {
        $args = array(
            'post_type' => 'product', // Hoặc loại bài viết mà bạn đang theo dõi
            'post__in' => $viewed_posts, // Lấy những bài có ID trong danh sách đã xem
            'orderby' => 'post__in', // Đảm bảo các bài được hiển thị theo thứ tự đã xem
        );

        $query = new WP_Query($args);
        set_query_var('product_query', $query);

?>
<div class="custome-container">
    <div class="custome-container-sm">
        <div class="d-flex justify-content-between">
            <h4 class="text-32 fw-bold black-neutral">People Also Viewed</h4>
            <?php if ($query->have_posts()) : ?>
            <div class="custom-nav">
                <button class="prev-btn black-neutral" data-slider-id="slider<?php echo $term_id; ?>">
                    <img loading=“lazy” src="<?php echo THEME_URL . '/images/arr-prev.svg' ?> " alt="">
                </button>
                <button class="next-btn black-neutral" data-slider-id="slider<?php echo $term_id; ?>">
                    <img loading=“lazy” src="<?php echo THEME_URL . '/images/arr-next.svg' ?> " alt="">
                </button>
            </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="slick-slider custome-container-sm" id="slider<?php echo $term_id; ?>">
        <?php
                if ($query->have_posts()) :
                    get_template_part('sections/product-item');
                endif;
                wp_reset_postdata();
                ?>

    </div>
</div>
<?php
    }
}
?>