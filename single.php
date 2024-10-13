<?php
get_header();
?>
<div class="custome-container">

    <!-- Breadcrumd -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="text-14 gray-subtext breadcrumb-item"><a class="gray-subtext text-decoration-none"
                    href="#">FURNITURE</a>
            </li>
            <li class="text-14 gray-subtext breadcrumb-item"><a class="gray-subtext text-decoration-none"
                    href="#">OUTLET
                    FUNITURE</a>
            </li>
            <li class="text-14 gray-subtext breadcrumb-item active" aria-current="page">SOFA</li>
        </ol>
    </nav>

    <!-- product detail  -->
    <div class="d-md-flex d-block gap-3 align-items-start justify-content-between">
        <div class="product-picker">
            <div class="d-md-flex d-block image-picker gap-3">
                <div class="d-flex flex-column gap-3 thumbnails">
                    <div class="item-border thumbnail ratio ratio-1x1">
                        <img loading=“lazy” src="<?php echo THEME_URL . '/images/sofa-1.png' ?>" alt="">
                    </div>
                    <div class="item-border thumbnail ratio ratio-1x1">
                        <img loading=“lazy” src="<?php echo THEME_URL . '/images/sofa-2.png' ?>" alt="">
                    </div>
                    <div class="item-border thumbnail ratio ratio-1x1">
                        <img loading=“lazy” src="<?php echo THEME_URL . '/images/sofa-3.png' ?>" alt="">
                    </div>
                </div>

                <div class="img-scale">
                    <img class="main-image" src="<?php echo THEME_URL . '/images/sofa-4.png' ?>" alt="">
                </div>
            </div>
        </div>
        <div class="product-info">
            <div>
                <div class="d-flex justify-content-between align-items-start">
                    <h3 class="text-32 black-neutral">Muse Corner Sectional</h3>
                    <div>
                        <img loading=“lazy” src="<?php echo THEME_URL . '/images/heart.svg' ?>" alt="">
                    </div>
                </div>
                <p class="text-20 gray-tertiary">Exclusive to Studio Collection</p>
            </div>
            <div class="d-flex flex-column gap-3 align-items-start">
                <div class="d-flex align-items-end justify-content-start gap-3">
                    <p class="text-20 black-neutral">$500.00</p>
                    <p class="text-32 red-primary">$489.99</p>
                </div>
                <p class="text-20 gray-tertiary">Scott 2 Seater Sofa</p>
                <p class="text-16 gray-subtext">N00-102</p>

                <div class="d-flex align-items-center justify-content-start gap-2">
                    <p class="text-16 gray-subtext">
                        <span>3 </span>colors
                    </p>
                    <div class="d-flex align-items-center justify-content-center gap-2">
                        <button class="color-tags"></button>
                        <button class="color-tags"></button>
                        <button class="color-tags"></button>
                    </div>
                </div>
            </div>
            <div class="d-flex flex-column gap-2">
                <p class="text-20 black-neutral pb-2">Reasons to buy</p>
                <div class="d-flex align-items-center justify-content-start gap-3">
                    <p class="text-20 gray-tertiary">Available to ship in:<span>5 weeks </span></p>
                    <div class="tooltip-container">
                        <img loading=“lazy” src="<?php echo THEME_URL . '/images/product-tooltip.svg' ?>" alt="">
                        <div class="tooltip text-20 gray-tertiary">Items will be shipped within 5 weeks from the date of
                            your
                            order. Need more details?
                            Contact us!</div>
                    </div>
                </div>
                <p class="text-20 gray-tertiary">Save over on<span> $30 </span>shipping in Cambodia</p>
            </div>
            <div class="product-info-cta">
                <h3 class="text-32 black-neutral pb-2">
                    Contact with us
                </h3>
                <p class="text-20 gray-subtext">
                    Leave your details, and we’ll reach out to assist with your purchase
                </p>
                <input placeholder="Email Address" class="text-16 p-2" type="text">
                <button class="mx-auto text-20 black-neutral w-fit bottom-line-full">SEND YOUR EMAIL</button>
            </div>
            <div>
                <h2 class="text-32 black-neutral bottom-line-full pb-2">
                    Product Highlights
                </h2>

                <!-- collapse detail -->
                <button onclick="toggleImage(this)" class="px-0 bg-transparent w-100 text-20 fw-bold black-neutral d-flex justify-content-between align-items-center gap-1 custome-container-sm
        type=" button" data-bs-toggle="collapse" data-bs-target="#collapse-detail" aria-expanded="false"
                    aria-controls="collapse-detail">Detail
                    <div>
                        <img loading=“lazy” src="<?php echo THEME_URL . '/images/plus.svg' ?>" alt="">
                    </div>
                </button>

                <div class="collapse multi-collapse" id="collapse-detail">
                    <div class="d-flex flex-column gap-3 bottom-line-full pb-3">
                        <p class="text-20 gray-subtext">Minimalist walnut wood sideboard by Studio Collection is crafted
                            to
                            showcase
                            the natural beauty of the
                            wood. The sleek design contrasts sharp edges with gently tapered legs that curve gracefully
                            at the base.
                            Topped with a polished marble slab for a refined finish featuring natural veining. Studio
                            Collection
                            exclusive.</p>
                        <p class="text-20 gray-subtext">Raven 72" Walnut Wood Sideboard 72"Wx16"Dx30"H Designed by
                            <span class="fw-bold">Studio Collection</span>
                        </p>
                        <div class="list-dot">
                            <p class="text-20 gray-subtext">Solid walnut wood frame sustainably sourced</p>
                            <p class="text-20 gray-subtext">Walnut veneer</p>
                            <p class="text-20 gray-subtext">Polished marble top</p>
                            <p class="text-20 gray-subtext">Adjustable interior compartments</p>
                            <p class="text-20 gray-subtext">Each marble slab features unique veining for a one-of-a-kind
                                look</p>
                        </div>
                    </div>
                </div>
                <!-- collapse Detail -->

                <!-- collapse size -->
                <button onclick="toggleImage(this)" class="px-0 bg-transparent w-100 text-20 fw-bold black-neutral d-flex justify-content-between align-items-center gap-1 custome-container-sm
      type=" button" data-bs-toggle="collapse" data-bs-target="#collapse-size" aria-expanded="false"
                    aria-controls="collapse-size">Size
                    <div>
                        <img loading=“lazy” src="<?php echo THEME_URL . '/images/plus.svg' ?>" alt="">
                    </div>
                </button>
                <div class="collapse multi-collapse" id="collapse-size">
                    <div class="d-flex flex-column gap-3 bottom-line-full pb-3">
                        <div>
                            <img loading=“lazy” src="<?php echo THEME_URL . '/images/size-img.png' ?>" alt="">
                        </div>
                        <div>
                            <p class="text-20 gray-subtext">Overall Dimensions</p>
                            <p class="text-20 gray-subtext">Width:80"</p>
                            <p class="text-20 gray-subtext">Depth:80"</p>
                            <p class="text-20 gray-subtext">Height:80"</p>
                        </div>
                        <div>
                            <p class="text-20 gray-subtext">Overall Dimensions</p>
                            <p class="text-20 gray-subtext">Width:80"</p>
                            <p class="text-20 gray-subtext">Depth:80"</p>
                            <p class="text-20 gray-subtext">Height:80"</p>
                        </div>
                    </div>
                </div>
                <!-- collapse size -->


                <!-- collapse Warrant -->
                <button onclick="toggleImage(this)" class="px-0 bg-transparent w-100 text-20 fw-bold black-neutral d-flex justify-content-between align-items-center gap-1 custome-container-sm
      type=" button" data-bs-toggle="collapse" data-bs-target="#collapse-warrant" aria-expanded="false"
                    aria-controls="collapse-warrant">Warrant
                    <div>
                        <img loading=“lazy” src="<?php echo THEME_URL . '/images/plus.svg' ?>" alt="">
                    </div>
                </button>
                <div class="collapse multi-collapse" id="collapse-warrant">
                    <div class="d-flex flex-column gap-3 bottom-line-full pb-3">
                        <div>
                            <p class="text-20 gray-subtext">2-Year Warranty</p>
                            <p class="text-20 gray-subtext">Terms and conditions apply.
                                <a class="text-20 gray-subtext" href="#">Learn more</a>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- collapse Warrant -->

                <!-- collapse brand -->
                <button onclick="toggleImage(this)" class="px-0 bg-transparent w-100 text-20 fw-bold black-neutral d-flex justify-content-between align-items-center gap-1 custome-container-sm
      type=" button" data-bs-toggle="collapse" data-bs-target="#collapse-brand" aria-expanded="false"
                    aria-controls="collapse-brand">Brand
                    <div>
                        <img loading=“lazy” src="<?php echo THEME_URL . '/images/plus.svg' ?>" alt="">
                    </div>
                </button>
                <div class="collapse multi-collapse" id="collapse-brand">
                    <div class="d-flex flex-column gap-3 bottom-line-full pb-3">
                        <div>
                            <p class="text-20 gray-subtext">2-Year brandy</p>
                            <p class="text-20 gray-subtext">Terms and conditions apply.
                                <a class="text-20 gray-subtext" href="#">Learn more</a>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- collapse brand -->
            </div>

        </div>
    </div>
    <!-- product detail  -->

