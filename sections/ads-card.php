<?php $term = get_queried_object();
$image = get_field('image', $term);
$banner = $image['banner']['image'];
?>
<div class="card-cta-bg position-relative">
    <img loading=“lazy” src="<?php echo $banner['url'] ? $banner['url'] :  THEME_URL . '/images/card-cta-bg.png' ?>"
        alt="ads banner">
    <div class="card-cta">
        <div class="text-center">
            <p class="text-32 text-white">Stay in the loop</p>
            <p class="text-16 text-white">Sign up to be the first to hear about new arrivals,
                offers and
                events.Enter
                your email address below to opt in to email marketing.
            </p>
        </div>
        <div class="w-fit pt-2">
            <a class="text-20 text-white w-fit" href="#newsLetter">SEND YOUR EMAIL</a>
        </div>
    </div>
</div>