<section class="position-relative carousel-height w-100">
    <video class="w-100 carousel-height object-fit-cover" autoplay loop>
        <source src="<?php echo get_field('des_video', get_the_ID()); ?>" type="video/mp4">
    </video>
    <div class="overlay-30"></div>
    <div
        class="z-3 position-absolute bottom-0 w-100 h-100 p-20 d-flex flex-column justify-content-center align-items-center gap-3">
        <h2 class="text-60 fw-bold text-white"><?php echo get_field('des_title', get_the_ID()); ?></h2>
        <p class="text-20 white-regular"><?php echo get_field('des_description', get_the_ID()); ?></p>
        <button class="arr-button bg-transparent">
            <a class="text-20 fw-bold hover-yellow" href="<?php echo get_field('des_link', get_the_ID()); ?>">EXPLORE
                MORE</a>
        </button>
    </div>
</section>