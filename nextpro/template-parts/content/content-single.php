<?php
$layout = get_theme_mod('single_layout');
$alignment =  $layout == 'full' ? 'text-center' : '';
?>
<div <?php post_class('blog-one__content-inner blog-one--single post-content mb-4 mb-lg-5') ?>>
        <div class="single-post-title <?php echo esc_attr($alignment) ?>">
                <!-- Title -->
                <?php nextpro_post_single_title() ?>
                <!-- Post Meta -->
                <div class="blog-post-meta blog-one__meta-inner d-flex flex-wrap align-items-center justify-content-between">
                        <?php nextpro_post_entry_meta(); ?>
                </div>
        </div>
        <div class="<?php echo esc_attr($alignment) ?>">
                <?php nextpro_post_thumbnail(); ?>
        </div>
        <div class="entry-content">
                <?php
                the_content();
                wp_link_pages(
                        array(
                                'before'   => '<nav class="page-links numeric-pagination d-lg-flex gap-2 " aria-label="' . esc_attr__('Page', 'nextpro') . '">',
                                'after'    => '</nav>'
                        )
                );
                ?>
        </div>

        <?php
        if (has_tag()) : ?>
                <div class="blog-one__social-tags d-flex flex-wrap justify-content-lg-between gap-3 mt-4 w-100">
                        <!-- tagcloud -->
                        <div class="blog-one__tags-wrap d-flex align-items-center">
                                <?php nextpro_post_tagcloud(); ?>
                        </div>
                        <!-- social-share -->
                        <!-- <div class="blog-one__social-wrap d-flex align-items-center">
                        <p class="blog-one__stheading"> -->
                        <?php  // echo esc_attr__('Share: ', 'nextpro') 
                        ?>
                        <!-- </p> -->
                        <?php
                        //  echo nextpro_get_post_share_link([
                        //         'parent_class' => 'reset-ul footer__socialwrap d-flex',
                        //         'child_class' => '',
                        //         'link_class' => 'social-icon',
                        //         'enable_label' => false,
                        // ]);
                        ?>
                        <!-- </div> -->
                </div>
        <?php endif; ?>

</div>

<?php
get_template_part('template-parts/post/post-navigations');
get_template_part('template-parts/post/author-bio');
get_template_part('template-parts/post/related-posts');
