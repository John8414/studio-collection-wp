<div class="custome-container">
    <div class="w-fit h-100">
        <a href="<?php echo get_home_url('/') ?>" class="w-fit">
            <?php
            $logoFt = get_field('logo_footer', 'option');
            if ($logoFt) {
                echo wp_get_attachment_image($logoFt['id'], 'full');
            }; ?>
        </a>
    </div>
    <div
        class="d-flex flex-column flex-lg-row gap-3 justify-content-between align-items-start pt-lg-5 custome-container-sm">
        <div class="d-flex flex-column gap-3 col-lg-4">
            <?php wp_nav_menu(['theme_location' => 'Menu_2',]); ?>
        </div>
        <div class="d-lg-flex justify-content-between gap-5 col-lg-8">
            <div class="d-flex flex-column gap-40">
                <div class="d-flex flex-column gap-2">
                    <p class="text-12 gray-neutral">Contact Us</p>
                    <?php echo get_field('contact_us', 'option'); ?>
                </div>
                <div class="d-flex gap-40">
                    <div class="d-flex flex-column gap-2">
                        <p class="text-12 gray-neutral">Location</p>
                        <p class="text-20 black-neutral"> <?php echo get_field('location', 'option'); ?></p>
                    </div>

                    <div class="d-flex flex-column gap-2">
                        <p class="text-12 gray-neutral">Email</p>
                        <?php echo get_field('email', 'option'); ?>
                    </div>
                </div>
                <div class="d-flex flex-column gap-2">
                    <p class="text-12 gray-neutral">Mo—Fr</p>
                    <p class="text-20 black-neutral">
                        <?php echo get_field('mo—fr', 'option'); ?>
                    </p>
                </div>
            </div>

        </div>
    </div>
</div>
<footer class="border-top border-secondary">
    <div class="custome-container py-3">
        <div class="d-flex justify-content-between align-items-start">
            <div class="d-flex gap-2">
                <a class="text-14 gray-subtext" href="#">Terms and Conditions</a>
                <p class="text-14 gray-subtext">© All rights reserved <?php echo date('Y'); ?> ©<a
                        class="text-14 gray-subtext" href="<?php echo home_url('/') ?>">Studio
                        Collection</a></p>
            </div>
            <div class="d-flex justify-content-between align-items-center gap-3">
                <?php $socials = get_field('socials', 'option'); ?>
                <div class="social-bg">
                    <a href="<?php echo $socials['twitter'] ?>" class="w-fit">
                        <img loading=“lazy” src="<?php echo THEME_URL . '/images/twitter.svg' ?> " alt="">
                    </a>
                </div>
                <div class="social-bg">
                    <a href="<?php echo $socials['facebook'] ?>" class="w-fit">
                        <img loading=“lazy” src="<?php echo THEME_URL . '/images/facebook.svg' ?> " alt="">
                    </a>
                </div>
                <div class="social-bg">
                    <a href="<?php echo $socials['linkedin'] ?>" class="w-fit">
                        <img loading=“lazy” src="<?php echo THEME_URL . '/images/linkedin.svg' ?> " alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Social Links -->
    <a id="backToTop" class="to-top" title="Go to top" href="#">
        <img loading=“lazy” src="<?php echo THEME_URL . '/images/to-top.svg' ?> " alt="">
    </a>
    <?php wp_footer() ?>
</footer>
</body>

</html>