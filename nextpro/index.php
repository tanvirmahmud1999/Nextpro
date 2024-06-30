<?php
$blog_column = intval(get_theme_mod('blog_column', 2));
if ($blog_column > 0) {
  $blog_column = intval(12 / $blog_column);
}

get_header();
do_action('nextpro_content_before');

get_template_part('template-parts/header/banner', get_post_type());
get_template_part('template-parts/content/before', get_post_type());
?>

<?php
if (have_posts()) { ?>
  <?php // Load posts loop.
  if (nextpro_get_layout() == 'full') {
    echo '<div class="row justify-content-center">';
  };
  while (have_posts()) {
    the_post();
    get_template_part('template-parts/content/' . nextpro_get_post_content_style(), get_post_format(), ['column_class' => $blog_column]);
  }

  if (nextpro_get_layout() == 'full') {
    echo '</div>';
  };

  ?>

  <!-- box-list-posts -->
  <?php nextpro_the_posts_navigation();
  ?>

<?php } else {

  // If no content, include the "No posts found" template.
  get_template_part('template-parts/content/content-none');
}  ?>

<!-- section -->
<?php

get_template_part('template-parts/content/after', get_post_type());
if (!is_front_page() && is_home()) {
  get_template_part('template-parts/footer/cta');
}

do_action('nextpro_content_after');

get_footer();
