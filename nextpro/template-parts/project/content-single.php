<?php

$category_label = get_post_meta(get_the_ID(), 'category_label', true);
$start_date_group = get_post_meta(get_the_ID(), 'start_date_group', true);
$handover = get_post_meta(get_the_ID(), 'handover', true);
$client = get_post_meta(get_the_ID(), 'client', true);
$client_website = get_post_meta(get_the_ID(), 'client_website', true);
$project_summary = get_post_meta(get_the_ID(), 'project_summary', true);


?>

<div class="row justify-content-center">
    <div class="col-lg-11 col-xl-10">
        <div class="project-description">
            <div class="project-title">
                <!-- Title -->
                <h2 class="s-52 w-700"><?php the_title() ?></h2>

                <!-- Project Data -->
                <div class="project-data">
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3">

                        <div class="col">
                            <p class="p-lg"><span><?php echo esc_attr($category_label) ?></span> <?php echo nextpro_get_the_term_list(get_the_ID(), 'portfolio_cat', '', ' , ', '', false); ?></p>
                        </div>

                        <!-- Start Date -->
                        <?php
                        extract(wp_parse_args($start_date_group, [
                            'start_date_label'     => '',
                            'start_date'   => ''
                        ]));
                        if (!empty($start_date)) :
                        ?>
                            <div class="col">
                                <!-- start_date_group -->
                                <p class="p-lg"><span><?php echo esc_attr($start_date_label) ?></span> <?php echo esc_attr($start_date) ?></p>
                            </div>
                        <?php endif; ?>
                        <!-- Handover -->
                        <?php
                        extract(wp_parse_args($handover, [
                            'handover_label'     => '',
                            'handover_date'   => ''
                        ]));
                        if (!empty($handover_date)) :
                        ?>
                            <div class="col">
                                <!-- start_date_group -->
                                <p class="p-lg"><span><?php echo esc_attr($handover_label) ?></span> <?php echo esc_attr($handover_date) ?></p>
                            </div>
                        <?php endif; ?>

                        <?php
                        extract(wp_parse_args($client, [
                            'client_label'     => '',
                            'client_name'   => ''
                        ]));
                        if (!empty($client_name)) :
                        ?>
                            <div class="col">
                                <p class="p-lg"><span><?php echo esc_attr($client_label) ?></span> <?php echo esc_attr($client_name) ?></p>
                            </div>
                        <?php endif; ?>

                        <?php
                        extract(wp_parse_args($client_website, [
                            'website_name'     => '',
                            'website_link'   => ''
                        ]));
                        if (!empty($website_link)) :
                        ?>
                            <div class="col">
                                <p class="p-lg"><a href="<?php echo esc_url($website_link) ?>" class="color--theme"><?php echo esc_attr($website_name) ?></a></p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

            </div> <!-- END PROJECT TITLE -->

            <?php if (has_post_thumbnail()) : ?>
                <!-- PROJECT PREVIEW IMAGE  -->
                <div class="project-priview-img mb-50">
                    <?php
                    printf('<img src="%s" alt="%s" class="img-fluid r-16">', get_the_post_thumbnail_url(get_the_ID(), 'nextpro-1000x600-cropped'), get_the_title());
                    ?>
                </div>
            <?php endif ?>

            <div class="project-txt">
                <?php the_content() ?>
                <?php get_template_part('template-parts/project/gallery') ?>
                <!-- Project Summary -->
                <?php
                extract(wp_parse_args($project_summary, [
                    'summary_label'     => '',
                    'summary_content'   => ''
                ]));
                if (!empty($summary_label) ||  !empty($summary_content)) :
                ?>
                    <h5 class="s-24 w-700 mt-50 mb-35"><?php echo esc_attr($summary_label) ?></h5>
                    <?php echo wp_kses_post($summary_content) ?>
                <?php endif; ?>

                <!-- video opup -->
                <?php get_template_part('template-parts/project/video-popup') ?>

                <!-- Solution Results -->
                <?php
                $project_result = get_post_meta(get_the_ID(), 'project_result', true);
                extract(wp_parse_args($project_result, [
                    'solutiuon_label'     => '',
                    'project_content'   => ''
                ]));
                if (!empty($solutiuon_label) ||  !empty($project_content)) :
                ?>
                    <h5 class="s-24 w-700 mt-50 mb-35"><?php echo esc_attr($solutiuon_label) ?></h5>
                    <?php echo wp_kses_post($project_content) ?>
                <?php endif; ?>
            </div>


            <?php
            $more_project = get_post_meta(get_the_ID(), 'more_project', true);
            extract(wp_parse_args($more_project, [
                'more_project_label'     => '',
                'more_project_link'   => ''
            ]));
            if (!empty($more_project_label) ||  !empty($more_project_link)) :
            ?>
                <div class="more-projects ico-25 text-end pb-100">
                    <a href="<?php echo esc_url($more_project_link) ?>">
                        <h3 class="s-38 w-700"><?php echo esc_attr($more_project_label) ?></h3><span class="flaticon-next"></span>
                    </a>
                </div>
            <?php endif; ?>

        </div>
    </div>
    <!-- project-description -->
</div>
</div> <!-- End row -->