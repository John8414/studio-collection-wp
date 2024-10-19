<div class="contact-section">
    <div class="contact-bg">
        <img loading=“lazy” src="<?php echo THEME_URL . '/images/owl.svg' ?> " alt="">
    </div>
    <!-- section title -->
    <div class="contact-cation custome-container py-0">
        <?php echo do_shortcode('[gravityform id="4" title="true" description="true" ajax="true"] '); ?>
    </div>
    <div class="text-16 text-center white-regular mt-auto">
        <?php echo get_field('terms_and_conditions', 'option'); ?>
    </div>
</div>