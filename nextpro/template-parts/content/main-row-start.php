 <div class="row gutter-y-30 gx-5">
     <div class="col-lg-8 content-column<?php echo nextpro_get_layout() == 'ls' ? ' order-lg-2' : '' ?>">
         <?php $class = nextpro_get_layout() == 'ls' ? 'gutter-y-50' : (nextpro_get_layout() == 'rs' ? 'gutter-y-50' : ''); ?>
         <?php if (is_single()) : ?>
             <div class="row <?php echo esc_attr($class) ?> ">
             <?php else : ?>
                 <div class="row <?php echo esc_attr($class) ?>" data-masonry='{"percentPosition": true }'>
                 <?php endif; ?>