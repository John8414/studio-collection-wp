<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <?php the_field('script_header', 'option'); ?>
    <title>
        <?php wp_title('', true, 'right'); ?>
    </title>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <section class="header-groupØ">
        <div class="fixed-top">
            <?php
            get_template_part('sections/header-main');
            // get_template_part('sections/menu-main');
            ?>
        </div>Ø
    </section>