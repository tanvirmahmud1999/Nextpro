<?php
add_filter('control_agency_get_job_blocks_std', function () {
    return [
        [
            'name' => 'Job Banner',
            'template' => 'banner-single',
        ],
        [
            'name' => 'Job Content',
            'template' => 'editor-content',
        ]

    ];
});

add_filter('control_agency_job_banner_single_std', function ($defaults) {
    $defaults = array_merge($defaults, [
        'template' => 'job/single/banner.php',
        'title' => '[job_title]',
        'subtitle' => '',
    ]);
    return $defaults;
});

add_filter('control_agency_job_editor_content_std', function ($defaults) {
    $defaults = array_merge($defaults, [
        'template' => 'job/single/content.php',
        'title'    => '[job_title]',
        'sidebar_title' => 'Benifits',
        'benifits' => [
            [
                'image' => get_theme_file_uri('assets/images/shapes/job-feature-icon1-1.png'),
                'title' => ' Competitive salary commensurate with experience.',
            ],
            [
                'image' => get_theme_file_uri('assets/images/shapes/job-feature-icon1-2.png'),
                'title' => ' Comprehensive benefits package, including health insurance and retirement plans.',
            ],
            [
                'image' => get_theme_file_uri('assets/images/shapes/job-feature-icon1-3.png'),
                'title' => ' Flexible work schedule and remote work options.',
            ],
            [
                'image' => get_theme_file_uri('assets/images/shapes/job-feature-icon1-4.png'),
                'title' => ' Opportunities for professional development and advancement within the company.',
            ],
            [
                'image' => get_theme_file_uri('assets/images/shapes/job-feature-icon1-5.png'),
                'title' => ' Dynamic and collaborative work environment with a focus on creativity and innovation.'
            ],
            [
                'image' => get_theme_file_uri('assets/images/shapes/job-feature-icon1-6.png'),
                'title' => ' environment with a focus on creativity and innovation.',
            ],

        ],

    ]);
    return $defaults;
});
