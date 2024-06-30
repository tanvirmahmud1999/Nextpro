<?php
if ($template_file == 'components/member.php') : ?>
    <?php
    // xl Device
    $xl_device = control_agency_parse_text($xl_device);
    $xl = 12 / $xl_device;
    $xl = ($xl - floor($xl)) < 0.5 ? floor($xl) : ceil($xl);

    // lg Device
    $lg_device = control_agency_parse_text($lg_device);
    $lg = 12 / $lg_device;
    $lg = ($lg - floor($lg)) < 0.5 ? floor($lg) : ceil($lg);

    // md Device
    $md_device = control_agency_parse_text($md_device);
    $md = 12 / $md_device;
    $md = ($md - floor($md)) < 0.5 ? floor($md) : ceil($md);

    $posts_per_page = !empty($posts_per_page) ? $posts_per_page : get_option('posts_per_page');
    $post__in = !empty($post__in) ? $post__in : [];

    $project_args = array(
        'post_type' => 'controlmember',
        'posts_per_page' => $posts_per_page,
        'post__in' => $post__in,
        'paged' => get_query_var('paged') ? absint(get_query_var('paged')) : 1,

    );
    $the_query = new WP_Query($project_args);
    // The Loop.
    if ($the_query->have_posts()) : ?>
        <div class="row gutter-y-30" data-bs-theme="light">
            <?php
            while ($the_query->have_posts()) :
                $the_query->the_post();
                global $post;
            ?>
                <div class="col-md-<?php echo esc_attr($md) ?> col-lg-<?php echo esc_attr($lg) ?> col-xl-<?php echo esc_attr($xl) ?> ">
                    <div class="section-study__col wow fadeInUp position-relative" data-wow-delay="00ms">
                        <div class="section-study__image">
                            <img src="<?php echo get_template_directory_uri() ?>/assets/images/placeholder.svg" data-src="<?php echo the_post_thumbnail_url('nextpro-310x405') ?>" alt="<?php the_title(); ?>">
                        </div>
                        <div class="section-study__info wow fadeInUp" data-wow-delay="100ms">
                            <h4 class="section-study__title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>
                            <p class="section-study__text">CEO</p>
                        </div>
                    </div>
                </div>
            <?php endwhile;
            wp_reset_postdata();  ?>
        </div>
    <?php endif;
    ?>
<?php else :
    include('components/member-carousel.php'); ?>
<?php endif; ?>