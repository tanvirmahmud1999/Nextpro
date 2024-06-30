<section class="services-details-seo pt-0">
    <div class="container">
        <div class="row gutter-y-30 justify-content-lg-end">
            <div class="col-lg-8">
                <?php
                control_agency_content($title, '<h3 class="mb-4">', '</h3>');
                control_agency_content($subtitle, '<p class="mb-4 mb-lg-5">', '</p>');
                
                if (!empty($faqs_group)) :
                    $count = 1;
                ?>
                    <div class="accordion section-faq__wrap" id="accordionListingFaqs">
                        <?php foreach ($faqs_group as $item) : ?>
                            <div class="section-faq__row" id="accordionListingFaq<?php echo esc_attr($count); ?>">
                                <h6 class="section-faq__title">
                                    <?php echo esc_attr($item['question']); ?>
                                </h6>
                                <div id="listingFaqAnswer<?php echo esc_attr($count); ?>" class="section-faq__content">
                                    <div class="section-faq__text">
                                        <?php echo wp_kses_post($item['answer']); ?>
                                    </div>
                                </div>
                            </div>
                            <?php $count++; ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>