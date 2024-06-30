 <div class="section-approach">
     <div class="tabs-wrapper">
         <div class="section-approach__facilities tab-item-parent d-flex flex-wrap">
             <?php $count = 1;
                $active_tab = 2;
                foreach ($working_approach as $key => $item) : ?>
                 <!-- tab-menu -->
                 <div class="section-approach__facilities__col <?php echo esc_attr($key == 0 ? 'tab-active' : '') ?>  tab-item wow fadeInUp d-flex align-items-center" data-wow-delay="00ms" data-tab="approach-tab<?php echo esc_attr($count) ?>">
                     <?php
                        // icon
                        $alt_text = !empty($item['title']) ? esc_attr($item['title']) : 'icon';
                        if (!empty($item['tab_icon'])) {
                            $icon_url = wp_get_attachment_image_url($item['tab_icon'], 'nextpro-80x80-cropped');
                        } else {
                            if ($count == 1) {
                                $icon_url = get_theme_file_uri('assets/images/shapes/approach-icon4-1.png');
                            } elseif ($count == 2) {
                                $icon_url = get_theme_file_uri('assets/images/shapes/approach-icon4-2.png');
                            } elseif ($count == 3) {
                                $icon_url = get_theme_file_uri('assets/images/shapes/approach-icon4-3.png');
                            } elseif ($count == 4) {
                                $icon_url = get_theme_file_uri('assets/images/shapes/approach-icon4-4.png');
                            } else
                                $icon_url = get_theme_file_uri('assets/images/shapes/approach-icon4-5.png');
                        }
                        ?>
                     <div class="section-approach__facilities__icon">
                         <img src="<?php echo esc_url($icon_url); ?>" alt="<?php echo esc_attr($alt_text); ?>">
                     </div>
                     <!-- label -->
                     <div class="section-approach__facilities__titlewrap">
                         <?php
                            if (!empty($item['tab_label'])) {
                                $tab_label = control_agency_parse_text($item['tab_label']);
                                control_agency_content($tab_label, '<h5 class="section-approach__facilities__title">', '</h5>');
                            }
                            ?>
                     </div>
                 </div>
             <?php $count++;
                endforeach; ?>
         </div>
         <!-- tab-item-parent end -->
         <div class="section-approach__content-bg">
             <div class="section-approach__content-inner tabs-content-parent position-relative overflow-hidden">
                 <!-- tab-content -->

                 <?php $count = 1;
                    foreach ($working_approach as $key => $item) : ?>
                     <div class="tab-content <?php echo esc_attr($key == 0 ? 'content-active' : '') ?>" id="approach-tab<?php echo esc_attr($count) ?>">
                         <div class="row">
                             <div class="col-lg-6">
                                 <div class="section-approach__left wow fadeInLeft" data-wow-delay="200ms">
                                     <?php if (!empty($item['title'])) {
                                            $title = control_agency_parse_text($item['title']);
                                            control_agency_content($title, '<h3 class="section-approach__title">', '</h3>');
                                        }
                                        if (!empty($item['desc'])) {
                                            $desc = control_agency_parse_text($item['desc']);
                                            control_agency_content($desc, '<p class="section-approach__text">', '</p>');
                                        }
                                        echo control_agency_get_btn($item['buttons']);
                                        ?>
                                 </div>
                             </div>

                             <div class="col-lg-6">
                                 <?php
                                    $alt_text = !empty($item['title']) ? esc_attr($item['title']) : 'icon';
                                    if (!empty($item['image'])) {
                                        $image_url = wp_get_attachment_image_url($item['image'], 'nextpro-540x360-cropped');
                                    } else {
                                        if ($count == 1) {
                                            $image_url = get_theme_file_uri('assets/images/resource/approach-image4-1.jpg');
                                        } elseif ($count == 2) {
                                            $image_url = get_theme_file_uri('assets/images/resource/approach-image4-2.jpg');
                                        } elseif ($count == 3) {
                                            $image_url = get_theme_file_uri('assets/images/resource/approach-image4-1.jpg');
                                        } elseif ($count == 4) {
                                            $image_url = get_theme_file_uri('assets/images/resource/approach-image4-2.jpg');
                                        } else
                                            $image_url = get_theme_file_uri('assets/images/resource/approach-image4-1.jpg');
                                    }
                                    ?>
                                 <div class="section-approach__image wow fadeInRight" data-wow-delay="200ms">
                                     <img src="<?php echo get_template_directory_uri() ?>/assets/images/placeholder.svg" data-src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($alt_text); ?>">
                                 </div>
                             </div>
                         </div>
                     </div>
                 <?php $count++;
                    endforeach; ?>
             </div>
         </div>
         <!-- content end -->
     </div>
 </div>