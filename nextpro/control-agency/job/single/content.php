<section class="section-job-details pt-0">
    <div class="container">
        <div class="row g-0">
            <?php control_agency_render_template('job/single/job-description.php'); ?>
            <div class="section-job-details__circular-max">
                <div class="section-job-details__description d-flex flex-wrap justify-content-between">
                    <div class="col-lg-7">
                        <div class="section-job-details__description__content">
                            <div class="section-job-details__description__item wow fadeInUp" data-wow-delay="200ms">
                                <?php the_content(); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <?php control_agency_render_template('job/single/sidebar.php', $args); ?>
                    </div> 
                </div> 
            </div>
        </div>
    </div>
</section>
