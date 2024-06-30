 <!-- <div class="section-hero-two"> -->
 <div class="section-hero-two__titlewrap d-flex flex-wrap">
     <?php
        if (!empty($title)) {
            $title = control_agency_parse_text($title);
            control_agency_content($title, '<div class="section-hero-two__title"><h1 class="section-hero-two__titletext">', '</h1></div>');
        }
        ?>
     <div class="section-hero-two__infocol">
         <?php
            if (!empty($desc)) {
                $desc = control_agency_parse_text($desc);
                control_agency_content($desc, '<p class="section-hero-two__infotext">', '</p>');
            } ?>
         <?php if (!empty($fun_facts)) : ?>
             <div class="section-hero-two__funfact d-flex flex-wrap align-items-center">
                 <?php foreach ($fun_facts as  $fun_fact) :
                        $count = isset($fun_fact['fun_fact_value']) ? $fun_fact['fun_fact_value'] : 0;
                    ?>
                     <div class="section-hero-two__countcol count-box d-flex align-items-center">
                         <div class="section-hero-two__count-wrap">
                             <?php
                                printf(
                                    '<span class="section-hero-two__funfactcount odometer" data-count-to="%s"></span>',
                                    esc_attr($fun_fact['fun_fact_value']),
                                );
                                if (!empty($fun_fact['fun_fact_suffix'])) {
                                    $fun_fact_suffix = control_agency_parse_text($fun_fact['fun_fact_suffix']);
                                    control_agency_content($fun_fact_suffix, '<span class="section-hero-two__funfactcount odometer-icon">', '</span>');
                                }
                                ?>
                         </div>
                         <?php
                            if (!empty($fun_fact['label'])) {
                                $label = control_agency_parse_text($fun_fact['label']);
                                control_agency_content($label, '<p class="section-hero-two__funfacttext">', '</p>');
                            } ?>
                     </div>
                 <?php endforeach ?>
             </div>
         <?php endif; ?>
     </div>
 </div>
 <!-- </div> -->