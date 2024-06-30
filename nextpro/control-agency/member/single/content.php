<section class="team-seo-expert team-seo-expert--single">
    <div class="container">
        <div class="row gutter-y-30">            
            
            <div class="col-lg-5">
                <div class="sticky-elements">
                    <?php control_agency_render_template('member/single/thumbnail.php') ?>
                    <?php control_agency_render_template('member/single/contact-info.php') ?>                           
                </div>
            </div>

            <div class="col-lg-7">
                <div class="team-seo-expert__content ms-lg-auto">
                    <div class="sec-title wow fadeInUp" data-wow-delay="200ms">
                        <?php 
                        
                        $designation = get_post_meta(get_the_ID(), 'designation', true);
                        $title =  str_replace(['[designation]', '[name]'], [$designation, get_the_title()], $title);
                        $title = control_agency_parse_text($title, ['class' => 'fw-bold']);
                        control_agency_content($title, '<h2 class="sec-title__title fw-normal mb-4 mb-lg-5">', '</h2>');
                        ?> 
                      <?php  the_content(); ?>              
                    </div>

                    <?php control_agency_render_template('member/single/expertise.php', $args) ?>
                    <?php control_agency_render_template('member/single/testimonial.php', $args) ?>
                    <?php control_agency_render_template('member/single/projects.php', $args) ?>
                    
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ./team-seo-expert end -->