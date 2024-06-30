<?php
$blog_one = is_page() ? '' : 'blog-one';
?>
<main id="content" <?php nextpro_main_class($args, 'main ' . $blog_one . '') ?>>
    <?php do_action('nextpro_main_row_start', $args); ?>