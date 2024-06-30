<?php if (!empty($sponsor_list)) : ?>
    <div class="section-provide--three">
        <div class="section-provide__right section-provide__right--three wow fadeInUp" data-wow-delay="200ms">
            <div class="section-provide__right__bg" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/shapes/provide-bg3-1.png');"></div>
            <?php if (!empty($title) && !empty($desc)) : ?>
                <div class="section-provide__right__title-info">
                    <?php
                    $title = control_agency_parse_text($title);
                    control_agency_content($title, '<h3 class="section-provide__right__title">', '</h3>');

                    $desc = control_agency_parse_text($desc);
                    control_agency_content($desc, '<p class="section-provide__right__text">', '</p>');
                    ?>
                </div>
            <?php endif; ?>

            <div class="section-provide__right__flogowrap d-flex flex-column gap-3" data-bs-theme="light">
                <?php foreach ($sponsor_list as $key => $group) :
                    $speed_classes = [0 => 'fast', 1 => 'medium', 2 => 'medium', 3 => 'fast', 4 => 'slow', 5 => 'fast', 6 => 'medium', 7 => 'medium', 8 => 'fast', 9 => 'slow'];
                    $speed_class = isset($speed_classes[$key]) ? $speed_classes[$key] : 'default_class';
                    $position_class = ($key % 2 == 0) ? 'left' : 'right';
                ?>
                    <div class="section-provide__right__flogo-row marquee-parent left-right d-flex align-items-center flex-nowrap gap-3" data-dir="<?php echo esc_attr($position_class) ?>" data-speed="<?php echo esc_attr($speed_class) ?>">
                        <?php
                        foreach ($group['sponsors'] as $item) {
                            if (empty($item['image'])) continue;
                            $title = !empty($item['title']) ? $item['title'] : get_bloginfo('name');
                            $link = !empty($item['link']) ? $item['link'] : '';
                            if (!empty($link)) {
                                $format = ' <div class="section-provide__right__flogo marquee-clone"><a target="_blank" href="%3$s"><img src="%1$s" alt="%2$s"></a></div>';
                            } else {
                                $format = ' <div class="section-provide__right__flogo marquee-clone"><img src="%1$s" alt="%2$s"></div>';
                            }
                            printf($format, esc_url($item['image']), esc_attr($title), esc_url($link));
                        }
                        ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php endif; ?>