</div>

<div class="custome-container">
    <!-- section title -->
    <div>
        <h2 class="text-60 fw-normal black-neutral pb-2">
            Discover more
        </h2>
    </div>
    <div class="position-relative carousel-height w-100">
        <img loading=“lazy” src="<?php echo THEME_URL . '/images/carousel.jpg' ?>" alt="">
        <div class="overlay-30"></div>
    </div>
    <div class="d-lg-flex align-items-center justify-content-between gap-3">
        <div class="custome-container-sm">
            <div class="img-scale">
                <img loading=“lazy” src="<?php echo THEME_URL . '/images/outlet-furniture.png' ?>" alt="">
            </div>
            <div class="bottom-line-full w-fit pt-2">
                <a class="text-32 black-neutral text-decoration-none w-fit" href="#">Outlet Funiture</a>
            </div>
        </div>
        <div class="custome-container-sm">
            <div class="img-scale">
                <img loading=“lazy” src="<?php echo THEME_URL . '/images/outdoor-furniture.png' ?>" alt="">
            </div>
            <div class="bottom-line-full w-fit pt-2">
                <a class="text-32 black-neutral text-decoration-none w-fit" href="#">Outdoor Funiture</a>
            </div>
        </div>
        <div class="custome-container-sm">
            <div class="img-scale">
                <img loading=“lazy” src="<?php echo THEME_URL . '/images/cate.png' ?>" alt="">
            </div>
            <div class="bottom-line-full w-fit pt-2">
                <a class="text-32 black-neutral text-decoration-none w-fit" href="#">Project Funiture</a>
            </div>
        </div>
    </div>
