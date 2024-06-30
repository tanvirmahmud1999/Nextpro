<?php
$column_class = control_agency_parse_text($lg_device);

$blog_post_style = control_agency_parse_text($blog_post_style);
$posts_per_page = !empty($posts_per_page) ? $posts_per_page : get_option('posts_per_page');
$post__in = !empty($post__in) ? $post__in : [];

$post_args = array(
    'post_type' => 'post',
    'posts_per_page' => $posts_per_page,
    'post__in' => $post__in,
    'paged' => get_query_var('paged') ? absint(get_query_var('paged')) : 1,
);

$the_query = new WP_Query($post_args);

// Define the $args array
$args = array(
    'column_class' => $column_class,
);

// The Loop
if ($the_query->have_posts()) : ?>
    <?php
    // Row
    if ($blog_post_style == 'masonry') {
        echo '<div class="row gutter-y-30" data-masonry=\'{"percentPosition": true }\' data-bs-theme="light">';
    } else {
        echo '<div class="row gutter-y-30">';
    }
    ?>
    <?php
    while ($the_query->have_posts()) :
        $the_query->the_post();
        global $post;
        if ($blog_post_style == 'list-content') {
            get_template_part('template-parts/content/content', null, $args);
        } elseif ($blog_post_style == 'grid-content') {
            get_template_part('template-parts/content/content-grid', null, $args);
        } elseif ($blog_post_style == 'masonry') {
            get_template_part('template-parts/content/content-masonry', null, $args);
        } else {
            echo "There is no post or template found !";
        }
    endwhile;
    ?>
    </div>
<?php endif; ?>