<?php
// Project single page Elements name and it's id gutenberg block {call-to-action-section}
add_filter('control_agency_get_project_blocks_std', function () {
    return [
        // block field id which will not show in gutenberg block editor
        [
            'name' => 'Project Banner',
            'template' => 'banner-single',
        ],
        [
            'name' => 'Project Content',
            'template' => 'editor-content',
        ],
        [
            'name' => 'Call to Action',
            'template' => 'call-to-action-section',
        ]
    ];
});


// Project single Banner default value
add_filter('control_agency_project_banner_single_std', function ($defaults) {
    $defaults = array_merge($defaults, [
        'title' => '[post_title]',
        'subtitle' => '',
    ]);
    return $defaults;
});

// Project Content Default value ( New field )
add_filter('control_agency_project_editor_content_std', function ($defaults) {
    $defaults = array_merge($defaults, [
        'template' => 'project/single/content.php',
        'title' => '[post_title]',
        'overviews' => [
            [
                'title' => 'Client:',
                'desc' => 'XYZ Furniture Co',
            ],
            [
                'title' => 'Industry:',
                'desc' => 'Furniture Manufacturing and Retail',
            ],
            [
                'title' => 'Project Duration:',
                'desc' => '6 months',
            ],
            [
                'title' => 'Services Provided:',
                'desc' => 'Search Engine Optimization (SEO), Content Marketing, Social Media Marketing, Website Redesign',
            ],
            [
                'title' => 'Key Objectives:',
                'desc' => 'Increase online visibility, drive website traffic, improve search engine rankings, boost online sales and conversions.',
            ],
            [
                'title' => 'Results Achieved:',
                'desc' => '150% increase in website traffic, First-page Google rankings for high-value keywords,200% increase in online sales and conversions',
            ]
        ],
    ]);
    return $defaults;
});


// Call to action default value you can add this way any other section or element default value 
add_filter('control_agency_project_call_to_action_section_std', function ($defaults) {
    $defaults = array_merge($defaults, [
        'title' => 'Ready to Transform Your Digital Presence??',
        'buttons' => [
            'text' => 'Shedule a Meeting',
            'url' => '#',
            'class' => 'newsletter-one__btn next-marketing-btn dark-btn btn btn-radius',
            'target' => '',
        ]
    ]);
    return $defaults;
});
