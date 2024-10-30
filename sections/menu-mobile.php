   <!-- start mobile  -->
   <div class="text-60 black-neutral mobile-nav position-fixed top-0 bottom-0 start-0 w-100 h-100 d-lg-none"
       id="mobileNav">
       <div class="py-0 logo-info d-flex justify-content-between align-items-center gap-3 py-3">
           <div class="logo">
               <a href="<?php echo get_home_url('/') ?>" class="w-100 h-100 d-block">
                   <?php
                    $logo = get_field('logo', 'option');
                    if ($logo) {
                        echo wp_get_attachment_image($logo['id'], 'full');
                    } ?>
               </a>
           </div>
           <div class="d-flex gap-2 justify-content-center">
               <div class="d-flex justify-content-start align-items-center">
                   <div class="img-icon-sm"><img loading=“lazy” src="<?php echo THEME_URL . '/images/user.svg' ?> "
                           alt=""></div>
               </div>
               <div class="d-flex justify-content-start align-items-center">
                   <div class="img-icon-sm"><img loading=“lazy” src="<?php echo THEME_URL . '/images/cart.svg' ?> "
                           alt=""></div>
               </div>
           </div>

       </div>
       <?php get_template_part('sections/menu-main'); ?>
   </div>
   <!-- end mobile  -->