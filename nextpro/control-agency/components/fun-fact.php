<?php
$fun_facts = get_post_meta(get_the_ID(), 'fun_facts_items', true);

if (!empty($fun_facts_items)) :
?>
<div class="section-funfact">
    <div class="container">
        <ul class="section-funfact__list reset-ul d-flex flex-wrap align-items-center justify-content-between">
            <?php foreach ($fun_facts_items as $index => $fun_fact) : 
                $count = isset($fun_fact['fun_fact_count']) ? $fun_fact['fun_fact_count'] : 0;
                $suffix = isset($fun_fact['fun_fact_suffix']) ? $fun_fact['fun_fact_suffix'] : '';
                $text = isset($fun_fact['fun_fact_text']) ? $fun_fact['fun_fact_text'] : '';
                $delay = isset($fun_fact['fun_fact_delay']) ? $fun_fact['fun_fact_delay'] : 0;
            ?>
            <li class="section-funfact__item count-box wow fadeInUp counted" data-wow-delay="<?php echo esc_attr($delay); ?>ms" style="visibility: visible; animation-delay: <?php echo esc_attr($delay); ?>ms;">
                <div class="section-funfact__content d-flex align-items-center">
                    <div class="section-funfact__count-wrap d-flex align-items-center">
                        <span class="section-funfact__count odometer odometer-auto-theme" data-count-to="<?php echo esc_attr($count); ?>">
                            <div class="odometer-inside">
                                <span class="odometer-digit">
                                    <span class="odometer-digit-spacer"></span>
                                    <span class="odometer-digit-inner">
                                        <span class="odometer-ribbon">
                                            <span class="odometer-ribbon-inner">
                                                <span class="odometer-value"><?php echo esc_html($count); ?></span>
                                            </span>
                                        </span>
                                    </span>
                                </span>
                            </div>
                        </span>
                        <span class="section-funfact__counter-text odometer-icon"><?php echo esc_html($suffix); ?></span>
                    </div>
                    <p class="section-funfact__text"><?php echo esc_html($text); ?></p>
                </div>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
<?php endif; ?>
