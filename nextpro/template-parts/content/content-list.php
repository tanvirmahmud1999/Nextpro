<?php
echo "List";
extract(wp_parse_args($args, [
    'image_size' => 'post-thumbnail',
    'excerpt_length' => get_theme_mod('excerpt_length', 30)
]));
$class_thumbnail_col = !has_post_thumbnail() ? 'col-lg-12' : 'col-lg-6';
?>
<div class="blog-post wide-post">
    <div class="row d-flex align-items-center">

        <?php if (has_post_thumbnail()) : ?>
            <!-- BLOG POST IMAGE -->
            <div class="col-md-6">
                <div class="blog-post-img">
                    <?php the_post_thumbnail('nextpro-700x500-cropped', ['class' => 'img-fluid r-16']); ?>
                </div>
            </div>
        <?php endif; ?>
        <!-- BLOG POST TEXT -->
        <div class="<?php echo esc_attr($class_thumbnail_col) ?>">
            <div class="blog-post-txt">
                <?php
                if (!has_post_thumbnail()) :
                    if (is_sticky()) {
                        $sticky_text = get_theme_mod('sticky_text', 'Featured');
                        echo '<span class="featured-badge badge px-3 text-bg-primary text-white">' . esc_html($sticky_text) . '</span>';
                    }
                endif;
                nextpro_get_categories();
                ?>
                <!-- Post Tag -->


                <!-- Post Link -->
                <h3 class="post-title s-38 w-700">
                    <a href="<?php the_permalink() ?>"><?php the_title() ?></a>
                </h3>

                <!-- Text -->
                <p><?php echo wp_trim_words(get_the_excerpt(), $excerpt_length);  ?></p>

                <!-- Post Meta -->
                <div class="blog-post-meta mt-30">
                    <?php nextpro_post_meta_list(); ?>
                </div>

            </div>
        </div> <!-- END BLOG POST TEXT -->


    </div> <!-- End row -->
</div>