</div>

<!-- slider -->
<div class="custome-container">
    <div class="custome-container-sm">
        <div class="d-flex justify-content-between">
            <h4 class="text-32 fw-bold black-neutral">You may also like</h4>
            <div class="custom-nav">
                <button class="prev-btn black-neutral" data-slider-id="slider9">
                    <img loading=“lazy” src="<?php echo THEME_URL . '/images/arr-prev.svg' ?>" alt="">
                </button>
                <button class="next-btn black-neutral" data-slider-id="slider9">
                    <img loading=“lazy” src="<?php echo THEME_URL . '/images/arr-next.svg' ?>" alt="">
                </button>
            </div>
        </div>
    </div>
    <div class="slick-slider custome-container-sm" id="slider9">
        <div class="slider-item text-start">
            <a href="#" class="text-decoration-none">
                <div class="img-scale">
                    <img loading=“lazy” src="<?php echo THEME_URL . '/images/sofa-1.png' ?>" alt="">
                </div>
                <div class="w-100 position-relative pt-20 pb-2">
                    <p class="text-20 fw-medium text-black">$500.00</p>
                    <button class="fav-btn"><img loading=“lazy” src="<?php echo THEME_URL . '/images/heart.svg' ?>"
                            alt=""></button>
                </div>
                <p class="text-20 gray-tertiary pb-2">Scott 2 Seater Sofa</p>
                <p class="text-20 gray-neutral pb-20">N00-102</p>
                <p class="fw-medium text-20 gray-neutral">3 colors</p>
            </a>
        </div>
    </div>
