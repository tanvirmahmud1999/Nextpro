<?php
return [
    'title'           => esc_attr__('Hero Title', 'nextpro'),
    'id'              => 'hero-title',
    'icon'            => 'media-document',
    'description'     => 'This is the Hero Section individual  title',
    'fields'          => [
        [
            'type' => 'heading',
            'name' => esc_attr__('Hero Title', 'nextpro'),
        ],
        [
            'type'  => 'hidden',
            'id'    => 'template',
            'name'    => 'Template',
            'std'   => 'components/hero-title.php',
        ],
        [
            'name'        => esc_attr__('Title', 'nextpro'),
            'type'        => 'textarea',
            'id'          => 'title',
            'desc'        => esc_attr__('Title here.'),
            'std'         => esc_attr__('Data driven revenue marketing agency', 'nextpro'),
        ],
        [
            'name'        => esc_attr__('Description', 'nextpro'),
            'type'        => 'textarea',
            'id'          => 'desc',
            'desc'        => esc_attr__('Description here.', 'nextpro'),
            'std'         => 'Choose NextMarketing as your digital marketing agency and propel ur business to new heights with our award-winning digital marketing services.',
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
                    'fun_fact_value' => 13,
                    'label' => esc_attr__('Years of Track Record', 'nextpro'),
                ],
                [
                    'fun_fact_value' => 96,
                    'fun_fact_suffix' => esc_attr__('%', 'nextpro'),
                    'label' => esc_attr__('Happy Customers', 'nextpro'),
                ]
            ],
            'fields'            => [
                [
                    'id'   => 'fun_fact_value',
                    'name' => esc_attr__('Count', 'nextpro'),
                    'type' => 'number',
                ],
                [
                    'id'   => 'fun_fact_suffix',
                    'name' => esc_attr__('Suffix (e.g., k+, %)', 'nextpro'),
                    'type' => 'text',
                    'std'  => '',
                ],
                [
                    'id'   => 'label',
                    'name' => esc_attr__('label', 'nextpro'),
                    'type' => 'text',
                ],
            ],
        ],

    ],
];
