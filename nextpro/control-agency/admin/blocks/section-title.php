<?php
return [
    'title'           => esc_attr__('Section title', 'nextpro'),
    'id'              => 'section-title',
    'icon'            => 'media-document',
    'description'     => 'This is the Section title',
    'fields'          => [
        [
            'type' => 'heading',
            'name' => esc_attr__('Section title', 'nextpro'),
        ],
        [
            'type'  => 'hidden',
            'id'    => 'template',
            'name'    => 'Template',
            'std'   => 'components/section-title.php',
        ],
        [
            'name'            => 'Alignment',
            'id'              => 'select_alignment',
            'type'            => 'select',
            'multiple'        => false,
            'std'             => 'text-left',
            'options'         => [
                'text-left'       => 'Text Left',
                'text-center' => 'Text Center',
                'text-end'        => 'Text Right',
            ],
            'desc'        => esc_attr__('You can change this section alignment by selecting a different alignment option.', 'nextpro'),
        ],
        [
            'name'        => esc_attr__('Name', 'nextpro'),
            'type'        => 'text',
            'id'          => 'name',
            'desc'        => esc_attr__('section name here.'),
            'std'         => 'Name',
            'placeholder' => esc_attr__('Name',   'nextpro'),
        ],
        [
            'name'        => esc_attr__('Title', 'nextpro'),
            'type'        => 'textarea',
            'id'          => 'title',
            'desc'        => sprintf(esc_attr__('Use %s to make words underline border highlight. e.g. %s', 'nextpro'), '<code>{}</code>', '<code>{Digital Marketing}</code>'),
            'std'         => 'Transforming Your Presence: Innovative Digital Marketing with SEO, PPC, and More',
            'placeholder' => esc_attr__('Title',   'nextpro'),
        ],
        [
            'name'        => esc_attr__('Description', 'nextpro'),
            'type'        => 'textarea',
            'id'          => 'desc',
            'desc'        => esc_attr__('Description here.', 'nextpro'),
            'desc'        => sprintf(esc_attr__('Use %s to make words highlight. e.g. %s', 'nextpro'), '<code>{}</code>', '<code>{Digital Marketing}</code>'),
            'std'         => 'NextMarketing seamlessly integrates with a variety of industry-leading tools, ensuring a cohesive and efficient digital ecosystem for your business.',
            'placeholder' => esc_attr__('Description',   'nextpro'),
        ],
        [
            'name'        => esc_attr__('Buttons', 'nextpro'),
            'id'          => 'buttons',
            'type'        => 'btn',
            'clone'        => false,
            'std'         => [
                [
                    'text' => 'Purchase now',
                    'url' => '#',
                    'class' => 'section-provide__btn dark-svg-hover next-marketing-btn dark-btn',
                    'target' => '',
                ],
            ],
        ],
    ],
];
