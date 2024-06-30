 <?php
    if (!empty($faqs_group)) :
        $count = 1;
    ?>
     <div class="accordion section-faq__wrap" id="accordionListingFaqs">
         <?php foreach ($faqs_group as $faq) :
            ?>
             <div class="section-faq__row wow fadeInUp" id="accordionListingFaq<?php echo esc_attr($count); ?>">
                 <?php
                    if (!empty($faq['question'])) {
                        $question = control_agency_parse_text($faq['question']);
                        control_agency_content($question, '<h6 class="section-faq__title">', '</h6>');
                    }
                    ?>
                 <div id="listingFaqAnswer<?php echo esc_attr($count) ?>" class="section-faq__content">
                     <?php
                        if (!empty($faq['answer'])) {
                            $answer = control_agency_parse_text($faq['answer']);
                            control_agency_content($answer, '<div class="section-faq__text">', '</div>');
                        }
                        ?>
                 </div>
             </div>
         <?php $count++;
            endforeach; ?>
     </div>
 <?php
    endif;
    ?>