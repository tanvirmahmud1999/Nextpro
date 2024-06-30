<?php
add_filter('control_agency_get_member_blocks_std', function () {
    return [
        [
            'name' => 'Banner',
            'template' => 'banner-single',
        ],
        [
            'name' => 'Content',
            'template' => 'editor-content',
        ]
    ];
});

add_filter('control_agency_member_banner_single_std', function ($defaults) {
    $defaults = array_merge($defaults, [
        'title' => '[member_title]',
        'subtitle' => '',
    ]);
    return $defaults;
});

add_filter('control_agency_member_editor_content_std', function ($defaults) {
    $defaults = array_merge($defaults, [
        'template' => 'member/single/content.php',
        'title' => 'Meet Our [designation] [name]',     
        'expertise_label' => 'Expertise',
        'progress_items' => [
            [
                'progress_label' => 'Client Satisfaction',
                'progress_value' => '80',
            ],
            [
                'progress_label' => 'Strategic Expertise',
                'progress_value' => '62',
            ],
            [
                'progress_label' => 'Strategic Expertise',
                'progress_value' => '92',
            ],
            [
                'progress_label' => 'Strategic Expertise',
                'progress_value' => '98',
            ],
        ],
        // Testimonial
        'testimonial_label' => 'Testimonials:',
        'testimonial_quote' => '"Jennifer\'s strategic vision and leadership have been instrumental in driving our digital marketing initiatives forward. Her dedication to delivering results and commitment to client satisfaction make her a valuable asset to any team."',
        'name' => '- John Doe, Client',
        'featured_label' => 'Featured Projects:',


    ]);
    return $defaults;
});
