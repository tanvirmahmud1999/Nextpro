<?php
add_filter('control_agency_get_service_blocks_std', function () {
    return [
        // block field id which will not show in Gutenberg block editor
        [
            'name' => 'Service Banner',
            'template' => 'banner-single',
        ],
        [
            'name' => 'Service Content',
            'template' => 'editor-content',
        ],
        [
            'name' => 'Strategic Approach',
            'template' => 'features',
        ],
        [
            'name' => 'FAQs',
            'template' => 'faqs',
        ],
        [
            'name' => 'Call To Action',
            'template' => 'call-to-action-section',
        ],
    ];
});

add_filter('control_agency_service_banner_single_std', function ($defaults) {
    $defaults = array_merge($defaults, [
        'template' => ['service/single/banner.php','service/loop/banner.php'],
        'title' => '[service_title]',
        'subtitle' => '',

    ]);
    return $defaults;
});


add_filter('control_agency_service_editor_content_std', function ($defaults) {
    $defaults = array_merge($defaults, [
        'template' => 'service/single/content.php',
        'post_title' =>'Why choose Next Agency as your Marketing Partner',
        'sidebar_title' => 'Services We Offer',

    ]);
    return $defaults;
});

if (!function_exists('control_agency_service_features_std')) {
    function control_agency_service_features_std($defaults = []) {
        $args = [
            'template' => 'service/single/services-features.php',
            'title' => 'Strategic Approach',
            'subtitle' => 'We believe in taking a strategic approach to digital marketing that focuses on delivering tangible results for our clients. Our methodology is built on a foundation of data-driven insights, industry expertise, and innovative techniques to ensure maximum impact and ROI.',
            'features_list' => [
                [
                    'icon' => 'document-two',
                    'title' => 'Data-Driven Insights',
                    'subtitle' => 'Through thorough analysis of key metrics and market trends, we uncover valuable insights.',
                ],
                [
                    'icon' => 'shield-done-two',
                    'title' => 'Customized Strategies',
                    'subtitle' => 'We develop customized plans that align with your specific goals and budget.',
                ],
                [
                    'icon' => 'discounnt-icon-two',
                    'title' => 'Multi-Faceted Approach',
                    'subtitle' => 'By leveraging a diverse range of channels and techniques, we reach your target audience.',
                ],
                [
                    'icon' => 'buy-icon-two',
                    'title' => 'Continuous Optimization',
                    'subtitle' => 'We believe that digital marketing is an ongoing process of refinement and improvement.',
                ],
                [
                    'icon' => 'activity-two',
                    'title' => 'Transparent Communication',
                    'subtitle' => 'Throughout the process, we maintain open and transparent communication with our clients.',
                ],
                [
                    'icon' => 'send-two',
                    'title' => 'Results-Driven Focus',
                    'subtitle' => 'Ultimately, our strategic approach is all about delivering measurable results.',
                ],
            ],
        ];
        return wp_parse_args($args, $defaults);
    }
    add_filter('control_agency_service_features_std', 'control_agency_service_features_std');
}

add_filter('control_agency_service_faqs_std', function ($defaults) {
    $defaults = array_merge($defaults, [
        'template' => 'service/single/faqs.php',
        'title' => 'Your Digital Journey Clarified (FAQ)',
        'subtitle' => 'Explore essential information about Next Agency and our services. Find quick answers to common queries in our FAQ section, ensuring a clear understanding of your digital journey with us.',
    ]);
    return $defaults;
});

add_filter('control_agency_service_call_to_action_section_std', function ($defaults) {
    $defaults = array_merge($defaults, [
        'template_file' => 'service/single/cta.php',
        'title' => 'Request a free Audit of your website',
        'desc' => 'Find quick answers to common queries in our FAQ section, ensuring a clear understanding of your digital journey with us.',
        'shortcode' => '[contact-form-7 title="Service form"]'
    ]);
    return $defaults;
});
