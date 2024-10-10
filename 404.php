<?php

get_header();
?>
<section id="error">
    <div class="container text-center">
        <h1>404</h1>
        <p class="fs-25">Oops! We can't find the page you're looking for.</p>
        <div class="error_bottom mt-5">
            <a href="<?php echo get_home_url() ?>" class="color-yellow bg-main button-main btn-hover">
                Back home </a>
        </div>
    </div>
</section>
<?php get_footer() ?>