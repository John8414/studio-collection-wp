<?php
get_header();
$cats  = get_the_category();
?>
<section class="bg-img">
    <div class="custome-container py-5">
        <div class="row">
            <div class="col-12">
                <div class="position-relative carousel-height w-100">
                    <?php if (get_the_post_thumbnail_url()) : ?>
                        <?php the_post_thumbnail(); ?>
                    <?php else : ?>
                        <img loading=“lazy” src="<?php echo THEME_URL . '/images/banner-1.png' ?>" alt="no image">
                    <?php endif; ?>
                    <div class="overlay-30"></div>
                    <div class="z-3 position-absolute bottom-0 p-20">
                        <h1 class="text-60 fw-bold text-white"><?php the_title() ?></h1>
                        <p class="text-20 white-regular"><?php echo get_the_excerpt() ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="single-page" class="blog-page">
    <div class="custome-container py-5">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between">
                    <div class="d-flex align-items-center  flex-wrap">
                        <p class="it-date mb-0">
                            <?php echo get_the_date("d, M Y"); ?>
                        </p>
                        <span class="px-2"><?php echo $cats ? '|' : null; ?></span>
                        <div class="position-relative zindex">
                            <?php
                            $i = 1;
                            foreach ($cats as $cat) {
                                echo $i > 1 ? ", " : null;
                            ?>
                                <a href="<?php echo get_category_link($cat->term_id) ?>"
                                    class="d-inline-block black-neutral text-decoration-none">
                                    <?php echo $cat->name; ?>
                                </a>
                            <?php $i++;
                            } ?>
                        </div>
                    </div>
                    <ul class="social-share d-flex list-unstyled mb-0 p-0">
                        <li>
                            <a class="d-inline-block ms-2 mr-2"
                                href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"
                                target="_blank">
                                <img width="100%" src="<?php echo THEME_URL . '/images/facebook.svg'; ?>" alt="Facebook"
                                    title="Facebook ">
                            </a>
                        </li>
                        <li>
                            <a class="d-inline-block ms-2 mr-2"
                                href="https://twitter.com/share?text=<?php echo get_the_title(); ?>&url=<?php the_permalink(); ?>"
                                target="_blank">
                                <img width="100%" src="<?php echo THEME_URL . '/images/twitter.svg'; ?>" alt="Twitter"
                                    title="Twitter">
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="content col-12 pb-5">
                <?php while (have_posts()) : the_post();
                    the_content();
                endwhile; ?>
            </div>
        </div>
    </div>
</section>


<?php
get_template_part('sections/news-letter-main');
get_footer();
?>