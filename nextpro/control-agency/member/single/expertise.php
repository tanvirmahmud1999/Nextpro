<div class="single-item wow fadeInUp" data-wow-delay="200ms">
    <?php
    if (!empty($expertise_label)) {
        $expertise_label = control_agency_parse_text($expertise_label);
        control_agency_content($expertise_label, '<h3 class="single-item__title">', '</h3>');
    }
    ?>
    <?php if (!empty($progress_items[0]['progress_label'])) : ?>
        <div class="section-progress-stories__progress-wrap wow fadeInUp" data-wow-delay="90ms">
            <?php foreach ($progress_items as $item) : ?>
                <div class="section-progress-stories__progress">
                    <?php if (!empty($item['progress_label'])) : ?>
                        <?php $progress_label = control_agency_parse_text($item['progress_label']); ?>
                        <?php control_agency_content($progress_label, '<h5 class="section-progress-stories__progress-title">', '</h5>'); ?>
                    <?php endif; ?>
                    <?php $progress_value = control_agency_parse_text($item['progress_value']); ?>
                    <div class="section-progress-stories__progress-bar position-relative">
                        <div class="section-progress-stories__progress-inner count-bar counted" data-percent="<?php echo esc_attr($progress_value); ?>%" style="width: <?php echo esc_attr($progress_value); ?>%;">
                            <div class="section-progress-stories__progress-number count-text"><?php echo esc_attr($progress_value); ?>%</div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>