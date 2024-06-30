<?php
return [
    'title'           => esc_attr__('FAQs', 'nextpro'),
    'id'              => 'faqs',
    'icon'            => 'editor-help',
    'description'     => 'Display question & answer',
    'fields'          => [
        [
            'type' => 'heading',
            'name' => esc_attr__('frequently asked question', 'nextpro'),
        ],
        [
            'type' => 'hidden',
            'id' => 'template',
            'name' => 'Template',
            'std' => 'components/faqs.php'
        ],
        [
            'name'        => esc_attr__('Title', 'control-agency'),
            'id'          => 'title',
            'type'        => 'text',
            'std'         => '',
            'size' => 60,
            'visible' => ['template', '=', 'service/single/faqs.php'],
        ],
        [
            'name'        => esc_attr__('Subtitle', 'control-agency'),
            'id'          => 'subtitle',
            'desc'        => esc_attr__('Type Subtitle', 'control-agency'),
            'type'        => 'textarea',
            'std'         => 'Get Right Solution For Business',
            'placeholder' => esc_attr__('Subtitle...',   'control-agency'),
            'visible' => ['template', '=', 'service/single/faqs.php'],
        ],
        [
            'name'        => esc_attr__('Click the button and expand item:', 'nextpro'),
            'id'                => 'faqs_group',
            'type'              => 'group',
            'clone'             => true,
            'clone_default'     => true,
            'clone_as_multiple' => true,
            'collapsible'   => true,
            'default_state'   => 'collapsed',
            'group_title'   => '{#}. {question}',
            'max_clone'         => 10,
            'add_button'        => esc_attr__('Add FAQ Item', 'nextpro'),
            'std'               => [
                [
                    'question' => 'How does the pricing work for your services?',
                    'answer' => 'We offer flexible pricing plans tailored to different business needs. Our pricing is transparent, with no hidden fees. Explore our detailed pricing section for more information.',
                ],
                [
                    'question' => 'Can I customize a plan based on my specific requirements?',
                    'answer' => 'We offer flexible pricing plans tailored to different business needs. Our pricing is transparent, with no hidden fees. Explore our detailed pricing section for more information.',
                ],
                [
                    'question' => 'What results can I expect from your digital marketing services?',
                    'answer' => 'We offer flexible pricing plans tailored to different business needs. Our pricing is transparent, with no hidden fees. Explore our detailed pricing section for more information.',
                ],
                [
                    'question' => 'Do you offer ongoing support and optimization for campaigns?',
                    'answer' => 'We offer flexible pricing plans tailored to different business needs. Our pricing is transparent, with no hidden fees. Explore our detailed pricing section for more information.',
                ],
                [
                    'question' => 'How do I get started with NextMarketing?',
                    'answer' => 'We offer flexible pricing plans tailored to different business needs. Our pricing is transparent, with no hidden fees. Explore our detailed pricing section for more information.',
                ],
                [
                    'question' => 'Can I see examples of your past work or client success stories?',
                    'answer' => 'We offer flexible pricing plans tailored to different business needs. Our pricing is transparent, with no hidden fees. Explore our detailed pricing section for more information.',
                ],

            ],
            'fields'            => [

                [
                    'name' => esc_attr__('Question', 'nextpro'),
                    'id'   => 'question',
                    'type' => 'text',
                ],
                [
                    'name' => esc_attr__('Answer', 'nextpro'),
                    'id'   => 'answer',
                    'type' => 'textarea',
                ],

            ],
        ],

    ],
];
