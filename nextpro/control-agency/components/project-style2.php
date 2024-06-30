 <?php
    $terms = get_terms(array('taxonomy'   => 'project_cat'));
    if (!empty($terms) && !is_wp_error($terms)) :
    ?>
     <ul class="post-filter section-portfolio__filter reset-ul d-flex align-items-center justify-content-center flex-wrap">
         <li class="fw-bold active" href="#" data-filter=".filter-item"><span><?php esc_attr_e('All', 'nextpro') ?></span></li>
         <?php
            foreach ($terms as $term) :
                printf('<li class="fw-bold" href="#" data-filter=".%s"><span>%s</span></li>', $term->slug, $term->name);
            endforeach;
            ?>
     </ul>
 <?php endif; ?>
 <?php
    $lg_device = control_agency_parse_text($column_width);
    // Calculate $lg
    $lg = 12 / $lg_device;
    $lg = ($lg - floor($lg)) < 0.5 ? floor($lg) : ceil($lg);
    // The Query.
    $the_query = new WP_Query([
        'post_type' => 'controlproject',
        'posts_per_page' => !empty($posts_per_page) ? $posts_per_page : get_option('posts_per_page')
    ]); ?>
 <?php if ($the_query->have_posts()) : ?>
     <div class="row filter-layout gutter-y-30">
         <?php
            $include_terms = [];
            while ($the_query->have_posts()) :
                $the_query->the_post();
                global $post;
                $term_obj_list = get_the_terms($post->ID, 'project_cat');

                if (!empty($term_obj_list) && !is_wp_error($term_obj_list)) {
                    $include_terms = array_merge($include_terms, wp_list_pluck($term_obj_list, 'term_id'));
                }

                // Fetching term slugs for the current post
                $term_slugs = nextpro_get_the_term_list(get_the_ID(), 'project_cat', '', ' ', '', false);
            ?>
             <div class="col-lg-<?php echo esc_attr($lg) ?> filter-item <?php echo esc_attr($term_slugs); ?>">
                 <div class="section-study__col position-relative">
                     <div class="section-study__image">
                         <img src="<?php echo get_template_directory_uri() ?>/assets/images/placeholder.svg" data-src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'post-thumbnail')); ?>" alt="<?php the_title(); ?>">
                     </div>
                     <div class="section-study__info">
                         <h4 class="section-study__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                         <p class="section-study__text"><?php echo strip_tags(get_the_term_list(get_the_ID(), 'project_cat', '-', ', ')); ?></p>
                     </div>
                 </div>
             </div>
         <?php endwhile; ?>
     </div>
 <?php endif; ?>
 <?php wp_reset_postdata(); ?>