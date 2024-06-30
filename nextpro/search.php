<?php

/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header();

get_template_part('template-parts/header/banner-search');

do_action('nextpro_content_before');
?>

<section id="blog-page" class="py-5 blog-page-section">
    <div class="container">
        <?php
        if (have_posts()) :

            get_template_part('template-parts/content/before', 'loop');
            // Load posts loop.
            while (have_posts()) {
                the_post();
                get_template_part('template-parts/content/' . nextpro_get_post_content_style(), get_post_format());
            }
            get_template_part('template-parts/content/after', 'loop');

            // Previous/next page navigation.
            nextpro_the_posts_navigation();
        else :

            // If no content, include the "No posts found" template.
            get_template_part('template-parts/content/content-none');

        endif;
        ?>
    </div>
</section>

<?php

do_action('nextpro_content_after');

//get_template_part('template-parts/footer/cta');

get_footer();
