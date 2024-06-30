<section class="services-details-seo pb-0">
    <div class="container">
        <div class="row gutter-y-30">
            <?php
            $services = get_posts(['numberposts' => -1, 'post_type' => 'controlservice', 'orderby' => 'menu_order', 'order' => 'ASC']);
            if ((!empty($services) || !is_wp_error($services)) && (count($services) > 1)) :
            ?>
                <div class="col-lg-4">
                    <aside class="sidebar">
                        <div class="sidebar__single sidebar__single--servicesoffer">
                            <?php control_agency_content($sidebar_title, '<h4 class="sidebar__title">', '</h4>'); ?>
                            <div class="sidebar__single__inner sidebar__single__bg">
                                <ul class="reset-ul sidebar__nav">
                                    <?php
                                    foreach ($services as $service) :
                                        $active_class = (get_the_ID() == $service->ID) ? ' class="active"' : '';
                                        printf('<li%3$s><a href="%2$s">%1$s</a></li>', get_the_title($service->ID), get_permalink($service->ID), $active_class);
                                    endforeach;
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </aside>
                </div>
            <?php endif; ?>
            <div class="col-lg-8">
                <div class="services-details-seo__content">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="services-details-seo__feature-img mb-4 mb-lg-5">
                            <?php the_post_thumbnail('nextpro-872x472-cropped', ['class' => 'rounded-5']) ?>
                        </div>
                    <?php endif; ?>
                    <?php
                    $post_title = control_agency_parse_text($post_title, ['class' => 'fw-bold']);
                    control_agency_content($post_title, '<h4 class="sec-title__title mb-4">', '</h4>');
                    ?>
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </div>
</section>