</div>
<!-- slider -->

<!-- slider -->
<div class="custome-container">
    <div class="custome-container-sm">
        <div class="d-flex justify-content-between">
            <h4 class="text-32 fw-bold black-neutral">People Also Viewed</h4>
            <div class="custom-nav">
                <button class="prev-btn black-neutral" data-slider-id="slider10">
                    <img loading=“lazy” src="<?php echo THEME_URL . '/images/arr-prev.svg' ?>" alt="">
                </button>
                <button class="next-btn black-neutral" data-slider-id="slider10">
                    <img loading=“lazy” src="<?php echo THEME_URL . '/images/arr-next.svg' ?>" alt="">
                </button>
            </div>
        </div>
    </div>
    <div class="slick-slider custome-container-sm" id="slider10">
        <div class="slider-item text-start">
            <a href="#" class="text-decoration-none">
                <div class="img-scale">
                    <img loading=“lazy” src="<?php echo THEME_URL . '/images/sofa-1.png' ?>" alt="">
                </div>
                <div class="w-100 position-relative pt-20 pb-2">
                    <p class="text-20 fw-medium text-black">$500.00</p>
                    <button class="fav-btn"><img loading=“lazy” src="<?php echo THEME_URL . '/images/heart.svg' ?>"
                            alt=""></button>
                </div>
                <p class="text-20 gray-tertiary pb-2">Scott 2 Seater Sofa</p>
                <p class="text-20 gray-neutral pb-20">N00-102</p>
                <p class="fw-medium text-20 gray-neutral">3 colors</p>
            </a>
        </div>
    </div>

</div>
<!-- slider -->
<!-- slider -->
<div class="custome-container">
    <div class="custome-container-sm">
        <div class="d-flex justify-content-between">
            <h4 class="text-32 fw-bold black-neutral">More to Discover</h4>
            <div class="custom-nav">
                <button class="prev-btn black-neutral" data-slider-id="slider11">
                    <img loading=“lazy” src="<?php echo THEME_URL . '/images/arr-prev.svg' ?>" alt="">
                </button>
                <button class="next-btn black-neutral" data-slider-id="slider11">
                    <img loading=“lazy” src="<?php echo THEME_URL . '/images/arr-next.svg' ?>" alt="">
                </button>
            </div>
        </div>
    </div>
    <div class="slider-show-3 custome-container-sm" id="slider11">
        <div class="slider-item">
            <div class="custome-container-sm">
                <div class="img-scale">
                    <img loading=“lazy” src="<?php echo THEME_URL . '/images/outlet-furniture.png' ?>" alt="">
                </div>
                <div class="bottom-line-full w-fit pt-2">
                    <a class="text-32 black-neutral text-decoration-none w-fit" href="#">Outlet Funiture</a>
                </div>
            </div>
        </div>
        <div class="slider-item">
            <div class="custome-container-sm">
                <div class="img-scale">
                    <img loading=“lazy” src="<?php echo THEME_URL . '/images/outdoor-furniture.png' ?>" alt="">
                </div>
                <div class="bottom-line-full w-fit pt-2">
                    <a class="text-32 black-neutral text-decoration-none w-fit" href="#">Outdoor Funiture</a>
                </div>
            </div>
        </div>
        <div class="slider-item">
            <div class="custome-container-sm">
                <div class="img-scale">
                    <img loading=“lazy” src="<?php echo THEME_URL . '/images/cate.png' ?>" alt="">
                </div>
                <div class="bottom-line-full w-fit pt-2">
                    <a class="text-32 black-neutral text-decoration-none w-fit" href="#">Project Funiture</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- slider -->
<?php
get_template_part('sections/news-letter-main');
get_footer(); ?>