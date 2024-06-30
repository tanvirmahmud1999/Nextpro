<div class="team-seo-expert--single__achievement single-item wow fadeInUp" data-wow-delay="200ms">
    <?php if (!empty($featured_label)) : ?>
        <?php $featured_label = control_agency_parse_text($featured_label); ?>
        <?php control_agency_content($featured_label, '<h3 class="single-item__title">', '</h3>'); ?>
    <?php endif; ?>

    <div class="row gutter-y-20">
        <?php
        $projects = get_posts([
            'numberposts' => -1,
            'post_type' => 'controlproject',
            'orderby' => 'menu_order',
            'order' => 'ASC'
        ]);

        if ((!empty($projects) && !is_wp_error($projects)) && count($projects) > 0) :
            foreach ($projects as $project) :
                $active_class = (get_the_ID() == $project->ID) ? ' active' : '';
        ?>
                <div class="col-lg-6">
                    <div class="section-study__col wow fadeInUp position-relative<?php echo esc_attr($active_class); ?>" data-wow-delay="00ms">
                        <div class="section-study__image">
                            <?php $image_url = get_the_post_thumbnail_url($project->ID, 'nextpro-368x421-cropped'); ?>
                            <img src="<?php echo get_template_directory_uri() ?>/assets/images/placeholder.svg" data-src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr(get_the_title($project->ID)); ?>">
                        </div>
                        <div class="section-study__info wow fadeInUp" data-wow-delay="100ms">
                            <h4 class="section-study__title"><a href="<?php echo get_permalink($project->ID); ?>"><?php echo get_the_title($project->ID); ?></a></h4>
                            <p class="section-study__text"><?php echo esc_html(get_post_meta($project->ID, 'project_description', true)); ?></p>
                        </div>
                    </div>
                </div>
        <?php
            endforeach;
        endif;
        ?>
    </div>
</div>