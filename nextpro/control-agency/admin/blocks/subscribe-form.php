<?php
return [
    'title'      => esc_html__('Subscribe Form', 'nextpro'),
    'id'         => 'subscribe-form',
    'icon'       => 'email-alt',
    'description' => esc_html__('Subscribe Form', 'nextpro'),
    'fields'     => [
        [
            'type' => 'heading',
            'name' => esc_attr__('Subscribe Form', 'nextpro'),
        ],
        [
            'name'            => esc_attr__('Select', 'nextpro'),
            'id'              => 'template',
            'type'            => 'hidden',
            'multiple'        => false,
            'select_all_none' => false,
            'std'              => 'components/subscribe-form.php',

        ],
        [
            'id'   => 'title',
            'name' => esc_attr__('Title', 'nextpro'),
            'type' => 'textarea',
            'std'  => esc_attr__('Subscribe to our  Newsletter', 'nextpro'),
        ],
        [
            'id'   => 'shortcode',
            'name' => esc_attr__('Shortcode', 'nextpro'),
            'type' => 'text',
            'std'  => '[control_email_subscriber_form]',
            'placeholder'  =>  esc_attr__('Enter shortcode here...', 'nextpro'),
        ],

    ],
];
