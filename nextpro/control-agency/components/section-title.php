<div class="sec-title wow fadeInUp <?php echo esc_attr($select_alignment) ?>">
    <?php
    if (!empty($name)) {
        $name = control_agency_parse_text($name);
        control_agency_content($name, '<span class="sec-title__tagline d-inline-block">', '</span>');
    }
    if (!empty($title)) {
        $title = control_agency_parse_text($title);
        control_agency_content($title, '<h2 class="sec-title__title">', '</h2>');
    }
    if (!empty($desc)) {
        $desc = control_agency_parse_text($desc);
        control_agency_content($desc, '<p class="section-solutions__text">', '</p>');
    }

    echo control_agency_get_btn(
        $buttons,
        '<div class="' . esc_attr($select_alignment) . '">',
        '</div>'
    );


    ?>
</div>