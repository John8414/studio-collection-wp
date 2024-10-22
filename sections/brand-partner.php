<section class="pb-80 pt-80">
    <div class="pb-40">
        <h2 class="text-60 text-center black-neutral pb-2">
            <?php echo get_field('bp_title', get_the_ID()); ?>
        </h2>
        <p class="text-20 text-center gray-neutral">
            <?php echo get_field('bp_description', get_the_ID()); ?>
        </p>
    </div>

    <?php
    $images = get_field('bp_partners', get_the_ID());
    if ($images): ?>
        <div class="d-flex flex-wrap align-items-center justify-content-center gap-40">

            <?php foreach ($images as $image): ?>
                <div>
                    <img loading=“lazy” src="<?php echo esc_url($image['sizes']['thumbnail']); ?>"
                        alt="<?php echo esc_attr($image['alt']); ?>">

                </div>
            <?php endforeach; ?>
        </div>

    <?php endif; ?>
</section>