<div class="team-seo-expert--single__achievement single-item wow fadeInUp" data-wow-delay="200ms">
    <?php if (!empty($testimonial_label)) : ?>
        <?php $testimonial_label = control_agency_parse_text($testimonial_label); ?>
        <?php control_agency_content($testimonial_label, '<h3 class="single-item__title">', '</h3>');
         ?>
        
    <?php endif; ?>

    <?php if (!empty($testimonial_quote)) : ?>
        <?php $testimonial_quote = control_agency_parse_text($testimonial_quote); ?>
        <?php control_agency_content($testimonial_quote, '<p class="mb-0">', '</p>'); ?>
    <?php endif; ?>
    <?php if (!empty($name)) : ?>
        <?php $name = control_agency_parse_text($name); ?>
        <?php control_agency_content($name, '<p><strong class="fw-semibold">', '</strong></p>'); ?>
    <?php endif; ?>
</div>