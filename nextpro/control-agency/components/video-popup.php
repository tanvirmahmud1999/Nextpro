<?php ?>
<div class="section-dashboard__popimg wow fadeInUp" data-wow-delay="200ms">
    <?php
    // Sample data for demonstration, replace this with actual data source.
    $image_src = control_agency_get_attachment_url($popup_background_image, 'full', get_theme_file_uri('assets/images/resource/dashboard1-1.png'));

    ?>
    <!-- Output the image with the correct src attribute -->
    <img src="<?php echo esc_url($image_src); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">

    <div class="section-dashboard__playwrap">
        <div class="section-dashboard__playbtn">
            <a href="<?php echo esc_url($popup_link) ?>" class="video-popup-link"><img src="<?php echo get_template_directory_uri() ?>/assets/images/shapes/play-btn1-1.png" alt="play"></a>
        </div>
        <div class="waves wave-1"></div>
        <div class="waves wave-2"></div>
        <div class="waves wave-3"></div>
    </div>
</div>
<!-- section-dashboard__popimg -->
<?php if (!empty($video_features)) : ?>
    <div class="section-dashboard__bg">
        <div class="row gy-3">
            <?php
            // Large Device
            $lg_device = control_agency_parse_text($lg_device);
            // Calculate $lg
            $lg = 12 / $lg_device;
            $lg = ($lg - floor($lg)) < 0.5 ? floor($lg) : ceil($lg);
            $count = 1;
            foreach ($video_features as $item) :
                if (empty($item['title']) && empty($item['desc'])) continue;
            ?>
                <div class="col-lg-<?php echo esc_attr($lg) ?>">
                    <div class="section-dashboard__row d-flex align-items-center wow fadeInLeft" data-wow-delay="200ms">
                        <div class="section-dashboard__row-icon">
                            <?php
                            if (!empty($item['image'])) {
                                $image_url = wp_get_attachment_image_url($item['image'], 'nextpro-80x80-cropped');
                            } else {
                                if ($count == 1) {
                                    $image_url = get_theme_file_uri('assets/images/shapes/edit-icon1-1.svg');
                                } elseif ($count == 2) {
                                    $image_url = get_theme_file_uri('assets/images/shapes/discount-icon1-1.svg');
                                } else
                                    $image_url = get_theme_file_uri('assets/images/shapes/edit-icon1-1.svg');
                            }

                            ?>
                            <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo get_bloginfo('name') ?>">
                        </div>
                        <div class="section-dashboard__row-info">
                            <?php
                            if (!empty($item['title'])) {
                                $title = control_agency_parse_text($item['title']);
                            } ?>
                            <h4 class="section-dashboard__row-title"><a href="<?php echo get_the_permalink() ?>"> <?php echo esc_attr($title) ?></a></h4>
                            <?php
                            if (!empty($item['desc'])) {
                                $desc = control_agency_parse_text($item['desc']);
                                control_agency_content($desc, '<p class="section-dashboard__row-text">', '</p>');
                            } ?>
                        </div>
                    </div>
                </div>
            <?php $count++;
            endforeach; ?>
        </div>
    </div>
<?php endif; ?>