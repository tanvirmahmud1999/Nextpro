<?php $job_description = get_post_meta(get_the_ID(), 'job_description'); ?>
<div class="section-job-details__circularbg">
    <div class="section-job-details__circular-max ms-auto me-auto">
        <div class="section-job-details__titlewrap wow fadeInUp" data-wow-delay="200ms">
            <h2 class="section-job-details__title mb-0"><?php the_title(); ?></h2>
            <div class="section-job-details__salary reset-ul d-flex align-items-center gap-2 gap-xl-3">
                <?php
                $salary_id = get_post_meta(get_the_ID(), 'salary_id', true);
                if (!empty($salary_id)) {
                    $text_args = array(
                        'tag' => 'span',
                        'tagclass' => 'salary-range fw-semibold',
                        'before' => '',
                        'after' => ''
                    );
                    $salary_id = control_agency_parse_text($salary_id, $text_args);
                }

                control_agency_content($salary_id, '<h4 class="salary-currency fw-medium"> ', '</h4>');
                ?>
            </div>
        </div>
        <div class="section-job-details__circularwrap d-flex flex-lg-wrap align-items-center">
            <div class="section-job-details__circular d-flex flex-wrap">
                <?php if (!empty($job_description[0]['title'])) : ?>
                    <?php foreach ($job_description as $item) :
                    extract(wp_parse_args($item, [
                        'title' => '',
                        'desc' => '',
                    ]));
                        if (empty($item['title']) || empty($item['desc'])) continue; ?>
                        <div class="section-job-details__circularcol wow fadeInUp" data-wow-delay="200ms">
                            <h5 class="mb-0 fw-semibold"><?php echo esc_html($item['title']) ?></h5>
                            <p class="mb-0"><?php echo esc_html($item['desc']) ?></p>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <?php
            $button_text = get_post_meta(get_the_ID(), 'button_text', true);
            if (!empty($button_text)) {
                $permalink = get_permalink();
                echo control_agency_content($button_text, '<a href="' . esc_url($permalink) . '" class="next-marketing-btn dark-btn m-md-auto">', '</a>');
            } ?>
        </div>
    </div>
</div>