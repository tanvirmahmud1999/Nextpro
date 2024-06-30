<?php

/**
 * The template for Previous/next post navigation.
 *
 * @package WordPress
 * @subpackage Nextpro
 * @since Nextpro 1.0
 */

$next = is_rtl() ? nextpro_get_icon_svg('ui', 'arrow_left') : nextpro_get_icon_svg('ui', 'arrow_right');

$prev = is_rtl() ? nextpro_get_icon_svg('ui', 'arrow_right') : nextpro_get_icon_svg('ui', 'arrow_left');

$previous_label = get_theme_mod('prev_link_text', ''); //esc_html__( 'Next post', 'nextpro' );
$next_label     = get_theme_mod('next_link_text', ''); //esc_html__( 'Next post', 'nextpro' );

the_post_navigation(
    array(
        'next_text' => '
            <div class="text-end ms-auto blog-one__single-post-item d-flex align-items-center w-100 gap-20 text-end justify-content-end pe-0"> 
            <span class="mb-0 blog-one__post-title fw-normal"><span> %title</span></span>
            <p class="post-arrow-icon text-decoration-none d-flex align-items-center justify-content-center mb-0">' . $next_label . ' ' . $next . '</p>
        </div>',

        'prev_text' => '
            <div class="text-start blog-one__single-post-item d-flex align-items-center gap-20 w-100">
            <p class="post-arrow-icon text-decoration-none d-flex align-items-center justify-content-center mb-0">' . $prev . ' ' . $previous_label . '</p>
            <span class="mb-0 blog-one__post-title fw-normal"><span>%title</span></span>
        </div>',
    )
);
