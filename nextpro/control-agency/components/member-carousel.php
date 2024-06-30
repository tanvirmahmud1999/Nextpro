<?php
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
    <div class="team-carousel__slider" data-bs-theme="light">
        <div class="nextmarketing-owl__carousel owl-carousel" data-owl-options='{
            "loop": true,
            "animateIn": "fadeInUp",
            "animateOut": "slideOutUp",
            "items": 4,
            "center": false,
            "autoplay": false,
            "autoplayTimeout": 3000,
            "smartSpeed": 1000,
            "nav": false, 
            "dots": true,
            "margin": 30,
            "responsive": {
                "0": {
                    "items": 1
                },
                "767": {
                    "items": 2
                },
                "992": {
                    "items": 3
                }
            }
        }'>

            <?php
            while ($the_query->have_posts()) :
                $the_query->the_post();
                global $post;
            ?>
                <div class="section-study__col wow fadeInUp position-relative" data-wow-delay="00ms">
                    <div class="section-study__image">
                        <img src="<?php echo get_template_directory_uri() ?>/assets/images/placeholder.svg" data-src="<?php echo the_post_thumbnail_url('nextpro-420x550-cropped') ?>" alt="<?php the_title(); ?>">
                    </div>
                    <div class="section-study__info wow fadeInUp" data-wow-delay="100ms">
                        <h4 class="section-study__title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>
                        <p class="section-study__text">CEO</p>
                    </div>
                </div>

            <?php endwhile; ?>


        </div>
    </div>
<?php endif; ?>