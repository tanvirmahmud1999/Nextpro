<?php
$designation = get_post_meta(get_the_ID(), 'designation', true);
$contact_info = get_post_meta(get_the_ID(), 'contact_info');
$social_links = get_post_meta(get_the_ID(), 'social_links');
?>
<div class="team-seo-expert__info wow fadeInUp" data-wow-delay="200ms">
    <?php the_title('<h3 class="team-seo-expert__name mb-0">', '</h3>'); ?>
    <?php  control_agency_content($designation, '<h5 class="team-seo-expert__designation">', '</h5>'); ?>
    
    <?php if(!empty($contact_info)): ?>
    <ul class="reset-ul team-seo-expert__details">
        <?php 
        foreach ($contact_info as $info) {
            extract(wp_parse_args($info, [
                'label' => '',
                'value' => '',
                'url' => '',
            ]));
            if(empty($label) || empty($value)) continue;
            if(!empty($url)){
                printf('<li><strong>%1$s: </strong><a href="%3$s">%2$s</a></li>', esc_attr($label), esc_attr($value), esc_url($url));
            }else{
                printf('<li><strong>%1$s: </strong>%2$s</li>', esc_attr($label), esc_attr($value));
            }            
        } 
        ?>      
    </ul>
    <?php endif; ?>
    
    <?php if(!empty($social_links)): ?>
    <ul class="footer__socialwrap reset-ul d-flex">
    <?php 
        foreach ($social_links as $social_link) {
            extract(wp_parse_args($social_link, [
                'label' => '',
                'icon' => '',
                'url' => '',
                'css_class' => '',
            ]));
            if(empty($icon) || empty($url)) continue;
           
            printf('<li><a href="%2$s" target="_blank"%3$s%4$s>%1$s</a></li>', 
                nextpro_get_icon_svg('social', $icon, 35), 
                esc_url($url), 
                !empty($label)? ' title="'. esc_attr($label) .'"' : '', 
                !empty($css_class)? ' class="'. esc_attr($css_class) .'"' : ''
            );                      
        } 
        ?>         
    </ul>
    <?php endif; ?>
</div>