 <?php
    $related_post_col = intval(get_theme_mod('related_post_column', 6));
    if ($related_post_col == null) {
        $related_post_col = 6;
    }
    extract(wp_parse_args($args, [
        'image_size' => 'post-thumbnail',
    ])); ?>
 <div class="col-lg-<?php echo esc_attr($related_post_col) ?>">
     <div <?php post_class('blog-post blog-one__item wow fadeIn  mb-4') ?>>
         <div class="blog-one__img">
             <?php
                $sticky_text = '';
                if (has_post_thumbnail()) : ?>
                 <div class="blog-one__innerimg">
                     <?php the_post_thumbnail($image_size, ['class' => 'img-fluid']); ?>

                     <?php
                        if (is_sticky()) :
                            $sticky_text = get_theme_mod('sticky_text', 'Featured');
                        ?>
                         <div class="text-uppercase position-absolute start-0 top-0 p-3">
                             <span class="featured-badge badge px-3 text-bg-primary text-white"><?php echo esc_html($sticky_text) ?></span>
                         </div>
                     <?php endif; ?>
                 </div>
             <?php endif; ?>
             <!-- Ctegories -->
             <div class="blog-one__tagwrap position-absolute d-flex flex-wrap gap-1 z-2">
                 <div class="blog-one__tag">
                     <?php nextpro_get_categories(); ?>
                 </div>
             </div>
         </div>
         <!-- blog image -->
         <div class="blog-one__info">
             <div class="d-flex flex-wrap gap-2 post-tag mb-2">
                 <?php
                    if (!has_post_thumbnail()) :
                        if (is_sticky()) {
                            $sticky_text = get_theme_mod('sticky_text', 'Featured');
                            echo '<span class="featured-badge badge px-3 text-bg-primary text-white">' . esc_html($sticky_text) . '</span>';
                        }
                    endif;

                    ?>
             </div>
             <?php nextpro_post_meta_list(); ?>
             <?php the_title('<h4 class="blog-one__title"><a href="' . get_permalink() . '">', '</a></h4>') ?>
         </div>
         <!-- blog info -->
     </div>
 </div>