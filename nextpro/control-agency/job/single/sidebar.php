<div class="section-job-details__description__benefites sticky-elements wow fadeInUp" data-wow-delay="200ms">
    <?php
    if (!empty($sidebar_title)) {
        $sidebar_title = control_agency_parse_text($sidebar_title);
        control_agency_content($sidebar_title, '<h3 class="section-job-details__description__heading">', '</h3>');
    }
    ?>

    <?php
    if (!empty($benefits[0]['image'])) :
    ?>
        <ul class="section-job-details__description__benefites-list reset-ul">
            <?php
            foreach ($benefits as $item) {
                if (empty($item['image']) || empty($item['title'])) continue;
                printf(
                    '<li class="section-portfolio-single__sidebar-item"><img src="%1$s" alt="%2$s"><span>%2$s</span></li>',
                    esc_url($item['image']),
                    esc_html($item['title'])
                );
            }
            ?>
        <?php endif; ?>
        </ul>
</div>