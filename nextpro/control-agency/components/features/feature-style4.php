<?php if (!empty($features_style4)) : ?>
    <div class="section-team__feature-wrap gy-4 row">
        <?php
        // Large Device
        $lg_device = control_agency_parse_text($lg_device);

        $count = 1;
        foreach ($features_style4 as $item) : ?>
            <div class="section-team__feature-col wow fadeInUp col-lg-<?php echo esc_attr($lg_device) ?> d-flex flex-wrap align-items-center" data-wow-delay="0ms">
                <?php

                if (!empty($item['image'])) {
                    $image_url = wp_get_attachment_image_url($item['image'], 'thumbnail');
                } else {
                    if ($count == 1) {
                        $image_url = get_theme_file_uri('assets/images/shapes/dynamic-team-icon.svg');
                    } elseif ($count == 2) {
                        $image_url = get_theme_file_uri('assets/images/shapes/skills-icon.svg');
                    } elseif ($count == 3) {
                        $image_url = get_theme_file_uri('assets/images/shapes/content-writing-icon.svg');
                    } else
                        $image_url = get_theme_file_uri('assets/images/shapes/dynamic-team-icon.svg');
                }
                $alt_text = !empty($item['title']) ? esc_attr($item['title']) : 'icon';
                ?>
                <div class="section-team__feature-icon">
                    <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($alt_text); ?>">
                </div>

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
        <?php $count++;
        endforeach; ?>
    </div>
<?php endif ?>