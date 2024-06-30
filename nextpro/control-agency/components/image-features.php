<?php if (!empty($features_thumbnail)) : ?>
    <div class="col-sm-12">
        <div class="section-team__wrap">
            <div class="section-team__max-inner">
                <?php if (!empty($features_thumbnail)) : ?>
                    <div class="section-team__image wow fadeIn" data-wow-delay="200ms">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/placeholder.svg" data-src="<?php echo esc_url($features_thumbnail); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
                    </div>
                <?php endif; ?>
                <?php if (!empty($image_features)) : ?>
                    <div class="section-team__feature-wrap row gutter-y-10">
                        <?php
                        $column_width = control_agency_parse_text($column_width);
                        foreach ($image_features as $item) :
                            if (empty($item['title']) && empty($item['desc'])) continue;
                        ?>
                            <div class="section-team__feature-col wow fadeInUp col-lg-<?php echo esc_attr($column_width); ?> d-flex flex-wrap align-items-center" data-wow-delay="0ms">
                                <?php if (!empty($item['image'])) {
                                    $format = '<div class="section-team__feature-icon"><img src="%1$s" alt="%2$s"></div>';
                                    printf($format, esc_url($item['image']), esc_attr($item['title']));
                                }
                                ?>
                                <div class="section-team__feature-info">
                                    <?php
                                    if (!empty($item['title'])) {
                                        $title = control_agency_parse_text($item['title']);
                                        control_agency_content($title, '<h4 class="section-team__feature-titel"><a href="#">', '</a></h4>');
                                    }
                                    if (!empty($item['desc'])) {
                                        $desc = control_agency_parse_text($item['desc']);
                                        control_agency_content($desc, '<p class="section-team__feature-text">', '</p>');
                                    } ?>
                                </div>
                            </div>
                        <?php
                        endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php else :
    echo 'Not block found!';
endif;
?>