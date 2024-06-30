<div class="row gutter-y-50">
    <?php
    if (!empty($pricing_items)) :
        $column_width = control_agency_parse_text($column_width);
        $lg = 12 / $column_width;
        $lg = ($lg - floor($lg)) < 0.5 ? floor($lg) : ceil($lg);

        $count = 1;
        foreach ($pricing_items as $item) :
    ?>
            <div class="col-lg-<?php echo esc_attr($lg) ?>">
                <div class="section-price__pricerow wow fadeInUp" data-wow-delay="<?php echo $count * 100; ?>ms">
                    <div class="section-price__pricebg d-flex flex-wrap">
                        <!-- Package title -->

                        <div class="section-price__titlewrap">
                            <?php
                            if (!empty($item['plan_title'])) {
                                $title = control_agency_parse_text($item['plan_title']);
                                control_agency_content($title, '<h3 class="section-price__title">', '</h3>');
                            }
                            if (!empty($item['value_for_money'])) {
                                $value = control_agency_parse_text($item['value_for_money']);
                                control_agency_content($value, '<span class="section-price__valuetag">', '</span>');
                            }
                            ?>
                        </div>
                        <!-- price value -->
                        <div class="section-price__ammountwrap">
                            <?php
                            if (!empty($item['price_suffix'])) {
                                $price_suffix = control_agency_parse_text($item['price_suffix']);
                                control_agency_content($price_suffix, '<span class="section-price__symble">', '</span>');
                            }
                            if (!empty($item['price'])) {
                                $price = control_agency_parse_text($item['price']);
                                control_agency_content($price, '<strong class="section-price__number">', '</strong>');
                            }
                            if (!empty($item['subscription_label'])) {
                                $subscription_label = control_agency_parse_text($item['subscription_label']);
                                control_agency_content($subscription_label, '<small class="section-price__month">', '</small>');
                            }
                            ?>
                        </div>
                        <!-- information -->
                        <?php if (!empty($item['plan_subtitle']) || !empty($item['price_button_text'])) : ?>
                            <div class="section-price__leftinfo">
                                <h6 class="section-price__listtitle"><?php echo esc_html__('Ideal for:', 'nextpro') ?></h6>
                                <?php
                                if (!empty($item['plan_subtitle'])) {
                                    $title = control_agency_parse_text($item['plan_subtitle']);
                                    control_agency_content($title, '<p class="section-price__infotext">', '</p>');
                                }
                                ?>
                                <?php if (!empty($item['price_button_url']) || !empty($item['price_button_text'])) : ?>
                                    <a href="<?php echo esc_url($item['price_button_url']); ?>" class="section-price__btn next-marketing-btn dark-btn btn">
                                        <?php echo esc_html($item['price_button_text']); ?>
                                        <svg width="17" height="15" viewBox="0 0 17 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M16 7.49976L1 7.49976" stroke="#2E4DFE" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M9.9502 1.47541L16.0002 7.49941L9.9502 13.5244" stroke="#2E4DFE" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </a>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                        <!-- Price features -->
                        <div class="section-price__rightinfo">
                            <?php if (!empty($item['price_features'])) : ?>
                                <div class="section-price__infocol">
                                    <h6 class="section-price__listtitle"><?php echo esc_html__('Services Included:', 'nextpro') ?></h6>
                                    <ul class="reset-ul section-price__list">
                                        <?php
                                        $item['price_features'] = !is_array($item['price_features']) ? explode(',', $item['price_features']) : $item['price_features'];
                                        foreach ($item['price_features'] as $price_feature) :
                                        ?>
                                            <li><?php echo esc_html($price_feature); ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            <?php endif; ?>
                            <?php if (!empty($item['price_addons'])) : ?>
                                <div class="section-price__infocol">
                                    <h6 class="section-price__listtitle"><?php echo esc_html__('Additional Add-ons:', 'nextpro') ?></h6>
                                    <ul class="reset-ul section-price__list">
                                        <?php
                                        if (!empty($item['price_addons'])) :
                                            $item['price_addons'] = !is_array($item['price_addons']) ? explode(',', $item['price_addons']) : $item['price_addons'];
                                            foreach ($item['price_addons'] as $item_addon) :
                                        ?>
                                                <li><?php echo esc_html($item_addon); ?></li>
                                        <?php
                                            endforeach;
                                        endif;
                                        ?>
                                    </ul>
                                </div>
                            <?php endif; ?>
                        </div>
                        <!-- Price features end -->
                    </div>
                </div>
            </div>
    <?php
            $count++;
        endforeach;
    endif;
    ?>
</div>