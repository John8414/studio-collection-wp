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
            <?php the_title(); ?>
        </h2>
    </div>
    <div class="d-md-flex justify-content-between gap-5 custome-container-sm w-fit">
        <div class="d-flex flex-column gap-3 w-628">

            <div class="d-flex flex-column gap-3">
                <p class="text-12 gray-neutral">Contact Us</p>
                <?php echo get_field('contact_us', 'option'); ?>
            </div>
            <div class="d-flex flex-column gap-3">
                <p class="text-12 gray-neutral">Location</p>
                <p class="text-20 black-neutral"> <?php echo get_field('location', 'option'); ?></p>
            </div>
            <div class="d-flex flex-column gap-3">
                <p class="text-12 gray-neutral">Mo—Fr</p>
                <p class="text-20 black-neutral">
                    <?php echo get_field('mo—fr', 'option'); ?>
                </p>
            </div>
            <div class="d-flex flex-column gap-3 justify-content-center">
                <p class="text-12 gray-neutral">Email</p>
                <?php echo get_field('email', 'option'); ?>
            </div>
        </div>

        <div class="d-flex flex-column gap-3 w-628 p-4 contact-form">
            <?php echo do_shortcode('[gravityform id="1" title="true" description="true" ajax="true"] '); ?>
        </div>
    </div>
</div>


<div class="custome-container">
    <?php while (have_posts()):
        the_post();
        the_content();
    endwhile; ?>
</div>
<!-- slider -->
<?php get_template_part('sections/discover') ?>
<!-- slider -->
<div class="bottom-line-full"></div>

<?php
get_footer();
?>