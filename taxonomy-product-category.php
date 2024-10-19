<?php
get_header();
?>
<!-- Living Room Furniture -->
<div class="custome-container">

    <!-- Breadcrumd -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="text-14 gray-subtext breadcrumb-item"><a class="gray-subtext text-decoration-none"
                    href="#">FURNITURE</a>
            </li>
            <li class="text-14 gray-subtext breadcrumb-item active" aria-current="page">OUTLET FUNITURE</li>
        </ol>
    </nav>
    <!-- Breadcrumd -->

    <!-- section title -->
    <div class="pb-5">
        <h2 class="text-60 fw-normal text-left black-neutral pb-2">
            Living Room Furniture
        </h2>
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
<!-- Living Room Furniture -->

<!-- Product list -->
<div class="custome-container">
    <!-- Filter bar  -->
    <div class="d-flex flex-wrap align-items-center justify-content-between pb-4">
        <div class="d-flex flex-wrap align-items-center gap-2">
            <button class="text-20 black-neutral d-flex justify-content-center align-items-center gap-1">
                <div>
                    <img loading=“lazy” src="<?php echo THEME_URL . '/images/filter.svg' ?>" alt="">
                </div>
                Filter
            </button>
            <button id="reset-button" class="bottom-line-full text-20 gray-subtext">Clear filter</button>
            <div class="d-flex flex-wrap align-items-center justify-content-center gap-2">
                <button class="tag clicked text-20 gray-subtext">View All </button>
                <button class="tag text-20 gray-subtext">In Stock</button>
            </div>
        </div>
        <div class="d-flex flex-wrap align-items-center gap-2">
            <div class="d-flex justify-content-center align-items-center gap-1">
                <p class="text-20 black-neutral">678</p>
                <p class="text-20 black-neutral">Item</p>
            </div>

            <div class="dropdown">
                <button onclick="toggleImageUpDown(this)"
                    class="bg-transparent px-0 text-20 black-neutral d-flex justify-content-center align-items-center gap-1"
                    id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                    Most Relevant
                    <div>
                        <img loading=“lazy” src="<?php echo THEME_URL . '/images/arr-down-thin.svg' ?>" alt="">
                    </div>
                </button>
                <div class="dropdown-menu px-2 w-fit" aria-labelledby="dropdownMenuLink">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="option" id="option1">
                        <label class="text-20 gray-subtext form-check-label text-20 gray-subtext" for="option1">
                            Price, low to high
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="option" id="option2">
                        <label class="text-20 gray-subtext form-check-label text-20 gray-subtext" for="option2">
                            Price, high to low
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="option" id="option3">
                        <label class="text-20 gray-subtext form-check-label text-20 gray-subtext" for="option3">
                            Product name A-Z
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="option" id="option4">
                        <label class="text-20 gray-subtext form-check-label text-20 gray-subtext" for="option4">
                            Product name Z-A
                        </label>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Filter bar  -->

    <div class="d-flex gap-4">
        <!-- filter collapse -->
        <div class="">
            <div class="filter-collapse custome-container-sm d-flex flex-column gap-3">
                <p class="text-32 black-neutral filter-title">Filter</p>
                <button onclick="toggleImage(this)"
                    class="bg-transparent px-0 w-100 text-20 black-neutral d-flex justify-content-between align-items-center gap-1"
                    type="button" data-bs-toggle="collapse" data-bs-target="#collapse-color" aria-expanded="false"
                    aria-controls="collapse-color">Color
                    <div>
                        <img loading=“lazy” src="<?php echo THEME_URL . '/images/plus.svg' ?>" alt="">
                    </div>
                </button>
                <div class="collapse multi-collapse" id="collapse-color">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="check1">
                        <label class="text-20 gray-subtext form-check-label" for="check1">
                            Default checkbox
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="check2" checked>
                        <label class="text-20 gray-subtext form-check-label" for="check2">
                            Checked checkbox
                        </label>
                    </div>
                </div>
                <button onclick="toggleImage(this)"
                    class="bg-transparent px-0 w-100 text-20 black-neutral d-flex justify-content-between align-items-center gap-1"
                    type="button" data-bs-toggle="collapse" data-bs-target="#collapse-price" aria-expanded="false"
                    aria-controls="collapse-price">Price
                    <div>
                        <img loading=“lazy” src="<?php echo THEME_URL . '/images/plus.svg' ?>" alt="">
                    </div>
                </button>
                <div class="collapse multi-collapse" id="collapse-price">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="check3">
                        <label class="text-20 gray-subtext form-check-label" for="check3">
                            Default checkbox
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="check4" checked>
                        <label class="text-20 gray-subtext form-check-label" for="check4">
                            Checked checkbox
                        </label>
                    </div>
                </div>
                <button onclick="toggleImage(this)"
                    class="bg-transparent px-0 w-100 text-20 black-neutral d-flex justify-content-between align-items-center gap-1"
                    type="button" data-bs-toggle="collapse" data-bs-target="#collapse-brand" aria-expanded="false"
                    aria-controls="collapse-brand">Brand
                    <div>
                        <img loading=“lazy” src="<?php echo THEME_URL . '/images/plus.svg' ?>" alt="">
                    </div>
                </button>
                <div class="collapse multi-collapse" id="collapse-brand">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="check3">
                        <label class="text-20 gray-subtext form-check-label" for="check3">
                            Default checkbox
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="check4" checked>
                        <label class="text-20 gray-subtext form-check-label" for="check4">
                            Checked checkbox
                        </label>
                    </div>
                </div>
                <button onclick="toggleImage(this)"
                    class="bg-transparent px-0 w-100 text-20 black-neutral d-flex justify-content-between align-items-center gap-1"
                    type="button" data-bs-toggle="collapse" data-bs-target="#collapse-category" aria-expanded="false"
                    aria-controls="collapse-category">Category
                    <div>
                        <img loading=“lazy” src="<?php echo THEME_URL . '/images/plus.svg' ?>" alt="">
                    </div>
                </button>
                <div class="collapse multi-collapse" id="collapse-category">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="check3">
                        <label class="text-20 gray-subtext form-check-label" for="check3">
                            Default checkbox
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="check4" checked>
                        <label class="text-20 gray-subtext form-check-label" for="check4">
                            Checked checkbox
                        </label>
                    </div>
                </div>
                <button onclick="toggleImage(this)"
                    class="bg-transparent px-0 w-100 text-20 black-neutral d-flex justify-content-between align-items-center gap-1"
                    type="button" data-bs-toggle="collapse" data-bs-target="#collapse-special" aria-expanded="false"
                    aria-controls="collapse-special">Special Offers
                    <div>
                        <img loading=“lazy” src="<?php echo THEME_URL . '/images/plus.svg' ?>" alt="">
                    </div>
                </button>
                <div class="collapse multi-collapse" id="collapse-special">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="check3">
                        <label class="text-20 gray-subtext form-check-label" for="check3">
                            Sales
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="check4" checked>
                        <label class="text-20 gray-subtext form-check-label" for="check4">
                            New Arrivals
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="check4" checked>
                        <label class="text-20 gray-subtext form-check-label" for="check4">
                            Promote
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <!-- filter collapse -->

        <!-- list -->
        <div class="w-75 d-flex flex-wrap align-items-center justify-content-start product-list custome-container-sm">
            <!-- product item -->
            <div class="card-product">
                <a href="#" class="text-decoration-none">
                    <div class="d-flex flex-column justify-content-around align-items-start gap-2">
                        <div class="img-scale img-card-product">
                            <img loading=“lazy” src="<?php echo THEME_URL . '/images/sofa-1.png' ?>" alt="">
                        </div>
                        <div class="w-100 d-flex justify-content-between align-items-center">
                            <p class="text-20 fw-medium text-black">$500.00</p>
                            <div><img loading=“lazy” src="<?php echo THEME_URL . '/images/heart.svg' ?>" alt=""></div>
                        </div>
                        <p class="text-20 gray-tertiary">Scott 2 Seater Sofa</p>
                        <p class="text-20 gray-neutral">N00-102</p>
                        <p class="fw-medium text-20 gray-neutral">3 colors</p>
                    </div>
                </a>
            </div>
            <!-- product item -->
            <div class="card-product">
                <a href="#" class="text-decoration-none">
                    <div class="d-flex flex-column justify-content-around align-items-start gap-2">
                        <div class="img-scale img-card-product">
                            <img loading=“lazy” src="<?php echo THEME_URL . '/images/sofa-2.png' ?>" alt="">
                        </div>
                        <div class="w-100 d-flex justify-content-between align-items-center">
                            <p class="text-20 fw-medium text-black">$500.00</p>
                            <div><img loading=“lazy” src="<?php echo THEME_URL . '/images/heart.svg' ?>" alt=""></div>
                        </div>
                        <p class="text-20 gray-tertiary">Scott 2 Seater Sofa</p>
                        <p class="text-20 gray-neutral">N00-102</p>
                        <p class="fw-medium text-20 gray-neutral">3 colors</p>
                    </div>
                </a>
            </div>
            <!-- product item -->
            <div class="card-product">
                <a href="#" class="text-decoration-none">
                    <div class="d-flex flex-column justify-content-around align-items-start gap-2">
                        <div class="img-scale img-card-product">
                            <img loading=“lazy” src="<?php echo THEME_URL . '/images/sofa-3.png' ?>" alt="">
                        </div>
                        <div class="w-100 d-flex justify-content-between align-items-center">
                            <p class="text-20 fw-medium text-black">$500.00</p>
                            <div><img loading=“lazy” src="<?php echo THEME_URL . '/images/heart.svg' ?>" alt=""></div>
                        </div>
                        <p class="text-20 gray-tertiary">Scott 2 Seater Sofa</p>
                        <p class="text-20 gray-neutral">N00-102</p>
                        <p class="fw-medium text-20 gray-neutral">3 colors</p>
                    </div>
                </a>
            </div>
            <!-- product item -->
            <div class="card-product">
                <a href="#" class="text-decoration-none">
                    <div class="d-flex flex-column justify-content-around align-items-start gap-2">
                        <div class="img-scale img-card-product">
                            <img loading=“lazy” src="<?php echo THEME_URL . '/images/sofa-4.png' ?>" alt="">
                        </div>
                        <div class="w-100 d-flex justify-content-between align-items-center">
                            <p class="text-20 fw-medium text-black">$500.00</p>
                            <div><img loading=“lazy” src="<?php echo THEME_URL . '/images/heart.svg' ?>" alt=""></div>
                        </div>
                        <p class="text-20 gray-tertiary">Scott 2 Seater Sofa</p>
                        <p class="text-20 gray-neutral">N00-102</p>
                        <p class="fw-medium text-20 gray-neutral">3 colors</p>
                    </div>
                </a>
            </div>
            <!-- CTA card -->
            <div class="card-cta-bg position-relative">
                <img loading=“lazy” src="<?php echo THEME_URL . '/images/card-cta-bg.png' ?>" alt="">
                <div class="card-cta">
                    <div class="text-center">
                        <p class="text-32 text-white">Stay in the loop</p>
                        <p class="text-16 text-white">Sign up to be the first to hear about new arrivals, offers and
                            events.Enter
                            your email address below to opt in to email marketing.
                        </p>
                    </div>
                    <div class="w-fit pt-2">
                        <a class="text-24 text-white w-fit" href="#">SEND YOUR EMAIL</a>
                    </div>
                </div>
            </div>
            <!-- CTA card -->
            <!-- product item -->
            <div class="card-product">
                <a href="#" class="text-decoration-none">
                    <div class="d-flex flex-column justify-content-around align-items-start gap-2">
                        <div class="img-scale img-card-product">
                            <img loading=“lazy” src="<?php echo THEME_URL . '/images/sofa-4.png' ?>" alt="">
                        </div>
                        <div class="w-100 d-flex justify-content-between align-items-center">
                            <p class="text-20 fw-medium text-black">$500.00</p>
                            <div><img loading=“lazy” src="<?php echo THEME_URL . '/images/heart.svg' ?>" alt=""></div>
                        </div>
                        <p class="text-20 gray-tertiary">Scott 2 Seater Sofa</p>
                        <p class="text-20 gray-neutral">N00-102</p>
                        <p class="fw-medium text-20 gray-neutral">3 colors</p>
                    </div>
                </a>
            </div>
            <!-- product item -->
            <div class="card-product">
                <a href="#" class="text-decoration-none">
                    <div class="d-flex flex-column justify-content-around align-items-start gap-2">
                        <div class="img-scale img-card-product">
                            <img loading=“lazy” src="<?php echo THEME_URL . '/images/sofa-1.png' ?>" alt="">
                        </div>
                        <div class="w-100 d-flex justify-content-between align-items-center">
                            <p class="text-20 fw-medium text-black">$500.00</p>
                            <div><img loading=“lazy” src="<?php echo THEME_URL . '/images/heart.svg' ?>" alt=""></div>
                        </div>
                        <p class="text-20 gray-tertiary">Scott 2 Seater Sofa</p>
                        <p class="text-20 gray-neutral">N00-102</p>
                        <p class="fw-medium text-20 gray-neutral">3 colors</p>
                    </div>
                </a>
            </div>
            <!-- product item -->
            <div class="card-product">
                <a href="#" class="text-decoration-none">
                    <div class="d-flex flex-column justify-content-around align-items-start gap-2">
                        <div class="img-scale img-card-product">
                            <img loading=“lazy” src="<?php echo THEME_URL . '/images/sofa-2.png' ?>" alt="">
                        </div>
                        <div class="w-100 d-flex justify-content-between align-items-center">
                            <p class="text-20 fw-medium text-black">$500.00</p>
                            <div><img loading=“lazy” src="<?php echo THEME_URL . '/images/heart.svg' ?>" alt=""></div>
                        </div>
                        <p class="text-20 gray-tertiary">Scott 2 Seater Sofa</p>
                        <p class="text-20 gray-neutral">N00-102</p>
                        <p class="fw-medium text-20 gray-neutral">3 colors</p>
                    </div>
                </a>
            </div>
            <!-- product item -->
            <div class="card-product">
                <a href="#" class="text-decoration-none">
                    <div class="d-flex flex-column justify-content-around align-items-start gap-2">
                        <div class="img-scale img-card-product">
                            <img loading=“lazy” src="<?php echo THEME_URL . '/images/sofa-3.png' ?>" alt="">
                        </div>
                        <div class="w-100 d-flex justify-content-between align-items-center">
                            <p class="text-20 fw-medium text-black">$500.00</p>
                            <div><img loading=“lazy” src="<?php echo THEME_URL . '/images/heart.svg' ?>" alt=""></div>
                        </div>
                        <p class="text-20 gray-tertiary">Scott 2 Seater Sofa</p>
                        <p class="text-20 gray-neutral">N00-102</p>
                        <p class="fw-medium text-20 gray-neutral">3 colors</p>
                    </div>
                </a>
            </div>
            <!-- product item -->
            <div class="card-product">
                <a href="#" class="text-decoration-none">
                    <div class="d-flex flex-column justify-content-around align-items-start gap-2">
                        <div class="img-scale img-card-product">
                            <img loading=“lazy” src="<?php echo THEME_URL . '/images/sofa-1.png' ?>" alt="">
                        </div>
                        <div class="w-100 d-flex justify-content-between align-items-center">
                            <p class="text-20 fw-medium text-black">$500.00</p>
                            <div><img loading=“lazy” src="<?php echo THEME_URL . '/images/heart.svg' ?>" alt=""></div>
                        </div>
                        <p class="text-20 gray-tertiary">Scott 2 Seater Sofa</p>
                        <p class="text-20 gray-neutral">N00-102</p>
                        <p class="fw-medium text-20 gray-neutral">3 colors</p>
                    </div>
                </a>
            </div>
            <!-- product item -->
            <div class="card-product">
                <a href="#" class="text-decoration-none">
                    <div class="d-flex flex-column justify-content-around align-items-start gap-2">
                        <div class="img-scale img-card-product">
                            <img loading=“lazy” src="<?php echo THEME_URL . '/images/sofa-4.png' ?>" alt="">
                        </div>
                        <div class="w-100 d-flex justify-content-between align-items-center">
                            <p class="text-20 fw-medium text-black">$500.00</p>
                            <div><img loading=“lazy” src="<?php echo THEME_URL . '/images/heart.svg' ?>" alt=""></div>
                        </div>
                        <p class="text-20 gray-tertiary">Scott 2 Seater Sofa</p>
                        <p class="text-20 gray-neutral">N00-102</p>
                        <p class="fw-medium text-20 gray-neutral">3 colors</p>
                    </div>
                </a>
            </div>
            <!-- product item -->
            <div class="card-product">
                <a href="#" class="text-decoration-none">
                    <div class="d-flex flex-column justify-content-around align-items-start gap-2">
                        <div class="img-scale img-card-product">
                            <img loading=“lazy” src="<?php echo THEME_URL . '/images/sofa-3.png' ?>" alt="">
                        </div>
                        <div class="w-100 d-flex justify-content-between align-items-center">
                            <p class="text-20 fw-medium text-black">$500.00</p>
                            <div><img loading=“lazy” src="<?php echo THEME_URL . '/images/heart.svg' ?>" alt=""></div>
                        </div>
                        <p class="text-20 gray-tertiary">Scott 2 Seater Sofa</p>
                        <p class="text-20 gray-neutral">N00-102</p>
                        <p class="fw-medium text-20 gray-neutral">3 colors</p>
                    </div>
                </a>
            </div>
            <!-- product item -->
            <div class="card-product">
                <a href="#" class="text-decoration-none">
                    <div class="d-flex flex-column justify-content-around align-items-start gap-2">
                        <div class="img-scale img-card-product">
                            <img loading=“lazy” src="<?php echo THEME_URL . '/images/sofa-1.png' ?>" alt="">
                        </div>
                        <div class="w-100 d-flex justify-content-between align-items-center">
                            <p class="text-20 fw-medium text-black">$500.00</p>
                            <div><img loading=“lazy” src="<?php echo THEME_URL . '/images/heart.svg' ?>" alt=""></div>
                        </div>
                        <p class="text-20 gray-tertiary">Scott 2 Seater Sofa</p>
                        <p class="text-20 gray-neutral">N00-102</p>
                        <p class="fw-medium text-20 gray-neutral">3 colors</p>
                    </div>
                </a>
            </div>
            <!-- product item -->
            <div class="card-product">
                <a href="#" class="text-decoration-none">
                    <div class="d-flex flex-column justify-content-around align-items-start gap-2">
                        <div class="img-scale img-card-product">
                            <img loading=“lazy” src="<?php echo THEME_URL . '/images/sofa-4.png' ?>" alt="">
                        </div>
                        <div class="w-100 d-flex justify-content-between align-items-center">
                            <p class="text-20 fw-medium text-black">$500.00</p>
                            <div><img loading=“lazy” src="<?php echo THEME_URL . '/images/heart.svg' ?>" alt=""></div>
                        </div>
                        <p class="text-20 gray-tertiary">Scott 2 Seater Sofa</p>
                        <p class="text-20 gray-neutral">N00-102</p>
                        <p class="fw-medium text-20 gray-neutral">3 colors</p>
                    </div>
                </a>
            </div>
            <!-- product item -->
            <div class="card-product">
                <a href="#" class="text-decoration-none">
                    <div class="d-flex flex-column justify-content-around align-items-start gap-2">
                        <div class="img-scale img-card-product">
                            <img loading=“lazy” src="<?php echo THEME_URL . '/images/sofa-2.png' ?>" alt="">
                        </div>
                        <div class="w-100 d-flex justify-content-between align-items-center">
                            <p class="text-20 fw-medium text-black">$500.00</p>
                            <div><img loading=“lazy” src="<?php echo THEME_URL . '/images/heart.svg' ?>" alt=""></div>
                        </div>
                        <p class="text-20 gray-tertiary">Scott 2 Seater Sofa</p>
                        <p class="text-20 gray-neutral">N00-102</p>
                        <p class="fw-medium text-20 gray-neutral">3 colors</p>
                    </div>
                </a>
            </div>
            <!-- CTA card -->
            <div class="card-cta-bg position-relative">
                <img loading=“lazy” src="<?php echo THEME_URL . '/images/card-cta-bg.png' ?>" alt="">
                <div class="card-cta">
                    <div class="text-center">
                        <p class="text-32 text-white">Stay in the loop</p>
                        <p class="text-16 text-white">Sign up to be the first to hear about new arrivals, offers and
                            events.Enter
                            your email address below to opt in to email marketing.
                        </p>
                    </div>
                    <div class="w-fit pt-2">
                        <a class="text-24 text-white w-fit" href="#">SEND YOUR EMAIL</a>
                    </div>
                </div>
            </div>
            <!-- CTA card -->
            <!-- product item -->
            <div class="card-product">
                <a href="#" class="text-decoration-none">
                    <div class="d-flex flex-column justify-content-around align-items-start gap-2">
                        <div class="img-scale img-card-product">
                            <img loading=“lazy” src="<?php echo THEME_URL . '/images/sofa-4.png' ?>" alt="">
                        </div>
                        <div class="w-100 d-flex justify-content-between align-items-center">
                            <p class="text-20 fw-medium text-black">$500.00</p>
                            <div><img loading=“lazy” src="<?php echo THEME_URL . '/images/heart.svg' ?>" alt=""></div>
                        </div>
                        <p class="text-20 gray-tertiary">Scott 2 Seater Sofa</p>
                        <p class="text-20 gray-neutral">N00-102</p>
                        <p class="fw-medium text-20 gray-neutral">3 colors</p>
                    </div>
                </a>
            </div>
            <!-- product item -->
            <div class="card-product">
                <a href="#" class="text-decoration-none">
                    <div class="d-flex flex-column justify-content-around align-items-start gap-2">
                        <div class="img-scale img-card-product">
                            <img loading=“lazy” src="<?php echo THEME_URL . '/images/sofa-1.png' ?>" alt="">
                        </div>
                        <div class="w-100 d-flex justify-content-between align-items-center">
                            <p class="text-20 fw-medium text-black">$500.00</p>
                            <div><img loading=“lazy” src="<?php echo THEME_URL . '/images/heart.svg' ?>" alt=""></div>
                        </div>
                        <p class="text-20 gray-tertiary">Scott 2 Seater Sofa</p>
                        <p class="text-20 gray-neutral">N00-102</p>
                        <p class="fw-medium text-20 gray-neutral">3 colors</p>
                    </div>
                </a>
            </div>
            <!-- product item -->
            <div class="card-product">
                <a href="#" class="text-decoration-none">
                    <div class="d-flex flex-column justify-content-around align-items-start gap-2">
                        <div class="img-scale img-card-product">
                            <img loading=“lazy” src="<?php echo THEME_URL . '/images/sofa-2.png' ?>" alt="">
                        </div>
                        <div class="w-100 d-flex justify-content-between align-items-center">
                            <p class="text-20 fw-medium text-black">$500.00</p>
                            <div><img loading=“lazy” src="<?php echo THEME_URL . '/images/heart.svg' ?>" alt=""></div>
                        </div>
                        <p class="text-20 gray-tertiary">Scott 2 Seater Sofa</p>
                        <p class="text-20 gray-neutral">N00-102</p>
                        <p class="fw-medium text-20 gray-neutral">3 colors</p>
                    </div>
                </a>
            </div>
            <!-- product item -->
            <div class="card-product">
                <a href="#" class="text-decoration-none">
                    <div class="d-flex flex-column justify-content-around align-items-start gap-2">
                        <div class="img-scale img-card-product">
                            <img loading=“lazy” src="<?php echo THEME_URL . '/images/sofa-3.png' ?>" alt="">
                        </div>
                        <div class="w-100 d-flex justify-content-between align-items-center">
                            <p class="text-20 fw-medium text-black">$500.00</p>
                            <div><img loading=“lazy” src="<?php echo THEME_URL . '/images/heart.svg' ?>" alt=""></div>
                        </div>
                        <p class="text-20 gray-tertiary">Scott 2 Seater Sofa</p>
                        <p class="text-20 gray-neutral">N00-102</p>
                        <p class="fw-medium text-20 gray-neutral">3 colors</p>
                    </div>
                </a>
            </div>
        </div>
        <!-- list -->
    </div>
