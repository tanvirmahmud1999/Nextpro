<?php

$button_text = get_post_meta(get_the_ID(), 'button_text', true);
$button_link = get_post_meta(get_the_ID(), 'button_link', true);
$apply_button = get_post_meta(get_the_ID(), 'apply_button', true);
$job_location = get_post_meta(get_the_ID(), 'job_location', true);
$job_features = get_post_meta(get_the_ID(), 'job_features', true);

?>

<div class="row justify-content-center">
    <div class="col-xl-10">

        <!-- INNER PAGE TITLE -->
        <div class="inner-page-title">
            <span><?php echo nextpro_get_the_term_list(get_the_ID(), 'career_cat', '', ' , ', '', false); ?></span>
            <h2 class="s-52 w-700"><?php the_title() ?></h2>
            <p><?php echo esc_attr($job_location) ?> </p>
        </div>

        <!-- TEXT BLOCK -->
        <div class="txt-block role-info">
            <?php the_content() ?>

            <?php if (!empty($job_features)) : ?>
                <!-- BENEFITS -->
                <div class="cbox-6-wrapper bg--white-400 r-16">
                    <div class="row align-items-center row-cols-1 row-cols-md-2">
                        <?php

                        foreach ($job_features as $feature) :
                            extract(wp_parse_args($feature, [
                                'feature_title'     => '',
                                'feature_content'   => ''
                            ]));
                            if (empty($feature_title) || empty($feature_content)) continue;
                        ?>

                            <!-- CONTENT BOX #1 -->
                            <div class="col">
                                <div id="cb-6-1" class="cbox-6">
                                    <!-- Title -->
                                    <h6 class="s-20 w-700"><?php echo esc_attr($feature_title); ?></h6>
                                    <!-- Text -->
                                    <p><?php echo esc_attr($feature_content); ?></p>

                                </div>
                            </div>
                        <?php endforeach;
                        ?>

                    </div>
                </div> <!-- END BENEFITS -->
            <?php endif;  ?>

            <?php echo get_post_meta(get_the_ID(), 'detail_info', true); ?>
            <?php if (!empty($button_link) && !empty($button_text)) : ?>
                <a href="<?php echo esc_attr($button_link) ?>" class="btn r-04 btn--theme hover--theme"><?php echo esc_attr($button_text) ?></a>
            <?php endif ?>
            <!-- Button -->
        </div> <!-- END TEXT BLOCK -->

    </div>
</div> <!-- End row -->