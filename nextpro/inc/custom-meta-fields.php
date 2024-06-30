<?php
//Portfolio Meta Field
add_filter('rwmb_meta_boxes', 'nextpro_register_portfolio_meta_fields');
function nextpro_register_portfolio_meta_fields($meta_boxes) {

    $meta_boxes[] = [
        'title' => esc_html__('Project information', 'nextpro'),
        'post_types' => 'portfolio',
        'fields' => [
            [
                'name' => esc_html__('Category Label', 'nextpro'),
                'id' => 'category_label',
                'type' => 'text',
                'std' => esc_html__('Category :', 'nextpro'),
            ],
            [
                'type' => 'group',
                'id'   => 'start_date_group',
                'name' => esc_html__('Start Date:', 'nextpro'),
                'clone' => false,
                'collapsible' => false,
                'fields' => [
                    [
                        'type' => 'text',
                        'id' => 'start_date_label',
                        'name' => esc_html__('Label', 'nextpro'),
                        'std' => esc_html__('Start Date: ', 'nextpro'),
                    ],
                    [
                        'type' => 'date',
                        'id' => 'start_date',
                        'name' => esc_html__('Date', 'nextpro'),
                        'std'       => '2023-02-28 ',
                    ],
                ],
            ],
            [
                'type' => 'group',
                'id'   => 'handover',
                'name' => esc_html__('Handover Date:', 'nextpro'),
                'clone' => false,
                'collapsible' => false,
                'fields' => [
                    [
                        'type' => 'text',
                        'id' => 'handover_label',
                        'name' => esc_html__('Handover Label', 'nextpro'),
                        'std'  => esc_html__('Handover ', 'nextpro'),
                    ],
                    [
                        'type' => 'date',
                        'id' => 'handover_date',
                        'name' => esc_html__('Date', 'nextpro'),
                        'std'  => '2023-09-28 ',
                    ],
                ],
            ],
            [
                'type' => 'group',
                'id'   => 'client',
                'name' => esc_html__('Client:', 'nextpro'),
                'clone' => false,
                'collapsible' => false,
                'fields' => [
                    [
                        'type' => 'text',
                        'id' => 'client_label',
                        'name' => esc_html__('Client Label', 'nextpro'),
                        'std'  => esc_html__('client ', 'nextpro'),
                    ],
                    [
                        'type' => 'text',
                        'id' => 'client_name',
                        'name' => esc_html__('Client Name', 'nextpro'),
                        'std'  => esc_html__('Themeperch ', 'nextpro'),
                    ],
                ],
            ],
            [
                'type' => 'group',
                'id'   => 'client_website',
                'name' => esc_html__('Client Website', 'nextpro'),
                'clone' => false,
                'collapsible' => false,
                'fields' => [
                    [
                        'type' => 'text',
                        'id' => 'website_name',
                        'name' => esc_html__('Label', 'nextpro'),
                        'std' =>  esc_html__('www.website.com ', 'nextpro'),
                    ],
                    [
                        'type' => 'text',
                        'id' => 'website_link',
                        'name' => esc_html__('Website Name', 'nextpro'),
                        'std' =>  '#',
                    ],
                ],
            ],
            [
                'id' => 'project_gallery',
                'name' => esc_html__('Project gallery', 'nextpro'),
                'type' => 'image_advanced',
                'force_delete' => false,
                'max_file_uploads' => 6,
                'max_status' => true,
                'image_size' => 'full',
            ],
            [
                'type' => 'group',
                'id'   => 'project_summary',
                'name' => esc_html__('Project Summary', 'nextpro'),
                'clone' => false,
                'collapsible' => false,
                'fields' => [
                    [
                        'type' => 'text',
                        'id' => 'summary_label',
                        'name' => esc_html__('Label', 'nextpro'),
                        'std' =>  esc_html__('Project Summary', 'nextpro'),
                    ],
                    [
                        'type' => 'wysiwyg',
                        'id' => 'summary_content',
                        'name' => esc_html__('Project Summary Content', 'nextpro'),
                        'raw' => false,
                        'options' => [
                            'textarea_rows' => 4,
                            'teeny' => true,
                            'media_buttons' => false
                        ],
                        'std' =>  esc_html__('Project Summary Content', 'nextpro'),
                    ],
                ],
            ],
            [
                'type' => 'group',
                'id'   => 'popup',
                'name' => esc_html__('Video Popup', 'nextpro'),
                'clone' => false,
                'collapsible' => false,
                'fields' => [
                    [
                        'type' => 'image',
                        'id' => 'popup_image',
                        'name' => esc_html__('Popup Image', 'nextpro'),
                        'max_file_uploads' => 1,
                        'max_status' => false,
                        'image_size' => 'full',
                    ],
                    [
                        'type' => 'url',
                        'id' => 'popup_link',
                        'name' => esc_html__('Popup video link', 'nextpro'),
                        'std' => 'https://www.youtube.com/embed/SZEflIVnhH8',

                    ],
                ],
            ],
            [
                'type' => 'group',
                'id'   => 'project_result',
                'name' => esc_html__('Solution & Results Label', 'nextpro'),
                'clone' => false,
                'collapsible' => false,
                'fields' => [
                    [
                        'type' => 'text',
                        'id' => 'solutiuon_label',
                        'name' => esc_html__('Label', 'nextpro'),
                        'std' =>  esc_html__('Solution & Results', 'nextpro'),
                    ],
                    [
                        'type' => 'wysiwyg',
                        'id' => 'project_content',
                        'name' => esc_html__('Project Solution & Results Content', 'nextpro'),
                        'raw' => false,
                        'options' => [
                            'textarea_rows' => 4,
                            'teeny' => true,
                            'media_buttons' => false
                        ],
                        'std' =>  esc_html__('Project Summary Content', 'nextpro'),
                    ],
                ],
            ],
            [
                'type' => 'group',
                'id'   => 'more_project',
                'name' => esc_html__(' More Projects ', 'nextpro'),
                'clone' => false,
                'collapsible' => false,
                'fields' => [
                    [
                        'type' => 'text',
                        'id' => 'more_project_label',
                        'name' => esc_html__('Label', 'nextpro'),
                        'std' =>  esc_html__('More Projects', 'nextpro'),
                    ],
                    [
                        'type' => 'text',
                        'id' => 'more_project_link',
                        'name' => esc_html__('More Projects Link', 'nextpro'),
                        'std' =>  '#',
                    ],
                ],
            ],
        ],
    ];

    $meta_boxes[] = [
        'title' => esc_html__('Job Details', 'nextpro'),
        'post_types' => 'career',
        'fields' => [
            [
                'id' => 'job_location',
                'name' => esc_html__('Job Location', 'nextpro'),
                'type' => 'text',
                'force_delete' => false,
                'max_file_uploads' => 6,
                'max_status' => true
            ],
            [
                'type' => 'group',
                'id'   => 'job_features',
                'name' => esc_html__('Job Features', 'nextpro'),
                'clone' => true,
                'collapsible' => true,
                'group_title' => esc_html__('Feature Item', 'nextpro'),
                'fields' => [
                    [
                        'type' => 'text',
                        'id' => 'feature_title',
                        'name' => 'Title',
                    ],
                    [
                        'type' => 'textarea',
                        'id' => 'feature_content',
                        'name' => 'Content',
                    ],
                ],
                'std' => [
                    [
                        'feature_title'     => esc_html__('Flexible time off', 'nextpro'),
                        'feature_content'   => esc_html__('Aliqum mullam blandit tempor sapien gravida donec ipsum, at porta justo velna vitae auctor congue magna nihil impedit ligula risus. ', 'nextpro'),
                    ],
                    [
                        'feature_title'     => esc_html__('Healthcare', 'nextpro'),
                        'feature_content'   => esc_html__('Blandit tempor sapien aliqum mullam gravida donec ipsum, at porta justo velna vitae auctor congue mauris and donec magnis sapien ', 'nextpro'),
                    ],
                    [
                        'feature_title'     => esc_html__('The latest hardware', 'nextpro'),
                        'feature_content'   => esc_html__('Mauris donec mullam blandit at tempor sapien gravida donec ipsum, at porta justo velna vitae auctor congue magna nihil impedit ligula  ', 'nextpro'),
                    ],
                    [
                        'feature_title'     => esc_html__('Ergonomic equipment', 'nextpro'),
                        'feature_content'   => esc_html__('Sapien gravida donec ipsum porta justo velna vitae auctor congue magna nihil impedit ligula risus. Mauris donec ociis sagittis tempor ', 'nextpro'),
                    ],
                ],
            ],
            [
                'name' => esc_html__('Details Information', 'nextpro'),
                'type' => 'wysiwyg',
                'id' => 'detail_info',
                'raw' => false,
                'options' => [
                    'textarea_rows' => 4,
                    'teeny' => true,
                    'media_buttons' => false
                ],
            ],
            [
                'id' => 'button_text',
                'name' => esc_html__('Apply Button Text', 'nextpro'),
                'type' => 'text',
                'max_status' => true,
                'std' => esc_html__('Apply to this job!', 'nextpro'),
            ],
            [
                'id' => 'button_link',
                'name' => esc_html__('Apply Button Link', 'nextpro'),
                'type' => 'text',
                'max_status' => true,
                'std' => '#',
            ],


        ],
    ];
    return $meta_boxes;
}
