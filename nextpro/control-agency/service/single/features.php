<section class="services-details-seo py-3">
    <div class="container">
        <div class="row gutter-y-30 justify-content-lg-end">
            <div class="col-lg-8">
                <div class="services-details-seo__approach">
                    <?php
                    control_agency_content($title, '<h3 class="mb-4">', '</h3>');
                    control_agency_content($subtitle, '<p class="mb-4 mb-lg-5">', '</p>');
                    if (!empty($features_list)) :
                    ?>
                        <div class="services-details-seo__approach-feature row">
                            <?php foreach ($features_list as $feature) : ?>
                                <div class="col-lg-6">
                                    <div class="services-details-seo__approach-col d-flex flex-wrap">
                                        <div class="services-details-seo__approach-icon document-two d-flex align-items-center justify-content-center">
                                            <?php echo nextpro_get_icon_svg('ui', $feature['icon'], 35); ?>
                                        </div>
                                        <div class="services-details-seo__approach-content">
                                            <?php
                                            control_agency_content($feature['title'], '<h5 class="services-details-seo__heading5">', '</h5>');
                                            if (!empty($feature['subtitle'])) {
                                                control_agency_content($feature['subtitle'], '<p class="mb-0">', '</p>');
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>