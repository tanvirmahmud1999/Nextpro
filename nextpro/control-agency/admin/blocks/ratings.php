<?php
return [
    'title'           => 'Ratings Element',
    'id'              => 'rating-block',
    'icon'            => 'format-gallery',
    'description'     => 'Well-wishers review and their users number',
    'fields'          => [
        [
            'type' => 'heading',
            'name' => esc_attr__('Rating Block', 'nextpro'),
        ],
        [
            'type' => 'hidden',
            'id' => 'template',
            'name' => 'Template',
            'std' => 'components/ratings.php'
        ],
        [
            'name'              => esc_attr__('Fun Facts', 'nextpro'),
            'id'                => 'fun_facts',
            'type'              => 'group',
            'clone'             => true,
            'clone_default'     => true,
            'clone_as_multiple' => true,
            'collapsible'       => true,
            'default_state'     => 'collapsed',
            'group_title'       => '{#}. {label}',
            'std'               => [
                [
                    'fun_fact_value'    => 4.9,
                    'label'    => esc_attr__('3k Ratings', 'nextpro'),
                ],
                [
                    'fun_fact_value'    => 10,
                    'suffix'    => esc_attr__('k', 'nextpro'),
                    'label'    => esc_attr__('Happy Users ', 'nextpro'),
                ],
            ],
            'fields'            => [
                [
                    'id'   => 'fun_fact_value',
                    'name' => esc_attr__('Value', 'nextpro'),
                    'type' => 'number',
                    'std'  => 0,
                ],
                [
                    'id'   => 'suffix',
                    'name' => esc_attr__('Suffix (e.g., k+, %)', 'nextpro'),
                    'type' => 'text',
                    'std'  => '',
                ],
                [
                    'id'   => 'label',
                    'name' => esc_attr__('Label text', 'nextpro'),
                    'type' => 'text',
                    'std'  => '',
                ],
            ],
        ],
        [

            'name'        => esc_attr__('Rating Quote', 'nextpro'),
            'id'          => 'taring_quote',
            'desc'        => esc_attr__('Add Quote', 'nextpro'),
            'type'        => 'textarea',
            'std'         => esc_attr__('Trusted by over 10,000+ customers and well wishers from all over the world since 2012 ', 'nextpro'),
        ],
        [
            'name'              => esc_attr__('rating logos: ', 'nextpro'),
            'id'                => 'ratings',
            'type'              => 'group',
            'clone'             => true,
            'clone_default'     => true,
            'clone_as_multiple' => true,
            'collapsible'       => true,
            'default_state'     => 'collapsed',
            'group_title'       => '{#}. {title}',
            'max_clone'         => 10,
            'add_button'        => esc_attr__('Add Item', 'nextpro'),
            'std'               => [
                [
                    'title' => esc_attr__('Google Rating', 'nextpro'),
                    'icon' => 'google-logo',
                    'link_text' => esc_attr__('See all our reviews', 'nextpro'),
                    'link' => '',
                ],
                [
                    'title' => esc_attr__('GoodFirms Rating', 'nextpro'),
                    'icon' => 'goodfirms-logo',
                    'link_text' => esc_attr__('See all our reviews', 'nextpro'),
                    'link' => '',
                ],
                [
                    'title' => esc_attr__('Clutch Rating', 'nextpro'),
                    'icon' => 'clutch-logo',
                    'link_text' => esc_attr__('See all our reviews', 'nextpro'),
                    'link' => '',
                ],
                [
                    'title' => esc_attr__('Trustpilot Rating', 'nextpro'),
                    'icon' => 'trustpilot-logo',
                    'link_text' => esc_attr__('See all our reviews', 'nextpro'),
                    'link' => '',
                ],

            ],
            'fields' => [
                [
                    'name' => esc_attr__('Title', 'nextpro'),
                    'id'   => 'title',
                    'type' => 'text',
                ],
                [
                    'id'               => 'icon',
                    'name'             => esc_attr__('Icon:',  'nextpro'),
                    'type'             => 'select',
                    'desc'             => esc_attr__('Select  icon', 'nextpro'),
                    'options'          =>  Nextpro\SVG_Icons::options(),

                ],
                [
                    'name' => esc_attr__('Link', 'nextpro'),
                    'id'   => 'link',
                    'type' => 'text',
                ],
                [
                    'name' => esc_attr__('Link Text', 'nextpro'),
                    'id'   => 'link_text',
                    'type' => 'text',
                ],
            ],
        ],

    ],
];
