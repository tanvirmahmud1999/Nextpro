<?php
extract(wp_parse_args($args, [
    'column_class' => '4',
    'image_size' => 'post-thumbnail',
    'excerpt_length' => get_theme_mod('excerpt_length', 30)
])); ?>
<div class="col-lg-<?php echo esc_attr($column_class) ?> ">
    <div <?php post_class('blog-post blog-one__item wow fadeIn mb-4') ?>>
        <div class="blog-one__img mb-0">
            <?php
            $sticky_text = '';
            if (has_post_thumbnail()) : ?>
                <div class="blog-one__innerimg">
                    <?php the_post_thumbnail($image_size, ['class' => 'img-fluid', 'alt' => get_bloginfo('name')]); ?>
                    <?php
                    if (is_sticky()) :
                        $sticky_text = get_theme_mod('sticky_text', 'Featured');
                    ?>
                        <div class="text-uppercase position-absolute start-0 top-0 p-3">
                            <span class="featured-badge badge px-3 text-bg-primary text-white"><?php echo esc_html($sticky_text) ?></span>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="blog-one__tagwrap position-absolute d-flex flex-wrap gap-1 z-2">
                    <?php nextpro_get_categories(); ?>
                </div>
            <?php else : ?>
                <?php nextpro_get_categories(); ?>
            <?php endif; ?>
        </div>
        <!-- Ctegories -->

        <div class="blog-one__info">
            <div class="d-flex flex-wrap gap-2 post-tag mb-2">
                <?php
                if (!has_post_thumbnail()) :
                    if (is_sticky()) {
                        $sticky_text = get_theme_mod('sticky_text', 'Featured');
                        echo '<span class="featured-badge badge px-3 text-bg-primary text-white">' . esc_html($sticky_text) . '</span>';
                    }
                endif;
                ?>
            </div>
            <?php nextpro_post_meta_list(); ?>
            <?php the_title('<h4 class="blog-one__title mb-2"><a href="' . get_permalink() . '">', '</a></h4>') ?>
            <?php if (!has_post_thumbnail()) : ?>
                <?php echo wp_trim_words(get_the_excerpt(), $excerpt_length);  ?>
            <?php endif; ?>
        </div>

    </div>
</div>