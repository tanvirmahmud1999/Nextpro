<?php if (!empty($service_list)) : ?>
    <div class="row gutter-y-60">
        <?php
        // Extra Large Device
        $xl_device1 = control_agency_parse_text($xl_device1);
        // Large Device
        $lg_device1 = control_agency_parse_text($lg_device1);

        // Small Device
        $md_device1 = control_agency_parse_text($md_device1);

        // Icon border radius
        $icon_rounded = control_agency_parse_text($icon_rounded);
        $icon_rounded = $icon_rounded == true ? 'rounded-3' : '';
        // Icon background color
        $icon_background = control_agency_parse_text($icon_background);

        $icon_background = $icon_background == true ? 'section-why-choose__icon' : 'section-services-two__icon';
        $title_space = $icon_background == true ? 'section-why-choose__title mb-2' : 'section-services-two__title mb-2';

        $count = 0;
        $icons_bg_variation = ['activity-two', 'send-two', 'document-two', 'shield-done-two', 'message-icon-two', 'scan-icon-two', 'discounnt-icon-two', 'buy-icon-two'];

        foreach ($service_list as $item) :
        ?>
            <div class="col-xl-<?php echo esc_attr($xl_device1) ?> col-lg-<?php echo esc_attr($lg_device1) ?> col-md-<?php echo esc_attr($md_device1) ?>">
                <div class="section-services-two__col wow fadeInUp" data-wow-delay="0ms">
                    <div class="<?php echo esc_attr($icon_rounded) ?> <?php echo esc_attr($icon_background) ?> <?php echo esc_attr($icons_bg_variation[$count]) ?> ">
                        <?php
                        if (empty($item['title'])) {
                            $title = get_bloginfo('name');
                        } else {
                            $title = control_agency_parse_text($item['title']);
                        }
                        $alt_text = !empty($item['title']) ? esc_attr($item['title']) : 'icon';
                        ?>
                        <!-- Icon -->

                        <?php
                        $switch = $item['image_icon_switcher'];
                        if ($switch == 'image_icon') :  ?>
                            <div class="section-services-three__icon">
                                <img src="<?php echo esc_url($item['image_icon']) ?>" alt="<?php echo esc_attr($alt_text) ?>">
                            </div>
                        <?php else : ?>
                            <?php if (!empty($item['icon'])) {
                                echo nextpro_get_icon_svg('ui', $item['icon'], 32);
                            } else {
                                echo nextpro_get_icon_svg('ui', 'document-two', 32);
                            }  ?>
                        <?php endif; ?>

                    </div>

                    <div class="section-services-two__info">
                        <?php if (!empty($item['title'])) {
                            $title = control_agency_parse_text($item['title']);
                            control_agency_content($title, '<h5 class="' . $title_space . '"><a href="#">', '</a></h5>');
                        }
                        if (!empty($item['desc'])) {
                            $desc = control_agency_parse_text($item['desc']);
                            control_agency_content($desc, '<p class="section-services-two__text">', '</p>');
                        }
                        ?>
                    </div>
                </div>
            </div>
        <?php
            $count = ($count + 1) % count($icons_bg_variation);
        endforeach;
        ?>

    </div>
    <?php
    if (!empty($buttons)) {
        echo control_agency_get_btn($buttons, '', '');
    }
    ?>
<?php endif; ?>