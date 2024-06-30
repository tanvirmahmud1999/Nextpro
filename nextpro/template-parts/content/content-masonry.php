<?php
extract(wp_parse_args($args, [
    'column_class' => '4',
    'image_size' => 'post-thumbnail',
    'excerpt_length' => get_theme_mod('excerpt_length', 30)
]));
?>
<div class="col-lg-<?php echo esc_attr($column_class) ?> ">
    <div <?php post_class('blog-one__item wow fadeIn clearfixs') ?>>
        <div class="blog-one__img mb-0">
            <!-- image -->
            <?php
            $sticky_text = '';
            if (has_post_thumbnail()) : ?>
                <div class="blog-one__innerimg blog-one__img--overlay">
                    <?php the_post_thumbnail($image_size, ['class' => 'img-fluid r-16']); ?>
                    <?php
                    if (is_sticky()) :
                        $sticky_text = get_theme_mod('sticky_text', 'Featured');
                    ?>
                        <div class="card-img-top-content listing-categories small text-uppercase position-absolute start-0 top-0 p-3">
                            <span class="featured-badge badge px-3 text-bg-primary text-white"><?php echo esc_html($sticky_text) ?></span>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <!-- categories -->
            <div class="blog-one__tagwrap blog-one__tagwrap--color position-absolute d-flex flex-wrap gap-1 z-2">
                <?php nextpro_get_categories(); ?>
            </div>

            <!-- blog info -->
            <div class="blog-one__info blog-one__info--overlap">
                <?php if (!has_post_thumbnail()) : ?>
                    <div class="d-flex flex-wrap gap-2 post-tag mb-2">
                        <?php
                        if (!has_post_thumbnail()) {
                            if (is_sticky()) {
                                $sticky_text = get_theme_mod('sticky_text', 'Featured');
                                echo '<span class="featured-badge badge px-3 text-bg-primary text-white">' . esc_html($sticky_text) . '</span>';
                            }
                        }
                        ?>
                    </div>
                <?php endif;  ?>

                <?php the_title('<h4 class="blog-one__title"><a href="' . get_permalink() . '">', '</a></h4>') ?>
                <div class="blog-one__meta--style2">
                    <?php nextpro_post_meta_list(); ?>
                </div>
            </div>
        </div>
    </div>
</div>