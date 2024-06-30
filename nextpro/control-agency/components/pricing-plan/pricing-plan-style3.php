 <div class="section-price-table p-0">
     <div class="tabs-wrapper">
         <div class="section-price-table__tabs-wrap wow fadeInUp" data-wow-delay="200ms">
             <div class="section-price-table__tabs-row tab-item-parent d-flex align-items-center">
                 <?php $count = 1;
                    foreach ($pricing_group as  $item) : ?>
                     <strong class="section-price-table__tab tab-item <?php echo esc_attr($count == 1 ? 'tab-active' : '') ?>" data-tab="tab<?php echo esc_attr($count) ?>">
                         <?php
                            if (!empty($item['menu_name'])) {
                                $title = control_agency_parse_text($item['menu_name']);
                                control_agency_content($title, '<span>', '</span>');
                            } ?>
                     </strong>
                     <?php
                        // Check if it's the first item
                        if ($count == 1) : ?>
                         <div class="section-price-table__tabs-switch">
                             <input type="checkbox" id="switch" data-name="month" value="checkbox"><label class="label-switch" for="switch"></label>
                         </div>
                     <?php endif; ?>
                 <?php $count++;
                    endforeach; ?>
             </div>


             <?php
                if (!empty($subscription_note)) {
                    $text_args = array(
                        'tag' => 'span',
                        'tagclass' => '',
                        'before' => '',
                        'after' => ''
                    );
                    $subscription_note = control_agency_parse_text($subscription_note, $text_args);
                    control_agency_content($subscription_note, '<p class="section-price-table__tab-text">', '</p>');
                }
                ?>
         </div>
         <!-- Tab Switch -->
         <div class="section-price-table__tabs-content tabs-content-parent">
             <?php
                $count = 1;
                foreach ($pricing_group as $group) :
                ?>
                 <div class="section-price-table__content-inner tab-content  <?php echo esc_attr($count == 1 ? 'content-active' : '') ?>" id="tab<?php echo esc_attr($count) ?>">
                     <div class="row gutter-y-30">
                         <?php
                            $column_width = control_agency_parse_text($group['column_width']);
                            $xl = 12 / $column_width;
                            $xl = ($xl - floor($xl)) < 0.5 ? floor($xl) : ceil($xl);
                            foreach ($group['pricing_list'] as $item) :
                            ?>
                             <div class="col-lg-<?php echo esc_attr($xl) ?>">
                                 <div class="section-price-table__col wow fadeInUp" data-wow-delay="0ms">
                                     <div class="section-price-table__bg">
                                         <div class="section-price-table__planing">
                                             <div class="section-price__titlewrap">
                                                 <?php
                                                    if (!empty($item['plan_title'])) {
                                                        $title = control_agency_parse_text($item['plan_title']);
                                                        control_agency_content($title, '<h4 class="section-price__title">', '</h4>');
                                                    }
                                                    if (!empty($item['value_for_money'])) {
                                                        $value = control_agency_parse_text($item['value_for_money']);
                                                        control_agency_content($value, ' <span class="section-price__valuetag">', '</span>');
                                                    }
                                                    ?>
                                             </div>
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
                                         </div>

                                         <div class="section-price__rightinfo">
                                             <div class="section-price__leftinfo">
                                                 <?php
                                                    if (!empty($item['plan_subtitle'])) {
                                                        $text_args = array(
                                                            'tag' => 'strong',
                                                        );
                                                        $plan_subtitle = control_agency_parse_text($item['plan_subtitle'], $text_args);
                                                        control_agency_content($plan_subtitle, '<p class="section-price__infotext">', '</p>');
                                                    }
                                                    ?>
                                             </div>

                                             <?php if (!empty($item['price_features'])) : ?>
                                                 <div class="section-price__infocol">
                                                     <h6 class="section-price__listtitle"><?php echo esc_html__('Services Included:', 'nextpro') ?></h6>
                                                     <ul class="reset-ul section-price__list">
                                                         <?php
                                                            $item['price_features'] = !is_array($item['price_features']) ? explode(',', $item['price_features']) : $item['price_features'];
                                                            foreach ($item['price_features'] as $price_feature) :

                                                                $text_args = array(
                                                                    'tag' => 'li',
                                                                    'tagclass' => 'section-price__premium',
                                                                );
                                                                $price_feature = control_agency_parse_text($price_feature);
                                                                control_agency_content($price_feature, '<li>', '</li>');
                                                            ?>
                                                         <?php endforeach; ?>
                                                     </ul>
                                                 </div>

                                             <?php endif; ?>
                                             <?php if (!empty($item['price_button_url']) || !empty($item['price_button_text'])) : ?>
                                                 <a href="<?php echo esc_url($item['price_button_url']); ?>" class="section-price-table__btn next-marketing-btn dark-btn btn">
                                                     <?php echo esc_html($item['price_button_text']); ?>
                                                     <?php echo nextpro_get_icon_svg('ui', 'btn_arrow_right', 17); ?>
                                                 </a>
                                             <?php endif; ?>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         <?php
                            endforeach;
                            ?>
                     </div>
                 </div>
             <?php
                    $count++;
                endforeach;
                ?>
         </div>
     </div>
 </div>