</div>
<!-- Product list -->
<div class="custome-container">
    <!-- section title -->
    <div class="custome-container-sm">
        <div class="d-flex justify-content-between">
            <h2 class="text-60 fw-bold black-neutral">More to Discover</h2>
            <div class="custom-nav">
                <button class="prev-btn black-neutral" data-slider-id="slider8">
                    <img loading=“lazy” src="<?php echo THEME_URL . '/images/arr-prev.svg' ?>" alt="">
                </button>
                <button class="next-btn black-neutral" data-slider-id="slider8">
                    <img loading=“lazy” src="<?php echo THEME_URL . '/images/arr-next.svg' ?>" alt="">
                </button>
            </div>
        </div>
    </div>
    <div class="slider-show-3 custome-container-sm" id="slider8">
        <div class="slider-item custome-container-sm">
            <div class="img-scale">
                <img loading=“lazy” src="<?php echo THEME_URL . '/images/outlet-furniture.png' ?>" alt="">
            </div>
            <div class="bottom-line-full w-fit pt-2">
                <a class="text-32 black-neutral text-decoration-none w-fit" href="#">Outlet Funiture</a>
            </div>
        </div>
        <div class="slider-item custome-container-sm">
            <div class="img-scale">
                <img loading=“lazy” src="<?php echo THEME_URL . '/images/outdoor-furniture.png' ?>" alt="">
            </div>
            <div class="bottom-line-full w-fit pt-2">
                <a class="text-32 black-neutral text-decoration-none w-fit" href="#">Outdoor Funiture</a>
            </div>
        </div>
        <div class="slider-item custome-container-sm">
            <div class="img-scale">
                <img loading=“lazy” src="<?php echo THEME_URL . '/images/cate.png' ?>" alt="">
            </div>
            <div class="bottom-line-full w-fit pt-2">
                <a class="text-32 black-neutral text-decoration-none w-fit" href="#">Project Funiture</a>
            </div>
        </div>
        <div class="slider-item custome-container-sm">
            <div class="img-scale">
                <img loading=“lazy” src="<?php echo THEME_URL . '/images/outlet-furniture.png' ?>" alt="">
            </div>
            <div class="bottom-line-full w-fit pt-2">
                <a class="text-32 black-neutral text-decoration-none w-fit" href="#">Outlet Funiture</a>
            </div>
        </div>
        <div class="slider-item custome-container-sm">
            <div class="img-scale">
                <img loading=“lazy” src="<?php echo THEME_URL . '/images/outdoor-furniture.png' ?>" alt="">
            </div>
            <div class="bottom-line-full w-fit pt-2">
                <a class="text-32 black-neutral text-decoration-none w-fit" href="#">Outdoor Funiture</a>
            </div>
        </div>
        <div class="slider-item custome-container-sm">
            <div class="img-scale">
                <img loading=“lazy” src="<?php echo THEME_URL . '/images/cate.png' ?>" alt="">
            </div>
            <div class="bottom-line-full w-fit pt-2">
                <a class="text-32 black-neutral text-decoration-none w-fit" href="#">Project Funiture</a>
            </div>
        </div>
    </div>
</div>

<?php
get_template_part('sections/news-letter-main');
get_footer();
?>