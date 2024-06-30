<?php
if ($template_file == 'components/project.php') : ?>
    <?php
    $lg_device = control_agency_parse_text($column_width);
    // Calculate $lg
    $lg = 12 / $lg_device;
    $lg = ($lg - floor($lg)) < 0.5 ? floor($lg) : ceil($lg);

    extract(wp_parse_args([
        'post__in' => [],
        'category__in' => [],
    ]));
    $project_args = array(
        'post_type' => 'controlproject',
        'posts_per_page' => !empty($posts_per_page) ? $posts_per_page : get_option('posts_per_page'),
        'post__in' => $post__in,
        'terms'    => $category__in,
        'taxonomy' => 'project_cat',
        'paged' => get_query_var('paged') ? absint(get_query_var('paged')) : 1,

    );
    if (!empty($category__in)) {
        $project_args['tax_query'] = array(
            array(
                'taxonomy' => 'project_cat', // Replace with your actual taxonomy name
                'field'    => 'id',
                'hide_empty' => true,
                'terms'    => $category__in, // Replace with the slugs of the categories you want to filter by
                'operator' => 'IN',
            ),
        );
    }
    $the_query = new WP_Query($project_args);
    // The Loop.
    if ($the_query->have_posts()) : ?>
        <div class="row gutter-y-20" data-bs-theme="light">
            <?php
            $include_terms = [];
            while ($the_query->have_posts()) :
                $the_query->the_post();
                global $post;
                $term_obj_list = get_the_terms($post->ID, 'project_cat');
                if (!empty($term_obj_list) && !is_wp_error($term_obj_list)) {
                    $include_terms = array_merge($include_terms, wp_list_pluck($term_obj_list, 'term_id'));
                }

            ?>
                <div class="col-lg-<?php echo esc_attr($lg) ?> ">
                    <div class="section-study__col position-relative">
                        <div class="section-study__image">
                            <img src="<?php echo get_template_directory_uri() ?>/assets/images/placeholder.svg" data-src="<?php echo the_post_thumbnail_url('post-thumbnail') ?>" alt="<?php the_title(); ?>">
                        </div>
                        <div class="section-study__info">
                            <h4 class="section-study__title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>
                            <p class="section-study__text"><?php echo strip_tags(get_the_term_list(get_the_ID(), 'project_cat', '', ' -  ')); ?></p>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    <?php endif;
    wp_reset_postdata(); ?>
<?php else :
    include('components/project-style2.php'); ?>
<?php endif; ?>