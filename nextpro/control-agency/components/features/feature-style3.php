<?php if (!empty($features_style3)) : ?>
    <div class="section-provide--three">
        <div class="section-provide__feature d-flex flex-wrap">
            <?php
            $count = 1;
            foreach ($features_style3 as $item) :
            ?>
                <div class="section-provide__ftwrap pt-4">
                    <?php
                    if (!empty($item['image'])) {
                        $image_url = wp_get_attachment_image_url($item['image'], 'full');
                    } else {
                        if ($count == 1) {
                            $image_url = get_theme_file_uri('assets/images/shapes/connectivity-icon.svg');
                        } elseif ($count == 2) {
                            $image_url = get_theme_file_uri('assets/images/shapes/email-marketing-icon.svg');
                        } else
                            $image_url = get_theme_file_uri('assets/images/shapes/connectivity-icon.svg');
                    }

                    $alt_text = !empty($item['title']) ? esc_attr($item['title']) : 'Icon';
                    ?>
                    <div class="section-provide__icon connectivity">
                        <img class="img-1 grow-up" src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($alt_text); ?>">
                    </div>

                    <?php
                    if (!empty($item['title'])) {
                        $title = control_agency_parse_text($item['title']);
                        control_agency_content($title, ' <h5 class="section-provide__fTitle">', '</h5>');
                    }  ?>
                </div>
            <?php
                $count++;
            endforeach; ?>
        </div>
        <?php
        $select_alignment = control_agency_parse_text($select_alignment);
        if (!empty($buttons)) {
            echo control_agency_get_btn($buttons, '<div class="' .  esc_attr($select_alignment) . '">', '</div>');
        }
        ?>
    </div>
<?php endif; ?>