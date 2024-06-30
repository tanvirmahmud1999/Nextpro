<?php
extract(wp_parse_args($args, [
    'display' => get_theme_mod('display_related_posts', false),
    'title' => get_theme_mod('related_posts_title', 'Recent Posts'),
    // WP query
    'query_args' => [
        'post_type' => 'post',
        'post__not_in' => [get_the_ID()],
        'category__in' => wp_get_post_categories(get_the_ID()),
        'posts_per_page' => get_theme_mod('related_posts_per_page', 2),
    ]
]));


if (!$display) return;

$post_query = new WP_Query($query_args);

if ($post_query->have_posts()) : ?>
    <div id="blog-1" class="blog-one__recent-post">
        <?php if (!empty($title)) : ?>
            <!-- SECTION TITLE -->
            <h3 class="mb-4"><?php echo esc_attr($title) ?></h3>
        <?php endif ?>

        <div class="row gutter-y-30">
            <?php
            while ($post_query->have_posts()) :
                $post_query->the_post();

                get_template_part('template-parts/content/related-posts-content', get_post_format());
            endwhile;
            wp_reset_postdata();
            ?>
        </div>

    </div>
<?php endif; ?>