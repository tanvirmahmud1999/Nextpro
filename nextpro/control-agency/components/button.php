<?php
if (empty($text) || empty($url)) return;

printf(
    '<div class="d-inline-flex gap-2 align-items-center mt-2"><a href="%1$s" class="btn %4$s" target="%5$s" title="%2$s" >%2$s %3$s</a></div>',
    esc_url($url),
    esc_attr($text),
    nextpro_get_icon_svg('ui', 'btn_arrow_right', 17),
    !empty($class) ? esc_attr($class) : '',
    !empty($target) ? esc_attr($target) : '',
);
