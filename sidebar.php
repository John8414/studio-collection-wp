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