<?php if (!empty($ratings)) : ?>
    <div class="section-rating" data-bs-theme="light">
        <div class="container">
            <div class="section-rating__bg">
                <div class="row gap-xl-4">
                    <div class="section-rating__counting-wrap">
                        <ul class="reset-ul section-rating__counter-bx d-flex align-items-center">
                            <?php foreach ($fun_facts as  $fact) :
                                $count = isset($fact['fun_fact_value']) ? $fact['fun_fact_value'] : 0;
                            ?>
                                <li class="count-box wow fadeInUp" data-wow-delay="00ms">
                                    <div class="section-hero-two__count-wrap d-flex align-items-center">
                                        <?php
                                        printf(
                                            '<span class="section-hero-two__funfactcount odometer" data-count-to="%s"></span>',
                                            esc_attr($count),
                                        );
                                        if (!empty($fact['suffix'])) {
                                            $suffix = control_agency_parse_text($fact['suffix']);
                                            control_agency_content($suffix, '<span class="section-hero-two__funfactcount odometer-icon">', '</span>');
                                        }
                                        ?>
                                    </div>
                                    <?php
                                    $label = control_agency_parse_text($fact['label']);
                                    control_agency_content($label, '<p class="section-rating__counter-text">', '</p>');
                                    ?>
                                </li>
                            <?php endforeach ?>
                        </ul>
                    </div>

                    <div class="section-rating__slider-wrap d-flex flex-wrap align-items-center">
                        <?php
                        $taring_quote = control_agency_parse_text($taring_quote);
                        control_agency_content($taring_quote, '<h5 class="section-rating__slider-title wow fadeInUp" data-wow-delay="100ms">', '</h5>');
                        ?>
                        <div class="section-rating__slider-bx">
                            <div class="nextmarketing-owl__carousel owl-carousel" id="rating-owl" data-owl-options='{
                                    "loop": true,
                                    "animateOut": "fadeOut",
                                    "animateIn": "fadeIn",
                                    "items": 3.4,
                                    "center" : false,
                                    "autoplay": false,
                                    "autoplayTimeout": 2000,
                                    "smartSpeed": 1000,
                                    "nav": false,
                                    "navText": "",
                                    "dots": false,
                                    "margin": 50,
                                    "responsive": {
                                        "0": {
                                            "items": 1,
                                            "margin": 0
                                        },
                                        "767": {
                                            "items": 1.5,
                                            "margin": 25
                                        },
                                        "1600":{
                                            "items": 3.4,
                                            "margin": 50
                                        }
                                    }
                                }'>
                                <?php
                                foreach ($ratings as $item) :
                                    if (empty($item['image']) && empty($item['title'])) continue;
                                    $title = !empty($item['title']) ? $item['title'] : get_bloginfo('name'); ?>
                                    <div class="section-rating__slider-item wow fadeInUp d-flex align-items-center" data-wow-delay="00ms">
                                        <div class="section-rating__slider-logo">
                                            <span class="section-rating__slider-google">
                                                <?php echo nextpro_get_icon_svg('ui', $item['icon'], 75); ?>
                                            </span>
                                        </div>
                                        <div class="section-rating__slider-content">
                                            <?php
                                            $title = control_agency_parse_text($item['title']);
                                            control_agency_content($title, '<h5 class="section-rating__slider-heading">', '</h4>');
                                            ?>
                                            <div class="section-hero__review d-flex align-items-center">
                                                <p class="section-hero__rvw-text">4.8</p>
                                                <div class="section-hero__star-wrap d-flex align-items-center">
                                                    <span class="star-icon"><i class="icon-Star"></i></span>
                                                    <span class="star-icon"><i class="icon-Star"></i></span>
                                                    <span class="star-icon"><i class="icon-Star"></i></span>
                                                    <span class="star-icon"><i class="icon-Star"></i></span>
                                                    <span class="star-icon"><i class="icon-Star"></i></span>
                                                </div>
                                            </div>
                                            <?php
                                            $link = !empty($item['link']) ? $item['link'] : '';
                                            $link_text = !empty($item['link_text']) ? $item['link_text'] : '';
                                            if ($link) : ?>
                                                <a href="<?php echo esc_url($link) ?>"><span class="section-rating__slider-text"><?php echo esc_html($link_text) ?> </span></a>
                                            <?php else : ?>
                                                <span class="section-rating__slider-text"><?php echo esc_html($link_text) ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<!-- ./section-rating end -->