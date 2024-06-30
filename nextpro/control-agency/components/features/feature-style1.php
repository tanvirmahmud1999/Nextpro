<?php if (!empty($features_list)) : ?>
    <div class="section-provide__feature d-flex flex-wrap">
        <?php
        $count = 1;
        foreach ($features_list as $item) : ?>
            <div class="section-provide__ftwrap d-flex align-items-center">
                <?php
                if (empty($item['features_title'])) {
                    $features_title = get_bloginfo('name');
                } else {
                    $features_title = control_agency_parse_text($item['features_title']);
                }

                if (!empty($item['image'])) {
                    $image_url = wp_get_attachment_image_url($item['image'], 'full');
                } else {
                    if ($count == 1) {
                        $image_url = get_theme_file_uri('assets/images/shapes/Category.png');
                    } elseif ($count == 2) {
                        $image_url = get_theme_file_uri('assets/images/shapes/Filter.png');
                    } elseif ($count == 3) {
                        $image_url = get_theme_file_uri('assets/images/shapes/Shield-Done.png');
                    } else
                        $image_url = get_theme_file_uri('assets/images/shapes/Filter.png');
                }

                $image_alt_text = !empty($item['image_alt_text']) ? esc_attr($item['image_alt_text']) : 'icon';
                ?>
                <div class="section-provide__icon connectivity">
                    <img class="img-1 grow-up" src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt_text); ?>">
                </div>
                <?php if (!empty($features_title)) {
                    control_agency_content($features_title, '<h5 class="section-provide__fTitle">', '</h5>');
                } ?>
            </div>
        <?php $count++;
        endforeach; ?>
    </div>
<?php endif; ?>