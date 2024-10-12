<div class="custome-container">
    <div class="w-fit h-100">
        <a href="#" class="w-fit">
            <img loading=“lazy” src="<?php echo THEME_URL . '/images/logo.png' ?>" alt="">
        </a>
    </div>
    <div
        class="d-flex flex-column flex-lg-row gap-3 justify-content-between align-items-start pt-lg-5 custome-container-sm">
        <div class="d-flex flex-column gap-3 col-lg-4">
            <?php wp_nav_menu(['theme_location' => 'Menu_2',]); ?>
        </div>
        <div class="d-lg-flex justify-content-between gap-5 col-lg-8">
            <div class="d-flex flex-column gap-3">
                <div class="d-flex flex-column gap-3">
                    <p class="text-12 gray-neutral">Contact Us</p>
                    <a class="text-20 black-neutral" href="tel:+85595231536">(+855) 95 231 536
                    </a>
                    <a class="text-20 black-neutral" href="tel:+85595231536">(+855) 95 231 536
                    </a>
                </div>
                <div class="d-flex flex-column gap-3">
                    <p class="text-12 gray-neutral">Location</p>
                    <p class="text-20 black-neutral">
                        Connexion, Ko Pich Street, Phum 14, Sangkat Tonle Bassac, Khan Chamkarmon, Phnom Penh, Cambodia
                    </p>
                </div>
                <div class="d-flex flex-column gap-3">
                    <p class="text-12 gray-neutral">Mo—Fr</p>
                    <p class="text-20 black-neutral">
                        9am—6pm
                    </p>
                </div>
            </div>
            <div class="d-flex flex-column gap-3 justify-content-center">
                <p class="text-12 gray-neutral">Email</p>
                <a href="mailto:Quynh@studiocollection.asia" class="text-20 black-neutral text-decoration-none">
                    Quynh@studiocollection.asia
                </a>
                <a href="mailto:Edgars@studiocollection.asia" class="text-20 black-neutral text-decoration-none">
                    Edgars@studiocollection.asia
                </a>
            </div>
        </div>
    </div>
</div>
<footer class="border-top border-secondary">
    <div class="custome-container py-3">
        <div class="d-flex justify-content-between align-items-start">
            <div class="d-flex gap-2">
                <a class="text-14 gray-subtext" href="#">Terms and Conditions</a>
                <p class="text-14 gray-subtext">© All rights reserved 2024 ©<a class="text-14 gray-subtext"
                        href="#">Studio
                        Collection</a></p>
            </div>
            <div class="d-flex justify-content-between align-items-center gap-3">
                <div class="social-bg">
                    <a href="#" class="w-fit">
                        <img loading=“lazy” src="<?php echo THEME_URL . '/images/twitter.svg' ?> " alt="">
                    </a>
                </div>
                <div class="social-bg">
                    <a href="#" class="w-fit">
                        <img loading=“lazy” src="<?php echo THEME_URL . '/images/facebook.svg' ?> " alt="">
                    </a>
                </div>
                <div class="social-bg">
                    <a href="#" class="w-fit">
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