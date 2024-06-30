<div <?php post_class('nextpro-page-php') ?>>
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