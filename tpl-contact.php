<?php

/**
 * Template Name: Contact
 */

get_header();
?>
<div class="custome-container">
    <!-- Breadcrumd -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="text-14 gray-subtext breadcrumb-item"><a class="gray-subtext text-decoration-none"
                    href="<?php echo home_url('/') ?>">HOME</a>
            </li>
            <li class="text-14 gray-subtext breadcrumb-item active" aria-current="page">CONTACT</li>
        </ol>
    </nav>

    <!-- section title -->
    <div>
        <h2 class="text-60 fw-normal black-neutral pb-2">
            Contact Us
        </h2>
    </div>
    <div class="d-md-flex justify-content-between gap-5 custome-container-sm w-fit">
        <div class="d-flex flex-column gap-3 w-628">
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

        <div class="d-flex flex-column gap-3 w-628 p-4 contact-form">
            <?php echo do_shortcode('[gravityform id="1" title="true" description="true" ajax="true"] '); ?>
        </div>
    </div>
</div>


<div class="custome-container">
    <h3 class="text-32 black-neutral bottom-line-full pb-2">
        Order Inquiries
    </h3>
    <div class="custome-container-sm d-flex flex-column gap-2">
        <p class="text-20 gray-subtext">For questions about existing orders or general assistance, please contact our
            Client
            Care team at
            Quynh@studiocollection.asia. To place an order or inquire about a product, please reach out to our Sales
            Team at
            Edgars@studiocollection.asia. You may also visit our website to track your order.
            We aim to respond within 2 business days.</p>
        <div>
            <p class="text-20 gray-subtext">Office Hours:</p>
            <p class="text-20 black-neutral">
                <span class="fw-bold">
                    Monday – Friday:
                </span>
                9am – 6pm
            </p>
        </div>
        <div>
            <p class="text-20 gray-subtext">Address:</p>
            <p class="text-20 gray-subtext">Connexion, Ko Pich Street, Phum 14, Sangkat Tonle Bassac, Khan Chamkarmon,
                Phnom Penh, Cambodia</p>
        </div>
    </div>
    <h3 class="text-32 black-neutral bottom-line-full pb-2">
        Catalog and Email Opt-Out Policy
    </h3>
    <div class="custome-container-sm d-flex flex-column gap-2">
        <p class="text-20 gray-subtext">If you no longer wish to receive our catalog or are receiving duplicate copies,
            please complete the Catalog Opt-Out form [here].
            To unsubscribe from our newsletter, simply click the unsubscribe link found at the bottom of each email.
            Please
            note that opting not to share requested information may limit our ability to offer personalized products or
            services designed for you.
        </p>
    </div>
    <h3 class="text-32 black-neutral bottom-line-full pb-2">
        Catalog and Email Opt-Out Policy
    </h3>
    <div class="custome-container-sm d-flex flex-column gap-2">
        <p class="text-20 gray-subtext">If you no longer wish to receive our catalog or are receiving duplicate copies,
            please complete the Catalog Opt-Out form [here].
            To unsubscribe from our newsletter, simply click the unsubscribe link found at the bottom of each email.
            Please
            note that opting not to share requested information may limit our ability to offer personalized products or
            services designed for you.
        </p>
    </div>
</div>
<!-- slider -->
<div class="custome-container">
    <div class="custome-container-sm">
        <div class="d-flex justify-content-between">
            <h4 class="text-32 fw-bold black-neutral">More to Discover </h4>
            <div class="custom-nav">
                <button class="prev-btn black-neutral" data-slider-id="slider1">
                    <img loading=“lazy” src="<?php echo THEME_URL . '/images/arr-prev.svg' ?> " alt="">
                </button>
                <button class="next-btn black-neutral" data-slider-id="slider1">
                    <img loading=“lazy” src="<?php echo THEME_URL . '/images/arr-next.svg' ?> " alt="">
                </button>
            </div>
        </div>
    </div>
    <div class="slider-show-3 custome-container-sm" id="slider2">
        <div class="slider-item">
            <div class="custome-container-sm">
                <div class="img-scale">
                    <img loading=“lazy” src="<?php echo THEME_URL . '/images/cate.png' ?>" alt="">
                </div>
                <div class="bottom-line-full w-fit pt-2">
                    <a class="text-32 black-neutral text-decoration-none w-fit" href="#">Outlet Funiture</a>
                </div>
            </div>
        </div>

        <div class="slider-item">
            <div class="custome-container-sm">
                <div class="img-scale">
                    <img loading=“lazy” src="<?php echo THEME_URL . '/images/cate.png' ?>" alt="">
                </div>
                <div class="bottom-line-full w-fit pt-2">
                    <a class="text-32 black-neutral text-decoration-none w-fit" href="#">Outlet Funiture</a>
                </div>
            </div>
        </div>

        <div class="slider-item">
            <div class="custome-container-sm">
                <div class="img-scale">
                    <img loading=“lazy” src="<?php echo THEME_URL . '/images/cate.png' ?>" alt="">
                </div>
                <div class="bottom-line-full w-fit pt-2">
                    <a class="text-32 black-neutral text-decoration-none w-fit" href="#">Outlet Funiture</a>
                </div>
            </div>
        </div>


    </div>
</div>

<!-- slider -->
<div class="bottom-line-full"></div>

<?php
get_footer();
?>