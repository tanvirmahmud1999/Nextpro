<?php if (!empty($client_list)) : ?>
    <section class="section-client-logo">
        <div class="container">
            <div class="section-client-logo__row row">
                <?php if (!empty($title)) : ?>
                    <div class="section-client-logo__title wow fadeInUp" data-wow-delay="200ms">
                        <?php
                        $title = control_agency_parse_text($title);
                        control_agency_content($title, '<h4 class="section-client-logo__titletext">', '</h4>');
                        ?>
                    </div>
                <?php endif; ?>
                <div class="section-client-logo__carousel nextmarketing-owl__carousel wow fadeInDown mx-auto" data-wow-delay="200ms" data-owl-options='{
                        "loop": true,
                        "animateOut": "fadeOut",
                        "animateIn": "fadeIn",
                        "items": 1,
                        "autoplay": false,
                        "autoplayTimeout": 7000,
                        "smartSpeed": 1000,
                        "nav": false,
                        "navText": "",
                        "dots": false,
                        "margin": 50,
                        "responsive": {
                            "0": {
                                "items": 1
                            },
                            "375":{
                                "items": 2
                            },
                            "992":{
                                "items": 3
                            },
                            "1200":{
                                "items": 4
                            }
                        }
                        }'>
                    <?php
                    foreach ($client_list as $item) {
                        if (empty($item['image'])) continue;
                        $title = !empty($item['title']) ? $item['title'] : get_bloginfo('name');
                        $link = !empty($item['link']) ? $item['link'] : '';
                        if (!empty($link)) {
                            $format = '<div class="section-client-logo__itemlogo" data-wow-delay="00ms"><a target="_blank" href="%3$s"><img src="%1$s" alt="%2$s"></a></div>';
                        } else {
                            $format = '<div class="section-client-logo__itemlogo" data-wow-delay="00ms"><img src="%1$s" alt="%2$s"></div>';
                        }
                        printf($format, esc_url($item['image']), esc_attr($title), esc_url($link));
                    }
                    ?>

                </div>
            </div>
        </div>
    </section>
<?php endif; ?>