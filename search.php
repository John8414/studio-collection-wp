<?php
get_header();
global $wp_query;
$s = get_search_query(); ?>
<section class="page-title first-main">
    <div class="container">
        <div class="row">
            <div class="col-12 border-bottom py-5">
                <div class="page-title-content">
                    <h1 class="text-black fs-30 bold">
                        Search: <?php echo $s; ?>
                    </h1>
                    <span class="sub-title"><?php echo 'Results: ' . $wp_query->found_posts; ?></span>
                </div>
            </div>

        </div>
    </div>
</section>
<section class="blog-content pt-60 pb-60 blog-page">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <ul class="row list-none ps-0">
                    <?php
                    $args = array(
                        's' => $s
                    );
                    $the_query = new WP_Query($args);
                    if ($the_query->have_posts()) {

                        while ($the_query->have_posts()) {
                            $the_query->the_post();
                            $permalink = get_permalink($post->ID);
                            $title = get_the_title($post->ID);
                            $except = get_the_excerpt($post->ID);
                            $img = get_the_post_thumbnail($post->ID);
                    ?>

                            <div class="col-lg-4 col-6 clearfix">
                                <div class="card-product text-start flex-grow-1">
                                    <a href="<?php echo $permalink; ?>" class="text-decoration-none">
                                        <div class="img-scale ratio ratio-1x1">
                                            <?php echo $img; ?>
                                        </div>

                                        <p class="text-20 gray-tertiary pb-2 clamped-text-1 pt-20"><?php echo $title; ?></p>
                                        <p class="text-20 gray-neutral pb-20 clamped-text-1">
                                            <?php echo $except; ?>
                                        </p>

                                    </a>
                                </div>
                            </div>
                        <?php
                        } ?>
                    <?php
                    } else {
                    ?>
                        <p class="bold fs-20">No results found</p>
                        <p>We are sorry, but no content matches your search query. Please try again with different keywords.
                        </p>
                    <?php } ?>
                </ul>
            </div>

        </div>
    </div>
</section>

<?php
get_template_part('sections/news-letter-main');
get_footer()
?>