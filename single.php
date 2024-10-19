<?php
get_header();

?>
<section class=" mb-5 mt-4">
    <div class="container">
        <h1 class="text-uppercase text-center title-after"><?php the_title() ?></h1>
    </div>
</section>
<section id="single-page" class="blog-page content-outer position-relative overflow-hidden pt-5 pb-5">

    <div class="custome-container">
        <div class="row">
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